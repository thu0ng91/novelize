<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="utf-8">
  </head>

  <body>
    <p>Subject:</p>
    <p style="margin: 5px 0 15px;">{{ $subject }}</p>

    <p>Message:</p>
    <p style="margin: 5px 0 15px;">{{ $body }}</p>

    <p>From:</p>
    <p>{{ $firstName }} {{ $lastName }} (User Id: {{ $userId }})</p>
  </body>
</html>