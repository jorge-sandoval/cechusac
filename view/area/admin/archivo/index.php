<p>Seleccione la ruta del archivo a utilizar y adjuntela en su editor como un enlace o imagen.</p>
<form action="<?php echo $this->BaseUrl('index.php/admin/archivo/upload'); ?>">
	<button class="btn btn-default pull-right" type="submit" data-ajax="true">Adjuntar</button>
	<label>Adjuntar un nuevo archivo</label>
	<input type="file" name="upload" />
</form>
<div class="well well-sm">
	<div class="panel panel-default">
	  <div class="panel-heading">Imagenes Adjuntas</div>
	  <div class="panel-body">
	    <div class="row" style="max-height:200px;overflow-y:auto;">
    		<?php foreach($this->Attach['Archivos'] as $a): ?>
    			<?php if($a->Tipo == 1): ?>
				<div class="col-md-6">
					<div class="well well-sm">
						<div class="row">
							<div class="col-xs-4">
								<img class="img-thumbnail" src="<?php echo $this->BaseUrl('uploads/' . $a->Nombre); ?>" />
							</div>
							<div class="col-xs-8">
								<label>Ruta de la Imagen</label>
								<input type="text" class="form-control input-sm" value="<?php echo $this->BaseUrl('uploads/' . $a->Nombre); ?>" readonly />
							</div>
						</div>
					</div>
				</div>
				<?php endif; ?>
    		<?php endforeach; ?>
	    </div>
	  </div>
    <div class="panel-heading">Archivos Adjuntos</div>
    	<div style="max-height:200px;overflow-y:auto;">
			<ul class="list-group">
	    		<?php foreach($this->Attach['Archivos'] as $a): ?>
	    			<?php if($a->Tipo == 2): ?>
					<li class="list-group-item"><?php echo $this->BaseUrl('uploads/' . $a->Nombre); ?> <span class="badge badge-default"><?php echo BaseHelper::GetFileSize($a->Peso); ?></span></li>
					<?php endif; ?>
	    		<?php endforeach; ?>
			</ul>
		</div>
	</div>
</div>

<script>
	function __RefrescarArchivos()
	{
		$.post(base_url('archivo'), {
			render: '<?php echo $this->Attach['Render']; ?>'
		}, function(r){
			$("<?php echo $this->Attach['Render']; ?>").html(r);
		})
	}
</script>