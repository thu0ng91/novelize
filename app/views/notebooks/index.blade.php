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
        
      </ul>

      @foreach($notebooks as $notebook)
        <div class="notebook">
          <h2 class="notebookName">{{ $notebook->name }}</h2>

          @if ($notebook->novels->count())
            <ul class="notebookBooks">
              @foreach($notebook->novels as $novel)
                <li>{{ $novel->title }}</li>
              @endforeach
            </ul>
          @endif

          <ul class="notebookCounts">
            <li>Characters: {{ $notebook->characters->count() }}</li>
            <li>Locations: {{ $notebook->locations->count() }}</li>
            <li>Items: {{ $notebook->items->count() }}</li>
            <li>Notes: {{ $notebook->notes->count() }}</li>
          </ul>

          @if($type == 'trashed') 
            <div class="notebookButtons">
              {{ link_to_route('destroy_notebook', 'DESTROY', $notebook->id, ['class' => 'button secondary small'] ) }}
              {{ link_to_route('restore_notebook', 'RESTORE', $notebook->id, ['class' => 'button primary small'] ) }}
            </div>
          @else
            <div class="notebookButtons">
              {{ link_to_route('trash_notebook', 'Trash', $notebook->id, ['class' => 'button secondary small'] ) }}
              {{ link_to_route('edit_notebook', 'EDIT', $notebook->id, ['class' => 'button secondary small'] ) }}
              {{ link_to_route('show_notebook', 'SHOW', $notebook->id, ['class' => 'button primary small'] ) }}
            </div>
          @endif

        </div>
      @endforeach

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