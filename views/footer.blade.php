<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    </head>
    <body>
      <div class="footermenu-1">
        <ul class="bottom-menu">
            <li>
                <a href="{{ url('tweets/') }}">
        	<i class="blogicon-home"></i><br><img src="{{ asset('storage/other_image/homeIcon.png/')}}" style="width:30px;height:auto;"></a>
            </li>
            <li class="menu-width-max">
                <a href="{{ url('users/') }}"><i class="blogicon-list"></i><br><img src="{{ asset('storage/other_image/userIcon.png/')}}" style="width:30px;height:auto;"></a>

            </li>
            <li>
         	<a href="{{ url('tweets/') }}">
        	<i class="blogicon-hatenablog"></i><br><img src="{{ asset('storage/other_image/search.png/')}}" style="width:30px;height:auto;"></a>
            </li>
            <li>
          <a href="{{ url('tweets/') }}">
        	<i class="blogicon-twitter"></i><br><img src="{{ asset('storage/other_image/bell.png/')}}" style="width:30px;height:auto;"></a>
            </li>

        </ul>
  </div>
    </body>
</html>
