<?php/* echo print_r($recibir);*/?>
<div class="mws-panel grid_8">
    
    
    <div class="dashboard" style="text-align: center">
        <br><br><br><br><br><br><br>
         <img src="<?php echo $this->webroot; ?>/img/logo-steelframe.png" alt="Steelframe Calculator" title="Steelframe Calculator" />
         <?php
       
        $contar_array=sizeof($recibir);
        $contar_array2=count($recibir);
        
         $i=0;
        
         for($j=0;$j<count($recibir);$j++)
        {   echo "<br/>";
            for($i=0;$i<count($recibir[$j]);$i++){
             
               for($k=0;$k<count($recibir[$j][$i]);$k++){
               echo $recibir[$j][$i][$k];
               
               }
               
            }
           // echo "<pre>".$recibir[$j][1]."</pre>";
           // echo "<pre>".$recibir[$j][2]."</pre>";
           // echo "<pre>".$recibir[$j][3]."</pre>";
           // echo "aaaaaa";exit;
        }
         ?>
    </div>
    
</div>
    