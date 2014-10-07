<div class="form-block">
  {{ Form::label('name', 'Name') }}
  {{ Form::text('name') }}
  {{ errors_for('name', $errors) }}
  <p class="help-text">Required.</p>
</div>

<div class="form-group">

	<div class="form-block">
	  <label for="type_id">Character Type</label>
	  <select name="type_id">
	    @foreach($types as $type)
	      @if($character->type_id == $type->id )
	      <option value="{{ $type->id }}" selected>{{ $type->name }}</option>
	      @else
	      <option value="{{ $type->id }}">{{ $type->name }}</option>
	      @endif
	    @endforeach
	  </select>
	  <p class="help-text">Required.</p>
	</div>

	<div class="form-block">
	  {{ Form::label('description', 'Description') }}
	  {{ Form::textarea('description') }}
	  {{ errors_for('description', $errors) }}
	</div>

</div>

<div class="form-group">

	<div class="form-block--inline-label">
	  {{ Form::label('height', 'Height') }}
	  {{ Form::text('height') }}
	  {{ errors_for('height', $errors) }}
	</div>

	<div class="form-block--inline-label">
	  {{ Form::label('weight', 'Weight') }}
	  {{ Form::text('weight') }}
	  {{ errors_for('weight', $errors) }}
	</div>

	<div class="form-block--inline-label">
	  {{ Form::label('eyes', 'Eye Color') }}
	  {{ Form::text('eyes') }}
	  {{ errors_for('eyes', $errors) }}
	</div>

	<div class="form-block--inline-label">
	  {{ Form::label('hair', 'Hair Color') }}
	  {{ Form::text('hair') }}
	  {{ errors_for('hair', $errors) }}
	</div>

	<div class="form-block--inline-label">
	  {{ Form::label('skin', 'Skin Color') }}
	  {{ Form::text('skin') }}
	  {{ errors_for('skin', $errors) }}
	</div>

	<div class="form-block--inline-label">
	  {{ Form::label('date_of_birth', 'Birthday') }}
	  {{ Form::text('date_of_birth') }}
	  {{ errors_for('date_of_birth', $errors) }}
	</div>

</div>