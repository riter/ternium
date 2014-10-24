<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span class="mws-i-24 i-table-1">Galer&iacute;a</span>
    </div>
    <div class="mws-panel-body">
        <table class="mws-datatable-fn mws-table">
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Titulo</th>
                    <th>Descripcion</th>           
                    <th>Usuario</th>
                    <th>Tipo Galeria</th> 
                    <th>Acciones</th> 
                </tr>
            </thead>
            <tbody>
                <?php  // pr($galerias); ?>
                <?php foreach ($galerias as $galeria): ?>
                    <tr>
                        
                        <td><?php echo $galeria['Galeria']['imagen']; ?></td>
                        <td><?php echo $galeria['Galeria']['titulo']; ?></td>
                        <td><?php echo $galeria['Galeria']['descripcion']; ?></td>
                        <td><?php echo $galeria['User']['email']; ?></td>
                        <td><?php echo $galeria['GaleriasTipo']['nombre']; ?></td> 
                        
                        <td>
                            <?php echo $this->Html->link('Editar', array('action' => 'edit', $galeria['Galeria']['id'])); ?>                       
                            <?php echo "&nbsp;&nbsp; | &nbsp;&nbsp;"; ?>
                            <?php echo $this->Html->link('Eliminar', array('controller' =>'Galerias', 'action' => 'delete', $galeria['Galeria']['id'] ), array(), " Esta seguro de eliminar a ".$galeria['Galeria']['id'] .". ?" ); ?> 
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
