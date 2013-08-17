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
				<a href="<?php echo base_url()?>facturas/responsable/asignar/<?php echo $key['fac_id'] ?>" title="Asignar responsable"><span aria-hidden="true" class="icon-user"></span></a> | 
				<a href="<?php echo base_url()?>facturas/responsable/regresar/<?php echo $key['fac_id'] ?>" title="Regresar a paso anterior"><span aria-hidden="true" class="iconic-icon-undo"></span></a> | 
				<a href="<?php echo base_url()?>facturas/responsable/regresar/<?php echo $key['fac_id'] ?>" title="Ver historial"><span aria-hidden="true" class="minia-icon-calendar-2"></span></a>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
