<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span class="mws-i-24 i-table-1">Tipo Calculos</span>
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
            <?php foreach($calculosTipos as $calculosTipo ): ?> 
                    <tr>    
                        <td>
                            <?php echo $calculosTipo['CalculosTipo']['nombre']; ?>
                        </td> 
                        <td>
                            <?php echo $this->Html->link('Editar', array('action' => 'edit', $calculosTipo['CalculosTipo']['id'])); ?>                       
                            <?php echo "&nbsp;&nbsp; | &nbsp;&nbsp;"; ?>
                            <?php echo $this->Html->link('Eliminar', 
                            array('controller' =>'CalculosTipos', 'action' => 'delete', 
                                $calculosTipo['CalculosTipo']['id']), 
                                array(), " Esta seguro de eliminar a ". $calculosTipo['CalculosTipo']['nombre'] .". ?" );?> 
                        </td> 
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>