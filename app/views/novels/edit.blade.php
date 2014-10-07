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
    {{ Form::model($novel, ['method' => 'PUT', 'route' => ['update_novel', $novel->id], 'class' => 'basic-form']) }}

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
              @if($novel->notebook_id == $notebook->id )
              <option value="{{ $notebook->id }}" selected>{{ $notebook->name }}</option>
              @else
              <option value="{{ $notebook->id }}">{{ $notebook->name }}</option>
              @endif
            @endforeach
          </select>
          {{ errors_for('notebook_id', $errors) }}
          <p class="help-text">Required.</p>
        </div>

        <div class="form-block">
          <label for="genre_id">Genre</label>
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
          <p class="help-text">Required.</p>
        </div>
      </div>

      <div class="form-block">
        {{ Form::label('author', 'Author') }}
        {{ Form::text('author') }}
        {{ errors_for('author', $errors) }}
      </div>

      <div class="form-block">
        {{ Form::label('description', 'Description') }}
        {{ Form::textarea('description') }}
        {{ errors_for('description', $errors) }}
      </div>

      <div class="form-block--submit">
       {{ Form::submit('UPDATE ' . $novel->title, ['class' => 'form-button']) }}
      </div>
    {{ Form::close() }}
  </div>
@stop