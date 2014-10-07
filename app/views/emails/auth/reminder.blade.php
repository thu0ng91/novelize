<!DOCTYPE html>
<html lang="en-US">

<head>
	<meta charset="utf-8">
</head>


<body>
	<h2>Novelize| Password Reset</h2>

	<div>
		To reset your Novelize password, follow this link and complete the new password form: {{ URL::route('reset_page', array($token)) }}.<br/>
		This link will expire in {{ Config::get('auth.reminder.expire', 60) }} minutes.
	</div>
</body>

</html>