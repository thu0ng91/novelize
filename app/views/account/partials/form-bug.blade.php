{{ Form::open(['route' => 'mail_bug', 'class' => 'support-form']) }}

  {{ Form::hidden('email', $user->email) }}

	<div class="form-block">
    <label for="details">Describe the Bug <span class="required">Required</span></label>
	  {{ Form::textarea('details', null, ['class' => 'medium', 'required']) }}
	  {{ errors_for('details', $errors) }}
	  <p class="help-text">Please be as specific as possible.</p>
	</div>

	<div class="form-block">
    <label for="os">Operating System <span class="required">Required</span></label>
	  {{ Form::text('os', null, ['placeholder' => 'e.g. Windows 7, Mac OS X, etc.', 'required']) }}
	  {{ errors_for('os', $errors) }}
	</div>

	<div class="form-block">
    <label for="browser">Web Browser <span class="required">Required</span></label>
	  {{ Form::text('browser', null, ['placeholder' => 'e.g. Internet Explorer 11, Chrome, etc.', 'required']) }}
	  {{ errors_for('browser', $errors) }}
	</div>

	<div class="form-bloc--submit">
	 {{ Form::submit('SEND REPORT', ['class' => 'form-button']) }}
	</div>

{{ Form::close() }}