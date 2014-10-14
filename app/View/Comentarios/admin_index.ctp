<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span class="mws-i-24 i-table-1">Tipo  de Comentario</span>
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
            <?php foreach($comentarios as $comentario ): ?> 
                    <tr>    
                        <td>
                            <?php echo $comentario['Comentario']['nombre']; ?>
                        </td> 
                        <td>
                            <?php echo $this->Html->link('Editar', array('action' => 'edit', $comentario['Comentario']['id'])); ?>                       
                            <?php echo "&nbsp;&nbsp; | &nbsp;&nbsp;"; ?>
                            <?php echo $this->Html->link('Eliminar', 
                            array('controller' =>'Comentarios', 'action' => 'delete', 
                                $comentario['Comentario']['id']), 
                                array(), " Esta seguro de eliminar a ". $comentario['Comentario']['nombre'] .". ?" );?> 
                        </td> 
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>