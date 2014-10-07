{{ Form::open(['method' => 'PUT', 'route' => 'send_support', 'class' => 'support-form']) }}

  {{ Form::hidden('email', $user->email) }}

	<div class="form-block">
	  {{ Form::label('problem', 'Problem') }}
	  {{ Form::text('problem') }}
	  {{ errors_for('problem', $errors) }}
	</div>

	<div class="form-block">
	  {{ Form::label('details', 'Details') }}
	  {{ Form::textarea('details', null, ['class' => 'medium']) }}
	  {{ errors_for('details', $errors) }}
	</div>

	<div class="form-bloc--submit">
	 {{ Form::submit('SEND SUPPORT REQUEST', ['class' => 'form-button']) }}
	</div>

{{ Form::close() }}