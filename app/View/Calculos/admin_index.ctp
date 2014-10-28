<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span class="mws-i-24 i-table-1">Calculos</span>
    </div>
    <div class="mws-panel-body">
        <table class="mws-datatable-fn mws-table">
            <thead>
                <tr>
                    <th>C&aacute;lculo</th>
                    <th>Tipo de c&aacute;lculo</th>
                    <th>Usuario</th>           
                    <th>Data</th>           
                    <th>Fecha Creaci&oacute;n</th>
                    <th>Acciones</th> 
                </tr>
            </thead>
            <tbody>
             
                <?php foreach ($calculos as $calculo): ?>
                    <tr>
                        
                        <td><?php echo $calculo['Calculo']['nombre']; ?></td>
                        <td><?php echo $calculo['CalculosTipo']['nombre']; ?></td>
                        <td><?php echo $calculo['User']['nombre']; ?></td>
                        <td><?php echo $calculo['Calculo']['data']; ?></td>
                        <td><?php echo $calculo['Calculo']['created']; ?></td>
                        
                        
                        <td>
                            <?php echo $this->Html->link('Editar', array('action' => 'edit', $calculo['Calculo']['id'])); ?>                       
                            <?php echo "&nbsp;&nbsp; | &nbsp;&nbsp;"; ?>
                            <?php echo $this->Html->link('Eliminar', array('controller' =>'Calculos', 'action' => 'delete', $calculo['Calculo']['id'] ), array(), " Esta seguro de eliminar a ".$calculo['Calculo']['id'] .". ?" ); ?> 
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
