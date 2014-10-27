@extends('layouts.auth')
@section('body_class', 'auth')

@section('content')

  <div class="auth-box">

    <div class="auth-box__logo">
      {{ HTML::image('img/identity/logo-white.png', 'Novelize') }}
    </div>

    @include('layouts.partials.messages')

    {{ Form::open(['route' => 'login', 'class' => 'auth-box__form']) }}
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
    {{ Form::close() }}

    {{ link_to_route('remind_page', 'Forgot Password?', null, ['class' => 'auth-box__link']) }}
  </div>

  {{--
  <div class="auth-box__bottom">
    <p>Need an Account? {{ link_to_route('register_page', 'Sign Up') }}</p>
  </div>
  --}}

@stop