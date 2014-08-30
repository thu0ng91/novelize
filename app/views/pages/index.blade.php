@extends('layouts.site')
@section('body_class', 'index')

@section('content')

  <section class="row hero">
    <h1>Simple. Helpful. Elegant.</h1>

    <h3>Novelize is a novel writing app created with three ideas in mind.</h3>

    <p>That a writing app should be so simple to use that it comes natually. You don't need a lot of tools, just the right one at the right time, to be helpful. Finally elegant design can aid in creating amazing works of literary art.</p>
  </section>

  <section class="row notice">
    <div class="text">
      <h2>We're looking for Authors</h2>

      <p>Novelize is real close to being ready for it's first beta round, and we need 73 Authors to help us make Novelize great.</p>
    </div>

    {{ link_to_route('register_page', 'Become a Beta Author', null, ['class' => 'button cta'])}}
  </section>

  <section class="row feature right">
    <aside>
      {{ HTML::image('img/front/binders.png') }}
    </aside>

    <h2>Organize Everything</h2>

    <p>You have a lot of information to keep track of as your writing the next best seller. So Novelize gives you Notebooks to store it all. Create multiple notebooks for all your different series to store your novels, characters, locations, items, and other notes.</p>

    <ul>
      
    </ul>
  </section>

  <section class="row feature left">
    <aside>
      {{ HTML::image('img/front/journal.png') }}
    </aside>

    <h2>Keep Thoughts</h2>

    <p>Everyone has a great idea from time to time, don't forget yours. With Novelize you can record all your story ideas, character notes, and everything else in your Journal.</p>
  </section>

  <section class="row last feature right">
    <aside>
      {{ HTML::image('img/front/book_stack.png') }}
    </aside>

    <h2>Write Your Novels</h2>

    <p>Most importantly Novelize will help you turn all your notes and thoughts into best selling Novels. It's simple design and focus on writing makes it the perfect place to finally write the story you've been wanting to.</p>
  </section>

@stop