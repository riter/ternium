<?php // pr($provincias); ?> 

<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span class="mws-i-24 i-table-1">Provincias</span>
    </div>
    <div class="mws-panel-body">
        <table class="mws-datatable-fn mws-table">
            <thead>
                <tr>
                    <th>País</th>
                    <th>Provincia</th> 
                    <th>Aciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($provincias as $provincia): ?> 
                    <tr>    
                        <td><?php echo $provincia['Paise']['nombre']; ?></td>
                        <td><?php echo $provincia['Provincia']['nombre']; ?></td> 
                        <td>
                            <?php echo $this->Html->link('Editar', array('action' => 'edit', $provincia['Provincia']['id'])); ?>                       
                            <?php echo "&nbsp;&nbsp; | &nbsp;&nbsp;"; ?>
                            <?php echo $this->Html->link('Eliminar', 
                            array('controller' =>'Provincias', 'action' => 'delete', 
                                $provincia['Provincia']['id']), 
                                array(), "Esta seguro que desea eliminar la ". $provincia['Provincia']['nombre'] .". ?" );/*Are you sure you wish to delete the*/?> 
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
