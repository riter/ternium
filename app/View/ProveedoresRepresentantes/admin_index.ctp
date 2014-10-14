<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span class="mws-i-24 i-table-1">Proveedores Representantes</span>
    </div>
    <div class="mws-panel-body">
        <table class="mws-datatable-fn mws-table">
            <thead>
                <tr>                    
                    <th>Nombres</th>
                    <th>Paterno</th>
                    <th>Materno</th>                    
                    <th>Dirección</th> 
                    <th>Teléfono</th> 
                    <th>Email</th> 
                   <!-- <th>Contenido</th> -->
                    <th>Proveedor</th>
                    <th>Aciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
//                pr($proveedoresRepresentantes);
                    foreach($proveedoresRepresentantes as 
                        $proveedoresRepresentante ): ?>
                    <tr>    
                        <td>
                          <?php echo $proveedoresRepresentante['ProveedoresRepresentante']['nombres']; ?>
                        </td> 
                        <td>
                            <?php echo $proveedoresRepresentante['ProveedoresRepresentante']['ap']; ?>
                        </td> 
                        <td>
                                <?php echo $proveedoresRepresentante['ProveedoresRepresentante']['am']; ?>
                        </td>
                        <td>
                            <?php echo 
                            $proveedoresRepresentante['ProveedoresRepresentante']['direccion']; ?>
                        </td> 
                        <td>
                            <?php echo $proveedoresRepresentante['ProveedoresRepresentante']['telefono']; ?>
                        </td>
                        <td>
                            <?php echo $proveedoresRepresentante['ProveedoresRepresentante']['email']; ?>
                        </td>
                        <!--
                        <td>
                            <?php //echo $proveedoresRepresentante['ProveedoresRepresentante']['contenido']; ?>
                        </td>
                    -->
                          <td>
                            <?php echo $proveedoresRepresentante['Proveedore']['nombres']; ?>
                        </td>


                        <td>
                            <?php echo $this->Html->link('Editar', array('action' => 'edit', $proveedoresRepresentante['ProveedoresRepresentante']['id'])); ?>                       
                            <?php echo "&nbsp;&nbsp; | &nbsp;&nbsp;"; ?>
                            <?php echo $this->Html->link('Eliminar', 
                            array('controller' =>'ProveedoresRepresentantes', 'action' => 'delete', 
                                $proveedoresRepresentante['ProveedoresRepresentante']['id']), 
                                array(), " Esta seguro de eliminar a ". $proveedoresRepresentante['ProveedoresRepresentante']['nombres'] .". ?" );?> 
                        </td> 

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>