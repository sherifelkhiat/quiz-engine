<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link href="{{ mix('css/app.css') }}" type="text/css" rel="stylesheet" />
        <meta name="csrf-token" value="{{ csrf_token() }}" />
    </head>
    <style>
        .quiz{
            height: 100vh;
        background-repeat: no-repeat;
        background-image: url("http://quizengine.host/uploads/php72Fs0r.jpg");
        text-align: center;
        color: #FFF;
        background-size: cover;
        padding: 200px 0px;
        font-weight: bold;
        }
        .quiz h1{
            font-size: 50px;
        }
        .container-fluid{
            padding: 0px;
        }
    </style>
    <body>
        <div id="quiz">
        </div>
        <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
    </body>
</html>
