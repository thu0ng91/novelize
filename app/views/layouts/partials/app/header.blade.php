<header class="head">
  <div class="logo">
    {{ HTML::image('img/identity/logo-orange.png') }}
  </div>

  <nav class="navMenu">
    <!-- Account -->
    <ul class="account">
      <li>{{ HTML::link_to_active_route('view_profile', 'PROFILE', $currentUser->id) }}</li>
      <li>{{ HTML::link_to_active_route('view_support', 'SUPPORT', $currentUser->id) }}</li>
    </ul>

    <!-- Sections -->
    <ul class="sections">
      <li>{{ HTML::link_to_active_route('view_novels', 'NOVELS') }}</li>
      <li>{{ HTML::link_to_active_route('view_notebooks', 'NOTEBOOKS') }}</li>
      <li>{{ HTML::link_to_active_route('view_journal', 'JOURNAL') }}</li>
    </ul>

    <!-- Logout -->
    <ul class="logout">
      <li>{{ link_to_route('logout', 'LOGOUT') }}</li>
    </ul>
  </nav>
</header>