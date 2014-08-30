@extends('layouts.app')
@section('body_class', 'edit')

{{-- Page Header --}}
@section('header')
  <div class="pageHeader">
    <div class="top">
      <h2 class="pageTitle">Update Category</h2>
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
  <div class="editForm">
    {{ Form::model($category, ['method' => 'PUT', 'route' => ['update_user', $category->id]]) }}
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
       {{ Form::submit('UPDATE CATEGORY', ['class' => 'button submit']) }}
      </div>
    {{ Form::close() }}
  </div>
@stop