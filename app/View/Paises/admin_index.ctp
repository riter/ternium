<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span class="mws-i-24 i-table-1">Paises</span>
    </div>
    <div class="mws-panel-body">
        <table class="mws-datatable-fn mws-table">
            <thead>
                <tr>                    
                    <th>Código</th>
                    <th>País</th> 
                    <th>Aciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($paises as $paise): ?>
                    <tr>    
                        
                        <td><?php echo $paise['Paise']['codigo']; ?></td>
                        <td><?php echo $paise['Paise']['nombre']; ?></td> 
                        <td>
                            <?php echo $this->Html->link('Editar', array('action' => 'edit', $paise['Paise']['id'])); ?>                       
                            <?php echo "&nbsp;&nbsp; | &nbsp;&nbsp;"; ?>
                            <?php echo $this->Html->link('Eliminar', 
                            array('controller' =>'Paises', 'action' => 'delete', 
                                $paise['Paise']['id']), 
                                array(), " Esta seguro de eliminar a ". $paise['Paise']['nombre'] .". ?" );?> 
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>