@extends('layouts.app')
@section('body_class', 'create')

{{-- Page Header --}}
@section('header')
  <div class="pageHeader">
    <div class="top">
      <h2 class="pageTitle">Create Category</h2>
      <ul class="pageButtons">
        <li>{{ link_to_route('view_postCategories', 'CANCEL', null, ['class' => 'button secondary']) }}</li>
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
    {{ Form::open(['route' => 'store_postCategory']) }}
      <div class="formBlock">
        {{ Form::label('name', 'Name') }}
        {{ errors_for('name', $errors) }}
        {{ Form::text('name') }}
      </div>

      <div class="formBlock">
        {{ Form::label('description', 'Description') }}
        {{ errors_for('description', $errors) }}
        {{ Form::textarea('description') }}
      </div>

      <div class="formBlock submit">
       {{ Form::submit('CREATE CATEGORY', ['class' => 'button submit']) }}
      </div>
    {{ Form::close() }}
  </div>
@stop