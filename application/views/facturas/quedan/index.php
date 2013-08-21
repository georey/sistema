<table cellpadding="0" cellspacing="0" border="0" class="responsive dynamicTable display table table-bordered" width="100%">
	<thead>
		<tr>
			<th>
				Id
			</th>
			<th>
				Documento
			</th>	
			<th>
				Cliente
			</th>
			<th>
				Valor
			</th>
            <th>
                Responsable
            </th>
            <th>
				Ingreso
			</th>
			<th>
				Acciones
			</th>
		</tr>
	</thead>		
	<tbody>		
		<?php foreach ($facturas as $key) { ?>
		<tr>
			<td>
				<?php echo $key['fac_id']?>
			</td>				
			<td>
				<?php echo $key['documento']?>
			</td>
			<td>
				<?php echo $key['cliente']?>
			</td>
			<td>
				<?php echo $key['valor']?>
			</td>
            <td>
                <?php echo $key['res_nombre'].' '.$key['res_apellido']?>
            </td>
            <td>
				<?php echo $key['ingreso']?>
			</td>
			<td>
				<a data-toggle="modal" href="#asignar" data-id="<?php echo $key['fac_id'] ?>" onclick="javascript:$('#fac_id').attr('value',$(this).attr('data-id'))" title="Asignar monto"><span aria-hidden="true" class="entypo-icon-document"></span></a> | 
				<a href="<?php echo base_url()?>facturas/recepcion/regresar/<?php echo $key['fac_id'] ?>" title="Regresar a paso anterior"><span aria-hidden="true" class="iconic-icon-undo"></span></a> | 
				<a data-toggle="modal" href="#historial" data-id="<?php echo $key['fac_id'] ?>" onclick="cargar_historial(<?php echo $key['fac_id'] ?>)" title="Ver historial"><span aria-hidden="true" class="minia-icon-calendar-2"></span></a> | 
				<a href="<?php echo base_url()?>facturas/recepcion/finalizar/<?php echo $key['fac_id'].'/'.$key['valor'].'/'.$key['ingreso'] ?>" title="Finalizar"><span aria-hidden="true" class="minia-icon-checkmark"></span></a> | 
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
<div class="modal fade hide" id="asignar">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h3>Asignar quedan</h3>
    </div>
    <div class="modal-body">
    	<div class="box">            
            <div class="content">               
                <form class="form-horizontal" method="POST">
                	<div class="form-row row-fluid">
                        <div class="span12">
                            <div class="row-fluid">
                                <label class="form-label span4" for="nombres">quedan</label>
                                <input type="text" class="span8 text" id="quedan" type="text" name="quedan">
                            </div>
                        </div>
                    </div>
 					<div class="form-row row-fluid">
                        <div class="span12">
                            <div class="row-fluid">
                                <label class="form-label span4" for="nombres">Observaciones</label>
                                <textarea class="span8 text" id="obs" type="text" name="obs"></textarea>
                            </div>
                        </div>
                    </div>					
					<div class="form-actions">
                        <input type="hidden" id="fac_id" name="fac_id">
                       <button type="submit" class="btn btn-info">Guardar</button>
                       <button type="button" class="btn">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#" class="btn" data-dismiss="modal">Cerrar</a>
    </div>
</div>

<div class="modal fade hide" id="historial">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h3>Historial</h3>
    </div>
    <div class="modal-body">
        <div class="box">
            <div class="content">               
                <div id="tabla_historial"></div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#" class="btn" data-dismiss="modal">Cerrar</a>
    </div>
</div>
<script src="<?php echo base_url("js/facturas/responsable.js"); ?>"></script>