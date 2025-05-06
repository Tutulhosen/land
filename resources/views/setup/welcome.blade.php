<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to HRM Setup</title>
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{ asset('admin') }}/assets/css/onebiterp.css">

    <style>
        body {
            background: linear-gradient(135deg, #4e73df, #224abe);
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .setup-container {
            background: white;
            color: black;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            max-width: 600px;
            width: 100%;
            text-align: center;
        }
        .logo {
            font-size: 2rem;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="setup-container">
        <h1 class="logo">Welcome to HRM Setup</h1>
        <p>Welcome to the HRM installation process. Let's set up your system.</p>
        <a href="{{route('setup.company')}}" class="btn btn-primary">Get Started</a>
    </div>

    <!--   Core JS Files   -->
    <script src="{{ asset('admin') }}/assets/js/core/jquery-3.7.1.min.js"></script>
    <script src="{{ asset('admin') }}/assets/js/core/popper.min.js"></script>
    <script src="{{ asset('admin') }}/assets/js/core/bootstrap.min.js"></script>
</body>
</html>
