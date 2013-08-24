<table cellpadding="0" cellspacing="0" border="0" class="responsive dynamicTable display table table-bordered" width="100%">
	<thead>
		<tr>
			<th>
				Id
			</th>
			<th>
				Responsable
			</th>
			<th>
				Acciones
			</th>
		</tr>
	</thead>		
	<tbody>		
		<?php foreach ($responsables as $key) { ?>
		<tr>
			<td>
				<?php echo $key['res_id']?>
			</td>				
			<td>
				<?php echo $key['res_nombre'].' '.$key['res_apellido']?>
			</td>			
			<td>
				<a data-toggle="modal" href="#historial" data-id="<?php echo $key['res_id'] ?>" onclick="cargar_recorrido(<?php echo $key['res_id'] ?>)" title="Ver recorrido"><span aria-hidden="true" class="icon16 icomoon-icon-truck"></span></a>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
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