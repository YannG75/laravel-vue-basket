<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <script src="https://kit.fontawesome.com/0b031d1238.js" crossorigin="anonymous"></script>

        <!-- Styles -->
        <style>
            html, body {
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }


        </style>
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    </head>
    <body>
    <div id="app">
        <Home></Home>
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
