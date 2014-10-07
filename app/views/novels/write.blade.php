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
      {{ link_to_route('create_chapter', 'NEW CHAPTER', $novel->id, ['class' => 'novel-sidebar__button']) }}

      @include('novels.partials.table-of-contents')
    </div>

<!--
  Scene ============================================= -->
    {{ Form::model($currentScene, ['method' => 'PUT', 'route' => ['update_scene', $novel->id, $currentScene->id], 'class' => 'write-scene']) }}

      {{ Form::hidden('scene_order') }}

      <a href="#bottom" name="top" class="write-scene__to-bottom"></a>

      <p class="write-scene__breadcrumbs">Chapter {{ $currentScene->chapter->chapter_order }} / Scene {{ $currentScene->scene_order }}</p>

      <div class="write-scene__details">
        {{ Form::text('title', null, ['id' => 'title', 'class' => 'write-scene__title', 'placeholder' => 'Scene ' . $currentScene->scene_order]) }}
        {{ errors_for('title', $errors) }}

        {{ Form::textarea('description', null, ['class' => 'write-scene__description js-descriptionBox', 'placeholder' => 'A brief writeup of what this scene should be about']) }}
        <button class="write-scene__description-button js-descriptionButton">SHOW DESCRIPTION</button>
      </div>

      <div class="form-block">
        {{ errors_for('body', $errors) }}
        {{ Form::textarea('body', null, ['class' => 'editable']) }}
      </div>

      <div class="form-block--buttons">
        {{ link_to_route('write_novel', 'CANCEL', [$novel->id, $currentScene->id], ['class' => 'form-button--secondary']) }}
        {{ Form::submit('SAVE SCENE', ['class' => 'form-button']) }}
      </div>

      <a href="#top" name="bottom" class="write-scene__to-top"></a>

    </form>

  </div>

@stop