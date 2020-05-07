<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('login/css/style.css')}}">
</head>
<body>

    <div class="main" id="app">

        <router-view></router-view>

    </div>

    <!-- JS -->
    <script src="{{asset('login/vendor/jquery/jquery.min.js')}}"></script>
    <script type="text/javascript" src="js/app.js"></script>
    <script src="{{asset('login/js/main.js')}}"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>