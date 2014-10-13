{{ Form::open(['route' => 'mail_support', 'class' => 'support-form']) }}

  {{ Form::hidden('email', $user->email) }}

	<div class="form-block">
    <label for="question">Question <span class="required">Required</span></label>
	  {{ Form::text('question', null, ['required']) }}
	  {{ errors_for('question', $errors) }}
	</div>

	<div class="form-block">
    <label for="details">Details <span>Optional</span></label>
	  {{ Form::textarea('details', null, ['class' => 'medium']) }}
	  {{ errors_for('details', $errors) }}
	  <p class="help-text">Give me any details that pertain to your question.</p>
	</div>

	<div class="form-bloc--submit">
	 {{ Form::submit('SEND SUPPORT REQUEST', ['class' => 'form-button']) }}
	</div>

{{ Form::close() }}