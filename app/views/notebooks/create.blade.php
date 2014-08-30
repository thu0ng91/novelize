@extends('layouts.app')
@section('body_class', 'create')

{{-- Page Header --}}
@section('header')
  <div class="pageHeader">
    <div class="top">
      <h2 class="pageTitle">Create Notebook</h2>
      <ul class="pageButtons">
        <li>{{ link_to_route('view_notebooks', 'CANCEL', null, ['class' => 'button secondary']) }}</li>
      </ul>
    </div>
    <div class="bottom">
    </div>
  </div>
@stop

{{-- Page Content --}}
@section('content')
  {{-- Form --}}
  <div class="createForm">
    {{ Form::open(['route' => 'store_notebook']) }}
      @include('notebooks.partials.form')

      <div class="formBlock submit">
       {{ Form::submit('CREATE', ['class' => 'button submit']) }}
      </div>
    {{ Form::close() }}
  </div>
@stop