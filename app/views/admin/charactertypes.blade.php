@extends('layouts.app')
@section('body_class', 'index')

{{-- Page Header --}}
@section('page_header')
  <div class="page-header">
    <h2 class="page-header__title">Character Types</h2>

    <ul class="page-header__buttons">
      <li>{{ link_to_route('view_settings', 'SETTINGS', null, ['class' => 'page-header__button']) }}</li>
    </ul>
  </div>
@stop

{{-- Page Content --}}
@section('page_content')
  <div class="settings__wrapper">

    @if ($characterTypes->count())

      <div class="settings__index">

        @foreach($characterTypes as $characterType)

          {{ Form::model($characterType, ['method' => 'PUT', 'route' => ['update_character_type', $characterType->id], 'class' => 'settings__edit-form']) }}

            <div class="form-inline">
              {{ Form::text('name', null, ['required', 'placeholder' => 'Character Type Name']) }}
              {{ Form::submit('UPDATE', ['class' => 'form-button']) }}
            </div>
            {{ errors_for('name', $errors) }}

          {{ Form::close() }}

        @endforeach

        {{ Form::open(['route' => ['store_character_type'], 'class' => 'settings__create-form']) }}

            <div class="form-inline">
              {{ Form::text('name', null, ['required', 'placeholder' => 'Character Type Name']) }}
              {{ Form::submit('SAVE', ['class' => 'form-button']) }}
            </div>
            {{ errors_for('name', $errors) }}

        {{ Form::close() }}
      </div>

    @else

      <div class="empty-message--main-box">
        <h2 class="empty-message__title">There's nothing here.</h2>
      </div>

    @endif

  </div>
@stop