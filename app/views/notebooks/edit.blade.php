@extends('layouts.app')
@section('body_class', 'edit')

{{-- Page Header --}}
@section('header')
  <div class="pageHeader">
    <div class="top">
      <h2 class="pageTitle">Update Notebook</h2>
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
  <div class="editForm">
    {{ Form::model($notebook, ['method' => 'PUT', 'route' => ['update_notebook', $notebook->id]]) }}
      @include('notebooks.partials.form')

      <div class="formBlock submit">
       {{ Form::submit('UPDATE', ['class' => 'button submit']) }}
      </div>
    {{ Form::close() }}
  </div>
@stop