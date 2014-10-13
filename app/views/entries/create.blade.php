@extends('layouts.app')
@section('body_class', 'create')

{{-- Page Header --}}
@section('page_header')
  <div class="page-header">
    <h2 class="page-header__title">
      {{ HTML::image('/img/icons/journal.png') }}
      New Entry
    </h2>

    <ul class="page-header__buttons">
      <li>{{ link_to_route('view_journal', 'JOURNAL', null, ['class' => 'page-header__button']) }}</li>
    </ul>
  </div>
@stop

{{-- Page Content --}}
@section('page_content')

  <div class="basic-form__wrapper">

    <div class="entries-index__explanation">
      @include('entries.partials.explanation')
    </div>

    {{ Form::open(['route' => 'store_entry', 'class' => 'basic-form']) }}

      @include('entries.partials.form')

      <div class="form-block--buttons">
        <a href="#" class="form-button--secondary">CANCEL</a>
        {{ Form::submit('CREATE ENTRY', ['class' => 'form-button']) }}
      </div>

    {{ Form::close() }}
  </div>

@stop