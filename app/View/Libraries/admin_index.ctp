<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span class="mws-i-24 i-table-1">Videos</span>
    </div>
    <div class="mws-panel-body">
        <table class="mws-datatable-fn mws-table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Video</th>
                    <th>View</th>
                    <th>Position</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($libraries as $new): ?>
                    <tr>
                        <td><?php echo $new['Library']['id']; ?></td>
                        <td><?php echo $new['Library']['title']; ?></td>
                        <td><?php 
                        if($new['Library']['video'] == ""):?>
                            <video width="550px" height="300px" controls>
                                <source src="<?php echo $this->webroot; ?>uploads/video/<?php echo $new['Library']['nvideo']; ?>?>" type="video/mp4">
                                <!-- <source src="movie.ogg" type="video/ogg"> -->                          
                            </video> 
                        <?php    
                        else:
                            echo $new['Library']['video']; 
                        endif;
                        ?></td>
                        
                        <td><?php echo $new['Library']['views']; ?></td>
                        <td><?php echo $new['Library']['position']; ?></td>
                        <td><?php $f= strtotime($new['Library']['created']); echo date('Y/m/d',$f); ?></td>
                        <td>
                            <?php echo $this->Html->link('Edit', array('action' => 'edit', $new['Library']['id'])); ?>
                            <?php echo "&nbsp;&nbsp; | &nbsp;&nbsp;"; ?>
                            <?php echo $this->Html->link('Delete', array('controller' =>'Libraries', 'action' => 'delete', $new['Library']['id'] ), array(), " Esta seguro de eliminar a ".$new['Library']['title']." ?" );?> 
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>