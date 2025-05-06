<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>HRM Setup - Application & Company Info</title>
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{ asset('admin') }}/assets/css/onebiterp.css">

    <style>
        body {
            background: linear-gradient(135deg, #6e88d8, #173691);
            color: black;
            height: 100vh;
        }
        .setup-container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    {{-- Application Setup --}}
    <div class="setup-container">
        <h2 class="text-center">Application Setup</h2>
        <form id="appSetupForm" method="POST">
            @csrf
            @method("POST")
            <div class="mb-3">
                <label class="form-label">Application Name</label>
                <input type="text" class="form-control" id="appName" name="appName" required placeholder="HRM">
            </div>
            <div class="mb-3">
                <label class="form-label">Application URL</label>
                <input type="text" class="form-control" id="appURL" name="appURL" required placeholder="http://localhost">
            </div>
            <div class="mb-3">
                <label class="form-label">TimeZone</label>
                <input type="text" class="form-control" id="appTimezone" name="appTimezone" required placeholder="Asia/Dhaka">
            </div>
            <div class="mb-3">
                <label class="form-label">Opening Date</label>
                <input type="date" class="form-control" id="openingDate" name="openingDate" required>
            </div>
            <div class="d-flex justify-content-between">
                {{-- <button type="button" class="btn btn-warning w-25" onclick="goBack()">Back</button> --}}
                <button type="submit" class="btn btn-primary w-100" >Save & Next</button>
            </div>
        </form>
    </div>

    {{-- Company Setup --}}
    <div class="setup-container" style="display: none;" id="companySetup">
        <h2 class="text-center">Company Setup</h2>
        <form id="companySetupForm" method="POST">
            @csrf
            @method("POST")
            <div class="mb-3">
                <label class="form-label">Company Name</label>
                <input type="text" class="form-control" id="companyName" name="companyName"  required placeholder="HRM Ltd">
            </div>
            <div class="mb-3">
                <label class="form-label">Address</label>
                <textarea class="form-control" id="companyAddress" name="companyAddress" required placeholder="Dhaka, Bangladesh"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Official Phone</label>
                <input type="text" class="form-control" id="companyPhone" name="companyPhone" required placeholder="+8801XXXXXXXXX">
            </div>
            <div class="mb-3">
                <label class="form-label">Official Email</label>
                <input type="email" class="form-control" id="companyEmail" name="companyEmail" required placeholder="rG2mW@example.com">
            </div>
            <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-warning w-25" onclick="goBack()">Previous</button>
                <button type="submit" class="btn btn-primary w-25" >Save & Next</button>
            </div>
        </form>
    </div>

    {{-- Email Setup --}}
    {{-- <div class="setup-container" style="display: none;" id="emailSetup">
        <h2 class="text-center">Email Setup</h2>
        <form id="emailSetupForm">
            <div class="mb-3">
                <label class="form-label">Mail Driver</label>
                <select class="form-control" id="mailDriver" required name="mailDriver">
                    <option value="mail">PHP Mail</option>
                    <option value="smtp">SMTP</option>
                    <option value="sendmail">Sendmail</option>
                    <option value="mailgun">Mailgun</option>
                    <option value="ses">Amazon SES</option>
                    <option value="postmark">Postmark</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Mail Host</label>
                <input type="text" class="form-control" id="mailHost" name="mailHost" required placeholder="smtp.example.com">
            </div>
            <div class="mb-3">
                <label class="form-label">Mail Port</label>
                <input type="text" class="form-control" id="mailPort" name="mailPort" required placeholder="587">
            </div>
            <div class="mb-3">
                <label class="form-label">Encryption</label>
                <select class="form-control" id="mailEncryption" name="mailEncryption" required>
                    <option value="starttls">STARTTLS</option>
                    <option value="tls">TLS</option>
                    <option value="ssl">SSL</option>
                    <option value="none">None</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Mail Username</label>
                <input type="text" class="form-control" id="mailUsername" name="mailUsername" placeholder="your-email@example.com" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Mail Password</label>
                <input type="password" class="form-control" id="mailPassword" name="mailPassword" placeholder="your-email-password" required>
            </div>
            <div class="mb-3">
                <label class="form-label">From Email</label>
                <input type="email" class="form-control" id="mailFromEmail" name="mailFromEmail" required placeholder="no-reply@example.com" required>
            </div>
            <div class="mb-3">
                <label class="form-label">From Name</label>
                <input type="text" class="form-control" id="mailFromName" name="mailFromName" required placeholder="HRM System" required>
            </div>
            <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-warning w-25" onclick="goBack()">Previous</button>
                <button type="button" class="btn btn-primary w-25" onclick="nextStep()">Next</button>
            </div>
        </form>
    </div> --}}

    {{-- Database Setup --}}
    <div class="setup-container" style="display: none;" id="databaseSetup">
        <h2 class="text-center">Database Setup</h2>
        <form id="databaseSetupForm">

            <div class="mb-3">
                <label class="form-label">Database Host</label>
                <input type="text" class="form-control" id="dbHost" name="dbHost" required placeholder="127.0.0.1">
            </div>
            <div class="mb-3">
                <label class="form-label">Database Port</label>
                <input type="text" class="form-control" id="dbPort" name="dbPort" required placeholder="3306">
            </div>
            <div class="mb-3">
                <label class="form-label">Database Name</label>
                <input type="text" class="form-control" id="dbName" name="dbName" required placeholder="hrm_database">
            </div>
            <div class="mb-3">
                <label class="form-label">Database Username</label>
                <input type="text" class="form-control" id="dbUsername" name="dbUsername" required placeholder="root">
            </div>
            <div class="mb-3">
                <label class="form-label">Database Password</label>
                <input type="password" class="form-control" id="dbPassword" name="dbPassword" placeholder="password">
            </div>
            <button type="button" class="btn btn-success w-100 mb-2" onclick="DatabaseConnection()">Connect to Database</button>
            {{-- <button type="button" class="btn btn-success w-100 mt-2" onclick="nextStep()">Next</button> --}}
            <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-warning w-25" onclick="goBack()">Previous</button>
                <button type="button" class="btn btn-warning w-25" onclick="skipStep()">Skip</button>
                <button type="button" class="btn btn-primary w-25" onclick="nextStep()">Next</button>
            </div>
        </form>
    </div>

    {{-- Admin Setup --}}
    <div class="setup-container" style="display: none;" id="adminSetup">
        <h2 class="text-center">Super Admin User Setup</h2>
        <form id="adminSetupForm" method="POST">
            @csrf
            @method("POST")
            <div class="mb-3">
                <label class="form-label">Admin Name</label>
                <input type="text" class="form-control" id="adminName" name="adminName" required placeholder="John Doe">
            </div>
            <div class="mb-3">
                <label class="form-label">Admin Email</label>
                <input type="email" class="form-control" id="adminEmail" name="adminEmail" required placeholder="admin@example.com">
            </div>
            <div class="mb-3">
                <label class="form-label">Admin Username</label>
                <input type="text" class="form-control" id="adminUsername" name="adminUsername" required placeholder="admin">
            </div>
            <div class="mb-3">
                <label class="form-label">Admin Password</label>
                <input type="password" class="form-control" id="adminPassword" name="adminPassword" required placeholder="******">
            </div>
            <div class="mb-3">
                <label class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required placeholder="******">
            </div>
            <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-warning w-25" onclick="goBack()">Previous</button>
                <button type="submit" class="btn btn-primary w-25" >Save & Next</button>
            </div>
        </form>
    </div>

    <div class="setup-container" style="display: none;" id="finalSetup">
        <h2 class="text-center">Final Testing & System Summary</h2>

        <div class="summary-card">
            <h4>Application Summary</h4>
            <ul class="list-group">
                <li class="list-group-item"><strong>Application Name:</strong> <span id="summaryAppName"></span></li>
                <li class="list-group-item"><strong>Application URL:</strong> <span id="summaryAppURL"></span></li>
                <li class="list-group-item"><strong>Timezone:</strong> <span id="summaryTimezone"></span></li>
                <li class="list-group-item"><strong>Opening Date:</strong> <span id="summaryOpeningDate"></span></li>
            </ul>
        </div>

        <div class="summary-card mt-3">
            <h4>Company Summary</h4>
            <ul class="list-group">
                <li class="list-group-item"><strong>Company Name:</strong> <span id="summaryCompanyName"></span></li>
                <li class="list-group-item"><strong>Address:</strong> <span id="summaryCompanyAddress"></span></li>
                <li class="list-group-item"><strong>Official Phone:</strong> <span id="summaryCompanyPhone"></span></li>
                <li class="list-group-item"><strong>Official Email:</strong> <span id="summaryCompanyEmail"></span></li>
            </ul>
        </div>

        <div class="summary-card mt-3">
            <h4>Database Configuration</h4>
            <ul class="list-group">
                <li class="list-group-item"><strong>Database Name:</strong> <span id="summaryDBName"></span></li>
                <li class="list-group-item"><strong>Database User:</strong> <span id="summaryDBUser"></span></li>
                <li class="list-group-item"><strong>Host:</strong> <span id="summaryDBHost"></span></li>
                <li class="list-group-item"><strong>Port:</strong> <span id="summaryDBPort"></span></li>
            </ul>
        </div>

        <div class="summary-card mt-3">
            <h4>Super Admin Summary</h4>
            <ul class="list-group">
                <li class="list-group-item"><strong>Name:</strong> <span id="summaryAdminName"></span></li>
                <li class="list-group-item"><strong>Email:</strong> <span id="summaryAdminEmail"></span></li>
                <li class="list-group-item"><strong>Username:</strong> <span id="summaryAdminUsername"></span></li>
            </ul>
        </div>

        <div class="summary-card mt-3">
            <h4>Server & Environment</h4>
            <ul class="list-group">
                <li class="list-group-item"><strong>PHP Version:</strong> <span id="phpVersion"></span></li>
                <li class="list-group-item"><strong>Laravel Version:</strong> <span id="laravelVersion"></span></li>
                <li class="list-group-item"><strong>Server OS:</strong> <span id="serverOS"></span></li>
            </ul>
        </div>

        <div class="mt-4">
            <button type="button" class="btn btn-warning w-100" onclick="goBack()">Back</button>
            <button type="submit" class="btn btn-success w-100 mt-2" onclick="finishSetup()">Finish & Save</button>
        </div>
    </div>


     <!--   Core JS Files   -->
     <script src="{{ asset('admin') }}/assets/js/core/jquery-3.7.1.min.js"></script>
     <script src="{{ asset('admin') }}/assets/js/core/popper.min.js"></script>
     <script src="{{ asset('admin') }}/assets/js/core/bootstrap.min.js"></script>
    <!-- Sweet Alert -->
    <script src="{{ asset('admin') }}/assets/js/plugin/sweetalert/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     <script>

        // Initialize the first step
        function skipStep(step) {
            nextStep();
        }
        let currentStep = 1; // Track the current step

        function nextStep() {

            document.getElementById(getStepId(currentStep)).style.display = 'none';
            currentStep++;
            document.getElementById(getStepId(currentStep)).style.display = 'block';
        }

        function goBack() {
            document.getElementById(getStepId(currentStep)).style.display = 'none';
            currentStep--;
            document.getElementById(getStepId(currentStep)).style.display = 'block';
        }

        function getStepId(step) {
            const stepIds = {
                1: 'appSetupForm',
                2: 'companySetup',
                3: 'databaseSetup',
                4: 'adminSetup',
                5: 'finalSetup'
            };
            return stepIds[step];
        }

        function validateStep(step) {
            let isValid = true;

            switch (step) {
                case 1: // Validate Application Setup
                    isValid = validateFields(['appName', 'appURL', 'appTimezone', 'openingDate']);
                    break;
                case 2: // Validate Company Setup
                    isValid = validateFields(['companyName', 'companyAddress', 'companyPhone', 'companyEmail']);
                    break;

                case 3: // Validate Database Setup
                    isValid = validateFields(['dbHost', 'dbPort', 'dbName', 'dbUsername']);
                    if (isValid) testDatabaseConnection(); // Test database connection before proceeding
                    break;
                case 4: // Validate Super Admin Setup
                    isValid = validateAdmin();
                    break;
            }

            return isValid;
        }

        function validateFields(fields) {
            let isValid = true;
            fields.forEach(field => {
                const input = document.getElementById(field);
                if (!input.value.trim()) {
                    input.classList.add('is-invalid');
                    isValid = false;
                } else {
                    input.classList.remove('is-invalid');
                }
            });

            if (!isValid) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Validation Error',
                    text: 'Please fill in all required fields.',
                    confirmButtonColor: '#3085d6',
                });
            }
            return isValid;
        }

        function validateAdmin() {

            const password = document.getElementById('adminPassword').value;
            const confirmPassword = document.getElementById('confirmPassword').value;

            if (password.length < 8) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Weak Password',
                    text: 'Password should be at least 6 characters long.',
                });
                return false;
            }

            if (password !== confirmPassword) {
                Swal.fire({
                    icon: 'error',
                    title: 'Password Mismatch',
                    text: 'Passwords do not match!',
                });
                return false;
            }

            return validateFields(['adminName', 'adminEmail', 'adminUsername']);
        }

        function DatabaseConnection() {

            let dbHost = $('#dbHost').val();
            let dbPort = $('#dbPort').val();
            let dbName = $('#dbName').val();
            let dbUsername = $('#dbUsername').val();
            let dbPassword = $('#dbPassword').val();

            if (!dbHost || !dbPort || !dbName || !dbUsername) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Validation Error',
                    text: 'Please fill in all database fields before testing.',
                    confirmButtonColor: '#3085d6',
                });
                return;
            }

            Swal.fire({
                title: 'Testing Database Connection...',
                text: 'Please wait...',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            $.ajax({
                url: '/setup/database-setup',
                method: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    dbHost: dbHost,
                    dbPort: dbPort,
                    dbName: dbName,
                    dbUsername: dbUsername,
                    dbPassword: dbPassword
                },
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Database Connection Successful!',
                            text: response.message,
                            confirmButtonColor: '#28a745',
                        }).then(() => {
                            nextStep();
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Database Connection Failed!',
                            text: response.message,
                            confirmButtonColor: '#d33',
                        });
                    }
                },
                error: function(xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Unable to connect to the database. Please check credentials.',
                        confirmButtonColor: '#d33',
                    });
                    console.error(xhr.responseText);
                }
            });
        }

        function finishSetup() {
            Swal.fire({
                title: 'Finalizing Setup...',
                text: 'Storing configurations, please wait...',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            setTimeout(() => {
                Swal.fire({
                    icon: 'success',
                    title: 'Setup Completed!',
                    text: 'Redirecting to login page...',
                    confirmButtonColor: '#28a745',
                }).then(() => {
                    window.location.href = "/login"; // Redirect after setup
                });
            }, 3000);
        }

        $(document).ready(function() {
            $('#appSetupForm').submit(function(e) {
                e.preventDefault();
                storeApplicationSetup();
            });

            $('#companySetupForm').submit(function(e) {
                e.preventDefault();
                storeCompanySetup();
            });

            $('#adminSetupForm').submit(function(e) {
                e.preventDefault();
                storeAdminSetup();
            });

        });

        function storeApplicationSetup() {
            let appName = $('#appName').val();
            let appURL = $('#appURL').val();
            let appTimezone = $('#appTimezone').val();
            let openingDate = $('#openingDate').val();

            console.log(appName, appURL, appTimezone, openingDate);

            $.ajax({
                url: '{{route('setup.application.save')}}',
                method: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    appName: appName,
                    appURL: appURL,
                    appTimezone: appTimezone,
                    openingDate: openingDate,
                },
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Application Setup Completed',
                            text: response.message,
                            confirmButtonColor: '#3085d6',
                        }).then(() => {
                            nextStep();
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.message,
                            confirmButtonColor: '#d33',
                        });
                    }
                },
                error: function(xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Unable to store application setup. Please try again.',
                        confirmButtonColor: '#d33',
                    });
                    console.error(xhr.responseText);
                }
            });
        }

        function storeCompanySetup() {
            let companyName = $('#companyName').val();
            let companyAddress = $('#companyAddress').val();
            let companyPhone = $('#companyPhone').val();
            let companyEmail = $('#companyEmail').val();

            console.log(companyName, companyAddress, companyPhone, companyEmail);

            $.ajax({
                url: '{{route('setup.company.save')}}',
                method: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    companyName: companyName,
                    companyAddress: companyAddress,
                    companyPhone: companyPhone,
                    companyEmail: companyEmail,
                },
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Company Setup',
                            text: response.message,
                            confirmButtonColor: '#3085d6',
                        }).then(() => {
                            nextStep();
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.message,
                            confirmButtonColor: '#d33',
                        });
                    }
                },
                error: function(xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Unable to store company setup. Please try again.',
                        confirmButtonColor: '#d33',
                    });
                    console.error(xhr.responseText);
                }
            });
        }

        function storeAdminSetup() {
            let adminName = $('#adminName').val();
            let adminEmail = $('#adminEmail').val();
            let adminUsername = $('#adminUsername').val();
            let adminPassword = $('#adminPassword').val();
            let confirmPassword = $('#confirmPassword').val();

            if (adminPassword !== confirmPassword) {
                Swal.fire({
                    icon: 'error',
                    title: 'Password Mismatch',
                    text: 'The password and confirmation do not match.',
                    confirmButtonColor: '#d33',
                });
                return;
            }

            $.ajax({
                url: '{{ route("setup.admin.save") }}',
                method: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    adminName: adminName,
                    adminEmail: adminEmail,
                    adminUsername: adminUsername,
                    adminPassword: adminPassword,
                },
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Admin Setup',
                            text: response.message,
                            confirmButtonColor: '#3085d6',
                        }).then(() => {
                            nextStep();
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.message,
                            confirmButtonColor: '#d33',
                        });
                    }
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Unable to store admin setup. Please try again.',
                        confirmButtonColor: '#d33',
                    });
                    console.error(xhr.responseText);
                }
            });
        }

        function finishSetup() {
            // 1. Collect data from forms
            const setupData = {
                appName: $('#appName').val(),
                appURL: $('#appURL').val(),
                appTimezone: $('#appTimezone').val(),
                openingDate: $('#openingDate').val(),
                companyName: $('#companyName').val(),
                companyAddress: $('#companyAddress').val(),
                companyPhone: $('#companyPhone').val(),
                companyEmail: $('#companyEmail').val(),
                dbHost: $('#dbHost').val(),
                dbPort: $('#dbPort').val(),
                dbName: $('#dbName').val(),
                dbUsername: $('#dbUsername').val(),
                adminName: $('#adminName').val(),
                adminEmail: $('#adminEmail').val(),
                adminUsername: $('#adminUsername').val()
            };

            // 2. Set summary fields
            for (const [key, value] of Object.entries(setupData)) {
                $(`#summary${capitalizeFirstLetter(key)}`).text(value);
            }

            // 3. Fetch server & environment info
            $.ajax({
                url: '{{ route("setup.server.info") }}',
                method: 'GET',
                success: function (response) {
                    $('#phpVersion').text(response.phpVersion);
                    $('#laravelVersion').text(response.laravelVersion);
                    $('#serverOS').text(response.serverOS);
                },
                error: function () {
                    $('#phpVersion').text('Unavailable');
                    $('#laravelVersion').text('Unavailable');
                    $('#serverOS').text('Unavailable');
                }
            });

            // 4. Show success message
            Swal.fire({
                icon: 'success',
                title: 'Setup Complete!',
                text: 'Your application has been successfully configured. Please review the summary below.',
                confirmButtonColor: '#28a745'
            });

            // 5. Show summary section and hide others
            $('.setup-container').hide();
            $('#finalSetup').fadeIn();
        }

        // Utility: Capitalize first letter to match summary element IDs
        function capitalizeFirstLetter(str) {
            return str.charAt(0).toUpperCase() + str.slice(1);
        }

     </script>
</body>
</html>
