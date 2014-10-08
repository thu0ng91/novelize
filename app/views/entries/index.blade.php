@extends('layouts.app')
@section('body_class', 'index')



{{-- Page Header --}}
@section('page_header')
  <div class="page-header">
    <h2 class="page-header__title">
      {{ HTML::image('/img/icons/journal.png') }}
      Journal
    </h2>

    <ul class="page-header__buttons">
      <li>{{ link_to_route('create_entry', 'NEW ENTRY', null, ['class' => 'page-header__button']) }}</li>
    </ul>
  </div>
@stop

{{-- Page Content --}}
@section('page_content')
<!--
  Filters ============================================= -->
  <div class="filters">
    <ul class="filters__types">

      @if($type == 'trashed')

        <li class="filters__types__items">{{ link_with_type('active', 'view_journal', 'ALL')}}({{ $allCount }})</li>
        <li class="filters__types__items">{{ link_with_type('trashed', 'view_journal', 'TRASHED', ['class' => 'active'])}}({{ $trashCount }})</li>

      @else

        <li class="filters__types__items">{{ link_with_type('active', 'view_journal', 'ALL', ['class' => 'active'])}}({{ $allCount }})</li>
        <li class="filters__types__items">{{ link_with_type('trashed', 'view_journal', 'TRASHED')}}({{ $trashCount }})</li>

      @endif

    </ul>
  </div>

<!--
  Main ============================================= -->
  @if ($entries->count())

  <div class="entries-index__wrapper">
    <div class="pagination__wrapper">
      {{ $entries->appends(Request::except('page'))->links() }}
    </div>

    <ul class="entries-index">

      @foreach($entries as $entry)
        <li class="entries-index__item">
          <div class="entries-index__date">
            <p class="entries-index__month">{{ date('M', strtotime($entry->created_at)) }}</p>
            <p class="entries-index__day">{{ date('d', strtotime($entry->created_at)) }}</p>
          </div>

          <h2 class="entries-index__title">{{ $entry->title }}</h2>

          <ul class="entries-index__buttons">
            @if($type == 'trashed')

              <li class="entries-index__buttons__item">{{ link_to_route('destroy_entry', '', $entry->id, ['class' => 'icon-index--destroy', 'title' => 'DESTROY'] ) }}</li>
              <li class="entries-index__buttons__item">{{ link_to_route('restore_entry', '', $entry->id, ['class' => 'icon-index--restore', 'title' => 'RESTORE'] ) }}</li>

            @else

              <li class="entries-index__buttons__item">{{ link_to_route('trash_entry', '', $entry->id, ['class' => 'icon-index--trash', 'title' => 'TRASH'] ) }}</li>
              <li class="entries-index__buttons__item">{{ link_to_route('edit_entry', '', $entry->id, ['class' => 'icon-index--edit', 'title' => 'WRITE'] ) }}</li>

            @endif
          </ul>
        </li>
      @endforeach

    </ul>

    <div class="pagination__wrapper">
      {{ $entries->appends(Request::except('page'))->links() }}
    </div>
  </div>

  @else

    <div class="empty-message--main-box">
      <h2 class="empty-message__title">Your Journal Is a Little Sparse</h2>

      <p class="empty-message__text">Why don't you {{ link_to_route('create_entry', 'write') }} your first entry?</p>
    </div>

  @endif

@stop