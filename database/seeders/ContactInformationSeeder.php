<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Admin\SystemConfiguration\ContactInformation;

class ContactInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContactInformation::updateOrCreate(
            ['id' => 1],
            [
                'company_information_id' => 1,
                'official_contact_number' => '01234567890',
                'whatsapp_number' => '01234567890',
                'landline_number' => '01234567890',
                'hotline_number' => '01234567890',
                'email_address' => 'contact@company.com',
                'website_address' => 'https://qbit-tech.com/',
                'google_map_iframe' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3652.1164348586753!2d90.41813827602991!3d23.74322698905039!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b998ed9235f1%3A0xedb5992f595ad41f!2sQbit%20Tech!5e0!3m2!1sen!2sbd!4v1738571933156!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            ]
        );
    }
}
