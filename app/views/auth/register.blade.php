@extends('layouts.auth')
@section('body_class', 'register')

@section('content')

  <div class="auth-box">

    <div class="logo">
      {{ HTML::image('img/identity/logo-white.png', 'Novelize') }}
    </div>

    @include('layouts.partials.messages')

    {{ Form::open(['route' => 'register_user']) }}

      <div class="formBlock">
        {{ Form::label('email', 'Email Address') }}
        {{ Form::email('email') }}
        {{ errors_for('email', $errors) }}
        <p class="helpText">Make sure it's right, because this is how you login.</p>
      </div>

      <div class="formBlock">
        {{ Form::label('username', 'Display Name') }}
        {{ Form::text('username') }}
        {{ errors_for('username', $errors) }}
        <p class="helpText">Must be at least 7 characters long and contain only letters, numbers, and dashes.</p>
      </div>

      <div class="formBlock">
        {{ Form::label('password', 'Password') }}
        {{ Form::password('password') }}
        {{ errors_for('password', $errors) }}
        <p class="helpText">Must be at least 8 characters long.</p>
      </div>

      <div class="formBlock">
        {{ Form::label('password_confirmation', 'Confirm Password') }}
        {{ Form::password('password_confirmation') }}
        {{ errors_for('password_confirmation', $errors) }}
       <p class="helpText">Must match the password.</p>
      </div>

      <div class="formBlock submit">
        {{ Form::submit('CREATE ACCOUNT', ['class' => 'button submit']) }}
      </div>
    {{ Form::close() }}

    {{ link_to_route('login_page', 'Back to Login') }}
  </div>

@stop