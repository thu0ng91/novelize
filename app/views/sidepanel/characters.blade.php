<ul id="charactersList" class="side-panel__list js-panelContent">
	@if($notebook->characters->count())

		@foreach($notebook->characters as $character)
			<li id="characterButton-{{ $character->id }}" class="side-panel__list__item js-listButton">{{ $character->name }}</li>
		@endforeach

	@else

		<li class="side-panel__empty-message">
			<h4>You Have No Characters</h4>
			<p>Why don't you create one?</p>
		</li>

	@endif

	<li class="side-panel__list__item__new-link">{{ link_to_route('create_character', 'NEW CHARACTER', $notebook->id) }}</li>
</ul>


@foreach($notebook->characters as $character)
	<div id="characterPanel-{{ $character->id }}" class="side-panel__item js-panelContent">
		<button class="side-panel__item__back-button js-charactersBack">BACK</button>
		{{ link_to_route('edit_character', 'EDIT CHARACTER', [$notebook->id, $character->id], ['class' => 'side-panel__item__edit-button'] ) }}

		<h3 class="side-panel__item__name">{{ $character->name }}</h3>

		<P class="side-panel__item__type">{{ $character->type->name }}</P>

		@if($character->description)
			<div class="side-panel__item__description">{{ $character->description }}</div>
		@endif

		@if($character->height || $character->weight || $character->eyes || $character->hair || $character->skin || $character->date_of_birth)
			<div class="side-panel__item__characteristics">
				<table class="side-panel__item__table">

					@if($character->height)
						<tr>
							<td class="side-panel__item__table__label">Height</td>
							<td class="side-panel__item__table__output">{{ $character->height }}</td>
						</tr>
					@endif

					@if($character->weight)
						<tr>
							<td class="side-panel__item__table__label">Weight</td>
							<td class="side-panel__item__table__output">{{ $character->weight }}</td>
						</tr>
					@endif

					@if($character->eyes)
						<tr>
							<td class="side-panel__item__table__label">Eye Color</td>
							<td class="side-panel__item__table__output">{{ $character->eyes }}</td>
						</tr>
					@endif

					@if($character->hair)
						<tr>
							<td class="side-panel__item__table__label">Hair Color</td>
							<td class="side-panel__item__table__output">{{ $character->hair }}</td>
						</tr>
					@endif

					@if($character->skin)
						<tr>
							<td class="side-panel__item__table__label">Skin Color</td>
							<td class="side-panel__item__table__output">{{ $character->skin }}</td>
						</tr>
					@endif

					@if($character->date_of_birth)
						<tr>
							<td class="side-panel__item__table__label">Birthday</td>
							<td class="side-panel__item__table__output">{{ $character->date_of_birth }}</td>
						</tr>
					@endif

				</table>
			</div>
		@endif
	</div>
@endforeach