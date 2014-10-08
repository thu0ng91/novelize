@extends('layouts.app')
@section('body_class', 'profile')



{{-- Page Header --}}
@section('page_header')
  <div class="page-header">
    <!-- Page Title -->
    @if($user->first_name && $user->last_name)
      <h2 class="page-header__title">{{ $user->first_name }} {{ $user->last_name }} <span>(member since {{ date('m-d-Y', strtotime($user->created_at)) }})</span></h2>
    @else
      <h2 class="page-header__title">Profile <span>member since {{ date('M, dS Y', strtotime($user->created_at)) }}</span></h2>
    @endif
  </div>
@stop



{{-- Page Content --}}
@section('page_content')

  <div class="page-content">

    <div class="main-column">

      {{-- Account Info --}}
      <section class="profile-section">
        {{ Form::model($user, ['method' => 'PUT', 'route' => ['update_account', $user->id]]) }}
          <h3 class="profile-section__heading">Account Info</h3>

          <div class="form-block">
            {{ Form::label('email', 'Email') }}
            {{ Form::email('email') }}
            {{ errors_for('email', $errors) }}
            <div class="help-text">Required.</div>
          </div>

          <div class="form-block">
            {{ Form::label('first_name', 'First Name') }}
            {{ Form::text('first_name') }}
            {{ errors_for('first_name', $errors) }}
            <div class="help-text">Required.</div>
          </div>

          <div class="form-block">
            {{ Form::label('last_name', 'Last Name') }}
            {{ Form::text('last_name') }}
            {{ errors_for('last_name', $errors) }}
            <div class="help-text">Required.</div>
          </div>

          <div class="form-block--submit">
           {{ Form::submit('UPDATE ACCOUNT', ['class' => 'form-button']) }}
          </div>

        {{ Form::close() }}
      </section>



      {{-- Profile --}}

      {{-- Billing --}}

    </div>



    <!-- Secondary Column
    ========================================================================= -->

    <div class="secondary-column">

      {{-- Change Password --}}
      <section class="profile-section">
        {{ Form::model($user, ['method' => 'PUT', 'route' => ['change_password', $user->id]]) }}
          <h3 class="profile-section__heading">Change Password</h3>

          <div class="form-block">
            {{ Form::label('password', 'Current Password') }}
            {{ Form::password('password') }}
            {{ errors_for('password', $errors) }}
            <div class="help-text">Required.</div>
          </div>

          <div class="form-block">
            {{ Form::label('newPassword', 'New Password') }}
            {{ Form::password('newPassword') }}
            {{ errors_for('newPassword', $errors) }}
            <div class="help-text">Required.</div>
          </div>

          <div class="form-block">
            {{ Form::label('newPassword_confirmation', 'Confirm New Password') }}
            {{ Form::password('newPassword_confirmation') }}
            {{ errors_for('newPassword_confirmation', $errors) }}
            <div class="help-text">Required.</div>
          </div>

          <div class="form-block--submit">
           {{ Form::submit('CHANGE PASSWORD', ['class' => 'form-button']) }}
          </div>

        {{ Form::close() }}
      </section>

      {{-- Notifications --}}

    </div>
  </div>

@stop