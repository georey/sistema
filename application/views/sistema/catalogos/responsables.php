<div class="box">
    <div class="title">
        <h4 class="clearfix">
            <span class="left icon16 icomoon-icon-grid-view"></span>
            <span class="left">Responsables</span>
        </h4>
        <a href="#" class="minimize" style="display: none;">Minimize</a>
    </div>
    <div class="content noPad">
        <table class="responsive table table-bordered" id="checkAll">
            <thead>
              <?php 
		$numero = 1;
		if ( $responsables ): 
		foreach ($responsables->result() as $fila): ?>
		<tr>
			<td>
				<?php echo $numero++; ?>
			</td>				
			<td>
				<?php echo $fila->res_nombre; ?>
			</td>
			<td>
				<?php echo $fila->res_apellido; ?>
			</td>
			<td>
				<div class="controls center">
	                <a data-toggle="modal" data-id="<?php echo $fila->res_id; ?>"href="#editar" class="tip editar-responsable" title="Editar" aria-describedby="ui-tooltip-8"><span class="icon12 icomoon-icon-pencil"></span></a>
	                <a href="" class="tip" title="Eliminar"><span class="icon12 icomoon-icon-remove"></span></a>
	            </div>
			</td>
		</tr>
		<?php 
		endforeach;
		else: 
		?>
			<tr>
			<td>
				0				
			</td>				
			<td>
				0 Registros Encontrados
			</td>
			<td>
				
			</td>
			<td>
				
			</td>
		</tr>
	<?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<div class="modal fade hide" id="editar">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h3>Editar Responsable</h3>
    </div>
    <div class="modal-body">
    	<div class="box">
            <div class="title">

                <h4> 
                    <span>Editar Datos Responsable</span>
                </h4>
                
            </div>
            <div class="content">
               
                <form class="form-horizontal" action="#" method="POST">
                    
                    <div class="form-row row-fluid">
                        <div class="span12">
                            <div class="row-fluid">
                                <label class="form-label span4" for="nombres">Nombres</label>
                                <input class="span8 text" id="normalInput" type="text" name="nombres">
                            </div>
                        </div>
                    </div>

 					<div class="form-row row-fluid">
                        <div class="span12">
                            <div class="row-fluid">
                                <label class="form-label span4" for="nombres">Apellidos</label>
                                <input class="span8 text" id="normalInput" type="text" name="apellidos">
                            </div>
                        </div>
                    </div>

                    <div class="form-row row-fluid">
                        <div class="span12">
                            <div class="row-fluid">
                                <label class="form-label span4" for="documento">Documento &Uacute;nico</label>
                                <input class="span8 text" id="normalInput" type="text" name="documento">
                            </div>
                        </div>
                    </div>

                    <div class="form-row row-fluid">
                        <div class="span12">
                            <div class="row-fluid">
                                <label class="form-label span4" for="telefono">Tel&eacute;fono</label>
                                <input class="span8 text" id="normalInput" type="text" name="telefono">
                            </div>
                        </div>
                    </div>
					
					<div class="form-actions">
                       <button type="submit" class="btn btn-info">Save changes</button>
                       <button type="button" class="btn">Cancel</button>
                    </div>
                                                            

                </form>
             
            </div>

        </div>
        
    </div>
    <div class="modal-footer">
        <a href="#" class="btn" data-dismiss="modal">Cerrar</a>
    </div>
</div>

<script src="<?php echo base_url("js/catalogos/responsables/editar.js"); ?>"></script>