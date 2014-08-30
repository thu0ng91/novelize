@extends('layouts.site')
@section('body_class', 'story')

@section('content')
  <section class="row">
    <h1>The Novelize Story</h1>

    <div class="letter">
      <p>Hello, my name is Josh. I'm a wannabe Author and Web Developer who has decided to combine my passions into one project.</p>

      <p>Novelize started a while ago while I was working on starting yet again another brilliant novel. This time I decided I would find some great novel writing software that could help me turn my ideas into a real story. Unfortunately I spend more time trying to find the software then write the story. The good news for you is that it made me decide to build Novelize.</p>

      <p>In my search for the 'perfect' novel writing software I found that I couldn't find anything that met my standards. I wanted something that was minimalistic so that it wouldn't get in the way of my writing. (I can get distracted pretty easily.) The software still needed to store all the characters, locations, and other information I need to keep track of during my writing. Finally I wanted something that could help keep me going and actually help me finish a novel.</p>

      <p>So since I'm already a half-way decent Web Developer I figured I could just build my own Novel Writing App. That thought was logically followed up by if I wanted a better app, maybe other authors would as well and Novelize was born!</p>

      <p class="signature">-- Josh Evensen, founder</p>
    </div>
  </section>

  <section class="row last notice">
    <div class="text">
      <h2>The Process is Just Beginning</h2>

      <p>Novelize is almost ready for it's first beta round, and I need your help in making sure that it's what you need and want.</p>
    </div>

    {{ link_to_route('register_page', 'Become a Beta Author', null, ['class' => 'button cta'])}}
  </section>
@stop