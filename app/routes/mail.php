<?php

/*
 * Mail Routes
 */
Route::put( 'mail/support', [
  'as' => 'send_support',
  'uses' => 'MailController@support'
]);
Route::post( 'mail/contact', [
  'as' => 'send_contact',
  'uses' => 'MailController@contact'
]);