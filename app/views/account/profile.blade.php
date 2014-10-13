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
            <label for="email">Email <span class="required">Required</span></label>
            {{ Form::email('email', null, ['required']) }}
            {{ errors_for('email', $errors) }}
          </div>

          <div class="form-block">
            <label for="first_name">First Name <span class="required">Required</span></label>
            {{ Form::text('first_name', null, ['required']) }}
            {{ errors_for('first_name', $errors) }}
          </div>

          <div class="form-block">
            <label for="last_name">Last Name <span class="required">Required</span></label>
            {{ Form::text('last_name', null, ['required']) }}
            {{ errors_for('last_name', $errors) }}
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
            <label for="password">Current Password <span class="required">Required</span></label>
            {{ Form::password('password', null, ['required']) }}
            {{ errors_for('password', $errors) }}
          </div>

          <div class="form-block">
            <label for="newPassword">New Password <span class="required">Required</span></label>
            {{ Form::password('newPassword', null, ['required']) }}
            {{ errors_for('newPassword', $errors) }}
          </div>

          <div class="form-block">
            <label for="newPassword_confirmation">Confirm New Password <span class="required">Required</span></label>
            {{ Form::password('newPassword_confirmation', null, ['required']) }}
            {{ errors_for('newPassword_confirmation', $errors) }}
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