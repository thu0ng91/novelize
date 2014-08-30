@extends('layouts.app')
@section('body_class', 'profile')



{{-- Page Header --}}
@section('header')
  <div class="pageHeader">
    <!-- Page Title -->
    @if($user->profile->first_name && $user->profile->last_name)
      <h1 class="pageTitle">{{ $user->profile->first_name }} {{ $user->profile->last_name }} <span>member since {{ date('m.d.y', strtotime($user->created_at)) }}</span></h1>
    @else
      <h1 class="pageTitle">{{ $user->username }}</h1>
    @endif
  </div>
@stop



{{-- Page Content --}}
@section('content')

  <!-- Main Column
  ========================================================================= -->

  <div class="mainColumn">

    {{-- Account Info --}}
    <section class="account">
      {{ Form::model($user, ['method' => 'PUT', 'route' => ['update_account', $user->id]]) }}
        <h2 class="heading">Account Info</h2>

        <div class="formBlock">
          {{ Form::label('username', 'Display Name') }}
          {{ errors_for('username', $errors) }}
          {{ Form::text('username') }}
          <p class="helpText">Must be at least 7 characters long, and contain only letters, numbers, dashes.</p>
          <p class="helpText">This isn't being used currently, but will be how your identified to other authors.</p>
        </div>

        <div class="formBlock">
          {{ Form::label('email', 'Email') }}
          {{ errors_for('email', $errors) }}
          {{ Form::email('email') }}
          <p class="helpText">This is your login and the email address we will send our emails too.</p>
        </div>

        <div class="formBlock submit">
         {{ Form::submit('UPDATE ACCOUNT', ['class' => 'button submit']) }}
        </div>

      {{ Form::close() }}
    </section>

    {{-- Profile --}}
    <section class="profile">
      {{ Form::model($user->profile, ['method' => 'PUT', 'route' => ['update_profile', $user->profile->id]]) }}
        <h2 class="heading">Profile</h2>

        <p class="description">This section will be where we pull information for your Author Wall when the Library is opened. For right now you can fill it out as you deem fit and we'll let you know when the Library opens.</p>

        <div class="formBlock">
          {{ Form::label('first_name', 'First Name') }}
          {{ errors_for('first_name', $errors) }}
          {{ Form::text('first_name') }}
        </div>

        <div class="formBlock">
          {{ Form::label('last_name', 'Last Name') }}
          {{ errors_for('last_name', $errors) }}
          {{ Form::text('last_name') }}
        </div>

        <div class="formBlock">
          {{ Form::label('bio', 'Author Bio') }}
          {{ errors_for('bio', $errors) }}
          {{ Form::textarea('bio') }}
        </div>

        <div class="formBlock submit">
         {{ Form::submit('UPDATE PROFILE', ['class' => 'button submit']) }}
        </div>

      {{ Form::close() }}
    </section>

    {{-- Billing --}}
    
  </div>



  <!-- Secondary Column
  ========================================================================= -->

  <div class="secondaryColumn">

    {{-- Change Password --}}
    <section class="password">
      {{ Form::model($user, ['method' => 'PUT', 'route' => ['change_password', $user->id]]) }}
        <h2 class="heading">Change Password</h2>

        <div class="formBlock">
          {{ Form::label('password', 'Current Password') }}
          {{ errors_for('password', $errors) }}
          {{ Form::password('password') }}
        </div>

        <div class="formBlock">
          {{ Form::label('newPassword', 'New Password') }}
          {{ errors_for('newPassword', $errors) }}
          {{ Form::password('newPassword') }}
        </div>

        <div class="formBlock">
          {{ Form::label('newPassword_confirmation', 'Confirm New Password') }}
          {{ errors_for('newPassword_confirmation', $errors) }}
          {{ Form::password('newPassword_confirmation') }}
        </div>

        <div class="formBlock submit">
         {{ Form::submit('CHANGE PASSWORD', ['class' => 'button submit']) }}
        </div>

      {{ Form::close() }}
    </section>

    {{-- Notifications --}}
    
  </div>

@stop