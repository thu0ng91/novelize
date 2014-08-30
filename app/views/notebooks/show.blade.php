@extends('layouts.app')
@section('body_class', 'show')

{{-- Page Header --}}
@section('header')
  <div class="pageHeader">
    <div class="top">
      <h2 class="pageTitle">{{ $notebook->name }}</h2>
      <ul class="pageButtons">
        <li>{{ link_to_route('view_notebooks', 'BACK', null, ['class' => 'button secondary']) }}</li>
      </ul>
    </div>
    <div class="bottom">
    </div>
  </div>
@stop

{{-- Page Content --}}
@section('content')

  <!-- Main Column
  ========================================================================= -->

  <div class="mainColumn">

    {{-- Characters --}}
    <section>
      <h1>Characters</h1>

      @if ($notebook->characters->count())

        @foreach($notebook->characters as $character)
          <div class="character">
            <h2 class="characterName">{{ $character->name }}</h2>

            <div class="characterButtons">
              {{ link_to_route('edit_character', 'EDIT', $character->id, ['class' => 'button secondary small'] ) }}
            </div>
          </div>
        @endforeach

      @else

        {{-- Empty Message --}}
        <div class="emptyMessage">
          <h2 class="title">There's nothing here.</h2>
        </div>

      @endif
    </section>


    {{-- Locations --}}
    <section>
      <h1>Locations</h1>

      @if ($notebook->locations->count())

        @foreach($notebook->locations as $location)
          <div class="location">
            <h2 class="locationName">{{ $location->name }}</h2>

            <div class="locationButtons">
              {{ link_to_route('edit_location', 'EDIT', $location->id, ['class' => 'button secondary small'] ) }}
            </div>
          </div>
        @endforeach

      @else

        {{-- Empty Message --}}
        <div class="emptyMessage">
          <h2 class="title">There's nothing here.</h2>
        </div>

      @endif
    </section>


    {{-- Items --}}
    <section>
      <h1>Items</h1>

      @if ($notebook->items->count())

        @foreach($notebook->items as $item)
          <div class="item">
            <h2 class="itemName">{{ $item->name }}</h2>

            <div class="itemButtons">
              {{ link_to_route('edit_item', 'EDIT', $item->id, ['class' => 'button secondary small'] ) }}
            </div>
          </div>
        @endforeach

      @else

        {{-- Empty Message --}}
        <div class="emptyMessage">
          <h2 class="title">There's nothing here.</h2>
        </div>

      @endif
    </section>


    {{-- Notes --}}
    <section>
      <h1>Notes</h1>

      @if ($notebook->notes->count())

        @foreach($notebook->notes as $note)
          <div class="note">
            <h2 class="noteName">{{ $note->name }}</h2>

            <div class="noteButtons">
              {{ link_to_route('edit_note', 'EDIT', $note->id, ['class' => 'button secondary small'] ) }}
            </div>
          </div>
        @endforeach

      @else

        {{-- Empty Message --}}
        <div class="emptyMessage">
          <h2 class="title">There's nothing here.</h2>
        </div>

      @endif
    </section>

  </div>



  <!-- Secondary Column
  ========================================================================= -->

  <div class="secondaryColumn">
    
    <aside class="secondaryBox">
      <h3 class="title">Description</h3>

      <p class="text">{{ $notebook->description }}</p>

      <div class="links">
        {{ link_to_route('edit_notebook', 'EDIT', $notebook->id, ['class' => 'link secondary']) }}
      </div>
    </aside>

    <aside class="secondaryBox">
      <h3 class="title">Novels</h3>

      @if ($notebook->novels->count())
        <ul class="list">
          @foreach($notebook->novels as $novel)
            <li>{{ link_to_route('show_novel', $novel->title, $novel->id, ['class' => 'link secondary']) }}</li>
          @endforeach
        </ul>
      @endif

      <div class="links">
        {{ link_to_route('create_novel', 'ADD NOVEL', null, ['class' => 'link secondary']) }}
      </div>
    </aside>

  </div>

@stop