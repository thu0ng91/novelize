<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="utf-8">
  </head>

  <body>
    <p>Question: {{ $question }}</p>

    <div>{{ $details }}</div>

    <p>Sincerely,</br>
      {{ $firstName }} {{ $lastName }} ({{ $userId }})</p>
  </body>
</html>