<div class="mws-panel grid_8">
    
    
    <div class="dashboard" style="text-align: center">
        <br><br><br><br><br><br><br>
         <img src="<?php echo $this->webroot; ?>/img/logo-steelframe.png" alt="Steelframe Calculator" title="Steelframe Calculator" />
         <?php
         foreach($usuarios as $user)
         {
             echo $user['User']['nombre'];
         }
         ?>
    </div>
    
</div>
    