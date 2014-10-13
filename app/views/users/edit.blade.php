@extends('layouts.app')
@section('body_class', 'edit')

{{-- Page Header --}}
@section('page_header')
  <div class="page-header">
    <h2 class="page-header__title">Update User</h2>

    <ul class="page-header__buttons">
      <li>{{ link_to_route('view_users', 'USER LIST', null, ['class' => 'page-header__button']) }}</li>

    </ul>
  </div>
@stop

{{-- Page Content --}}
@section('page_content')
  {{-- Form --}}
  <div class="user-form">

    <div class="user-form__details">
      <h5>Name</h5>
      <p>{{ $user->first_name }} {{ $user->last_name }}</p>

      <h5>Account Created</h5>
      <p>{{ date('M, dS Y', strtotime($user->created_at)) }}</p>

      <h5>User Id</h5>
      <p>{{ $user->id }}</p>
    </div>


    {{ Form::model($user, ['method' => 'PUT', 'route' => ['update_user', $user->id]]) }}

      <div class="form-block">
        {{ Form::label('email', 'Email') }}
        {{ errors_for('email', $errors) }}
        {{ Form::text('email') }}
      </div>

      <div class="form-block">
        {{ Form::label('role_id', 'Role') }}
        {{ errors_for('role_id', $errors) }}
        <select name="role_id">
          @foreach($roles as $role)
            @if($user->role_id == $role->id )
            <option value="{{ $role->id }}" selected>{{ $role->name }}</option>
            @else
            <option value="{{ $role->id }}">{{ $role->name }}</option>
            @endif
          @endforeach
        </select>
      </div>

      <div class="form-block--submit">
       {{ Form::submit('UPDATE', ['class' => 'form-button']) }}
      </div>
    {{ Form::close() }}
  </div>
@stop