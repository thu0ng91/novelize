<ul id="notesList" class="side-panel__list js-panelContent">
	@if($notebook->notes->count())

		@foreach($notebook->notes as $note)
			<li id="noteButton-{{ $note->id }}" class="side-panel__list__item js-listButton">{{ $note->name }}</li>
		@endforeach

	@else

		<li class="side-panel__empty-message">
			<h4>You Have No Notes</h4>
			<p>Why don't you create one?</p>
		</li>

	@endif

	<li class="side-panel__list__item__new-link">{{ link_to_route('create_note', 'NEW NOTE', $notebook->id) }}</li>
</ul>

@foreach($notebook->notes as $note)
	<div id="notePanel-{{ $note->id }}" class="side-panel__item js-panelContent">
		<button class="side-panel__item__back-button js-notesBack">BACK</button>
		{{ link_to_route('edit_note', 'EDIT NOTE', [$notebook->id, $note->id], ['class' => 'side-panel__item__edit-button'] ) }}

		<h3 class="side-panel__item__name">{{ $note->name }}</h3>


		@if($note->description)
			<div class="side-panel__item__description">{{ $note->description }}</div>
		@endif
	</div>
@endforeach