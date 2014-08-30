<?php

class MailController extends \BaseController {

  /*
   * Support Mail
   */
  public function support()
  {
    $user = User::with('profile')->findOrFail(Auth::user()->id);
    $data = 
    [
      'email' => $user->email,
      'subject' => Input::get('subject'),
      'body' => Input::get('body'),
      'userId' => $user->id,
      'firstName' => $user->profile->first_name,
      'lastName' => $user->profile->last_name,
    ];
    $email = $user->email;
    $name = $user->profile->first_name . $user->profile->last_name;

    $rules = [];

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
    return Redirect::route('view_support', Auth::user()->id)
      ->with('alert_success', 'Your email has been sent');
  }

  /*
   * Contact Mail
   */
  public function contact()
  {
    $data = Input::all();
    $rules = [
      'email' => 'required|email',
      'name' => 'required',
      'subject' => 'required',
      'body' => 'required'
    ];
    $email = Input::get('email');
    $name = Input::get('name');

    // Validation
    $validator = Validator::make($data, $rules);

    if ($validator->fails())
    {
      return Redirect::back()
        ->withErrors($validator->errors())
        ->withInput();
    }

    // Action
    Mail::send('emails.contact', $data, function($message) use ($email, $name)
    {
      $message
        ->from($email, $name)
        ->to('josh@getnovelize.com', 'Josh Evensen')
        ->subject('Contact Message');
    });

    // Return
    return Redirect::route('contact_page')
      ->with('alert_success', 'Your message has been sent');
  }

}