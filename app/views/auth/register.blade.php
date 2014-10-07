@extends('layouts.auth')
@section('body_class', 'auth')

@section('content')

  <div class="auth-box">

    <div class="auth-box__logo">
      {{ HTML::image('img/identity/logo-white.png', 'Novelize') }}
    </div>

    <div class="auth-box__notice">
      <h2>Beta Version</h2>
      <p>The beta version is free for everyone. Please understand that Novelize isn't fully functional yet. Read our <a href="">blog post</a> for more info.</p>
      <h5>We welcome your feedback!</h5>
    </div>

    @include('layouts.partials.messages')

    {{ Form::open(['route' => 'register_user', 'class' => 'auth-box__form']) }}

      <div class="form-block">
        {{ Form::label('email', 'Email Address') }}
        {{ Form::email('email') }}
        {{ errors_for('email', $errors) }}
      </div>

      <div class="form-block">
        {{ Form::label('password', 'Password') }}
        {{ Form::password('password') }}
        {{ errors_for('password', $errors) }}
        <p class="help-text">Must be at least 8 characters long.</p>
      </div>

      <div class="form-block">
        {{ Form::label('password_confirmation', 'Confirm Password') }}
        {{ Form::password('password_confirmation') }}
        {{ errors_for('password_confirmation', $errors) }}
      </div>

      <div class="form-block--submit">
        {{ Form::submit('CREATE ACCOUNT', ['class' => 'form-button']) }}
      </div>
    {{ Form::close() }}
  </div>

  <div class="auth-box__bottom">
    <p>Already have an account? {{ link_to_route('login_page', 'Login') }}</p>
  </div>

@stop