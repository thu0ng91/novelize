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
      return Redirect::route('index_page');
    }

    return Redirect::route('view_dashboard');
  }
));

//Route::controller('password', 'RemindersController');

/*
 * Route Directory
 *
 * Pull in route files from 'routes' directory
 */
require (__DIR__."/routes/pages.php");

// require (__DIR__."/routes/auth.php");
// require (__DIR__."/routes/users.php");

// require (__DIR__."/routes/account.php");

// require (__DIR__."/routes/journal.php");

// require (__DIR__."/routes/novel.php");
// require (__DIR__."/routes/novelSection.php");

// require (__DIR__."/routes/notebook.php");
// require (__DIR__."/routes/character.php");
// require (__DIR__."/routes/location.php");
// require (__DIR__."/routes/item.php");
// require (__DIR__."/routes/note.php");
