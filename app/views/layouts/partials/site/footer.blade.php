<footer class="foot">
  <div class="footerButtons">
    {{ link_to_route('register_page', 'Signup', null, ['class' => 'button primary']) }}
  </div>

  <nav class="mainMenu">
    <ul>
      <li class="copyright">&copy; 2014</li>
      
      @include('layouts.partials.site.menu')
    </ul>
  </nav>
</footer>