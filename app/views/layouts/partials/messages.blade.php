{{--
  Alert Messages
 --}}
@if (Session::has('alert_info'))
  <div class="message--info">
    <p>{{ Session::get('alert_info') }}</p>

    <button id="closeMessage" class="message__button">DISMISS</button>
  </div>
@endif

@if (Session::has('alert_success'))
  <div class="message--success">
    <p>{{ Session::get('alert_success') }}</p>

    <button id="closeMessage" class="message__button">DISMISS</button>
  </div>
@endif

@if (Session::has('alert_warning'))
  <div class="message--warning">
    <p>{{ Session::get('alert_warning') }}</p>

    <button id="closeMessage" class="message__button">DISMISS</button>
  </div>
@endif

@if (Session::has('alert_danger'))
  <div class="message--danger">
    <p>{{ Session::get('alert_danger') }}</p>

    <button id="closeMessage" class="message__button">DISMISS</button>
  </div>
@endif



{{--
  Flash Messages
 --}}
@if (Session::has('flash_message'))
  <div class="js-fade message--info">
    <p>{{ Session::get('flash_message') }}</p>

    <button id="closeMessage" class="message__button">DISMISS</button>
  </div>
@endif

@if (Session::has('flash_success'))
  <div class="js-fade message--success">
    <p>{{ Session::get('flash_success') }}</p>

    <button id="closeMessage" class="message__button">DISMISS</button>
  </div>
@endif

@if (Session::has('flash_warning'))
  <div class="js-fade message--warning">
    <p>{{ Session::get('flash_warning') }}</p>

    <button id="closeMessage" class="message__button">DISMISS</button>
  </div>
@endif

@if (Session::has('flash_danger'))
  <div class="js-fade message--danger">
    <p>{{ Session::get('flash_danger') }}</p>

    <button id="closeMessage" class="message__button">DISMISS</button>
  </div>
@endif