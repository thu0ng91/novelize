@extends('layouts.app')
@section('body_class', 'create')

{{-- Page Header --}}
@section('header')
  <div class="pageHeader">
    <div class="top">
      <h2 class="pageTitle">Create Post</h2>
      <ul class="pageButtons">
        <li>{{ link_to_route('view_posts', 'CANCEL', null, ['class' => 'button secondary']) }}</li>
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
    {{ Form::open(['route' => 'store_post']) }}
      <div class="formBlock">
        {{ Form::label('title', 'Title') }}
        {{ errors_for('title', $errors) }}
        {{ Form::text('title') }}
      </div>

      <div class="formBlock">
        <label for="category_id">Category</label>
        <select name="category_id" id="category_id">
          @foreach($categories as $category)
          <option value="{{ $category->id }}">{{ $category->name }}</option> 
          @endforeach
        </select>
      </div>

      <div class="formBlock">
        {{ Form::label('body', 'Body') }}
        {{ errors_for('body', $errors) }}
        {{ Form::textarea('body', null, ['class' => 'large']) }}
      </div>

      <div class="formBlock submit">
       {{ Form::submit('CREATE', ['class' => 'button submit']) }}
      </div>
    {{ Form::close() }}
  </div>
@stop