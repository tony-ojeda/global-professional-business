<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0, shrink-to-fit=no">
		<title>GPB</title>
	</head>
	<body class="mail">
		<div class="body" style="background-color:#f2f3f8;padding:30px 15px;">
			<div class="content" style="max-width:600px;padding:30px;background-color:#FFF;margin:0 auto;font-family:Arial,sans-serif;">
				<img src="{{ asset('frontend/img/logo-negro.png') }}" alt="" style="display:block;width:150px;height:auto;margin:0 0 0 auto;">
                <h3>Tu nueva clave es: {{ $password }}</h3>
			</div>
		</div>
	</body>
</html>
