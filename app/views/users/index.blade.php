@extends('layouts.app')
@section('body_class', 'index')

{{-- Page Header --}}
@section('header')
  <div class="pageHeader">
    <!-- Page Title -->
    <h2 class="pageTitle">Users</h2>


    <!-- Page Buttons -->
    <ul class="pageButtons">
      <li>{{ link_to_route('create_user', 'NEW', null, ['class' => 'button secondary']) }}</li>
    </ul>
  </div>
@stop

{{-- Page Content --}}
@section('content')

  @if ($users->count())

    <div class="indexControls">
      <ul class="types">
        @if($type == 'trashed')
          <li>{{ link_with_query('type', 'active', 'view_users', 'ALL', ['class' => 'link secondary'])}} ({{ $allCount }})</li>
          <li>{{ link_with_query('type', 'trashed', 'view_users', 'TRASHED', ['class' => 'link secondary active'])}} ({{ $trashCount }})</li>
        @else
          <li>{{ link_with_query('type', 'active', 'view_users', 'ALL', ['class' => 'link secondary active'])}} ({{ $allCount }})</li>
          <li>{{ link_with_query('type', 'trashed', 'view_users', 'TRASHED', ['class' => 'link secondary'])}} ({{ $trashCount }})</li>
        @endif
      </ul>

      <div class="controlsGroup">
        <div class="pages">
          {{ $users->appends(Request::except('page'))->links() }}
        </div>
      </div>
    </div>

    <table>
      <thead>
        <th>id</th>
        <th>username</th>
        <th>email</th>
        <th>role</th>
        <th>activated</th>
        <th></th>
      </thead>

      <tbody>
      @foreach($users as $user)
        <tr>
          <td>{{ $user->id }}</td>
          <td>{{ $user->username }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->role->name }}</td>
          @if ($user->activated == 1)
          <td>activated</td>
          @else ($user->activated == 0)
          <td>inactive</td>
          @endif
          <th>
            @if( $type == 'trashed')
            {{ link_to_route('destroy_user', 'DESTROY', $user->id, ['class' => 'button secondary']) }}
            {{ link_to_route('restore_user', 'RESTORE', $user->id, ['class' => 'button primary']) }}
            @else
            {{ link_to_route('trash_user', 'TRASH', $user->id, ['class' => 'button secondary']) }}
            {{ link_to_route('edit_user', 'EDIT', $user->id, ['class' => 'button primary']) }}
            @endif
          </th>
        </tr>
      @endforeach
      </tbody>
    </table>

    <div class="indexControls">
      <div class="controlsGroup">
        <div class="pages">
          {{ $users->appends(Request::except('page'))->links() }}
        </div>
      </div>
    </div>

  @else

    {{-- Empty Message --}}
    <div class="indexControls">
      <ul class="types">
        @if($type == 'trashed')
          <li>{{ link_with_query('type', 'active', 'view_users', 'ALL', ['class' => 'link secondary'])}} ({{ $allCount }})</li>
          <li>{{ link_with_query('type', 'trashed', 'view_users', 'TRASHED', ['class' => 'link secondary active'])}} ({{ $trashCount }})</li>
        @else
          <li>{{ link_with_query('type', 'active', 'view_users', 'ALL', ['class' => 'link secondary active'])}} ({{ $allCount }})</li>
          <li>{{ link_with_query('type', 'trashed', 'view_users', 'TRASHED', ['class' => 'link secondary'])}} ({{ $trashCount }})</li>
        @endif
      </ul>

      <div class="controlsGroup">
        <div class="pages">
          {{ $users->appends(Request::except('page'))->links() }}
        </div>
      </div>
    </div>

    <div class="emptyMessage">
      <h2 class="title">There's nothing here.</h2>
    </div>

    <div class="indexControls">
      <div class="controlsGroup">
        <div class="pages">
          {{ $users->appends(Request::except('page'))->links() }}
        </div>
      </div>
    </div>

  @endif
@stop