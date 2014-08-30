@extends('layouts.app')
@section('body_class', 'create')

{{-- Page Header --}}
@section('header')
  <div class="pageHeader">
    <h1 class="pageTitle">Create Entry</h1>


    <ul class="pageButtons">
      <li>{{ link_to_route('view_journal', 'JOURNAL', null, ['class' => 'button secondary']) }}</li>
    </ul>
  </div>
@stop

{{-- Page Content --}}
@section('content')
  {{-- Form --}}
  {{ Form::open(['route' => 'store_entry']) }}

    @include('entries.partials.form')

    <div class="formBlock submit">
     {{ Form::submit('CREATE', ['class' => 'button submit']) }}
    </div>

  {{ Form::close() }}
@stop