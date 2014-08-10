<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <title>Novelize Writing App</title>

    {{ HTML::style('css/page.css')}}
    <link href='http://fonts.googleapis.com/css?family=PT+Serif:400,700|Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
    @yield('head_styles')

    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    @yield('head_scripts')
</head>

<body id="page" class="@yield('body_class')">
  <div class="container">
    @include('layouts.partials.page.header')

    @include('layouts.partials.messages')

    @yield('content')
  </div>

  {{ HTML::script('js/min/page.min.js') }}
  @yield('foot_scripts')
</body>
</html>