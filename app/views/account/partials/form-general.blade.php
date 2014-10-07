{{ Form::open(['route' => 'mail_general', 'class' => 'support-form']) }}

  {{ Form::hidden('email', $user->email) }}

	<div class="form-block">
	  {{ Form::label('subject', 'Subject') }}
	  {{ Form::text('subject') }}
	  {{ errors_for('subject', $errors) }}
	  <p class="help-text">Required.</p>
	</div>

	<div class="form-block">
	  {{ Form::label('body', 'Message') }}
	  {{ Form::textarea('body', null, ['class' => 'medium']) }}
	  {{ errors_for('body', $errors) }}
	  <p class="help-text">Required.</p>
	</div>

	<div class="form-bloc--submit">
	 {{ Form::submit('SEND MESSAGE', ['class' => 'form-button']) }}
	</div>

{{ Form::close() }}