<aside class="notebook-description">
  @if( $notebook->description )

    {{ $notebook->description }}

  @else

    <p>There isn't a description for this notebook, yet. You can write one when you {{ link_to_route('edit_notebook', 'manage', $notebook->id) }} your notebook.</p>

  @endif
</aside>

<ul class="notebook-menu">

  <li class="notebook-menu__item characters">
  	<a href="{{ route('view_characters', $notebook->id) }}" class="icon-notebook-menu--characters">
  		CHARACTERS ({{ $notebook->characters->count() }})
		</a>
  </li>

  <li class="notebook-menu__item locations">
  	<a href="{{ route('view_locations', $notebook->id) }}" class="icon-notebook-menu--locations">
  		LOCATIONS ({{ $notebook->locations->count() }})
  	</a>
  </li>

  <li class="notebook-menu__item items">
	  <a href="{{ route('view_items', $notebook->id) }}" class="icon-notebook-menu--items">
	  	ITEMS ({{ $notebook->items->count() }})
	  </a>
  </li>

  <li class="notebook-menu__item notes">
	  <a href="{{ route('view_notes', $notebook->id) }}" class="icon-notebook-menu--notes">
	  	NOTES ({{ $notebook->notes->count() }})
	  </a>
  </li>

</ul>