@extends('layouts.auth')
@section('body_class', 'login')

@section('content')

  <div class="auth-box">

    <div class="logo">
      {{ HTML::image('img/identity/logo-white.png', 'Novelize') }}
    </div>

    @include('layouts.partials.messages')

    {{ Form::open(['route' => 'login']) }}
      <div class="form-block">
        {{ Form::label('email', 'EMAIL ADDRESS') }}
        {{ Form::email('email') }}
        {{ errors_for('email', $errors) }}
      </div>

      <div class="form-block">
        {{ Form::label('password', 'PASSWORD') }}
        {{ Form::password('password') }}
        {{ errors_for('password', $errors) }}
      </div>

      <div class="form-block">
        {{ Form::submit('LOGIN', ['class' => 'form-button']) }}
      </div>

      <div class="form-block">
        <label class="label--checkbox" for="remember">
          {{ Form::checkbox('remember', 'true', null, ['id' => 'remember']) }}
          Remember Me
        </label>

        {{ link_to_route('remind_page', 'Forgot Password?', null, ['class' => 'link--remind']) }}
      </div>
    {{ Form::close() }}

  </div>

  <div class="auth-box--bottom">
    <p>Need an Account? {{ link_to_route('register_page', 'Sign Up') }}</p>
  </div>

@stop