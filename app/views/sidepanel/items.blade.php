<ul id="itemsList" class="side-panel__list js-panelContent">
	@if($notebook->items->count())

		@foreach($notebook->items as $item)
			<li id="itemButton-{{ $item->id }}" class="side-panel__list__item js-listButton">{{ $item->name }}</li>
		@endforeach

	@else

		<li class="side-panel__empty-message">
			<h4>You Have No Items</h4>
			<p>Why don't you create one?</p>
		</li>

	@endif

	<li class="side-panel__list__item__new-link">{{ link_to_route('create_item', 'NEW ITEM', $notebook->id) }}</li>
</ul>

@foreach($notebook->items as $item)
	<div id="itemPanel-{{ $item->id }}" class="side-panel__item js-panelContent">
		<button class="side-panel__item__back-button js-itemsBack">BACK</button>
		{{ link_to_route('edit_item', 'EDIT ITEM', [$notebook->id, $item->id], ['class' => 'side-panel__item__edit-button'] ) }}

		<h3 class="side-panel__item__name">{{ $item->name }}</h3>

		@if($item->description)
			<div class="side-panel__item__description">{{ $item->description }}</div>
		@endif
	</div>
@endforeach