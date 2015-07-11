<!DOCTYPE html>
<html lang="es">
	<head>
	    <title>Mi Red Social</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	    <link href="<?php echo $this->BaseUrl('Assets/css/bootstrap.css'); ?>" rel="stylesheet" />
	    <link href="<?php echo $this->BaseUrl('Assets/css/bootstrap-theme.min.css'); ?>" rel="stylesheet" />
	</head>
	<body>
		<div class="container">
			<H1>Mi Red Social</h1>
			<p>Red Social de Estudio</p>

			<div class="row">
				<div class="col-md-6">
					<h2>Acceder</h2>
					<form class="form-inline" role="form">
					  <div class="form-group">
					    <label class="sr-only" for="exampleInputEmail2">Email address</label>
					    <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Enter email">
					  </div>
					  <div class="form-group">
					    <label class="sr-only" for="exampleInputPassword2">Password</label>
					    <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
					  </div>
					  <button type="submit" class="btn btn-default">Ingresar</button>
					</form>
				</div>
				<div class="col-md-6">
					<div class="well well-sm">
						<h2>Nuevo Usuario</h2>
						<form role="form" method="post" action="<?php echo $this->BaseUrl('index.php/login/ingresar'); ?>">
						  <div class="form-group">
						    <label>Email</label>
						    <input type="email" name="Correo" class="form-control" placeholder="Ingrese su email." required autocomplete="off" />
						  </div>
						  <div class="form-group">
						    <label>Contraseña</label>
						    <input type="text" name="Contrasena" class="form-control" placeholder="Ingrese una contraseña." required autocomplete="off" />
						  </div>
						  <div class="form-group">
						    <label>Nombre</label>
						    <input type="text" name="Nombre" class="form-control" placeholder="Ingrese su nombre." required autocomplete="off" />
						  </div>
						  <div class="form-group">
						    <label>Apellido</label>
						    <input type="text" name="Apellido" class="form-control" placeholder="Ingrese su apellido." required autocomplete="off" />
						  </div>
						  <button type="submit" class="btn btn-default">Registrarme</button>
						</form>
					</div>
				</div>
			</div>

			<hr />

			<div class="text-center">
				Desarrollado a manera de Estudio por <a href="http://www.anexsoft.com" target="_blank">Anexsoft</a>
			</div>
		</div>

		<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	    <script src="<?php echo _BASE_URL_; ?>Assets/js/bootstrap.min.js"></script>
	</body>
</html>