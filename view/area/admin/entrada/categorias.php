<!--Listar-->
<?php if($this->Attach['action'] == 'listar'): ?>
	<label>Categorías Asignadas:</label>
	<div class="well well-sm">
		<?php foreach($this->Attach['Categorias'] as $c): ?>
			<?php
				$encontrado = false;
				foreach($this->Attach['Relaciones'] as $r)
				{
					if($r->Categoria_id == $c->id) $encontrado = true;
				}
			?>
			<div class="checkbox">
			  <label>
			    <input name="Categorias[]" type="checkbox" value="<?php echo $c->id; ?>" <?php echo $encontrado ? "checked" : ""; ?>>
			    <?php echo $c->Nombre; ?>
			  </label>
			  <small><a href="#" class="aCategoria" data-id="<?php echo $c->id; ?>">[ Editar ]</a></small>
			</div>
		<?php endforeach; ?>
		<div class="form-group">
			<input id="txtCategoriaAgregar" class="form-control" type="text" placeholder="Ingrese un nombre" value="" />
			<span class="help-block">Escriba un nombre y presione ENTER.</span>
		</div>
	</div>

	<script>
		$("document").ready(function(){
			$(".aCategoria").click(function(){
				var id = $(this).data('id');

				$("#categorias").load(base_url('entrada/categorias/?action=ver&id=' + id));
				return false;
			});

		    $("#txtCategoriaAgregar").keyup(function (e) {
		        if (e.keyCode == 13) {
					$.post(base_url('entrada/categorias'), {
						action: 'registrar',
						Nombre: $(this).val()
					}, function(r){
						if(r.response) CargarCategorias();
						else alert(r.message);
					}, 'json')

		            return false;
		        }
		    });
		})
	</script>
<?php endif; ?>

<!--Editar-->
<?php if($this->Attach['action'] == 'ver'): ?>
	<label>Editando categoría:</label>
	<div class="well well-sm">
		<div class="row">
			<div class="col-xs-10">
				<input id="txtCategoria_<?php echo $this->Attach['Categoria']->id; ?>" class="form-control" data-id="<?php echo $this->Attach['Categoria']->id; ?>" type="text" placeholder="Ingrese un nombre" value="<?php echo $this->Attach['Categoria']->Nombre; ?>" />
			</div>
			<div class="col-xs-1">
				<button type="button" class="btn btn-danger btn-block btnCategoriaEliminar" title="Eliminar" data-id="<?php echo $this->Attach['Categoria']->id; ?>">
					<i class="glyphicon glyphicon-trash"></i>
				</button>
			</div>
			<div class="col-xs-1">
				<button type="button" class="btn btn-default btn-block btnCategoriaGuardar" title="Guardar" data-id="<?php echo $this->Attach['Categoria']->id; ?>">
					<i class="glyphicon glyphicon-floppy-disk"></i>
				</button>
			</div>
		</div>
	</div>

	<script>
		$("document").ready(function(){
			$(".btnCategoriaGuardar").click(function(){
				var id = $(this).data('id');

				$.post(base_url('entrada/categorias'), {
					action: 'actualizar',
					id: id,
					Nombre: $("#txtCategoria_<?php echo $this->Attach['Categoria']->id; ?>").val()
				}, function(r){
					if(r.response) CargarCategorias();
					else alert(r.message);
				}, 'json')
			});
			$(".btnCategoriaEliminar").click(function(){
				var id = $(this).data('id');

				$.post(base_url('entrada/categorias'), {
					action: 'eliminar',
					id: id
				}, function(r){
					if(r.response) CargarCategorias();
					else alert(r.message);
				}, 'JSON')
			});

			$(".aCategoria").click(function(){
				var id = $(this).data('id');

				$("#categorias").load(base_url('entrada/categorias/?action=ver&id=' + id));
				return false;
			});
		})
	</script>
<?php endif; ?>