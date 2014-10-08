@extends('layouts.app')
@section('body_class', 'characters')

{{-- Page Header --}}
@section('page_header')
  <div class="page-header">
    <h2 class="page-header__title">
      {{ HTML::image('/img/icons/notebook.png') }}
      {{ $notebook->name }}
      <a class="page-header__manage icon-manage" href="{{ route('edit_notebook', $notebook->id) }}"></a>
    </h2>

    <ul class="page-header__buttons">
      <li>{{ link_to_route('view_notebooks', 'NOTEBOOK LIST', null, ['class' => 'page-header__button']) }}</li>
    </ul>
  </div>
@stop

{{-- Page Content --}}
@section('page_content')
  <div class="notebook-page">

    <!-- Left Sidebar
    ===================================================== -->
    <div class="notebook-page__sidebar--left">
      @include('notebooks.partials.sidebar_left')
    </div>



    <!-- Main
    ===================================================== -->
    <div class="notebook-page__main">

      <!-- Filters -->
      <div class="filters">
        <ul class="filters__types">

          @if($type == 'trashed')

            <li class="filters__types__items">{{ link_with_type('active', 'view_characters', 'ALL', ['notebookId' => $notebook->id]) }}({{ $allCount }})</li>
            <li class="filters__types__items">{{ link_with_type('trashed', 'view_characters', 'TRASHED', ['notebookId' => $notebook->id], ['class' => 'active']) }}({{ $trashCount }})</li>

          @else

            <li class="filters__types__items">{{ link_with_type('active', 'view_characters', 'ALL', ['notebookId' => $notebook->id], ['class' => 'active']) }}({{ $allCount }})</li>
            <li class="filters__types__items">{{ link_with_type('trashed', 'view_characters', 'TRASHED', ['notebookId' => $notebook->id]) }}({{ $trashCount }})</li>

          @endif

        </ul>
      </div>


      <!-- Index -->
      <div class="notebook-page__main__wrapper">

        <div class="item-index__toolbar">

          {{ link_to_route('create_character', 'NEW CHARACTER', $notebook->id, ['class' => 'item-index__toolbar__button']) }}

          <div class="pagination__wrapper--item-index">
            {{ $characters->appends(Request::except('page'))->links() }}
          </div>

        </div>

        @if ($characters->count())

          <table class="item-index">

            <thead>
              <tr class="item-index__row--head">
                <th class="item-index__head-cell">Character Name</th>
                <th class="item-index__head-cell">Type</th>
                <th class="item-index__head-cell"></th>
              </tr>
            </thead>

            <tbody>
              @foreach($characters as $character)
                <tr class="item-index__row">

                  <td class="item-index__cell">{{ $character->name }}</td>
                  <td class="item-index__cell">{{ $character->type->name }}</td>

                  <td class="item-index__cell--buttons">

                    @if($type == 'trashed')

                      {{ link_to_route('destroy_character', '', [$notebook->id, $character->id], ['class' => 'icon-index--destroy'] ) }}
                      {{ link_to_route('restore_character', '', [$notebook->id, $character->id], ['class' => 'icon-index--restore'] ) }}

                    @else

                      {{ link_to_route('trash_character', '', [$notebook->id, $character->id], ['class' => 'icon-index--trash'] ) }}
                      {{ link_to_route('edit_character', '', [$notebook->id, $character->id], ['class' => 'icon-index--edit'] ) }}

                    @endif

                  </td>
                </tr>
              @endforeach
            </tbody>

          </table>


          <div class="pagination__wrapper">
            {{ $characters->appends(Request::except('page'))->links() }}
          </div>

        @else

          <div class="empty-message">
            <h2 class="empty-message__title">No one is home</h2>

            <p class="empty-message__text">Why don't you {{ link_to_route('create_character', 'create', $notebook->id) }} your first character.</p>
          </div>

        @endif
      </div>

    </div>



    <!-- Right Sidebar
    ===================================================== -->
    <div class="notebook-page__sidebar--right">
      @include('notebooks.partials.sidebar_right')
    </div>

  </div>

@stop