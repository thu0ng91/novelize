@extends('layouts.app')
@section('body_class', 'create')

{{-- Page Header --}}
@section('page_header')
  <div class="page-header">
    <h2 class="page-header__title">
      {{ HTML::image('/img/icons/novel.png') }}
      New Novel
    </h2>

    <ul class="page-header__buttons">
      <li>{{ link_to_route('view_novels', 'CANCEL', null, ['class' => 'page-header__button']) }}</li>
    </ul>
  </div>
@stop

{{-- Page Content --}}
@section('page_content')
  {{-- Form --}}
  <div class="basic-form__wrapper">

    <div class="novel-index__explanation">
      @include('novels.partials.explanation')
    </div>

    {{ Form::open(['route' => 'store_novel', 'class' => 'basic-form']) }}

      <div class="form-group">
        <div class="form-block">
          <label for="title">Title <span class="required">Required</span></label>
          {{ Form::text('title', null, ['required']) }}
          {{ errors_for('title', $errors) }}
        </div>

        <div class="form-block">
          <label for="subtitle">Subtitle <span>Optional</span></label>
          {{ Form::text('subtitle') }}
          {{ errors_for('subtitle', $errors) }}
          <p class="help-text">Could also be used as the name of the series this novel belongs to.</p>
        </div>
      </div>

      <div class="form-group">
        <div class="form-block">
          <label for="notebook_id">Notebook <span class="required">Required</span></label>
          <select name="notebook_id" id="notebook_id">
            @foreach($notebooks as $notebook)
            <option value="{{ $notebook->id }}">{{ $notebook->name }}</option>
            @endforeach
          </select>
        </div>

        <div class="form-block">
          <label for="genre_id">Genre <span class="required">Required</span></label>
          <select name="genre_id" id="genre_id">
            @foreach($genres as $genre)
            <option value="{{ $genre->id }}">{{ $genre->name }}</option>
            @endforeach
          </select>
          <p class="help-text">Don't see your genre, {{ link_to_route('view_contact', 'give a little feedback', [$currentUser->id, 'feedback']) }}.</p>
        </div>
      </div>

      <div class="form-block">
        <label for="author">Author <span>Optional</span></label>
        {{ Form::text('author', $name) }}
        {{ errors_for('author', $errors) }}
        <p class="help-text">This is pulled from your {{ link_to_route('view_profile', 'profile', $currentUser->id) }}, but feel free to change it.</p>
      </div>

      <div class="form-block">
        <label for="description">Description <span>Optional</span></label>
        {{ Form::textarea('description') }}
        {{ errors_for('description', $errors) }}
        <p class="help-text">Think of this as the part that goes on the back of your novel.</p>
      </div>

      <div class="form-block submit">
       {{ Form::submit('CREATE NOVEL', ['class' => 'form-button']) }}
      </div>
    {{ Form::close() }}
  </div>
@stop