<div class="page-header">
	<h1><?php echo $this->Attach['Entrada']->id == 0 ? 'Nuevo Registro' : $this->Attach['Entrada']->Nombre; ?></h1>
</div>

<ol class="breadcrumb">
  <li><a href="<?php echo $this->BaseUrl('index.php/admin/entrada/listar/?tipo=' . $this->Attach['Entrada']->Tipo); ?>"><?php echo $this->Attach['Entrada']->Tipo == 1 ? 'Páginas' : 'Blog'; ?> </a></li>
  <li class="active"><?php echo $this->Attach['Entrada']->id == 0 ? 'Nuevo Registro' : $this->Attach['Entrada']->Nombre; ?></li>
</ol>

<form action="<?php echo $this->BaseUrl('index.php/admin/entrada/guardar'); ?>" method="POST">

	<input type="hidden" name="id" value="<?php echo $this->Attach['Entrada']->id; ?>" />
	<input type="hidden" name="Tipo" value="<?php echo $this->Attach['Entrada']->Tipo; ?>" />

	<div class="form-group">
		<label>Nombre</label>
		<input type="text" name="Nombre" class="form-control" value="<?php echo htmlspecialchars($this->Attach['Entrada']->Nombre); ?>" />
	</div>

	<div class="form-group">
		<label>Descripcion</label>
		<textarea class="form-control" name="Descripcion"><?php echo $this->Attach['Entrada']->Descripcion; ?></textarea>
	</div>

	<div class="form-group">
		<label>Contenido <a class="aArchivo" href="#"><small>Adjuntar un archivo</small></a></label>
		<textarea class="wysiwyg" name="Contenido"><?php echo $this->Attach['Entrada']->Contenido; ?></textarea>
	</div>

	<div class="form-group">
		<label>Tags</label>
		<textarea class="form-control" name="Tags"><?php echo $this->Attach['Entrada']->Tags; ?></textarea>
	</div>

	<div id="categorias"></div>

	<?php if($this->Attach['Entrada']->id > 0): ?>

	<div class="form-group">
		<label>Lecturas</label>
		<p class="form-control-static"><?php echo $this->Attach['Entrada']->Lectura; ?></p>
	</div>

	<div class="form-group">
		<label>Fecha</label>
		<p class="form-control-static"><?php echo $this->Attach['Entrada']->Fecha; ?></p>
	</div>

	<?php endif; ?>

	<?php if($this->Attach['Entrada']->Tipo == 2): ?>
		<div class="form-group">
			<label>Imagen Destacada</label>
			<input type="file" name="upload" />
		</div>
	<?php endif; ?>

	<?php if(!is_null($this->Attach['Entrada']->Imagen)): ?>
		<img class="img-thumbnail" src="<?php echo $this->BaseUrl('uploads/' . $this->Attach['Entrada']->Imagen); ?>" />
	<?php endif; ?>

	<hr />

	<button type="submit" data-ajax="true" class="btn btn-default">Guardar</button>

</form>


<script>
	$("document").ready(function(){
		<?php if($this->Attach['Entrada']->Tipo == 2): ?>
			CargarCategorias();			
		<?php endif; ?>

		$(".aArchivo").click(function(){
			CargarArchivos();
		})
	})

	function CargarCategorias()
	{
		$("#categorias").load(base_url('entrada/categorias/?action=listar&entrada_id=<?php echo $this->Attach['Entrada']->id; ?>'));
	}

	function CargarArchivos()
	{
		AjaxPopupModal('mArchivo', 'Visor de Archivos', 'archivo', { render: '#mArchivo .modal-body'});
	}
</script>