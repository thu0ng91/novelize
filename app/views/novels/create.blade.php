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
    {{ Form::open(['route' => 'store_novel', 'class' => 'basic-form']) }}

      <div class="form-group">
        <div class="form-block">
          {{ Form::label('title', 'Title') }}
          {{ Form::text('title') }}
          {{ errors_for('title', $errors) }}
          <p class="help-text">Required.</p>
        </div>

        <div class="form-block">
          {{ Form::label('subtitle', 'Subtitle') }}
          {{ Form::text('subtitle') }}
          {{ errors_for('subtitle', $errors) }}
        </div>
      </div>

      <div class="form-group">
        <div class="form-block">
          <label for="notebook_id">Notebook</label>
          <select name="notebook_id" id="notebook_id">
            @foreach($notebooks as $notebook)
            <option value="{{ $notebook->id }}">{{ $notebook->name }}</option>
            @endforeach
          </select>
          <p class="help-text">Required.</p>
        </div>

        <div class="form-block">
          <label for="genre_id">Genre</label>
          <select name="genre_id" id="genre_id">
            @foreach($genres as $genre)
            <option value="{{ $genre->id }}">{{ $genre->name }}</option>
            @endforeach
          </select>
          <p class="help-text">Required.</p>
        </div>
      </div>

      <div class="form-block">
        {{ Form::label('author', 'Author') }}
        {{ Form::text('author', $name) }}
        {{ errors_for('author', $errors) }}
          <p class="help-text">This is pulled from your {{ link_to_route('view_profile', 'profile', $currentUser->id) }}</p>
      </div>

      <div class="form-block">
        {{ Form::label('description', 'Description') }}
        {{ Form::textarea('description') }}
        {{ errors_for('description', $errors) }}
      </div>

      <div class="form-block submit">
       {{ Form::submit('CREATE NOVEL', ['class' => 'form-button']) }}
      </div>
    {{ Form::close() }}
  </div>
@stop