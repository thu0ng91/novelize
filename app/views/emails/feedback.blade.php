<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="utf-8">
  </head>

  <body>
    <p>Like:</p>
    <div>{{ $like }}</div>

    <p>Hate:</p>
    <div>{{ $hate }}</div>

    <p>Comments:</p>
    <div>{{ $comments }}</div>

    <p>Sincerely,</br>
      {{ $firstName }} {{ $lastName }} ({{ $userId }})</p>
  </body>
</html>