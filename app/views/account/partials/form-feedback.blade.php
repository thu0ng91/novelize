{{ Form::open(['method' => 'PUT', 'route' => 'send_support', 'class' => 'support-form']) }}

  {{ Form::hidden('email', $user->email) }}

	<div class="form-block">
	  {{ Form::label('how_like', 'How do you like Novelize, so far?') }}
	  {{ Form::text('how_like') }}
	  {{ errors_for('how_like', $errors) }}
	</div>

	<div class="form-block">
	  {{ Form::label('details', 'What is you\'re feedback?') }}
	  {{ Form::textarea('details', null, ['rows' => '14']) }}
	  {{ errors_for('details', $errors) }}
	</div>

	<div class="form-bloc--submit">
	 {{ Form::submit('SEND FEEDBACK', ['class' => 'form-button']) }}
	</div>

{{ Form::close() }}