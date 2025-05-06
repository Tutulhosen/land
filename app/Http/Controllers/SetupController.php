<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\EmailSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use App\Models\Admin\SystemConfiguration\ApplicationSetting;
use App\Models\Admin\SystemConfiguration\CompanyInformation;
use App\Models\Admin\SystemConfiguration\ContactInformation;

class SetupController extends Controller
{
    public function index()
    {
        return view('setup.welcome');
    }

    public function company()
    {
        return view('setup.company');
    }


    public function storeApplicationSetup(Request $request)
    {
        // Store application setup data (this could be stored in a config or environment file)
        config(['app.name' => $request->appName]);
        config(['app.url' => $request->appURL]);
        config(['app.timezone' => $request->appTimezone]);

        // Store to session or database if needed
        session(['app_setup' => $request->all()]);

        return response()->json(['success' => true, 'message' => 'Application setup completed.']);
    }

    public function storeCompanySetup(Request $request)
    {
        try {

            // Store to session for future use
            session(['company_setup' => $request->all()]);

            return response()->json(['success' => true, 'message' => 'Company setup completed.']);

        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Company setup failed: ' . $e->getMessage()]);
        }

    }

    public function storeEmailSetup(Request $request)
    {
        $this->validate($request, [
            'mailDriver' => 'required|string',
            'mailHost' => 'required|string',
            'mailPort' => 'required|integer',
            'mailUsername' => 'required|string',
            'mailPassword' => 'required|string',
            'mailEncryption' => 'required|string',
            'mailFromEmail' => 'nullable|email',
            'mailFromName' => 'nullable|string',
        ]);

        // Store email settings
        $emailSetting = new EmailSetting();
        $emailSetting->mailDriver = $request->mailDriver;
        $emailSetting->mailHost = $request->mailHost;
        $emailSetting->mailPort = $request->mailPort;
        $emailSetting->mailUsername = $request->mailUsername;
        $emailSetting->mailPassword = $request->mailPassword;
        $emailSetting->mailEncryption = $request->mailEncryption;
        $emailSetting->mailFromEmail = $request->mailFromEmail;
        $emailSetting->mailFromName = $request->mailFromName;
        $emailSetting->save();

        // Update mail config dynamically for the app
        config([
            'mail.mailers.smtp.host' => $request->mailHost,
            'mail.mailers.smtp.port' => $request->mailPort,
            'mail.mailers.smtp.username' => $request->mailUsername,
            'mail.mailers.smtp.password' => $request->mailPassword,
            'mail.mailers.smtp.encryption' => $request->mailEncryption,
        ]);

        return response()->json(['success' => true, 'message' => 'Email setup completed.']);
    }

    public function DatabaseConnection(Request $request)
    {
        $databaseName = $request->dbName;

        $connection = [
            'driver' => 'mysql',
            'host' => $request->dbHost,
            'port' => $request->dbPort,
            'database' => null, // No database yet to test server connection
            'username' => $request->dbUsername,
            'password' => $request->dbPassword,
        ];

        try {
            // Connect to the MySQL server (without specifying a DB)
            config(['database.connections.temp_db' => $connection]);
            DB::connection('temp_db')->getPdo();

            // Check if database exists
            $result = DB::connection('temp_db')->select("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = ?", [$databaseName]);

            // If the database exists, we can proceed with migrations
            if (count($result) == 0) {
                // Database doesn't exist: Create it
                DB::connection('temp_db')->statement("CREATE DATABASE `$databaseName`");
            } else {
                return response()->json(['success' => false, 'message' => 'Database already exists.']);
            }

        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Database connection or creation failed: ' . $e->getMessage()]);
        }

        // Now switch to the new DB for migrations
        $connection['database'] = $databaseName;
        config(['database.connections.temp_db' => $connection]);

        // Purge old connection to reload config
        DB::purge('temp_db');

        // Reconnect with new DB
        DB::connection('temp_db')->getPdo();

        // Run migrations and seeders
        try {

            Artisan::call('migrate', ['--database' => 'temp_db', '--force' => true]);
            Artisan::call('db:seed', ['--database' => 'temp_db', '--force' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Migration/Seeding failed: ' . $e->getMessage()]);
        }

        // Update .env values
        try {
            $envPath = base_path('.env');
            $content = File::get($envPath);

            $app_name = session('app_setup')['appName'];
            $app_url = session('app_setup')['appURL'];
            $app_timezone = session('app_setup')['appTimezone'];
            $app_key = 'base64:' . base64_encode(random_bytes(32));

            $replacements = [
                'APP_NAME'      => '"' . $app_name . '"',
                'APP_URL'       => $app_url,
                'APP_TIMEZONE'  => $app_timezone,
                'APP_KEY'       => $app_key,
                'APP_DEBUG'     => 'false',
                'APP_ENV'       => 'production',
                'APP_INSTALLED' => 'true',
                'DB_DATABASE'   => '"'.$databaseName.'"',
                'DB_USERNAME'   => '"'.$request->dbUsername.'"',
                'DB_PASSWORD'   => '"'.$request->dbPassword.'"',
            ];

            foreach ($replacements as $key => $value) {
                $content = preg_replace("/^$key=.*/m", "$key=$value", $content);
            }

            File::put($envPath, $content);

            Artisan::call('config:clear');
            Artisan::call('cache:clear');
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to write to .env file: ' . $e->getMessage()]);
        }

        return response()->json(['success' => true, 'message' => 'Database setup, migration, and environment configuration completed successfully.']);
    }

    public function storeSuperAdmin(Request $request)
    {
        $this->validate($request, [
            'adminName' => 'required|string',
            // 'adminEmail' => 'required|email|unique:users,email',
            'adminUsername' => 'required|string|unique:users,username',
            'adminPassword' => 'required|string|min:8',
        ]);

        try {
             // Create Super Admin user
            $user = new User();
            $user->name = $request->adminName;
            $user->username = $request->adminUsername;
            // $user->email = $request->adminEmail;
            $user->password = Hash::make($request->adminPassword);
            $user->is_superadmin = true;
            $user->status = true;
            $user->save();

            // Assign Super Admin role or permissions if necessary
            // $user->assignRole('Super Admin'); // Assuming you use a package like Spatie for roles

            return response()->json(['success' => true, 'message' => 'Super Admin setup completed.']);
        } catch (\Exception $e) {
            //throw $th;
            return response()->json(['success' => false, 'message' => 'Admin setup failed: ' . $e->getMessage()]);
        }

    }

    public function complete()
    {
        return view('setup.complete');
    }
}
