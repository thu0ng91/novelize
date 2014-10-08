<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="utf-8">
  </head>

  <body>
    <p>What they like about Novelize:</p>
    <p style="margin: 5px 0 15px;">{{ $like }}</p>

    <p>What they hate about Novelize:</p>
    <p style="margin: 5px 0 15px;">{{ $hate }}</p>

    <p>What else is on their mind:</p>
    <p style="margin: 5px 0 15px;">{{ $comments }}</p>

    <p>From:</p>
    <p>{{ $firstName }} {{ $lastName }} (User Id: {{ $userId }})</p>
  </body>
</html>