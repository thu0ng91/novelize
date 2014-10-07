<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="utf-8">
  </head>

  <body>
    <p>Details:</p>
    <div>{{ $details }}</div>

    <p>OS: {{ $os }}</p>

    <p>Browser: {{ $browser }}</p>

    <p>Sincerely,</br>
      {{ $firstName }} {{ $lastName }} ({{ $userId }})</p>
  </body>
</html>