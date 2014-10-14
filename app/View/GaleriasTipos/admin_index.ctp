<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span class="mws-i-24 i-table-1">Tipo galerías</span>
    </div>
    <div class="mws-panel-body">
        <table class="mws-datatable-fn mws-table">
            <thead>
                <tr>                    
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($galeriasTipos as $galeriasTipo ): ?> 
                    <tr>    
                        <td>
                            <?php echo $galeriasTipo['GaleriasTipo']['nombre']; ?>
                        </td> 
                        <td>
                            <?php echo $this->Html->link('Editar', array('action' => 'edit', $galeriasTipo['GaleriasTipo']['id'])); ?>                       
                            <?php echo "&nbsp;&nbsp; | &nbsp;&nbsp;"; ?>
                            <?php echo $this->Html->link('Eliminar', 
                            array('controller' =>'GaleriasTipos', 'action' => 'delete', 
                                $galeriasTipo['GaleriasTipo']['id']), 
                                array(), " Esta seguro de eliminar a ". $galeriasTipo['GaleriasTipo']['nombre'] .". ?" );?> 
                        </td> 
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>