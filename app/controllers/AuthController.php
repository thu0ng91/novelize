<?php

class AuthController extends \BaseController {

  /**
   * Register
   *
   * @return Response
   */
  public function getRegister()
  {
    return View::make('auth.register');
  }


  /**
   * Login
   *
   * @return Response
   */
  public function getLogin()
  {
    return View::make('auth.login');
  }


}