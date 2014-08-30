<div class="formBlock">
  {{ Form::label('title', 'Title') }}
  {{ errors_for('title', $errors) }}
  {{ Form::text('title') }}
</div>

<div class="formBlock">
  {{ Form::label('body', 'Body') }}
  {{ errors_for('body', $errors) }}
  {{ Form::textarea('body', null, ['class' => 'large']) }}
</div>