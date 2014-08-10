@if (Session::has('alert_message'))
  <div class="alert message">
    <p>{{ Session::get('alert_message') }}</p>
  </div>
@endif

@if (Session::has('alert_success'))
  <div class="alert success">
    <p>{{ Session::get('alert_success') }}</p>
  </div>
@endif

@if (Session::has('alert_error'))
  <div class="alert error">
    <p>{{ Session::get('alert_error') }}</p>
  </div>
@endif

@if($errors->any())
  <div class="alert error">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif