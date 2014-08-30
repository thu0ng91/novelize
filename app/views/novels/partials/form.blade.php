<div class="formBlock">
  <label for="notebook_id">Notebook</label>
  <select name="notebook_id" id="notebook_id">
    @foreach($notebooks as $notebook)
    <option value="{{ $notebook->id }}">{{ $notebook->name }}</option> 
    @endforeach
  </select>
</div>

<div class="formBlock">
  <label for="genre_id">Genre</label>
  <select name="genre_id">
    @foreach($genres as $genre)
      @if($novel->genre_id == $genre->id )
      <option value="{{ $genre->id }}" selected>{{ $genre->name }}</option> 
      @else 
      <option value="{{ $genre->id }}">{{ $genre->name }}</option> 
      @endif
    @endforeach
  </select>
</div>

<div class="formBlock">
  {{ Form::label('title', 'Title') }}
  {{ errors_for('title', $errors) }}
  {{ Form::text('title') }}
</div>

<div class="formBlock">
  {{ Form::label('subtitle', 'Subtitle') }}
  {{ errors_for('subtitle', $errors) }}
  {{ Form::text('subtitle') }}
</div>

<div class="formBlock">
  {{ Form::label('author', 'Author') }}
  {{ errors_for('author', $errors) }}
  {{ Form::text('author') }}
</div>

<div class="formBlock">
  {{ Form::label('description', 'Description') }}
  {{ errors_for('description', $errors) }}
  {{ Form::textarea('description') }}
</div>