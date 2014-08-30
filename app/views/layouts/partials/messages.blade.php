<div class="message">

  {{-- 
    Alert Messages
   --}}
  @if (Session::has('alert_info'))
    <div class="info">
      <p>{{ Session::get('alert_info') }}</p>

      <button id="closeMessage" class="messageButton">close</button>
    </div>
  @endif

  @if (Session::has('alert_success'))
    <div class="success">
      <p>{{ Session::get('alert_success') }}</p>

      <button id="closeMessage" class="messageButton">close</button>
    </div>
  @endif

  @if (Session::has('alert_warning'))
    <div class="warning">
      <p>{{ Session::get('alert_warning') }}</p>

      <button id="closeMessage" class="messageButton">close</button>
    </div>
  @endif

  @if (Session::has('alert_danger'))
    <div class="danger">
      <p>{{ Session::get('alert_danger') }}</p>

      <button id="closeMessage" class="messageButton">close</button>
    </div>
  @endif



  {{-- 
    Flash Messages
   --}}
  @if (Session::has('flash_message'))
    <div class="js-fade info">
      <p>{{ Session::get('flash_message') }}</p>

      <button id="closeMessage" class="messageButton">close</button>
    </div>
  @endif

  @if (Session::has('flash_success'))
    <div class="js-fade success">
      <p>{{ Session::get('flash_success') }}</p>

      <button id="closeMessage" class="messageButton">close</button>
    </div>
  @endif

  @if (Session::has('flash_warning'))
    <div class="js-fade warning">
      <p>{{ Session::get('flash_warning') }}</p>

      <button id="closeMessage" class="messageButton">close</button>
    </div>
  @endif

  @if (Session::has('flash_danger'))
    <div class="js-fade danger">
      <p>{{ Session::get('flash_danger') }}</p>

      <button id="closeMessage" class="messageButton">close</button>
    </div>
  @endif
</div>