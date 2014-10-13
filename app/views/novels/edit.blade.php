@extends('layouts.app')
@section('body_class', 'edit')

{{-- Page Header --}}
@section('page_header')
  <div class="page-header">
    <h2 class="page-header__title">
      {{ HTML::image('/img/icons/novel.png') }}
      Edit: {{ $novel->title }}
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

    {{ Form::model($novel, ['method' => 'PUT', 'route' => ['update_novel', $novel->id], 'class' => 'basic-form']) }}

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
        </div>
      </div>

      <div class="form-group">
        <div class="form-block">
          <label for="notebook_id">Notebook <span class="required">Required</span></label>
          <select name="notebook_id" id="notebook_id">
            @foreach($notebooks as $notebook)
              @if($novel->notebook_id == $notebook->id )
              <option value="{{ $notebook->id }}" selected>{{ $notebook->name }}</option>
              @else
              <option value="{{ $notebook->id }}">{{ $notebook->name }}</option>
              @endif
            @endforeach
          </select>
          {{ errors_for('notebook_id', $errors) }}
        </div>

        <div class="form-block">
          <label for="genre_id">Genre <span class="required">Required</span></label>
          <select name="genre_id">
            @foreach($genres as $genre)
              @if($novel->genre_id == $genre->id )
              <option value="{{ $genre->id }}" selected>{{ $genre->name }}</option>
              @else
              <option value="{{ $genre->id }}">{{ $genre->name }}</option>
              @endif
            @endforeach
          </select>
          {{ errors_for('genre_id', $errors) }}
          <p class="help-text">Don't see your genre, {{ link_to_route('view_contact', 'give a little feedback', [$currentUser->id, 'feedback']) }}.</p>
        </div>
      </div>

      <div class="form-block">
        <label for="author">Author <span>Optional</span></label>
        {{ Form::text('author') }}
        {{ errors_for('author', $errors) }}
      </div>

      <div class="form-block">
        <label for="description">Description <span>Optional</span></label>
        {{ Form::textarea('description') }}
        {{ errors_for('description', $errors) }}
        <p class="help-text">Think of this as the part that goes on the back of your novel.</p>
      </div>

      <div class="form-block--submit">
       {{ Form::submit('UPDATE ' . $novel->title, ['class' => 'form-button']) }}
      </div>
    {{ Form::close() }}
  </div>
@stop