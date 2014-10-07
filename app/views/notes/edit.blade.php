@extends('layouts.app')
@section('body_class', 'notes')

{{-- Page Header --}}
@section('page_header')
  <div class="page-header">
    <h2 class="page-header__title">
      {{ HTML::image('/img/icons/notebook.png') }}
      {{ $notebook->name }}
      <a class="page-header__manage icon-manage" href="{{ route('edit_notebook', $notebook->id) }}"></a>
    </h2>

    <ul class="page-header__buttons">
      <li>{{ link_to_route('view_notes', 'NOTE LIST', $notebook->id, ['class' => 'page-header__button']) }}</li>
    </ul>
  </div>
@stop

{{-- Page Content --}}
@section('page_content')
  <div class="notebook-page">

    <!-- Left Sidebar
    ===================================================== -->
    <div class="notebook-page__sidebar--left">
      @include('notebooks.partials.sidebar_left')
    </div>



    <!-- Main
    ===================================================== -->
    <div class="notebook-page__main">

      <div class="item-form">
        {{ Form::model($note, ['method' => 'PUT', 'route' => ['update_note', $notebook->id, $note->id]]) }}

          <h2 class="form-heading">Edit: {{ $note->name }}</h2>

          @include('notes.partials.form')

          <div class="form-block--buttons">
            {{ link_to_route('edit_note', 'CANCEL', [$notebook->id, $note->id], ['class' => 'form-button--secondary']) }}
            {{ Form::submit('UPDATE NOTE', ['class' => 'form-button']) }}
          </div>
        {{ Form::close() }}
      </div>

    </div>



    <!-- Right Sidebar
    ===================================================== -->
    <div class="notebook-page__sidebar--right">
      @include('notebooks.partials.sidebar_right')
    </div>

  </div>
@stop