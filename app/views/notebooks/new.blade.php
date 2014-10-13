@extends('layouts.app')
@section('body_class', 'create')

{{-- Page Header --}}
@section('page_header')
  <div class="page-header">
    <h2 class="page-header__title">
      {{ HTML::image('/img/icons/notebook.png') }}
      {{ $notebook->name }}
    </h2>

    <ul class="page-header__buttons">
      <li>{{ link_to_route('view_notebooks', 'NOTEBOOK LIST', null, ['class' => 'page-header__button']) }}</li>
    </ul>
  </div>
@stop

{{-- Page Content --}}
@section('page_content')
  {{-- Form --}}
  <div class="new-notebook__wrapper">

    <div class="new-notebook">
      <h2 class="new-notebook__title">Your Notebook Has Been Created!</h2>

      <p class="new-notebook__text">Now it’s time to start building your world by filling it with characters, locations, items, and notes. Or you can start writing and create a novel that will be associated with the {{ $notebook->name }} notebook.</p>

      <ul class="new-notebook__buttons">
        <li>{{ link_to_route('create_character', 'ADD CHARACTER', $notebook->id, ['class' => 'new-notebook__button--character']) }}</li>
        <li>{{ link_to_route('create_location', 'ADD LOCATION', $notebook->id, ['class' => 'new-notebook__button--location']) }}</li>
        <li>{{ link_to_route('create_item', 'ADD ITEM', $notebook->id, ['class' => 'new-notebook__button--item']) }}</li>
        <li>{{ link_to_route('create_note', 'ADD NOTE', $notebook->id, ['class' => 'new-notebook__button--note']) }}</li>
      </ul>

      {{ link_to_route('create_novel', 'CREATE YOUR NOVEL', null, ['class' => 'new-notebook__create-novel']) }}
    </div>
  </div>
@stop