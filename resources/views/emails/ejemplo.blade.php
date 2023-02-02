<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<div class="card text-bg-dark">
	<img src="{{ asset('images/Laravel.png') }}" class="card-img" alt="">
	<div class="card-img-overlay">
	  <h5 class="card-title">Link para recuperar cuenta</h5>
	  <p class="card-text">Da clic en el siguiente link y reestablece tu contraseña</p>
	  <p class="card-text"><small>{!! $texto !!}</small></p>
	</div>
  </div>
</body>
</html>