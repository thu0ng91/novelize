{{ Form::open(['route' => 'mail_bug', 'class' => 'support-form']) }}

  {{ Form::hidden('email', $user->email) }}

	<div class="form-block">
	  {{ Form::label('details', 'Please describe the bug in as much detail as possible.') }}
	  {{ Form::textarea('details', null, ['class' => 'medium']) }}
	  {{ errors_for('details', $errors) }}
	  <p class="help-text">Required.</p>
	</div>

	<div class="form-block">
	  {{ Form::label('os', 'What operating system are you using?') }}
	  {{ Form::text('os', null, ['placeholder' => 'e.g. Windows 7, Mac OS X, etc.']) }}
	  {{ errors_for('os', $errors) }}
	  <p class="help-text">Required.</p>
	</div>

	<div class="form-block">
	  {{ Form::label('browser', 'Which web browser are you using?') }}
	  {{ Form::text('browser', null, ['placeholder' => 'e.g. Internet Explorer 11, Chrome, etc.']) }}
	  {{ errors_for('browser', $errors) }}
	  <p class="help-text">Required.</p>
	</div>

	<div class="form-bloc--submit">
	 {{ Form::submit('SEND REPORT', ['class' => 'form-button']) }}
	</div>

{{ Form::close() }}