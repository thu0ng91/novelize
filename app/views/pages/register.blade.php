@extends('layouts.site')
@section('body_class', 'register')

@section('content')

  <section class="row hero">
    <h1>Become a Beta Author</h1>

    <div class="text">
      <p>Novelize is almost ready for it's first round of authors to start taking it for a spin. It's starting out as a simple blank canvas and I need the help of 73 (the perfect number) of authors to help form it into the best novel writing app.</p>

      <p>Those who become Beta Authors will get:</p>

      <ul>
        <li>Continued access to the newest features</li>
        <li>Satisfaction in helping build Novelize</li>
        <li>and FREE lifetime membership</li>
      </ul>

      <p>Fill out the form below and we will get you setup with a Beta Account. Please be aware that due to the nature of Novelize at the moment all Beta Accounts are manually activated by me so it may take a bit before your account is active. You'll receive an email as soon as your account is active.</p>
    </div>
  </section>

  <section class="row last form">
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
  </section>

@stop