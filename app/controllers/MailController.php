<?php

class MailController extends \BaseController {

  /*
   * Contact - General Form
   */
  public function general()
  {
    $user = User::with('profile')->findOrFail(Auth::user()->id);
    $email = $user->email;
    $name = $user->profile->first_name . $user->profile->last_name;

    $data =
    [
      'email' => $email,
      'subject' => Input::get('subject'),
      'body' => Input::get('body'),
      'userId' => $user->id,
      'firstName' => $user->profile->first_name,
      'lastName' => $user->profile->last_name,
    ];

    $rules = [
      'subject' => 'required',
      'body' => 'required'
    ];

    // Validation
    $validator = Validator::make($data, $rules);

    if ($validator->fails())
    {
      return Redirect::back()
        ->withErrors($validator->errors())
        ->withInput();
    }

    // Action
    Mail::send('emails.general', $data, function($message) use ($email, $name)
    {
      $message
        ->from($email, $name)
        ->to('josh@getnovelize.com', 'Josh Evensen')
        ->subject('General Message');
    });

    // Return
    return Redirect::route('view_contact', [Auth::user()->id, 'type' => 'general'])
      ->with('alert_success', 'Your message has been sent');
  }




  /*
   * Contact - Support Form
   */
  public function support()
  {
    $user = User::with('profile')->findOrFail(Auth::user()->id);
    $email = $user->email;
    $name = $user->profile->first_name . $user->profile->last_name;

    $data =
    [
      'email' => $email,
      'question' => Input::get('question'),
      'details' => Input::get('details'),
      'userId' => $user->id,
      'firstName' => $user->profile->first_name,
      'lastName' => $user->profile->last_name,
    ];

    $rules = [
      'question' => 'required'
    ];

    // Validation
    $validator = Validator::make($data, $rules);

    if ($validator->fails())
    {
      return Redirect::back()
        ->withErrors($validator->errors())
        ->withInput();
    }

    // Action
    Mail::send('emails.support', $data, function($message) use ($email, $name)
    {
      $message
        ->from($email, $name)
        ->to('josh@getnovelize.com', 'Josh Evensen')
        ->subject('Support Message');
    });

    // Return
    return Redirect::route('view_contact', [Auth::user()->id, 'type' => 'support'])
      ->with('alert_success', 'Your request has been submitted');
  }




  /*
   * Contact - Feedback Form
   */
  public function feedback()
  {
    $user = User::with('profile')->findOrFail(Auth::user()->id);
    $email = $user->email;
    $name = $user->profile->first_name . $user->profile->last_name;

    $data =
    [
      'email' => $email,
      'like' => Input::get('like'),
      'hate' => Input::get('hate'),
      'comments' => Input::get('comments'),
      'userId' => $user->id,
      'firstName' => $user->profile->first_name,
      'lastName' => $user->profile->last_name,
    ];

    $rules = [
    ];

    // Validation
    $validator = Validator::make($data, $rules);

    if ($validator->fails())
    {
      return Redirect::back()
        ->withErrors($validator->errors())
        ->withInput();
    }

    // Action
    Mail::send('emails.feedback', $data, function($message) use ($email, $name)
    {
      $message
        ->from($email, $name)
        ->to('josh@getnovelize.com', 'Josh Evensen')
        ->subject('Feedback Message');
    });

    // Return
    return Redirect::route('view_contact', [Auth::user()->id, 'type' => 'feedback'])
      ->with('alert_success', 'Your feedback has been sent');
  }




  /*
   * Contact - Bug Report Form
   */
  public function bug()
  {
    $user = User::with('profile')->findOrFail(Auth::user()->id);
    $email = $user->email;
    $name = $user->profile->first_name . $user->profile->last_name;

    $data =
    [
      'email' => $email,
      'details' => Input::get('details'),
      'os' => Input::get('os'),
      'browser' => Input::get('browser'),
      'userId' => $user->id,
      'firstName' => $user->profile->first_name,
      'lastName' => $user->profile->last_name,
    ];

    $rules = [
      'details' => 'required',
      'os' => 'required',
      'browser' => 'required'
    ];

    // Validation
    $validator = Validator::make($data, $rules);

    if ($validator->fails())
    {
      return Redirect::back()
        ->withErrors($validator->errors())
        ->withInput();
    }

    // Action
    Mail::send('emails.bug', $data, function($message) use ($email, $name)
    {
      $message
        ->from($email, $name)
        ->to('josh@getnovelize.com', 'Josh Evensen')
        ->subject('Bug Report');
    });

    // Return
    return Redirect::route('view_contact', [Auth::user()->id, 'type' => 'bug'])
      ->with('alert_success', 'The report has been sent');
  }

}