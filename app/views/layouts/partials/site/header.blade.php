<header class="header">
  <div class="logo">
    <a href="{{ route('index_page') }}">
      {{ HTML::image('img/identity/logo-white.png', 'Novelize') }}
    </a>
  </div>

  <ul class="accountMenu">
    <li>{{ link_to_route('login_page', 'Login', null, ['class' => 'button secondary small']) }}</li>
    <li class="signupButton">{{ link_to_route('register_page', 'Signup', null, ['class' => 'button primary small']) }}</li>
  </ul>
</header>