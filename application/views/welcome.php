<div class="centerContent">
                  
                            <ul class="bigBtnIcon">
								<?php 
									foreach ($menu0 as $m0) 
									{
								?>
										<li>
											<a href="<?php echo base_url().$m0['opc_funcion'].'/index'?>" title="<?php echo $m0['opc_descripcion']?>" class="tipB">
												<span class="icon <?php echo $m0['opc_icono']?>"></span>
												<span class="txt"><?php echo $m0['opc_nombre']?></span>
											</a>
										</li>										
								<?php
									}
								?>
                            </ul>
                        </div>