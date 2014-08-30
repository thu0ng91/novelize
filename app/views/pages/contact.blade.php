@extends('layouts.site')
@section('body_class', 'contact')

@section('content')
  <section class="row hero">
    <h1>Contact Novelize</h1>

    <p>Have a bit of feedback, or maybe you want to ask a question. Well then use the form below to let us know what it is.</p>
  </section>

  <section class="row last">
    @include('layouts.partials.messages')

    {{-- Form --}}
    {{ Form::open(['route' => 'send_contact']) }}
      <div class="formBlock">
        {{ Form::label('email', 'Email Address') }}
        {{ errors_for('email', $errors) }}
        {{ Form::email('email') }}
      </div>
      <div class="formBlock">
        {{ Form::label('name', 'Name') }}
        {{ errors_for('name', $errors) }}
        {{ Form::text('name') }}
      </div>
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
       {{ Form::submit('SEND MESSAGE', ['class' => 'button submit']) }}
      </div>

    {{ Form::close() }}
  </section>

@stop