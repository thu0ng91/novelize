@extends('layouts.auth')
@section('body_class', 'auth')

@section('content')

  <div class="auth-box">

    <div class="auth-box__logo">
      {{ HTML::image('img/identity/logo-white.png', 'Novelize') }}
    </div>

    @include('layouts.partials.messages')

    {{ Form::open(['route' => 'post_remind', 'class' => 'auth-box__form']) }}
      <div class="form-block">
        {{ Form::label('email', 'Email Address') }}
        {{ errors_for('email', $errors) }}
        {{ Form::email('email') }}
      </div>

      <div class="form-block--submit">
       {{ Form::submit('SEND REMINDER', ['class' => 'form-button']) }}
      </div>
    {{ Form::close() }}

    {{ link_to_route('login_page', 'Back to Login', null, ['class' => 'auth-box__link']) }}
  </div>

  <div class="auth-box__bottom">
    <p>Need an Account? {{ link_to_route('register_page', 'Sign Up', null, ['class' => '']) }}</p>
  </div>

@stop