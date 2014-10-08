@extends('layouts.app')
@section('body_class', 'index')



{{-- Page Header --}}
@section('page_header')
  <div class="page-header">
    <h2 class="page-header__title">
      {{ HTML::image('/img/icons/novel.png') }}
      Novels
    </h2>

    <ul class="page-header__buttons">
      <li>{{ link_to_route('create_novel', 'NEW NOVEL', null, ['class' => 'page-header__button']) }}</li>
    </ul>
  </div>
@stop



{{-- Page Content --}}
@section('page_content')
<!--
  Filters ============================================= -->
  <div class="filters">
    <ul class="filters__types">

      @if($type == 'trashed')

        <li class="filters__types__items">{{ link_with_query('type', 'active', 'view_novels', 'ALL')}}({{ $allCount }})</li>
        <li class="filters__types__items">{{ link_with_query('type', 'trashed', 'view_novels', 'TRASHED', ['class' => 'active'])}}({{ $trashCount }})</li>

      @else

        <li class="filters__types__items">{{ link_with_query('type', 'active', 'view_novels', 'ALL', ['class' => 'active'])}}({{ $allCount }})</li>
        <li class="filters__types__items">{{ link_with_query('type', 'trashed', 'view_novels', 'TRASHED')}}({{ $trashCount }})</li>

      @endif

    </ul>
  </div>



<!--
  Index ============================================= -->
  @if ($novels->count())

    <ul class="novel-index">

      @foreach($novels as $novel)

        <li class="novel-index__item">

          <p class="novel-index__notebook">{{ $novel->notebook->name }}</p>

          <h2 class="novel-index__title">{{ $novel->title }}</h2>

          <ul class="novel-index__buttons">
            @if($type == 'trashed')

              <li class="novel-index__buttons__item">{{ link_to_route('destroy_novel', '', $novel->id, ['class' => 'icon-index--destroy', 'title' => 'DESTROY'] ) }}</li>
              <li class="novel-index__buttons__item">{{ link_to_route('restore_novel', '', $novel->id, ['class' => 'icon-index--restore', 'title' => 'RESTORE'] ) }}</li>

            @else

              <li class="novel-index__buttons__item">{{ link_to_route('trash_novel', '', $novel->id, ['class' => 'icon-index--trash', 'title' => 'TRASH'] ) }}</li>
              <li class="novel-index__buttons__item">{{ link_to_route('edit_novel', '', $novel->id, ['class' => 'icon-index--settings', 'title' => 'UPDATE SETTINGS'] ) }}</li>
              <li class="novel-index__buttons__item">{{ link_to_route('write_novel', '', [$novel->id, $novel->scenes->first()['id']], ['class' => 'icon-index--edit', 'title' => 'WRITE'] ) }}</li>

            @endif
          </ul>

        </li>

      @endforeach

    </ul>

  @else

    <div class="empty-message--main-box">
      <h2 class="empty-message__title">You Have No Novels</h2>

      @if( $notebookCount > 0 )
        <p class="empty-message__text">Why don't you {{ link_to_route('create_novel', 'create') }} your first Novel?</p>
      @else
        <p class="empty-message__text">Make sure you've got a {{ link_to_route('create_notebook', 'Notebook') }} set up before you create your first Novel.</p>
      @endif
    </div>

  @endif

@stop