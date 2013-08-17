<meta charset="utf-8" />
<style type='text/css'>
body
{
	font-family: Arial;
	font-size: 14px;
}
a {
    color: blue;
    text-decoration: none;
    font-size: 14px;
}
a:hover
{
	text-decoration: underline;
}
</style>
<script type="text/javascript">
<!--
$(document).ready(function(){
    $("#_catalogo").select2();
    $('span.checkbox_1 :checkbox').iphoneStyle({
		checkedLabel: 'Es Padre',
		uncheckedLabel: 'No es Padre'
	});
    $('#_catalogo').change(function(){
        $.ajax({
            url: 'get_hijos/' + $('#_catalogo').val()
        }).done(function(data){
            $('#_padre').html(data);
            $('#cat_tipo').val($('#_catalogo').val());
            //$('#btn_new').show();
            $('#_padre2').select2();
        });
    });
    $("#cat_new").validate({
        ignore: null,
        ignore: 'input[type="hidden"]',
        rules: {
            nombre:{required:true}
        },
        messages:{
            nombre:     "Valor Obligario."
        }
    });
});
-->
</script>
<form enctype="text/plain">
    <p><?php echo form_dropdown('cat_padre',$catalogos,'0','id="_catalogo"') ?></p>
</form>
<div style="height: 20px;"></div>
<div class="content_left">
    <form>
        <p><div id="_padre"></div></p>
        
    </form>
    <button id="btn_new" style="display: none;" class="mint">Nuevo</button>
</div>
<div class="content_right">
    <h3>Agregar Registro</h3>
    <form id="cat_new" method="post">
        <p><input id="nombre" name="nombre" type="text" placeholder="Nombre" /></p>
        <p><input id="desc" name="desc" type="text" placeholder="Descripción" /></p>
        <p><span class="custom_checkbox checkbox_1 mint">
			<input type="checkbox" id="padre" name="padre" />
		</span></p>
        
        <input type="hidden" id="cat_tipo" name="cat_tipo" value="" />
        <p><input type="submit" value="Guardar" /></p>
    </form>
</div>