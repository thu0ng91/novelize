@extends('layouts.auth')
@section('body_class', 'auth')

@section('content')

  <div class="modal-overlay">
    <div class="modal--register">
      <h1 class="modal__title">Open Registration is Closed</h1>
      <p class="modal__text">Beta testing is over. Enter your email address below, and we'll let you know when you can register for a Novelize account.</p>

      <!-- Begin MailChimp Signup Form -->
      <div id="mc_embed_signup">
        <form action="//getnovelize.us8.list-manage.com/subscribe/post?u=d93bceaebb62b2ee85581f7ca&amp;id=cbe0d9a128" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="modal__form validate" target="_blank" novalidate>
          <div id="mc_embed_signup_scroll">

            <div class="mc-field-group">
              <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="Email Address">
            </div>

            <div id="mce-responses" class="clear">
              <div class="response" id="mce-error-response" style="display:none"></div>
              <div class="response" id="mce-success-response" style="display:none"></div>
            </div>

            <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
            <div style="position: absolute; left: -5000px;"><input type="text" name="b_d93bceaebb62b2ee85581f7ca_cbe0d9a128" tabindex="-1" value=""></div>

            <div class="clear"><input type="submit" value="SIGN UP FOR UPDATES" name="subscribe" id="mc-embedded-subscribe" class="modal__button--register"></div>
          </div>
        </form>

        <p class="modal__note">Already have an account? {{ link_to_route('login_page', 'Login') }}</p>
      </div>
      <!--End mc_embed_signup-->

    </div>
  </div>

  <div class="auth-box--wide">

    <div class="auth-box__logo">
      {{ HTML::image('img/identity/logo-white.png', 'Novelize') }}
    </div>

    <div class="auth-box__notice">
      <h2>Beta Version</h2>
      <p>The beta version is free for everyone. Please understand that Novelize doesn't have all its features yet. Read our <a href="http://getnovelize.com/about_novelize/beta-version-ready/">blog post</a> for more info.</p>
      <h5>We welcome your feedback!</h5>
    </div>

    @include('layouts.partials.messages')

    <form>
    {{-- Form::open(['route' => 'register_user', 'class' => 'auth-box__form']) --}}

      <div class="form-group--two-column">
        <div class="form-block">
          {{ Form::label('first_name', 'First Name') }}
          {{ Form::text('first_name') }}
          {{ errors_for('first_name', $errors) }}
        </div>

        <div class="form-block">
          {{ Form::label('last_name', 'Last Name') }}
          {{ Form::text('last_name') }}
          {{ errors_for('last_name', $errors) }}
        </div>
      </div>

      <div class="form-block">
        {{ Form::label('email', 'Email Address') }}
        {{ Form::email('email') }}
        {{ errors_for('email', $errors) }}
      </div>

      <div class="form-group--two-column">
        <div class="form-block">
          {{ Form::label('password', 'Password') }}
          {{ Form::password('password') }}
          {{ errors_for('password', $errors) }}
          <p class="help-text">Must be at least 8 characters long.</p>
        </div>

        <div class="form-block">
          {{ Form::label('password_confirmation', 'Confirm Password') }}
          {{ Form::password('password_confirmation') }}
          {{ errors_for('password_confirmation', $errors) }}
        </div>
      </div>

      <div class="form-block--submit">
        {{ Form::submit('CREATE ACCOUNT', ['class' => 'form-button']) }}
      </div>
    {{ Form::close() }}
  </div>

  <div class="auth-box__bottom">
    <p>Already have an account? {{ link_to_route('login_page', 'Login') }}</p>
  </div>

@stop