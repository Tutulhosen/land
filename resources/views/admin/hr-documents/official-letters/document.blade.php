<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* @font-face {
            font-family: 'nikosh';
        } */
        body {
            font-family: 'nikosh', sans-serif;
        }

        @page {
            margin: {{ $top }}px {{ $right }}px {{ $bottom }}px {{ $left }}px;
            /* background-image: url('{{ public_path('storage/'.$letterhead) }}'); */
        }

    </style>
</head>
<body>

    <!-- Content container -->
    <div id="content-container">
        {!! $content !!}
    </div>

</body>
</html>
