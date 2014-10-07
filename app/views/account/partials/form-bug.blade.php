{{ Form::open(['method' => 'PUT', 'route' => 'send_support', 'class' => 'support-form']) }}

  {{ Form::hidden('email', $user->email) }}

	<div class="form-block">
	  {{ Form::label('problem', 'Problem') }}
	  {{ Form::text('problem') }}
	  {{ errors_for('problem', $errors) }}
	</div>

	<div class="form-block">
	  {{ Form::label('os', 'Operating System') }}
	  {{ Form::text('os') }}
	  {{ errors_for('os', $errors) }}
	</div>

	<div class="form-block">
	  {{ Form::label('browser', 'Browser') }}
	  {{ Form::text('browser') }}
	  {{ errors_for('browser', $errors) }}
	</div>

	<div class="form-block">
	  {{ Form::label('details', 'Details') }}
	  {{ Form::textarea('details', null, ['class' => 'medium']) }}
	  {{ errors_for('details', $errors) }}
	</div>

	<div class="form-bloc--submit">
	 {{ Form::submit('SEND REPORT', ['class' => 'form-button']) }}
	</div>

{{ Form::close() }}