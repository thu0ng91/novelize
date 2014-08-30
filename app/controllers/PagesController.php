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
   * Story
   *
   * @return Response
   */
  public function getStory()
  {
    return View::make('pages.story');
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
   * Blog
   *
   * @return Response
   */
  public function getBlog()
  {
    $posts = Post::paginate(3);

    return View::make('pages.blog', compact('posts'));
  }

  /**
   * Post
   *
   * @return Response
   */
  public function getPost($postId)
  {
    return View::make('pages.post');
  }

  /**
   * Legal
   *
   * @return Response
   */
  public function getLegal()
  {
    return View::make('pages.legal');
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
   * Auth Message
   *
   * @return Response
   */
  public function getAuthMessage()
  {
    return View::make('auth.message');
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