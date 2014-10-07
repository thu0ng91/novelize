@extends('layouts.auth')
@section('body_class', 'remind')

@section('content')

  <div class="auth-box">

    <div class="logo">
      {{ HTML::image('img/identity/logo-white.png', 'Novelize') }}
    </div>

    @include('layouts.partials.messages')

    {{ Form::open(['route' => 'post_remind']) }}
      <div class="form-block">
        {{ Form::label('email', 'Email Address') }}
        {{ errors_for('email', $errors) }}
        {{ Form::email('email') }}
      </div>

      <div class="form-block--submit">
       {{ Form::submit('SEND REMINDER', ['class' => 'button submit']) }}
      </div>
    {{ Form::close() }}

    {{ link_to_route('login_page', 'Back to Login') }}
  </div>

  <div class="auth-box--bottom">
    <p>Need an Account? {{ link_to_route('register_page', 'Sign Up', null, ['class' => '']) }}</p>
  </div>

@stop