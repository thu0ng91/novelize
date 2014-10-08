@extends('layouts.app')
@section('body_class', 'scenes')

{{-- Page Header --}}
@section('page_header')
  <div class="page-header">
    <h2 class="page-header__title">
      {{ HTML::image('/img/icons/novel.png') }}
      {{ $novel->title }}: Add Scene
    </h2>

    <ul class="page-header__buttons">
      <li>{{ link_to_route('write_novel', 'BACK TO NOVEL', [$novel->id, $chapter->scenes->first()['id']], ['class' => 'page-header__button'] ) }}</li>
    </ul>
  </div>
@stop

{{-- Page Content --}}
@section('page_content')
  {{-- Form --}}
  <div class="basic-form__wrapper">
    {{ Form::open(['route' => ['store_scene', $novel->id, $chapter->id], 'class' => 'basic-form']) }}

      <div class="form-block">
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title') }}
        {{ errors_for('title', $errors) }}
      </div>

      <div class="form-block">
        {{ Form::label('scene_order', 'Scene Position') }}
        <select name="scene_order" id="scene_order">
          @foreach ($chapter->scenes as $scene)
            <option value="{{ $scene->scene_order }}">{{ $scene->scene_order }}</option>
          @endforeach

          <option value="{{ $chapter->scenes->last()['scene_order'] + 1 }}" selected>{{ $chapter->scenes->last()['scene_order'] + 1 }}</option>
        </select>

        {{ errors_for('title', $errors) }}
        <p class="help-text">Required.</p>
      </div>

      <div class="form-block">
        {{ Form::label('description', 'Description') }}
        {{ Form::textarea('description') }}
        {{ errors_for('description', $errors) }}
      </div>

      <div class="form-block--submit">
       {{ Form::submit('ADD SCENE', ['class' => 'form-button']) }}
      </div>
    {{ Form::close() }}
  </div>
@stop