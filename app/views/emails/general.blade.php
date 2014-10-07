<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="utf-8">
  </head>

  <body>
    <p>Subject: {{ $subject }}</p>

    <div>{{ $body }}</div>

    <p>Sincerely,</br>
      {{ $firstName }} {{ $lastName }} ({{ $userId }})</p>
  </body>
</html>