@extends('layouts.app')
@section('body_class', 'create')

{{-- Page Header --}}
@section('header')
  <div class="pageHeader">
    <div class="top">
      <h2 class="pageTitle">Create Novel</h2>
      <ul class="pageButtons">
        <li>{{ link_to_route('view_novels', 'CANCEL', null, ['class' => 'button secondary']) }}</li>
      </ul>
    </div>
    <div class="bottom">
    </div>
  </div>
@stop

{{-- Page Content --}}
@section('content')
  {{-- Form --}}
  <div class="createForm">
    {{ Form::open(['route' => 'store_novel']) }}

      <div class="formGroup">
        <div class="formBlock">
          {{ Form::label('title', 'Title') }}
          {{ errors_for('title', $errors) }}
          {{ Form::text('title') }}
          <p class="helpText">Required.</p>
        </div>

        <div class="formBlock">
          {{ Form::label('subtitle', 'Subtitle') }}
          {{ errors_for('subtitle', $errors) }}
          {{ Form::text('subtitle') }}
        </div>
      </div>

      <div class="formGroup">
        <div class="formBlock">
          <label for="notebook_id">Notebook</label>
          <select name="notebook_id" id="notebook_id">
            @foreach($notebooks as $notebook)
            <option value="{{ $notebook->id }}">{{ $notebook->name }}</option> 
            @endforeach
          </select>
        </div>

        <div class="formBlock">
          <label for="genre_id">Genre</label>
          <select name="genre_id" id="genre_id">
            @foreach($genres as $genre)
            <option value="{{ $genre->id }}">{{ $genre->name }}</option> 
            @endforeach
          </select>
        </div>
      </div>

      <div class="formBlock">
        {{ Form::label('author', 'Author') }}
        {{ errors_for('author', $errors) }}
        {{ Form::text('author', $name) }}
      </div>

      <div class="formBlock">
        {{ Form::label('description', 'Description') }}
        {{ errors_for('description', $errors) }}
        {{ Form::textarea('description') }}
      </div>

      <div class="formBlock submit">
       {{ Form::submit('CREATE', ['class' => 'button submit']) }}
      </div>
    {{ Form::close() }}
  </div>
@stop