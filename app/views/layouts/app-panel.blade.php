<!DOCTYPE html>
<html>

{{-- Head --}}
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">


  <title>Novelize Writing App</title>


  {{ HTML::style('css/style.css')}}
  <link href='http://fonts.googleapis.com/css?family=PT+Serif:400,700|Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
  @yield('head_styles')


  <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
  @yield('head_scripts')
</head>

{{-- Body --}}
<body id="app" class="@yield('body_class', '')">

<div class="app-container">

  @include('layouts.partials.header')

  <div class="container">
    @include('layouts.partials.messages')

    @yield('page_header')

    @yield('page_content')
  </div>

</div>

@include('layouts.partials.side-panel')

{{ link_to_route('view_contact', 'GOT FEEDBACK?', [$currentUser->id, 'feedback'], ['class' => 'feedback-link']) }}

@if($currentUser->role_id > 30)
  @include('layouts.partials.adminBar')
@endif


{{ HTML::script('js/min/bottom.min.js') }}
@yield('foot_scripts')

</body>
</html>