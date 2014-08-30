@extends('layouts.auth')
@section('body_class', 'remind')

@section('content')

  @include('layouts.partials.messages')

  {{ HTML::image('img/identity/logo-white.png', 'Novelize') }}

  <div class="loginForm">
    {{ Form::open(['action' => 'RemindersController@postRemind']) }}
      <div class="formBlock">
        {{ Form::label('email', 'Email Address') }}
        {{ errors_for('email', $errors) }}
        {{ Form::email('email') }}
      </div>

      <div class="formBlock submit">
       {{ Form::submit('SEND REMINDER', ['class' => 'button submit']) }}
      </div>
    {{ Form::close() }}
  </div>

@stop