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
				<?php echo $key['id']?>
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
				<a href="<?php echo base_url()?>facturas/lista/seleccionar/<?php echo $key['id'] ?>" title="Seleccionar"><span aria-hidden="true" class="icomoon-icon-checkmark-2"></span></a>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
