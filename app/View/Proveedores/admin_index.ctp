<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span class="mws-i-24 i-table-1">Proveedores</span>
    </div>
    <div class="mws-panel-body">
        <table class="mws-datatable-fn mws-table">
            <thead>
                <tr>                    
                    <th>Proveedor</th>
                    <th>Dirección</th> 
                    <th>Telefono</th> 
                    <th>Email</th> 
                    <th>Descripcion</th> 
                    <th>País</th>
                    <th>Provincia</th>
                    <th>Aciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($proveedores as $proveedore ): ?>
                    <tr>    
                        <td>
                            <?php echo $proveedore['Proveedore']['nombres']; ?>
                        </td> 
                        <td>
                            <?php echo $proveedore['Proveedore']['direccion']; ?>
                        </td> 
                        <td>
                            <?php echo $proveedore['Proveedore']['telefono']; ?>
                        </td>
                        <td>
                            <?php echo $proveedore['Proveedore']['email']; ?>
                        </td>
                            <td>
                            <?php echo $proveedore['Proveedore']['descripcion']; ?>
                        </td>
                        <td>
                            <?php echo $proveedore['Paise']['nombre']; ?>
                        </td> 

                        <td>
                            <?php echo $proveedore['Provincia']['nombre']; ?>
                        </td>
                        <td>
                            <?php echo $this->Html->link('Editar', array('action' => 'edit', $proveedore['Proveedore']['id'])); ?>                       
                            <?php echo "&nbsp;&nbsp; | &nbsp;&nbsp;"; ?>
                            <?php echo $this->Html->link('Eliminar', 
                            array('controller' =>'Proveedores', 'action' => 'delete', 
                                $proveedore['Proveedore']['id']), 
                                array(), " Esta seguro de eliminar a l ". $proveedore['Proveedore']['nombres'] .". ?" );/* Are you sure you wish to delete the*/?> 
                        </td> 
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>