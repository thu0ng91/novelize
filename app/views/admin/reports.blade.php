@extends('layouts.app')
@section('body_class', 'index')

{{-- Page Header --}}
@section('page_header')
  <div class="page-header">
    <h2 class="page-header__title">Reports</h2>
  </div>
@stop

{{-- Page Content --}}
@section('page_content')
  <div class="report__wrapper">

    <ul class="report-stats">
      <li class="report-stats__item">Total Users: <span>{{ $users->count() }}</span></li>
      <li class="report-stats__item">Total Notebooks: <span>{{ $notebook_count }}</span></li>
      <li class="report-stats__item">Total Novels: <span>{{ $novel_count }}</span></li>
      <li class="report-stats__item">Total Entries: <span>{{ $entry_count }}</span></li>
    </ul>

    @if ($users->count())

      <table class="report-index">
        <thead>
          <tr class="report-index__row--head">
            <th class="report-index__head-cell">id</th>
            <th class="report-index__head-cell">first name</th>
            <th class="report-index__head-cell">last name</th>
            <th class="report-index__head-cell">notebooks</th>
            <th class="report-index__head-cell">novels</th>
            <th class="report-index__head-cell">entries</th>
          </tr>
        </thead>

        <tbody>
          @foreach($users as $user)
            <tr class="report-index__row">
              <td class="report-index__cell">{{ $user->id }}</td>
              <td class="report-index__cell">{{ $user->first_name }}</td>
              <td class="report-index__cell">{{ $user->last_name }}</td>
              <td class="report-index__cell">{{ $user->notebooks->count() }}</td>
              <td class="report-index__cell">{{ $user->novels->count() }}</td>
              <td class="report-index__cell">{{ $user->entries->count() }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>

    @else

      <div class="empty-message--main-box">
        <h2 class="empty-message__title">There's nothing here.</h2>
      </div>

    @endif

  </div>
@stop