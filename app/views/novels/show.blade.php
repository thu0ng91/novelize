@extends('layouts.app')
@section('body_class', 'show')

{{-- Page Header --}}
@section('header')
  <div class="pageHeader">
    <div class="top">
      <h2 class="pageTitle"><span>NOVEL</span> {{ $novel->title }}</h2>
      <ul class="pageButtons">
        <li>{{ link_to_route('view_novels', 'BACK', null, ['class' => 'button secondary']) }}</li>
      </ul>
    </div>
    <div class="bottom">
    </div>
  </div>
@stop

{{-- Page Content --}}
@section('content')
  <div class="showSection">
    <div class="sectionGroup">
    </div>
  </div>
@stop