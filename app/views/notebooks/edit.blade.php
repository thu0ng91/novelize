@extends('layouts.app')
@section('body_class', 'edit')

{{-- Page Header --}}
@section('page_header')
  <div class="page-header">
    <h2 class="page-header__title">
      {{ HTML::image('/img/icons/notebook.png') }}
      Edit: {{ $notebook->name }}
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

    {{ Form::model($notebook, ['method' => 'PUT', 'route' => ['update_notebook', $notebook->id], 'class' => 'basic-form']) }}
      @include('notebooks.partials.form')

      <div class="form-block--submit">
       {{ Form::submit('UPDATE ' . $notebook->name, ['class' => 'form-button']) }}
      </div>
    {{ Form::close() }}
  </div>
@stop