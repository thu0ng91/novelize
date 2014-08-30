@extends('layouts.app')
@section('body_class', 'show')

{{-- Page Header --}}
@section('header')
  <div class="pageHeader">
    <h2 class="pageTitle">{{ $entry->title }}</h2>

    <ul class="pageButtons">
      <li>{{ link_to_route('view_journal', 'JOURNAL', null, ['class' => 'button secondary']) }}</li>
    </ul>

    <div class="pageInfo">
      <p>created on {{ date('M, dS Y', strtotime($entry->created_at)) }}</p>
    </div>
  </div>
@stop

{{-- Page Content --}}
@section('content')
  <div class="recordBody">
    @if($entry->body)
      {{ $entry->body }}
    @else 
      <h3>Nothing Here</h3>
    @endif
  </div>

  <div class="showLinks">
    @if($prevEntry)
      {{ link_to_route('show_entry', 'PREV', $prevEntry, ['class' => 'button secondary small showPrev']) }}
    @endif

    <ul class="showButtons">
      <li>{{ link_to_route('trash_entry', 'TRASH', $entry->id, ['class' => 'button secondary small']) }}</li>
      <li>{{ link_to_route('edit_entry', 'EDIT', $entry->id, ['class' => 'button primary small']) }}</li>
    </ul>

    @if($nextEntry)
      {{ link_to_route('show_entry', 'NEXT', $nextEntry, ['class' => 'button secondary small showNext']) }}
    @endif
  </div>
@stop