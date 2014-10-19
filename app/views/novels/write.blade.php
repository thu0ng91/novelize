@extends('layouts.app-panel')
@section('body_class', 'write scene-' . $currentScene->id)



{{-- Page Header --}}
@section('page_header')
  <div class="page-header">
    <h2 class="page-header__title">
      {{ HTML::image('/img/icons/novel.png') }}
      {{ $novel->title }}
      <a class="page-header__manage icon-manage" href="{{ route('edit_novel', $novel->id) }}"></a>
    </h2>

    <ul class="page-header__buttons">
      <li class="page-header__item">
        {{ link_to_route('plot_novel', 'PLOT', [$novel->id, $currentScene->id]) }}
      </li>
      <li class="page-header__item">
        {{ link_to_route('write_novel', 'WRITE', [$novel->id, $currentScene->id], ['class' => 'active']) }}
      </li>
      <li class="page-header__item">
        {{ link_to_route('review_novel', 'REVIEW', [$novel->id, $currentScene->id]) }}
      </li>
      <li class="page-header__item">
        {{ link_to_route('publish_novel', 'PUBLISH', [$novel->id, $currentScene->id]) }}
      </li>
    </ul>
  </div>
@stop



{{-- Page Content --}}
@section('page_content')

  <div class="write-scene__wrapper">

<!--
  Novel Sidebar ================================= -->
    <div class="novel-sidebar">
      @include('novels.partials.table-of-contents')

      {{ link_to_route('store_chapter', 'NEW CHAPTER', $novel->id, ['class' => 'novel-sidebar__button']) }}
    </div>

<!--
  Scene ============================================= -->
    {{ Form::model($currentScene, ['method' => 'PUT', 'route' => ['update_scene', $novel->id, $currentScene->id], 'class' => 'write-scene']) }}

      {{ Form::hidden('scene_order') }}

      <p class="write-scene__breadcrumbs">Chapter {{ $currentScene->chapter->chapter_order }} / Scene {{ $currentScene->scene_order }}</p>

      <div class="write-scene__details">
        {{ Form::text('title', null, ['id' => 'title', 'class' => 'write-scene__title', 'placeholder' => 'Scene ' . $currentScene->scene_order]) }}
        {{ errors_for('title', $errors) }}

        {{ Form::textarea('description', null, ['class' => 'write-scene__description js-descriptionBox', 'placeholder' => 'This is a brief description of your scene']) }}
        <button class="write-scene__description-button js-descriptionButton">SHOW DESCRIPTION</button>
      </div>

      <div class="form-block">
        {{ errors_for('body', $errors) }}
        {{ Form::textarea('body', null, ['class' => 'editable js-remote']) }}
      </div>

      <div class="write-scene__toolbar__wrapper">
        <div class="write-scene__toolbar">

          {{ link_to_route('trash_scene', 'DELETE SCENE', [$novel->id, $currentScene->id], ['class' => 'write-scene__delete-button']) }}

          {{ Form::submit('SAVE', ['class' => 'write-scene__save-button']) }}

          <p class="write-scene__word-count"><span id="word-count"></span> Words</p>

        </div>
      </div>

    </form>

  </div>

@stop