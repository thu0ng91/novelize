<div class="form-block">
  {{ Form::label('name', 'Name') }}
  {{ Form::text('name') }}
  {{ errors_for('name', $errors) }}
  <p class="help-text">Required.</p>
</div>

<div class="form-block">
  {{ Form::label('description', 'Description') }}
  {{ Form::textarea('description') }}
  {{ errors_for('description', $errors) }}
</div>