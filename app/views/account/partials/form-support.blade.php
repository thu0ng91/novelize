{{ Form::open(['route' => 'mail_support', 'class' => 'support-form']) }}

  {{ Form::hidden('email', $user->email) }}

	<div class="form-block">
	  {{ Form::label('question', "What's your question?") }}
	  {{ Form::text('question') }}
	  {{ errors_for('question', $errors) }}
	  <p class="help-text">Required.</p>
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