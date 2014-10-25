<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span class="mws-i-24 i-table-1">Usuarios</span>
    </div>
    <div class="mws-panel-body">
        <table class="mws-datatable-fn mws-table">
            <thead>
                <tr>
                 
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Tel&eacute;fono</th>
                    <!--<th>Fecha de Nacimiento</th>-->
                    <th>Usuario</th>
                    <th>Email</th>
                    <th>Pa&iacute;s</th>
                    <th>Provincia</th>
                    <th>Profesi&oacute;n</th>
                    
                  
                    <!-- photo-->
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        
                        <td><?php echo $user['User']['nombre']; ?></td>
                        <td><?php echo $user['User']['apellido']; ?></td>
                        <td><?php echo $user['User']['telefono']; ?></td>
                        <!--<td><?php //echo $user['User']['fecha_nacimiento']; ?></td>-->
                        <td><?php echo $user['User']['username']; ?></td>
                        
                        <td><?php echo $user['User']['email']; ?></td>
                        <td><?php echo $user['Paise']['nombre']; ?></td>
                        <td><?php echo $user['Provincia']['nombre']; ?></td>
                        <td><?php echo $user['Profesione']['nombre']; ?></td>
                         
                        <!-- photo --> <td>
                            <?php echo $this->Html->link('Editar', array('action' => 'edit', $user['User']['id'])); ?>                       
                            <?php echo "&nbsp;&nbsp; | &nbsp;&nbsp;"; ?>
                            <?php echo $this->Html->link('Eliminar', array('controller' =>'Users', 'action' => 'delete', $user['User']['id'] ), array(), "Esta seguro que desea eliminar a  ". $user['User']['username'] .". ?" );?> 
                       <?php echo "&nbsp;&nbsp; | &nbsp;&nbsp;"; ?>
                      


    
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
