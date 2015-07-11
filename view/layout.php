<!DOCTYPE html>
<html lang="es">
	<head>
	    <title>Productos</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	    <link href="<?php echo $this->BaseUrl('assets/css/bootstrap.css'); ?>" rel="stylesheet" />
	    <link href="<?php echo $this->BaseUrl('assets/css/bootstrap-theme.min.css'); ?>" rel="stylesheet" />

		<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

		<script>
		function base_url(url) { return '<?php echo $this->BaseUrl('index.php/'); ?>' + url; } function redirect(href) { window.location.href = '<?php echo $this->BaseUrl('index.php/'); ?>' + href; }
		function AjaxPopupModal(id, title, url, params)
		{
			$("#" + id).remove();
		    $("body").append('<div data-backdrop="static" id="' + id + '" class="modal fade"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title">' + title + '</h4></div><div class="modal-body"></div></div></div></div>');
		    $("#" + id).modal();

		    // Cargando
		    $("#" + id).find('.modal-body').html('<blink>Estamos cagando el formulario ..</blink>');
		    $.post(base_url(url),params, function(r){
		    	$("#" + id).find('.modal-body').html(r);
		    });
		}
		</script>

	</head>
	<body>
		<div class="container">
			<div class="page-header">			
			<h1><a href="<?php echo $this->BaseUrl(''); ?>">Productos</a> </h1> 
			</div>

			<?php require_once $this->View; ?>

			<div class="clearfix"></div>

			<!-- <footer class="well well-sm">
				<div class="row">
					<div class="col-md-4 text-center">
						<a href="<?php echo $this->BaseUrl('index.php/inicio/nosotros'); ?>">Nosotros</a>
					</div>
					<div class="col-md-4 text-center">
						<a href="<?php echo $this->BaseUrl('index.php/inicio/mision'); ?>">Misión</a>
					</div>
					<div class="col-md-4 text-center">
						<a href="<?php echo $this->BaseUrl('index.php/inicio/vision'); ?>">Vision</a>
					</div>
				</div >
			</footer>
 -->
			<p class="text-center">
				<a class="btn btn-block btn-primary" href="<?php echo $this->BaseUrl('index.php/admin/inicio'); ?>">Administrar Website</a>
			</p>
			<!-- <p class="text-center"><a href="http://www.anexsoft.com" target="_blank">Desarrollado por Anexsoft</a></p> -->
		</div>

	    <script src="<?php echo $this->BaseUrl('assets/js/bootstrap.min.js'); ?>"></script>
	    <script src="<?php echo $this->BaseUrl('assets/js/masonry.pkgd.min.js'); ?>"></script>
	</body>
</html>