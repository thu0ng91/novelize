@extends('layouts.app')
@section('body_class', 'create')

{{-- Page Header --}}
@section('page_header')
  <div class="page-header">
    <h2 class="page-header__title">
      {{ HTML::image('/img/icons/notebook.png') }}
      New Notebook
    </h2>

    <ul class="page-header__buttons">
      <li>{{ link_to_route('view_notebooks', 'CANCEL', null, ['class' => 'page-header__button']) }}</li>
    </ul>
  </div>
@stop

{{-- Page Content --}}
@section('page_content')
  {{-- Form --}}
  <div class="basic-form__wrapper">

    <div class="notebook-index__explanation">
      @include('notebooks.partials.explanation')
    </div>

    {{ Form::open(['route' => 'store_notebook', 'class' => 'basic-form']) }}

      @include('notebooks.partials.form')

      <div class="form-block--submit">
       {{ Form::submit('CREATE NOTEBOOK', ['class' => 'form-button']) }}
      </div>
    {{ Form::close() }}
  </div>
@stop