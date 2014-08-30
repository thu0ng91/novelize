@extends('layouts.auth')
@section('body_class', 'login')

@section('content')

  <div class="authBox">

    <div class="logo">
      {{ HTML::image('img/identity/logo-white.png', 'Novelize') }}
    </div>

    @include('layouts.partials.messages')

    {{ Form::open(['route' => 'login']) }}
      <div class="formBlock">
        {{ Form::label('email', 'EMAIL ADDRESS') }}
        {{ Form::email('email') }}
        {{ errors_for('email', $errors) }}
      </div>

      <div class="formBlock">
        {{ Form::label('password', 'PASSWORD') }}
        {{ Form::password('password') }}
        {{ errors_for('password', $errors) }}
      </div>

      {{ Form::submit('LOGIN', ['class' => 'submit']) }}

      <div class="formBlock--checkbox">
        <label for="remember">
          {{ Form::checkbox('remember', 'true', null, ['id' => 'remember']) }}
          Remember Me
        </label>
      </div>
    {{ Form::close() }}

  </div>

  <div class="authBox--bottom">
    <p>Need an Account? {{ link_to_route('register_page', 'Sign Up', null, ['class' => 'link text']) }}</p>
  </div>

@stop