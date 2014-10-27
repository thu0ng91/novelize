@extends('layouts.app')
@section('body_class', 'index')

{{-- Page Header --}}
@section('page_header')
  <div class="page-header">
    <h2 class="page-header__title">Admin Settings</h2>
  </div>
@stop

{{-- Page Content --}}
@section('page_content')
  <div class="report__wrapper">
		<ul class="report-list">
			<li class="report-list__item">{{ link_to_route('view_character_types', 'CHARACTER TYPES', NULL, ['class' => 'report-list__button']) }}</li>
		</ul>
  </div>
@stop