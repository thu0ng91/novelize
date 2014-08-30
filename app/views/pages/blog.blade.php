@extends('layouts.site')
@section('body_class', 'blog')

@section('content')

  <section class="row hero">
    <h1>Our Thoughts.</h1>

    <p>That a writing app should be so simple to use that it comes natually. You don't need a lot of tools, just the right one at the right time, to be helpful. Finally elegant design can aid in creating amazing works of literary art.</p>
  </section>

  @foreach ($posts as $post)
  
  <section class="row">
    <h2>{{ $post->title }}</h2>

    <div class="postText">
      {{ $post->body }}
    </div>
  </section>

  @endforeach


  {{ $posts->appends(Request::except('page'))->links() }}
@stop