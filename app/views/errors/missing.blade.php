@extends('layouts.auth')
@section('body_class', 'auth')



{{-- Page Header --}}
@section('content')
  <div class="auth-box">

    <div class="auth-box__logo">
      {{ HTML::image('img/identity/logo-white.png', 'Novelize') }}
    </div>

		<h1 class="auth-box__title">Page Not Found</h1>

		<p class="auth-box__text">It looks like the page you were looking for can't be found. Try one of these links instead:</p>

		<ul class="auth-box__list">
			<li>{{ link_to_route('view_novels', 'View Your Novels') }}</li>
			<li>{{ link_to_route('view_notebooks', 'View Your Notebooks') }}</li>
			<li>{{ link_to_route('view_contact', 'Contact Support', 'support') }}</li>
		</ul>

  </div>
@stop