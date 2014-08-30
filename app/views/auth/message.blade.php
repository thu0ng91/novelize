@extends('layouts.auth')
@section('body_class', 'login')

@section('content')

  <div class="authBox">

    <div class="text">
      <h1>Thanks</h1>

      <p>Your account has been created, however we are still putting the finishing touches on Novelize. We are currently in a closed beta at the moment and are gradually increase our Author base to make sure that we can provide excellent service to our Authors.</p>

      @if( Session::get('email') )
        <p>We will send you an email at <span>{{ Session::get('email') }}</span> as soon as we're ready to have to have you start using Novelize.</p>
      @else 
        <p>We will send you an email as soon as we're ready to have to have you start using Novelize.</p>
      @endif

      <p>Until then you can keep up with our progress on the {{ link_to_route('blog_page', 'Novelize Blog') }}</p>
    </div>

  </div>

  <div class="smallLogo">
    {{ HTML::image('img/identity/logo-white.png', 'Novelize') }}
  </div>

@stop