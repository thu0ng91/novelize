@extends('layouts.app')
@section('body_class', 'edit')

{{-- Page Header --}}
@section('page_header')
  <div class="pageHeader">
    <div class="top">
      <h2 class="pageTitle">Update User</h2>
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
  <div class="editForm">
    {{ Form::model($user, ['method' => 'PUT', 'route' => ['update_user', $user->id]]) }}
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



      <div class="formBlock">
        {{ Form::label('activated', 'Role') }}
        {{ errors_for('activated', $errors) }}
        <select name="activated">
            @if($user->activated == 1 )
            <option value="1" selected>Activated</option>
            <option value="0">Inactive</option>
            @else
            <option value="1" selected>Activated</option>
            <option value="0" selected>Inactive</option>
            @endif
        </select>
      </div>

      <div class="formBlock submit">
       {{ Form::submit('UPDATE', ['class' => 'button submit']) }}
      </div>
    {{ Form::close() }}
  </div>
@stop