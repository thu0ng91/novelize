<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="utf-8">
  </head>

  <body>
    <p>Their question was:</p>
    <p style="margin: 5px 0 15px;">{{ $question }}</p>

    <p>Details:</p>
    <p style="margin: 5px 0 15px;">{{ $details }}</p>

    <p>From:</p>
    <p>{{ $firstName }} {{ $lastName }} (User Id: {{ $userId }})</p>
  </body>
</html>