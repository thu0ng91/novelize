{{ Form::open(['method' => 'PUT', 'route' => 'send_support', 'class' => 'support-form']) }}

  {{ Form::hidden('email', $user->email) }}

	<div class="form-block">
	  {{ Form::label('subject', 'Subject') }}
	  {{ Form::text('subject') }}
	  {{ errors_for('subject', $errors) }}
	</div>

	<div class="form-block">
	  {{ Form::label('body', 'Message') }}
	  {{ Form::textarea('body', null, ['class' => 'medium']) }}
	  {{ errors_for('body', $errors) }}
	</div>

	<div class="form-bloc--submit">
	 {{ Form::submit('SEND MESSAGE', ['class' => 'form-button']) }}
	</div>

{{ Form::close() }}