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
				<h3>Nuevo mensaje</h3>
                <p style="margin:0 0 5px;font-size:11px;text-transform:uppercase;color:#787874;">NOMBRE DE LA EMPRESA:</p>
                <p style="margin:0 0 20px;font-size:15px;">{{ $mail_info['business_name'] }}</p>
                <p style="margin:0 0 5px;font-size:11px;text-transform:uppercase;color:#787874;">NOMBRE COMPLETO:</p>
                <p style="margin:0 0 20px;font-size:15px;">{{ $mail_info['full_name'] }}</p>
                <p style="margin:0 0 5px;font-size:11px;text-transform:uppercase;color:#787874;">DIRECCIÓN DE CORREO ELECTRÓNICO:</p>
                <p style="margin:0 0 20px;font-size:15px;">{{ $mail_info['email'] }}</p>
                <p style="margin:0 0 5px;font-size:11px;text-transform:uppercase;color:#787874;">NÚMERO DE TELÉFONO:</p>
                <p style="margin:0 0 20px;font-size:15px;">{{ $mail_info['phone'] }}</p>
                <p style="margin:0 0 5px;font-size:11px;text-transform:uppercase;color:#787874;">URL DE SU EMPRESA:</p>
                <p style="margin:0 0 20px;font-size:15px;">{{ $mail_info['website'] }}</p>
                <p style="margin:0 0 5px;font-size:11px;text-transform:uppercase;color:#787874;">MENSAJE:</p>
                <p style="margin:0 0 20px;font-size:15px;">{{ $mail_info['message'] }}</p>
                <p style="margin:0 0 5px;font-size:11px;text-transform:uppercase;color:#787874;">PAÍS:</p>
                <p style="margin:0 0 20px;font-size:15px;">{{ $mail_info['country'] }}</p>
                <p style="margin:0 0 5px;font-size:11px;text-transform:uppercase;color:#787874;">TIPO DE CONSULTA:</p>
                <p style="margin:0 0 20px;font-size:15px;">{{ implode(', ', $mail_info['request_types']) }}</p>
			</div>
		</div>
	</body>
</html>
