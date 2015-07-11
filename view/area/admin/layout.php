<!DOCTYPE html>
<html lang="es">
	<head>
	    <title>Mi CMS</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	    <link href="<?php echo $this->BaseUrl('assets/admin/css/bootstrap.css'); ?>" rel="stylesheet" />
	    <link href="<?php echo $this->BaseUrl('assets/admin/css/bootstrap-theme.min.css'); ?>" rel="stylesheet" />

	    <!-- jqgrid -->
	    <link href="<?php echo $this->BaseUrl('assets/admin/js/jqGrid/css/ui.jqgrid.css'); ?>" rel="stylesheet" />

	    <!-- jquery-ui CSS -->
		<link href="<?php echo $this->BaseUrl('assets/admin/js/jquery-ui/css/overcast/jquery-ui-1.10.4.custom.min.css'); ?>" rel="stylesheet">

	    <!-- CKEditor -->
	    <link href="<?php echo $this->BaseUrl('assets/admin/js/ckeditor/'); ?>" rel="stylesheet" />

		<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

		<style>
			.cke_dialog_ui_input_file{height:400px;}
		</style>
	</head>
	<body>

		<script>
			function base_url(url) { return '<?php echo $this->BaseUrl('index.php/admin/'); ?>' + url; } function redirect(href) { window.location.href = '<?php echo $this->BaseUrl('index.php/admin/'); ?>' + href; }
		</script>

		<div class="container">

			<nav class="navbar navbar-default" role="navigation">
			  <div class="container-fluid">
			    <!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			      <a class="navbar-brand" href="#">CMS Administrador</a>
			    </div>

			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			      <ul class="nav navbar-nav">
			        <li class="active"><a href="#">Inicio</a></li>
			        <li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Entradas <b class="caret"></b></a>
			          <ul class="dropdown-menu">
			            <li><a href="<?php echo $this->BaseUrl('index.php/admin/entrada/listar/?tipo=1'); ?>">Páginas</a></li>
			            <li><a href="<?php echo $this->BaseUrl('index.php/admin/entrada/listar/?tipo=2'); ?>">Blog</a></li>
			          </ul>
			        </li>
			      </ul>
			      <ul class="nav navbar-nav navbar-right">
			        <li><a href="<?php echo $this->BaseUrl(''); ?>">Ver la página</a></li>
			      </ul>
			    </div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
			</nav>

			<?php require_once $this->View; ?>

			<hr />

			<div class="text-center">
				Desarrollado a manera de Estudio por <a href="http://www.anexsoft.com" target="_blank">Anexsoft</a>
			</div>
			
		</div>

	    <script src="<?php echo $this->BaseUrl('assets/admin/js/bootstrap.min.js'); ?>"></script>
	    <script src="<?php echo $this->BaseUrl('assets/admin/js/ini.js'); ?>"></script>
	    <script src="<?php echo $this->BaseUrl('assets/admin/js/jquery.form.js'); ?>"></script>
	    <script src="<?php echo $this->BaseUrl('assets/admin/js/jqGrid/js/jquery.jqGrid.min.js'); ?>"></script>
	    <script src="<?php echo $this->BaseUrl('assets/admin/js/jqGrid/js/i18n/grid.locale-es.js'); ?>"></script>

	    <!-- CKEditor -->
	    <script src="<?php echo $this->BaseUrl('assets/admin/js/ckeditor/ckeditor.js'); ?>"></script>
	    <script src="<?php echo $this->BaseUrl('assets/admin/js/ckeditor/adapters/jquery.js'); ?>"></script>
	    <script src="<?php echo $this->BaseUrl('assets/admin/js/ckeditor/lang/es.js'); ?>"></script>

	    <!-- jQuery UI -->
	    <script src="<?php echo $this->BaseUrl('assets/admin/js/jquery-ui/js/jquery-ui-1.10.4.custom.min.js'); ?>"></script>
	</body>
</html>