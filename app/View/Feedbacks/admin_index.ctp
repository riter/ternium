<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span class="mws-i-24 i-table-1">Feedbacks</span>
    </div>
    <div class="mws-panel-body">
        <table class="mws-datatable-fn mws-table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Mensaje</th>
                    <th>Comentarios</th>           
                     <th>Estado</th> 
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                   <?php foreach ($feedbacks as $feedback): ?>
                    <tr>
                        
                        <td><?php echo $feedback['User']['nombre']; ?></td>
                        <td><?php echo $feedback['Feedback']['mensaje']; ?></td>
                        <td><?php echo $feedback['Comentario']['nombre']; ?></td>
                        <td><?php echo $feedback['Feedback']['leido'];?></td> 
                        
                        <td>
                            <?php echo $this->Html->link('Editar', array('action' => 'edit', $feedback['Feedback']['id'])); ?>                       
                            <?php echo "&nbsp;&nbsp; | &nbsp;&nbsp;"; ?>
                            <?php echo $this->Html->link('Eliminar', array('controller' =>'Feedbacks', 'action' => 'delete', $feedback['Feedback']['id'] ), array(), " Esta seguro de eliminar a ".$feedback['Feedback']['id'] .". ?" ); ?> 
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
