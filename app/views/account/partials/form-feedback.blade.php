{{ Form::open(['route' => 'mail_feedback', 'class' => 'support-form']) }}

  {{ Form::hidden('email', $user->email) }}

	<div class="form-block">
    <label for="like">What do you like about Novelize? <span>Optional</span></label>
	  {{ Form::textarea('like', null, ['rows' => '6']) }}
	  {{ errors_for('like', $errors) }}
	</div>

	<div class="form-block">
    <label for="hate">What do you hate about Novelize? <span>Optional</span></label>
	  {{ Form::textarea('hate', null, ['rows' => '6']) }}
	  {{ errors_for('hate', $errors) }}
	</div>

	<div class="form-block">
    <label for="comments">What else is on your mind? <span>Optional</span></label>
	  {{ Form::textarea('comments') }}
	  {{ errors_for('comments', $errors) }}
	</div>

	<div class="form-bloc--submit">
	 {{ Form::submit('SEND FEEDBACK', ['class' => 'form-button']) }}
	</div>

{{ Form::close() }}