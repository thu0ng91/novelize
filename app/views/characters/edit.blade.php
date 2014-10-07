@extends('layouts.app')
@section('body_class', 'characters')

{{-- Page Header --}}
@section('page_header')
  <div class="page-header">
    <h2 class="page-header__title">
      {{ HTML::image('/img/icons/notebook.png') }}
      {{ $notebook->name }}
      <a class="page-header__manage icon-manage" href="{{ route('edit_notebook', $notebook->id) }}"></a>
    </h2>

    <ul class="page-header__buttons">
      <li>{{ link_to_route('view_characters', 'CHARACTER LIST', $notebook->id, ['class' => 'page-header__button']) }}</li>
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
        {{ Form::model($character, ['method' => 'PUT', 'route' => ['update_character', $notebook->id, $character->id]]) }}

          <h2 class="form-heading">Edit: {{ $character->name }}</h2>

          @include('characters.partials.form')

          <div class="form-block--buttons">
            {{ link_to_route('edit_character', 'CANCEL', [$notebook->id, $character->id], ['class' => 'form-button--secondary']) }}
            {{ Form::submit('UPDATE CHARACTER', ['class' => 'form-button']) }}
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