<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Car Model Insurance Form</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="css/app.css">
    </head>
    <body>
        <div id="app" class="container">
            <div class="row justify-content-center mb-5">
                <div class="col col-md-6">
                    @yield('step')
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col col-md-6">
                    @yield('content')
                </div>
            </div>
        </div>

        <script src="js/app.js"></script>
    </body>
</html>
