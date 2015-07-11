<div class="page-header">
	<h1>
        <?php echo $_REQUEST['tipo'] == 1 ? 'Páginas' : 'Blog'; ?> 
        <a href="<?php echo $this->BaseUrl('index.php/admin/entrada/ver/?tipo=' . $_REQUEST['tipo']); ?>" class="pull-right btn btn-default">
            <i class="glyphicon glyphicon-plus"></i> Nuevo
        </a>
    </h1>
</div>

<div class="well well-sm table-responsive">
    <div id="products"><table id="list1"></table><div id="pager1"></div></div>
</div>

<script>
    $(document).ready(function () {
        CargarEntradas();
    })

    function CargarEntradas() {
        var config = {
            colNames: ['Nombre', 'Lectura', 'Fecha'],
            colModel: [
                {
                    name: 'Nombre', index: 'Nombre', formatter: function (cellvalue, options, rowObject) {
                        return jqGridCreateLink('entrada/ver/?id=' + rowObject.id, cellvalue);
                    }
                },
                {name: 'Lectura', index: 'Lectura', width: 30},
                {name: 'Fecha', index: 'Fecha', width: 30}
            ]
        };

        jqGridStart('list1', 'pager1', 'entrada/listar/?tipo=<?php echo $_REQUEST['tipo']; ?>', config);
    }
</script>