{{ Form::open(['route' => 'mail_general', 'class' => 'support-form']) }}

  {{ Form::hidden('email', $user->email) }}

	<div class="form-block">
    <label for="subject">Subject <span class="required">Required</span></label>
	  {{ Form::text('subject', null, ['required']) }}
	  {{ errors_for('subject', $errors) }}
	</div>

	<div class="form-block">
    <label for="body">Message <span class="required">Required</span></label>
	  {{ Form::textarea('body', null, ['class' => 'medium', 'required']) }}
	  {{ errors_for('body', $errors) }}
	</div>

	<div class="form-bloc--submit">
	 {{ Form::submit('SEND MESSAGE', ['class' => 'form-button']) }}
	</div>

{{ Form::close() }}