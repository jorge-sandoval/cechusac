 <div id="news" class="row">
 <?php foreach($this->Attach as $k => $e): ?>

	<div class="item col-md-4 col-sm-6 col-xs-12"
    style="cursor:pointer;"
    data-id="<?php echo $e->idproducto; ?>"
    data-nombre="<?php echo htmlspecialchars($e->nombreproducto); ?>">

    <div class="row well well-sm">
      <div class="col-xs-12">

        <div class="row">
          <div class="col-xs-12">
            <img src="<?php echo $this->BaseUrl('uploads/' . $e->imagenURL); ?>" class="img-thumbnail" />
          </div>
        </div>
        <div class="row">
          <div class="col-xs-7">
            <h3><?php echo $e->nombreproducto; ?></h3>
            <p><?php echo $e->decripcionproducto; ?></p>
          </div>
          <div class="col-xs-5">
            <img height="80%" src="<?php echo $this->BaseUrl('uploads/carrito-popup.png'); ?>"
            class="img-thumbnail add-carrito" data-id="<?php echo $e->idproducto; ?>"/>
          </div>
        </div>

      </div>
    </div>

	</div>

 <?php endforeach; ?>
</div>



<script>
	$(document).ready(function(){
		var container = document.querySelector('#news');
		var msnry = new Masonry( container, {  // options
		  itemSelector: '.item'
		});
    /*
		$("#news .item").click(function(){
			CargarEntrada($(this).data('nombre'), $(this).data('id'));
		})
    */

    $("#news .add-carrito").click(function(){
      agregarAlCarrito($(this).data('id'));
    })
	})

	  function agregarAlCarrito(id){
		$.post(base_url('pedidohasproducto/registar/?id='+id),{}, function(r){
		  console.log(r);
		});
		/*
		$.ajax({
		 type: "GET",
		 url: 'pedidohasproducto/registar/?id='+id,
		 success:function(html) {
		   alert(html);
		 }
	
	   });*/
	  }

	function CargarEntrada(titulo, id)
	{

		AjaxPopupModal('mEntrada', titulo, 'inicio/entrada/?id=' + id);
	}
</script>
