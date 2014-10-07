@extends('layouts.app')
@section('body_class', 'edit')

{{-- Page Header --}}
@section('page_header')
  <div class="page-header">
    <h2 class="page-header__title">
      {{ HTML::image('/img/icons/journal.png') }}
      Edit: {{ $entry->title }}
    </h2>

    <ul class="page-header__buttons">
      <li>{{ link_to_route('view_journal', 'JOURNAL', null, ['class' => 'page-header__button']) }}</li>
    </ul>
  </div>
@stop

{{-- Page Content --}}
@section('page_content')
  <div class="edit-entry">

    <ul class="edit-entry__meta">
      <li class="edit-entry__meta__item">created: <span>{{ date('m-d-Y', strtotime($entry->created_at)) }}</span></li>
      <li class="edit-entry__meta__item">last updated: <span>{{ date('m-d-Y', strtotime($entry->updated_at)) }}</span></li>
    </ul>

    {{ Form::model($entry, ['method' => 'PUT', 'route' => ['update_entry', $entry->id], 'class' => 'edit-entry__form']) }}

      @include('entries.partials.form')

      <div class="form-block--buttons">
        <a href="#" class="form-button--secondary">CANCEL</a>
        {{ Form::submit('UPDATE ENTRY', ['class' => 'form-button']) }}
      </div>

    {{ Form::close() }}
  </div>
@stop