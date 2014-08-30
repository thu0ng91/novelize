@extends('layouts.app')
@section('body_class', 'index')
@section('layout_class', 'SM skinny')

{{-- Page Header --}}
@section('header')
  <div class="pageHeader">
    <h2 class="pageTitle">Notebooks</h2>

    <ul class="pageButtons">
      <li>{{ link_to_route('create_notebook', 'NEW NOTEBOOK', null, ['class' => 'button secondary']) }}</li>
    </ul>
  </div>
@stop

{{-- Page Content --}}
@section('content')

<!--
  Main ============================================= -->
  <div class="main">
    @if ($notebooks->count())

      <ul class="indexList">

      @foreach($notebooks as $notebook)
        <li class="indexItem notebook">
          <h2 class="name">{{ $notebook->name }}</h2>

          {{-- Novels --}}
          @if ($notebook->novels->count())
            <ul class="novels">
              @foreach($notebook->novels as $novel)
              <li>{{ link_to_route('write_novel', $novel->title, $novel->id) }}</li>
              @endforeach

              <li class="newNovel">{{ link_to_route('create_novel', 'NEW NOVEL') }}</li>
            </ul>

          @else

            <ul class="novels">
              <li class="newNovel">{{ link_to_route('create_novel', 'NEW NOVEL') }}</li>
            </ul>

          @endif

          {{-- Description --}}
          <div class="description">
            <p>{{ $notebook->description }}</p>
          </div>

          {{-- Counts --}}
          <ul class="counts">
            <li>Characters: {{ $notebook->characters->count() }}</li>
            <li>Locations: {{ $notebook->locations->count() }}</li>
            <li>Items: {{ $notebook->items->count() }}</li>
            <li>Notes: {{ $notebook->notes->count() }}</li>
          </ul>

          <div class="buttons">
            <div class="secondary">
              @if($type == 'trashed') 

                {{ link_to_route('destroy_notebook', 'DESTROY', $notebook->id, ['class' => 'button secondary small'] ) }}

              @else

                {{ link_to_route('trash_notebook', 'TRASH', $notebook->id, ['class' => 'button secondary small'] ) }}
                {{ link_to_route('edit_notebook', 'SETTINGS', $notebook->id, ['class' => 'button secondary small'] ) }}

              @endif
            </div>

            <div class="primary">
              @if($type == 'trashed') 

                {{ link_to_route('restore_notebook', 'RESTORE', $notebook->id, ['class' => 'button primary small'] ) }}

              @else

                {{ link_to_route('show_notebook', 'MANAGE', $notebook->id, ['class' => 'button primary small'] ) }}

              @endif
            </div>
          </div>


        </li>
      @endforeach

      </ul>

    @else

      {{-- Empty Message --}}
      <div class="emptyMessage">
        <h2 class="title">There's nothing here.</h2>
      </div>

    @endif
  </div>



<!--
  Sidebar ============================================= -->
  <div class="sidebar">
    <div class="filters">
      <ul class="types">

        @if($type == 'trashed')

          <li>{{ link_with_query('type', 'active', 'view_notebooks', 'ALL', ['class' => 'link secondary'])}} ({{ $allCount }})</li>
          <li>{{ link_with_query('type', 'trashed', 'view_notebooks', 'TRASHED', ['class' => 'link secondary active'])}} ({{ $trashCount }})</li>

        @else

          <li>{{ link_with_query('type', 'active', 'view_notebooks', 'ALL', ['class' => 'link secondary active'])}} ({{ $allCount }})</li>
          <li>{{ link_with_query('type', 'trashed', 'view_notebooks', 'TRASHED', ['class' => 'link secondary'])}} ({{ $trashCount }})</li>

        @endif

      </ul>
    </div>
  </div>

@stop