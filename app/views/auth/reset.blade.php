@extends('layouts.auth')
@section('body_class', 'remind')

@section('content')

  @include('layouts.partials.messages')

  {{ HTML::image('img/identity/logo-white.png', 'Novelize') }}

  <div class="loginForm">
    {{ Form::open(['route' => 'login']) }}
      <div class="formBlock">
        {{ Form::hidden('token', $token) }}
      </div>

      <div class="formBlock">
        {{ Form::label('email', 'Email Address') }}
        {{ errors_for('email', $errors) }}
        {{ Form::email('email') }}
      </div>

      <div class="formBlock">
        {{ Form::label('password', 'Password') }}
        {{ errors_for('password', $errors) }}
        {{ Form::password('password') }}
      </div>

      <div class="formBlock">
        {{ Form::label('password_confirmation', 'Confirm Password') }}
        {{ errors_for('password_confirmation', $errors) }}
        {{ Form::password('password_confirmation') }}
      </div>

      <div class="formBlock submit">
       {{ Form::submit('RESET PASSWORD', ['class' => 'button submit']) }}
      </div>
    {{ Form::close() }}
  </div>

  <form action="{{ action('RemindersController@postReset') }}" method="POST">
    <input type="hidden" name="token" value="{{ $token }}">
    <input type="email" name="email">
    <input type="password" name="password">
    <input type="password" name="password_confirmation">
    <input type="submit" value="Reset Password">
</form>

@stop