@extends('layouts.auth')
@section('body_class', 'auth')

@section('content')

  <div class="auth-box">

    <div class="auth-box__logo">
      {{ HTML::image('img/identity/logo-white.png', 'Novelize') }}
    </div>

    @include('layouts.partials.messages')

    {{ Form::open(['route' => 'post_reset', 'class' => 'auth-box__form']) }}
      {{ Form::hidden('token', $token) }}

      <div class="form-block">
        {{ Form::label('email', 'Email Address') }}
        {{ errors_for('email', $errors) }}
        {{ Form::email('email') }}
      </div>

      <div class="form-block">
        {{ Form::label('password', 'Password') }}
        {{ errors_for('password', $errors) }}
        {{ Form::password('password') }}
      </div>

      <div class="form-block">
        {{ Form::label('password_confirmation', 'Confirm Password') }}
        {{ errors_for('password_confirmation', $errors) }}
        {{ Form::password('password_confirmation') }}
      </div>

      <div class="form-block--submit">
       {{ Form::submit('RESET PASSWORD', ['class' => 'form-button']) }}
      </div>
    {{ Form::close() }}
  </div>
@stop