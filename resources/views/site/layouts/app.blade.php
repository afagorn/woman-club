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

  <meta property="og:url" content="http://project2490189.tilda.ws"/>
  <meta property="og:title" content="Webinar"/>
  <meta property="og:description" content="Шаблон лендинга вебинара"/>
  <meta property="og:type" content="website"/>
  <meta property="og:image"
        content="https://static.tildacdn.com/tild6463-3065-4137-b662-633837656464/-/resize/504x/9ae1c398343a4912979e.jpg"/>
  <link rel="canonical" href="http://project2490189.tilda.ws"><!--/metatextblock-->
  <meta property="fb:app_id" content="257953674358265"/>
  <meta name="format-detection" content="telephone=no"/>
  <meta http-equiv="x-dns-prefetch-control" content="on">
  <link rel="dns-prefetch" href="https://tilda.ws">
  <link rel="dns-prefetch" href="https://static.tildacdn.com">

  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

  <link href="{{mix('css/app.site.css', 'build')}}" rel="stylesheet" />

  {{--Tilda--}}
  <link rel="stylesheet" href="https://static.tildacdn.com/css/tilda-grid-3.0.min.css" type="text/css" media="all"/>
  <link rel="stylesheet" href="https://tilda.ws/project2490189/tilda-blocks-2.12.css?t=1590175065" type="text/css" media="all"/>

  {{--<script src="https://static.tildacdn.com/js/jquery-1.10.2.min.js"></script>
  <script src="https://static.tildacdn.com/js/tilda-scripts-2.8.min.js"></script>--}}
  {{--Tilda end--}}

</head>
<body class="{{ $class ?? '' }}">
  <div class="container container_full-height">
    @yield('content')
  </div>

  <script src="{{mix('js/app.site.js', 'build')}}"></script>
</body>
</html>
