<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="utf-8">
  </head>

  <body>
    <p>Details of the bug:</p>
    <p style="margin: 5px 0 15px;">{{ $details }}</p>

    <p>What OS they have:</p>
    <p style="margin: 5px 0 15px;">{{ $os }}</p>

    <p>What browser they are using:</p>
    <p style="margin: 5px 0 15px;">{{ $browser }}</p>

    <p>From:</p>
    <p>{{ $firstName }} {{ $lastName }} (User Id: {{ $userId }})</p>
  </body>
</html>