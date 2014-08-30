<div class="formBlock">
  {{ Form::label('name', 'Name') }}
  {{ errors_for('name', $errors) }}
  {{ Form::text('name') }}
  <p class="helpText">Required.</p>
</div>

<div class="formBlock">
  {{ Form::label('description', 'Description') }}
  {{ errors_for('description', $errors) }}
  {{ Form::textarea('description') }}
</div>