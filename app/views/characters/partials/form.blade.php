<div class="form-block">
  <label for="name">Name <span class="required">Required</span></label>
  {{ Form::text('name', null, ['required']) }}
  {{ errors_for('name', $errors) }}
</div>

<div class="form-group">

	<div class="form-block">
	  <label for="type_id">Character Type <span class="required">Required</span></label>
	  <select name="type_id">
	    @foreach($types as $type)
	      @if($character->type_id == $type->id )
	      <option value="{{ $type->id }}" selected>{{ $type->name }}</option>
	      @else
	      <option value="{{ $type->id }}">{{ $type->name }}</option>
	      @endif
	    @endforeach
	  </select>
    <p class="help-text">Don't see what you want, {{ link_to_route('view_contact', 'give a little feedback', [$currentUser->id, 'feedback']) }}</p>
	</div>

	<div class="form-block">
    <label for="description">Description <span>Optional</span></label>
	  {{ Form::textarea('description') }}
	  {{ errors_for('description', $errors) }}
	</div>

</div>

<div class="form-group">

	<div class="form-block--inline-label">
    <label for="height">Height <span>Optional</span></label>
	  {{ Form::text('height') }}
	  {{ errors_for('height', $errors) }}
	</div>

	<div class="form-block--inline-label">
    <label for="weight">Weight <span>Optional</span></label>
	  {{ Form::text('weight') }}
	  {{ errors_for('weight', $errors) }}
	</div>

	<div class="form-block--inline-label">
    <label for="eyes">Eye Color <span>Optional</span></label>
	  {{ Form::text('eyes') }}
	  {{ errors_for('eyes', $errors) }}
	</div>

	<div class="form-block--inline-label">
    <label for="hair">Hair Color <span>Optional</span></label>
	  {{ Form::text('hair') }}
	  {{ errors_for('hair', $errors) }}
	</div>

	<div class="form-block--inline-label">
    <label for="skin">Skin Color <span>Optional</span></label>
	  {{ Form::text('skin') }}
	  {{ errors_for('skin', $errors) }}
	</div>

	<div class="form-block--inline-label">
    <label for="date_of_birth">Birthday <span>Optional</span></label>
	  {{ Form::text('date_of_birth') }}
	  {{ errors_for('date_of_birth', $errors) }}
	</div>

</div>