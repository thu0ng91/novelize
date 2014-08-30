<?php


class AccountController extends \BaseController {

    public function __construct()
    {
        $this->beforeFilter('auth');
    }

    /**
     * Display the users profile
     * GET /profile
     *
     * @return Response
     */
    public function profile($userId)
    {
        $user = User::with('profile')->findOrFail($userId);

        return View::make('account.profile', compact('user'));
    }

    /**
     * Display the users support page
     * GET /support
     *
     * @return Response
     */
    public function support($userId)
    {
        $user = User::findOrFail($userId);

        return View::make('account.support', compact('user'));
    }

}