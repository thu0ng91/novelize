@extends('layouts.app')
@section('body_class', 'support')

{{-- Page Header --}}
@section('header')
  <div class="pageHeader">
    <h1 class="pageTitle">Support</h1>
  </div>
@stop

{{-- Page Content --}}
@section('content')

  {{ Form::open(['method' => 'PUT', 'route' => 'send_support']) }}

    <h2 class="heading">Support Form</h2>
    
    <p class="description">Have a question, want to offer some feedback, or just get in touch. For now just use the form below. We'll come up with something a bit more sophisticated later.</p>

    <div class="formBlock">
      {{ Form::label('subject', 'Subject') }}
      {{ errors_for('subject', $errors) }}
      {{ Form::text('subject') }}
    </div>

    <div class="formBlock">
      {{ Form::label('body', 'Message') }}
      {{ errors_for('body', $errors) }}
      {{ Form::textarea('body', null, ['class' => 'medium']) }}
    </div>

    <div class="formBlock submit">
     {{ Form::submit('SEND', ['class' => 'button submit']) }}
    </div>

  {{ Form::close() }}

@stop