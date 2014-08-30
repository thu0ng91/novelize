@extends('layouts.app')
@section('body_class', 'index')
@section('layout_class', 'SM skinny')

{{-- Page Header --}}
@section('header')
  <div class="pageHeader">
    <!-- Page Title -->
    <h2 class="pageTitle">Journal</h2>

    <!-- Page Buttons -->
    <ul class="pageButtons">
      <li>{{ link_to_route('create_entry', 'NEW ENTRY', null, ['class' => 'button secondary']) }}</li>
    </ul>
  </div>
@stop

{{-- Page Content --}}
@section('content')

<!--
  Main ============================================= -->
  <div class="main">

    @if ($entries->count())

      <div class="indexControls">
        <div class="pages">
          {{ $entries->appends(Request::except('page'))->links() }}
        </div>
      </div>

      <table class="indexTable">
        @foreach($entries as $entry)
          <tr class="indexRow entry">
            <td class="date">
              <span class="month">{{ date('M', strtotime($entry->created_at)) }}</span>
              <span class="day">{{ date('d', strtotime($entry->created_at)) }}</span>
            </td>

            <td class="title">{{ $entry->title }}</td>

            <td class="buttons">
              @if($type == 'trashed') 

                {{ link_to_route('destroy_entry', 'DESTROY', $entry->id, ['class' => 'button secondary small'] ) }}
                {{ link_to_route('restore_entry', 'RESTORE', $entry->id, ['class' => 'button primary small'] ) }}

              @else

                {{ link_to_route('trash_entry', 'Trash', $entry->id, ['class' => 'button secondary small'] ) }}
                {{ link_to_route('show_entry', 'VIEW', $entry->id, ['class' => 'button primary small'] ) }}

              @endif
            </td>
          </tr>
        @endforeach
      </table>

      <div class="indexControls">
        <div class="pages">
          {{ $entries->appends(Request::except('page'))->links() }}
        </div>
      </div>

    @else

      {{-- Empty Message --}}
      <div class="indexControls">
        <div class="pages">
          {{ $entries->appends(Request::except('page'))->links() }}
        </div>
      </div>

      <div class="emptyMessage">
        <h2 class="title">There's nothing here.</h2>
      </div>

      <div class="indexControls">
        <div class="pages">
          {{ $entries->appends(Request::except('page'))->links() }}
        </div>
      </div>

    @endif
  </div>



<!--
  Sidebar ============================================= -->
  <div class="sidebar">
    <div class="filters">
      <ul class="types">

        @if($type == 'trashed')

          <li>{{ link_with_query('type', 'active', 'view_journal', 'ALL', ['class' => 'link secondary'])}} ({{ $allCount }})</li>
          <li>{{ link_with_query('type', 'trashed', 'view_journal', 'TRASHED', ['class' => 'link secondary active'])}} ({{ $trashCount }})</li>

        @else

          <li>{{ link_with_query('type', 'active', 'view_journal', 'ALL', ['class' => 'link secondary active'])}} ({{ $allCount }})</li>
          <li>{{ link_with_query('type', 'trashed', 'view_journal', 'TRASHED', ['class' => 'link secondary'])}} ({{ $trashCount }})</li>

        @endif

      </ul>
    </div>
  </div>

@stop