@extends('layouts.app')
@section('body_class', 'write')
@section('layout_class', 'SMS skinny-tiny')

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

<!--
  Main ============================================= -->
  <div class="main">
    @if ($novel->sections->count())

      <div class="novelSection-wrapper">
        @foreach($novel->sections as $section)

          <section id="section{{ $section->section_order }}" class="novelSection">
            <h2 class="title" name="title{{ $section->id }}">{{ $section->title }}</h2>

            <div class="body">
              {{ $section->body }}
            </div>

            <div class="descriptionBox">
              <button class="descriptionButton link secondary">show description</button>

              <div class="description" style="display: none;">
                {{ $section->description }}
              </div>
            </div>

            {{ link_to_route('add_section', '', [$novel->id, $section->section_order], ['class' => 'addSection'])}}
          </section>

        @endforeach
      </div>

    @else

      <div class="emptyMessage">
        <h2 class="title">There's nothing here.</h2>
      </div>

    @endif
  </div>



<!--
  Sidebar ============================================= -->
  <div class="sidebar left">
    <ul class="toc">

      @foreach($novel->sections as $section)
        @if ($section->title)
          <li>
            <a href="#section{{ $section->section_order }}" class="link secondary title">{{ $section->title }}</a>
          </li>
        @else
          <li>
            <a href="#section{{ $section->section_order }}" class="link secondary">Section {{ $section->section_order }}</a>
          </li>
        @endif
      @endforeach

    </ul>
  </div>

  <button class="topLink"></button>

@stop



@section('foot_scripts')
  <script>
    $('a[href*=#]:not([href=#])').smoothScroll({
      offset: -80,
    });

    $(".editor").jqte();
  </script>
@stop