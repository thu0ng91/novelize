<?php


class AdminController extends \BaseController {

  /**
   * Display the users profile
   * GET /reports
   *
   * @return Response
   */
  public function reports()
  {
    $users = User::with('novels', 'notebooks', 'notebooks.characters', 'entries')->get();

    $novel_count = Novel::get()->count();
    $notebook_count = Notebook::get()->count();
    $entry_count = Entry::get()->count();

    return View::make('admin.reports', compact('users', 'novel_count', 'notebook_count', 'entry_count'));
  }

  /**
   * See when a user logs in or out
   * GET /sessions
   *
   * @return Response
   */
  public function sessions()
  {
    $sessions = UserSession::where('user_id', '>', 1)->get();

    return View::make('admin.sessions', compact('sessions'));
  }

}