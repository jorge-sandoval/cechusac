/*
* Script principal para CyD
*/

$(document).ready(function () {
    $("body").on('click', 'button', function () {

        // Si el boton no tiene el atributo ajax no hacemos nada
        if ($(this).data('ajax') == undefined) return;

        // El metodo .data identifica la entrada y la castea al valor más correcto
        if ($(this).data('ajax') != true) return;

        var form = $(this).closest("form");
        var buttons = $("button", form);
        var button = $(this);
        var url = form.attr('action');

        if (button.data('confirm') != undefined)
        {
            if (button.data('confirm') == '') {
                if (!confirm('¿Esta seguro de realizar esta acción?')) return false;
            } else {
                if (!confirm(button.data('confirm'))) return false;
            }
        }

        //if (!form.valid()) {
         //   return false;
        //}

        // Creamos un div que bloqueara todo el formulario
        var block = $('<div class="block-loading" />');
        form.prepend(block);

        // En caso de que haya habido un mensaje de alerta
        $(".alert", form).remove();

        // Para los formularios que tengan CKupdate
        if (form.hasClass('CKupdate')) CKupdate();

        form.ajaxSubmit({
            dataType: 'JSON',
            type: 'POST',
            url: url,
            success: function (r) {
                block.remove();
                if (r.response) {
                    if (!button.data('reset') != undefined) {
                        if (button.data('reset')) form.reset();
                    }
                }

                // Mostrar mensaje
                if (r.message != null) {
                    if (r.message.length > 0) {
                        var css = "";
                        if (r.response) css = "alert-success";
                        else css = "alert-danger";

                        var message = '<div class="alert ' + css + ' alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' + r.message + '</div>';
                        form.prepend(message);
                    }
                }

                // Ejecutar funciones
                if (r.function != null) {
                    setTimeout(r.function, 0);
                }
                // Redireccionar
                if (r.href != null) {
                    if (r.href == 'self') window.location.reload(true);
                    else redirect(r.href);
                }
            }
        });

        return false;
    })

    Plugins();
})

function Plugins()
{
    $('.wysiwyg').ckeditor({ 
        height: 400
    });
}

function CKupdate() {
    for (instance in CKEDITOR.instances)
        CKEDITOR.instances[instance].updateElement();
}

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

jQuery.fn.reset = function () {
    $("input:password,input:file,input:text,textarea", $(this)).val('');
    $("input:checkbox:checked", $(this)).click();
    $("select", $(this)).val(0);
};

function jqGridCreateLink(href, display) {
    return '<a style="display:block;" href="' + base_url(href) + '">' + display + '</a>';;
}

function jqGridStart(id, pager, url, conf) {
    var grid = $("#" + id);

    var start = {
        url: base_url(url),
        datatype: 'json',
        mtype: 'POST',
        rowNum: 20,
        rowList: [20, 30, 100],
        pager: '#' + pager,
        sortname: (conf.sortname == undefined ? 'id' : null),
        sortorder: (conf.sortorder == undefined ? 'desc' : null),
        viewrecords: true,
        autowidth: true,
        height: 'auto',
        filterToolbar: true
    };

    for (key in conf) {
        start[key] = conf[key];
    }

    grid.jqGrid(start);

    return grid;
}