<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">


    <title>Novelize Writing App</title>

    @include('layouts.partials.styles')


    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    @yield('head_scripts')
</head>

<body id="auth" class="@yield('body_class', '')">


<div class="container">
  @yield('content')
</div>

{{ HTML::script('js/min/bottom.min.js') }}
@yield('foot_scripts')

</body>
</html>