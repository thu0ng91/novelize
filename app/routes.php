<?php

/*
 * CSRF Filter Initialization
 */
Route::when('*', 'csrf', ['post', 'put', 'patch']);

/*
 * Home route
 */
Route::get('/', array(
  'as' => 'home',
  function()
  {
    if (Auth::guest())
    {
      return Redirect::route('login_page');
    }

    return Redirect::route('view_novels');
  }
));

/*
 * 404 route
 */
App::missing(function($exception)
{
  return Response::view('errors.missing', array(), 404);
});




//Route::controller('password', 'RemindersController');

/*
 * Route Directory
 *
 * Pull in route files from 'routes' directory
 */
require (__DIR__."/routes/auth.php");

require (__DIR__."/routes/sessions.php");
require (__DIR__."/routes/mail.php");

require (__DIR__."/routes/users.php");
require (__DIR__."/routes/account.php");

require (__DIR__."/routes/entries.php");
require (__DIR__."/routes/notebooks.php");
require (__DIR__."/routes/novels.php");

require (__DIR__."/routes/chapters.php");
require (__DIR__."/routes/scenes.php");

require (__DIR__."/routes/characters.php");
require (__DIR__."/routes/locations.php");
require (__DIR__."/routes/items.php");
require (__DIR__."/routes/notes.php");