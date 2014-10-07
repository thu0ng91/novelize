<div class="form-block">
  {{ Form::text('title', null, ['class' => 'entry-title', 'placeholder' => 'Enter entry title here']) }}
  {{ errors_for('title', $errors) }}
  <p class="help-text">Title (Required).</p>
</div>

<div class="form-block">
  {{ Form::textarea('body', null, ['class' => 'editable']) }}
  {{ errors_for('body', $errors) }}
</div>