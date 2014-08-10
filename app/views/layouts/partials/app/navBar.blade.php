<div class="navBar">
    <div class="logo">
        {{ HTML::image('img/identity/logo-orange.png', 'Novelize') }}
    </div>

<!--    <div class="addNav">-->
<!--        <ul class="dropdown">-->
<!--            <li>-->
<!--                <ul>-->
<!--                    <li>{{ link_to_route('create_novel', 'Novel') }}</li>-->
<!--                    <li>{{ link_to_route('create_notebook', 'Notebook') }}</li>-->
<!--                    <li class="border">{{ link_to_route('create_entry', 'Journal Entry') }}</li>-->
<!--                    <li>{{ link_to_route('create_character', 'Character') }}</li>-->
<!--                    <li>{{ link_to_route('create_location', 'Location') }}</li>-->
<!--                    <li>{{ link_to_route('create_item', 'Item') }}</li>-->
<!--                    <li>{{ link_to_route('create_note', 'Note') }}</li>-->
<!--                </ul>-->
<!---->
<!--                <p>Add</p>-->
<!--            </li>-->
<!--        </ul>-->
<!--    </div>-->

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