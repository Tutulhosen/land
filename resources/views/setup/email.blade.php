<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <div class="setup-container" style="display: none;" id="emailSetup">
        <h2 class="text-center">Email Setup</h2>
        <form id="emailSetupForm">
            <div class="mb-3">
                <label class="form-label">Mail Driver</label>
                <select class="form-control" id="mailDriver" required>
                    <option value="smtp">SMTP</option>
                    <option value="sendmail">Sendmail</option>
                    <option value="mailgun">Mailgun</option>
                    <option value="ses">Amazon SES</option>
                    <option value="postmark">Postmark</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Mail Host</label>
                <input type="text" class="form-control" id="mailHost" required placeholder="smtp.example.com">
            </div>
            <div class="mb-3">
                <label class="form-label">Mail Port</label>
                <input type="text" class="form-control" id="mailPort" required placeholder="587">
            </div>
            <div class="mb-3">
                <label class="form-label">Encryption</label>
                <select class="form-control" id="mailEncryption">
                    <option value="tls">TLS</option>
                    <option value="ssl">SSL</option>
                    <option value="none">None</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Mail Username</label>
                <input type="text" class="form-control" id="mailUsername" placeholder="your-email@example.com">
            </div>
            <div class="mb-3">
                <label class="form-label">Mail Password</label>
                <input type="password" class="form-control" id="mailPassword" placeholder="your-email-password">
            </div>
            <div class="mb-3">
                <label class="form-label">From Email</label>
                <input type="email" class="form-control" id="mailFromEmail" required placeholder="no-reply@example.com">
            </div>
            <div class="mb-3">
                <label class="form-label">From Name</label>
                <input type="text" class="form-control" id="mailFromName" required placeholder="HRM System">
            </div>
            <button type="button" class="btn btn-primary w-100" onclick="nextStep()">Next</button>
        </form>
    </div>


     <!--   Core JS Files   -->
     <script src="{{ asset('admin') }}/assets/js/core/jquery-3.7.1.min.js"></script>
     <script src="{{ asset('admin') }}/assets/js/core/popper.min.js"></script>
     <script src="{{ asset('admin') }}/assets/js/core/bootstrap.min.js"></script>
</body>
</html>
