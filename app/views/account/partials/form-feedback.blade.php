{{ Form::open(['route' => 'mail_feedback', 'class' => 'support-form']) }}

  {{ Form::hidden('email', $user->email) }}

	<div class="form-block">
	  {{ Form::label('like', 'What do you like about Novelize?') }}
	  {{ Form::textarea('like', null, ['rows' => '6']) }}
	  {{ errors_for('like', $errors) }}
	</div>

	<div class="form-block">
	  {{ Form::label('hate', 'What do you hate about Novelize?') }}
	  {{ Form::textarea('hate', null, ['rows' => '6']) }}
	  {{ errors_for('hate', $errors) }}
	</div>

	<div class="form-block">
	  {{ Form::label('comments', 'What else is on your mind?') }}
	  {{ Form::textarea('comments') }}
	  {{ errors_for('comments', $errors) }}
	</div>

	<div class="form-bloc--submit">
	 {{ Form::submit('SEND FEEDBACK', ['class' => 'form-button']) }}
	</div>

{{ Form::close() }}