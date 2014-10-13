@extends('layouts.app')
@section('body_class', 'create')

{{-- Page Header --}}
@section('page_header')
  <div class="page-header">
    <h2 class="page-header__title">Create User</h2>

    <ul class="page-header__buttons">
      <li>{{ link_to_route('view_users', 'USER LIST', null, ['class' => 'page-header__button']) }}</li>
    </ul>
  </div>
@stop

{{-- Page Content --}}
@section('page_content')
  {{-- Form --}}
  <div class="user-form">
    {{ Form::open(['route' => 'store_user']) }}

      <div class="form-block">
        {{ Form::label('email', 'Email') }}
        {{ errors_for('email', $errors) }}
        {{ Form::text('email') }}
      </div>

      <div class="form-block">
        {{ Form::label('first_name', 'First Name') }}
        {{ errors_for('first_name', $errors) }}
        {{ Form::text('first_name') }}
      </div>

      <div class="form-block">
        {{ Form::label('last_name', 'Last Name') }}
        {{ errors_for('last_name', $errors) }}
        {{ Form::text('last_name') }}
      </div>

      <div class="form-block">
        {{ Form::label('password', 'Password') }}
        {{ errors_for('password', $errors) }}
        {{ Form::text('password') }}
      </div>

      <div class="form-block--submit">
       {{ Form::submit('CREATE', ['class' => 'form-button']) }}
      </div>
    {{ Form::close() }}
  </div>
@stop