<div class="form-block">
   <label for="name">Name <span class="required">Required</span></label>
  {{ Form::text('name', null, ['required']) }}
  {{ errors_for('name', $errors) }}
</div>

<div class="form-block">
   <label for="description">Description <span>Optional</span></label>
  {{ Form::textarea('description') }}
  {{ errors_for('description', $errors) }}
</div>