<?php

class PagesController extends \BaseController {

  /**
   * Index
   *
   * @return Response
   */
  public function getIndex()
  {
    return View::make('pages.index');
  }

  /**
   * Contact
   *
   * @return Response
   */
  public function getContact()
  {
    return View::make('pages.contact');
  }

  /**
   * Privacy
   *
   * @return Response
   */
  public function getPrivacy()
  {
    return View::make('pages.privacy');
  }

  /**
   * Terms
   *
   * @return Response
   */
  public function getTerms()
  {
    return View::make('pages.terms');
  }

  /**
   * Register
   *
   * @return Response
   */
  public function getRegister()
  {
    return View::make('pages.register');
  }

  /**
   * Login
   *
   * @return Response
   */
  public function getLogin()
  {
    return View::make('pages.login');
  }


}