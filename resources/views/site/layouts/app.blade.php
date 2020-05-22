<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Сайт English club</title>
  <link rel="apple-touch-icon" sizes="76x76" href="/img/material-dashboard/apple-icon.png">
  <link rel="icon" type="image/png" href="/favicon.ico">
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

  <link href="{{mix('css/app.site.css', 'build')}}" rel="stylesheet" />
</head>
<body class="{{ $class ?? '' }}">
  <div class="container">
    @yield('content')
  </div>

  <script src="{{mix('js/app.site.js', 'build')}}"></script>
</body>
</html>
