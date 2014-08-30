<?php

/*
|--------------------------------------------------------------------------
| Active Page Macro
|--------------------------------------------------------------------------
|
| This macro adds an active class to the current page based on the
| named route. It is similar to URI::is() method but focuses on the name
| of the route instead of the URI.
|
| usage: {{ HTML::active_link_to_route('some_named_route', 'Link Text' }}
|
*/

HTML::macro('link_to_active_route', function($route, $text, $parameters = array(), $class = '') {
    $currentRoute = Route::currentRouteName();
    $href  = URL::route($route, $parameters);

    if ($currentRoute == $route) {
        $class = ' class="active ' . $class . '"';
    } else {
        $class = ' class="' . $class . '"';
    }

    return '<a href="' . $href . '"' . $class . '>' . $text . '</a>';
});


HTML::macro('raw', function($htmlbuilder) {
    return htmlspecialchars_decode($htmlbuilder);
});

 