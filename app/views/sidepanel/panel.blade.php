<div class="side-panel">
	<h3 class="side-panel__heading">{{ $notebook->name }}</h3>

	<ul class="side-panel__menu">
		<li id="charactersButton" class="side-panel__menu__item icon--panel-characters js-menuButton" title="Characters"></li>
		<li id="locationsButton" class="side-panel__menu__item icon--panel-locations js-menuButton" title="Locations"></li>
		<li id="itemsButton" class="side-panel__menu__item icon--panel-items js-menuButton" title="Items"></li>
		<li id="notesButton" class="side-panel__menu__item icon--panel-notes js-menuButton" title="Notes"></li>
	</ul>

	<div class="side-panel__content">

		@include('sidepanel.characters')
		@include('sidepanel.locations')
		@include('sidepanel.items')
		@include('sidepanel.notes')

	</div>

	<button class="side-panel__toggle js-sidePanelToggle closed"></button>
</div>