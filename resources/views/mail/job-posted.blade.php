<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <title>Job Posted</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        h2 {
            color: #2c3e50;
        }
        p {
            font-size: 16px;
        }
        a {
            display: inline-block;
            padding: 10px 20px;
            color: white;
            background-color: #3498db;
            text-decoration: none;
            border-radius: 5px;
        }
        a:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class='container'>
        <h2>{{ $jobTitle }}</h2>

        <p>
            Congrats, your job is now live on our website.
        </p>

        <div>
            <a href="{{ url('/') }}">Go to Pixel Positions</a>
        </div>
    </div>
</body>
</html>
