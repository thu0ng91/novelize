<?php

/*
 * Mail Routes
 */
Route::post( 'mail/general', [
  'as' => 'mail_general',
  'uses' => 'MailController@general'
]);
Route::post( 'mail/support', [
  'as' => 'mail_support',
  'uses' => 'MailController@support'
]);
Route::post( 'mail/feedback', [
  'as' => 'mail_feedback',
  'uses' => 'MailController@feedback'
]);
Route::post( 'mail/bug', [
  'as' => 'mail_bug',
  'uses' => 'MailController@bug'
]);