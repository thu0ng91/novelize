@extends('layouts.app')
@section('body_class', 'index')



{{-- Page Header --}}
@section('page_header')
  <div class="page-header">
    <h2 class="page-header__title">
      {{ HTML::image('/img/icons/notebook.png') }}
      Notebooks
    </h2>

    <ul class="page-header__buttons">
      <li>{{ link_to_route('create_notebook', 'NEW NOTEBOOK', null, ['class' => 'page-header__button']) }}</li>
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

        <li class="filters__types__items">{{ link_with_query('type', 'active', 'view_notebooks', 'ALL')}}({{ $allCount }})</li>
        <li class="filters__types__items">{{ link_with_query('type', 'trashed', 'view_notebooks', 'TRASHED', ['class' => 'active'])}}({{ $trashCount }})</li>

      @else

        <li class="filters__types__items">{{ link_with_query('type', 'active', 'view_notebooks', 'ALL', ['class' => 'active'])}}({{ $allCount }})</li>
        <li class="filters__types__items">{{ link_with_query('type', 'trashed', 'view_notebooks', 'TRASHED')}}({{ $trashCount }})</li>

      @endif

    </ul>
  </div>



<!--
  Index ============================================= -->
  @if ($notebooks->count())

    <ul class="notebook-index">

      @foreach($notebooks as $notebook)

        <li class="notebook-index__item">
          <h2 class="notebook-index__name">{{ $notebook->name }}</h2>

          <ul class="notebook-index__counts">
            <li class="notebook-index__counts__item--novels">Novels <span>{{ $notebook->novels->count() }}</span></li>
            <li class="notebook-index__counts__item">Characters <span>{{ $notebook->characters->count() }}</span></li>
            <li class="notebook-index__counts__item">Locations <span>{{ $notebook->locations->count() }}</span></li>
            <li class="notebook-index__counts__item">Items <span>{{ $notebook->items->count() }}</span></li>
            <li class="notebook-index__counts__item">Notes <span>{{ $notebook->notes->count() }}</span></li>
          </ul>

          <ul class="notebook-index__buttons">
            @if($type == 'trashed')

              <li class="notebook-index__buttons__item">{{ link_to_route('destroy_notebook', '', $notebook->id, ['class' => 'icon-index--destroy', 'title' => 'DESTROY'] ) }}</li>
              <li class="notebook-index__buttons__item">{{ link_to_route('restore_notebook', '', $notebook->id, ['class' => 'icon-index--restore', 'title' => 'RESTORE'] ) }}</li>

            @else

              <li class="notebook-index__buttons__item">{{ link_to_route('trash_notebook', '', $notebook->id, ['class' => 'icon-index--trash', 'title' => 'TRASH'] ) }}</li>
              <li class="notebook-index__buttons__item">{{ link_to_route('edit_notebook', '', $notebook->id, ['class' => 'icon-index--settings', 'title' => 'UPDATE SETTINGS'] ) }}</li>
              <li class="notebook-index__buttons__item">{{ link_to_route('view_characters', '', $notebook->id, ['class' => 'icon-index--edit', 'title' => 'MANAGE'] ) }}</li>

            @endif
          </ul>

        </li>
      @endforeach

    </ul>

  @else

    <div class="empty-message--main-box">
      <h2 class="empty-message__title">No Notebooks Here</h2>

      <p class="empty-message__text">{{ link_to_route('create_notebook', 'Create') }} your first notebook to get things rolling.</p>
    </div>

  @endif

@stop