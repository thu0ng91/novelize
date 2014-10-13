<header class="header">
  <div class="header__logo">
    {{ HTML::image('img/identity/logo-orange.png') }}
  </div>

  <nav class="nav-menu">
    <!-- Account -->
    <ul class="nav-menu__account">
      <li class="nav-menu__item">{{ HTML::link_to_active_route('view_profile', 'PROFILE', $currentUser->id) }}</li>
      <li class="nav-menu__item">{{ HTML::link_to_active_route('view_contact', 'CONTACT', [$currentUser->id, 'general']) }}</li>
    </ul>

    <!-- Sections -->
    <ul class="nav-menu__sections">
      <li class="nav-menu__item">{{ HTML::link_to_active_route('view_novels', 'NOVELS') }}</li>
      <li class="nav-menu__item">{{ HTML::link_to_active_route('view_notebooks', 'NOTEBOOKS') }}</li>
      <li class="nav-menu__item">{{ HTML::link_to_active_route('view_journal', 'JOURNAL') }}</li>
    </ul>

    <!-- Logout -->
    <ul class="nav-menu__logout">
      <li class="nav-menu__item">{{ link_to_route('view_contact', 'GOT FEEDBACK?', [$currentUser->id, 'feedback'], ['class' => 'feedback-link']) }}</li>
      <li class="nav-menu__item">{{ link_to_route('logout', 'LOGOUT') }}</li>
    </ul>
  </nav>
</header>