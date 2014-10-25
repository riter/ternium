<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span class="mws-i-24 i-table-1">Profesiones</span>
    </div>
    <div class="mws-panel-body">
        <table class="mws-datatable-fn mws-table">
            <thead>
                <tr>                    
                    <th>Profesi&oacute;n</th> 
                    <th>Aciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($profesiones as $profesione): ?>
                    <tr>    
                        <td><?php echo $profesione['Profesione']['nombre']; ?></td> 
                        <td>
                            <?php echo $this->Html->link('Editar', array('action' => 'edit', $profesione['Profesione']['id'])); ?>                       
                            <?php echo "&nbsp;&nbsp; | &nbsp;&nbsp;"; ?>
                            <?php echo $this->Html->link('Eliminar', 
                            array('controller' =>'Profesiones', 'action' => 'delete', 
                                $profesione['Profesione']['id']), 
                                array(), " Esta seguro de eliminar a ". $profesione['Profesione']['nombre'] .". ?" );?> 
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>