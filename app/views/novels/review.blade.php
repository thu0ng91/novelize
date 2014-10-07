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
        {{ link_to_route('write_novel', 'WRITE', [$novel->id, $currentScene->id]) }}
      </li>
      <li class="page-header__item">
        {{ link_to_route('review_novel', 'REVIEW', [$novel->id, $currentScene->id], ['class' => 'active']) }}
      </li>
      <li class="page-header__item">
        {{ link_to_route('publish_novel', 'PUBLISH', [$novel->id, $currentScene->id]) }}
      </li>
    </ul>
  </div>
@stop



{{-- Page Content --}}
@section('page_content')

  <div class="novel-mode-empty">
    <div class="empty-message--main-box">
      <h2 class="empty-message__title">There's nothing here.</h2>
    </div>
  </div>

@stop