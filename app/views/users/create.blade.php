@extends('layouts.app')
@section('body_class', 'create')

{{-- Page Header --}}
@section('page_header')
  <div class="pageHeader">
    <div class="top">
      <h2 class="pageTitle">Create User</h2>
      <ul class="pageButtons">
        <li>{{ link_to_route('view_users', 'CANCEL', null, ['class' => 'button secondary']) }}</li>
      </ul>
    </div>
    <div class="bottom">
    </div>
  </div>
@stop

{{-- Page Content --}}
@section('page_content')
  {{-- Form --}}
  <div class="createForm">
    {{ Form::open(['route' => 'store_user']) }}
      <div class="formBlock">
        {{ Form::label('username', 'Username') }}
        {{ errors_for('username', $errors) }}
        {{ Form::text('username') }}
      </div>

      <div class="formBlock">
        {{ Form::label('email', 'Email') }}
        {{ errors_for('email', $errors) }}
        {{ Form::text('email') }}
      </div>

      <div class="formBlock">
        {{ Form::label('password', 'Password') }}
        {{ errors_for('password', $errors) }}
        {{ Form::text('password') }}
      </div>

      <div class="formBlock submit">
       {{ Form::submit('CREATE', ['class' => 'button submit']) }}
      </div>
    {{ Form::close() }}
  </div>
@stop