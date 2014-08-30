@extends('layouts.app')
@section('body_class', 'edit')

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
  {{-- Form --}}
  {{ Form::model($entry, ['method' => 'PUT', 'route' => ['update_entry', $entry->id]]) }}

    @include('entries.partials.form')

    <div class="formBlock submit">
      {{ link_to_route('show_entry', 'CANCEL', $entry->id, ['class' => 'button secondary']) }}

      {{ Form::submit('UPDATE', ['class' => 'button submit']) }}
    </div>

  {{ Form::close() }}
@stop