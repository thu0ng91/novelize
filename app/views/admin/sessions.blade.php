@extends('layouts.app')
@section('body_class', 'index')

{{-- Page Header --}}
@section('page_header')
  <div class="page-header">
    <h2 class="page-header__title">Session Log</h2>
  </div>
@stop

{{-- Page Content --}}
@section('page_content')
  <div class="report__wrapper">

    @if ($sessions->count())

      <table class="report-index">
        <thead>
          <tr class="report-index__row--head">
            <th class="report-index__head-cell">Session Type</th>
            <th class="report-index__head-cell">User Id</th>
            <th class="report-index__head-cell">Email Address</th>
            <th class="report-index__head-cell">Time</th>
          </tr>
        </thead>

        <tbody>
          @foreach($sessions as $session)
            <tr class="report-index__row">
              <td class="report-index__cell">{{ $session->session_type }}</td>
              <td class="report-index__cell">
                @if($session->user_id)
                  {{ link_to_route('edit_user', $session->user_id, $session->user_id) }}
                @endif
              </td>
              <td class="report-index__cell">{{ $session->email_address }}</td>
              <td class="report-index__cell">{{ date('H:i m-d-Y', strtotime($session->created_at)) }}</td>
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