<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">



    <!-- Styles -->
    <style>
        body{
            display: flex;
            justify-content:center;
            align-items:center;
            position: relative;
            margin:0;
            padding:0;
            width: 100vw;
            height: 100vh;
        }
        body:after{
            content: '';
            display: block;
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background-repeat: no-repeat;
            background-size: cover;
            background-image: url(https://cdn-jpg3.thedailymeal.com/sites/default/files/story/2016/supermarketcart.JPG);
            opacity: 0.5;
        }

        .logo {
            font-family: 'Source Sans Pro', sans-serif;
            z-index: 9;
            display: flex;
            flex-direction: column;
            justify-content:center;
            align-items:center;
            opacity:1;
            font-size: 2rem;
        }
        .logo a{
            text-decoration: none;
        }

    </style>

</head>
<body>
    <div class="logo">
        <h1>買賣，從未如此簡單</h1>
        <h2 style="margin-top: 0">
        <a href="{{url('login/facebook')}}" style="color: #ffac17">Start Your Journey</a>
        </h2>
    </div>


</body>
</html>
