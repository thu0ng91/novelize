@extends('layouts.app')



{{-- Page Content --}}
@section('page_content')

  <div class="welcome">
    <h1 class="welcome__title">Welcome to Novelize</h1>

    <p class="welcome__intro">Novelize helps you keep track of your fictional world in notebooks and write your novels without distractions</p>

    <section class="welcome__section">
      <h2>First Create a Notebook</h2>

      {{ HTML::image('img/stock/binders.png') }}

      <p>Notebooks are the place to create your fictional world, including characters bios, story locations, important items, and research notes. One notebook can lead to several novels that take place in the same world.</p>

      <p>You need to create a notebook before you start writing a novel. Then you can build your world or start writing.</p>
    </section>

    <section class="welcome__section--left">
      <h2>Start Your First Novel</h2>

      {{ HTML::image('img/stock/novel_stack.png') }}

      <p>After creating your notebook, you can start writing your first novel. With Novelize, your story is broken down into scenes and you decide how many scenes are in each chapter.</p>

      <p>The main idea behind Novelize is to keep you on track with your writing goals. That's why you will find separate modes in which you can plot, write, review, and publish your work.</p>

      {{ link_to_route('create_notebook', 'CREATE A NOTEBOOK', null, ['class' => 'welcome__button']) }}
    </section>

  </div>

@stop