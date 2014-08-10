<header class="row header">
    <div class="logo">
        {{ HTML::image('img/identity/logo-white.png', 'Novelize') }}
    </div>

    <nav class="headerMenu">
        <ul>
            <li>{{ link_to_route('index_page', 'Home', null, ['class' => 'link secondary']) }}</li>
            <li>{{ link_to_route('contact_page', 'Contact', null, ['class' => 'link secondary']) }}</li>
            <li>{{ link_to_route('login_page', 'Login', null, ['class' => 'link primary']) }}</li>
            <li>{{ link_to_route('register_page', 'Signup', null, ['class' => 'button primary']) }}</li>
        </ul>
    </nav>
</header>