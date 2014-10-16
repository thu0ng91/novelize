<ul id="locationsList" class="side-panel__list js-panelContent">
	@if($notebook->locations->count())

		@foreach($notebook->locations as $location)
			<li id="locationButton-{{ $location->id }}" class="side-panel__list__item js-listButton">{{ $location->name }}</li>
		@endforeach

	@else

		<li class="side-panel__empty-message">
			<h4>You Have No Locations</h4>
			<p>Why don't you create one?</p>
		</li>

	@endif

	<li class="side-panel__list__item__new-link">{{ link_to_route('create_location', 'NEW LOCATION', $notebook->id) }}</li>
</ul>

@foreach($notebook->locations as $location)
	<div id="locationPanel-{{ $location->id }}" class="side-panel__item js-panelContent">
		<button class="side-panel__item__back-button js-locationsBack">BACK</button>
		{{ link_to_route('edit_location', 'EDIT LOCATION', [$notebook->id, $location->id], ['class' => 'side-panel__item__edit-button'] ) }}

		<h3 class="side-panel__item__name">{{ $location->name }}</h3>

		@if($location->description)
			<div class="side-panel__item__description">{{ $location->description }}</div>
		@endif
	</div>
@endforeach