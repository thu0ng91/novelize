@extends('layouts.app')
@section('body_class', 'index')

{{-- Page Header --}}
@section('page_header')
  <div class="page-header">
    <h2 class="page-header__title">Users</h2>

    <ul class="page-header__buttons">
      <li>{{ link_to_route('create_user', 'NEW', null, ['class' => 'page-header__button']) }}</li>
    </ul>
  </div>
@stop

{{-- Page Content --}}
@section('page_content')
<!--
  Filters ============================================= -->
  <div class="filters--admin">
    <ul class="filters__types">

      @if($type == 'trashed')

        <li class="filters__types__items">{{ link_with_type('active', 'view_users', 'ALL')}}({{ $allCount }})</li>
        <li class="filters__types__items">{{ link_with_type('trashed', 'view_users', 'TRASHED', ['class' => 'active'])}}({{ $trashCount }})</li>

      @else

        <li class="filters__types__items">{{ link_with_type('active', 'view_users', 'ALL', ['class' => 'active'])}}({{ $allCount }})</li>
        <li class="filters__types__items">{{ link_with_type('trashed', 'view_users', 'TRASHED')}}({{ $trashCount }})</li>

      @endif

    </ul>
  </div>

  <div class="user-index__wrapper">
    @if ($users->count())

      <div class="pagination__wrapper">
        {{ $users->appends(Request::except('page'))->links() }}
      </div>

      <table class="user-index">
        <thead>
          <tr class="user-index__row--head">
            <th class="user-index__head-cell">id</th>
            <th class="user-index__head-cell">first name</th>
            <th class="user-index__head-cell">last name</th>
            <th class="user-index__head-cell">email</th>
            <th class="user-index__head-cell">role</th>
            <th class="user-index__head-cell"></th>
          </tr>
        </thead>

        <tbody>
          @foreach($users as $user)
            <tr class="user-index__row">
              <td class="user-index__cell">{{ $user->id }}</td>
              <td class="user-index__cell">
                {{ link_to_route('edit_user', $user->first_name, $user->id) }}
              </td>
              <td class="user-index__cell">
                {{ link_to_route('edit_user', $user->last_name, $user->id) }}
              </td>
              <td class="user-index__cell">
                {{ link_to_route('edit_user', $user->email, $user->id) }}
              </td>
              <td class="user-index__cell">{{ $user->role->name }}</td>
              <td  class="user-index__cell--buttons">
                @if($type == 'trashed')
                  {{ link_to_route('destroy_user', '', $user->id, ['class' => 'icon-index--destroy', 'title' => 'DESTROY']) }}
                  {{ link_to_route('restore_user', '', $user->id, ['class' => 'icon-index--restore', 'title' => 'RESTORE']) }}
                @else
                  {{ link_to_route('edit_user', '', $user->id, ['class' => 'icon-index--edit', 'title' => 'EDIT']) }}
                @endif
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>

      <div class="pagination__wrapper--item-index">
        {{ $users->appends(Request::except('page'))->links() }}
      </div>

    @else

      <div class="empty-message--main-box">
        <h2 class="empty-message__title">There's nothing here.</h2>
      </div>

    @endif
  </div>
@stop