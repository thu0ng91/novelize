<div class="navBar">
  <div class="logo">
    {{ HTML::image('img/identity/logo-orange.png', 'Novelize') }}
  </div>

  <nav class="mainMenu">
    <ul>
      <li>{{ HTML::link_to_active_route('view_dashboard', 'Dashboard') }}</li>
      <li>{{ HTML::link_to_active_route('view_novels', 'Novels') }}</li>
      <li>{{ HTML::link_to_active_route('view_notebooks', 'Notebooks') }}</li>
      <li>{{ HTML::link_to_active_route('view_journal', 'Journal') }}</li>
    </ul>
  </nav>

  <div class="accountNav">
    <ul class="dropdown">
      <li>
        <ul>
          <li>{{ HTML::link_to_active_route('view_profile', 'Profile') }}</li>
          <li>{{ HTML::link_to_active_route('view_support', 'Support') }}</li>
          <li class="divider"></li>
          <li>{{ link_to_route('logout_user', 'Logout') }}</li>
        </ul>

        <p>{{ $currentUser->username }}</p>
      </li>
    </ul>
  </div>
</div>