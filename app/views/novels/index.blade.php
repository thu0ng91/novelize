@extends('layouts.app')
@section('body_class', 'index')
@section('layout_class', 'SM skinny')



{{-- Page Header --}}
@section('header')
  <div class="pageHeader">
    <h2 class="pageTitle">Novels</h2>

    <ul class="pageButtons">
      <li>{{ link_to_route('create_novel', 'NEW NOVEL', null, ['class' => 'button secondary']) }}</li>
    </ul>
  </div>
@stop



{{-- Page Content --}}
@section('content')

<!--
  Main ============================================= -->
  <div class="main">
    @if ($novels->count())

      <ul class="indexList">

        @foreach($novels as $novel)

          <li class="indexItem novel">

            <p class="notebook">{{ $novel->notebook->name }}</p>

            <h2 class="title">{{ $novel->title }}</h2>

            <div class="buttons">
              <div class="secondary">
                @if($type == 'trashed') 

                  {{ link_to_route('destroy_novel', 'DESTROY', $novel->id, ['class' => 'button secondary small'] ) }}

                @else

                  {{ link_to_route('trash_novel', 'Trash', $novel->id, ['class' => 'button secondary small'] ) }}
                  {{ link_to_route('edit_novel', 'SETTINGS', $novel->id, ['class' => 'button secondary small'] ) }}

                @endif
              </div>

              <div class="primary">
                @if($type == 'trashed') 

                  {{ link_to_route('restore_novel', 'RESTORE', $novel->id, ['class' => 'button primary small'] ) }}

                @else

                  {{ link_to_route('write_novel', 'WRITE', $novel->id, ['class' => 'button primary small'] ) }}

                @endif
              </div>
            </div>

          </li>

        @endforeach

      </ul>

    @else

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

          <li>{{ link_with_query('type', 'active', 'view_novels', 'ALL', ['class' => 'link secondary'])}} ({{ $allCount }})</li>
          <li>{{ link_with_query('type', 'trashed', 'view_novels', 'TRASHED', ['class' => 'link secondary active'])}} ({{ $trashCount }})</li>

        @else

          <li>{{ link_with_query('type', 'active', 'view_novels', 'ALL', ['class' => 'link secondary active'])}} ({{ $allCount }})</li>
          <li>{{ link_with_query('type', 'trashed', 'view_novels', 'TRASHED', ['class' => 'link secondary'])}} ({{ $trashCount }})</li>

        @endif

      </ul>
    </div>
  </div>

@stop