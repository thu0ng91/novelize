@extends('layouts.app')
@section('body_class', 'support')

{{-- Page Header --}}
@section('page_header')
  <div class="page-header">
    <h1 class="page-header__title">How May We Help?</h1>
  </div>
@stop

{{-- Page Content --}}
@section('page_content')

  <div class="page-content">

    <p class="support-types">
      @if ($type == 'general')
        {{ link_to_route('view_contact', 'General', 'general', ['class' => 'active']) }}
      @else
        {{ link_to_route('view_contact', 'General', 'general') }}
      @endif

      <span>/</span>

      @if ($type == 'support')
        {{ link_to_route('view_contact', 'Support', 'support', ['class' => 'active']) }}
      @else
        {{ link_to_route('view_contact', 'Support', 'support') }}
      @endif

      <span>/</span>

      @if ($type == 'feedback')
        {{ link_to_route('view_contact', 'Feedback', 'feedback', ['class' => 'active']) }}
      @else
        {{ link_to_route('view_contact', 'Feedback', 'feedback') }}
      @endif

      <span>/</span>

      @if ($type == 'bug')
        {{ link_to_route('view_contact', 'Report Bug', 'bug', ['class' => 'active']) }}
      @else
        {{ link_to_route('view_contact', 'Report Bug', 'bug') }}
      @endif
      </li>
    </p>

    @if ( $type == 'support' )
      @include('account.partials.form-support')
    @elseif ( $type == 'feedback' )
      @include('account.partials.form-feedback')
    @elseif ($type == 'bug')
      @include('account.partials.form-bug')
    @else
      @include('account.partials.form-general')
    @endif


  </div>

@stop