<style type="text/css">
    li{
        list-style: none;
    }
   .prueba {
	/*background:url(../../admin-assets/images/black-circle.png) no-repeat center center;*/
        background-color:#3d464b; 
        border-radius: 50%;
        height:20px;
        width: 20px;
        display: block;
        text-align: left;
        
       }
       .prueba a{
           padding-left:100px;
       }
       
</style>
<div class="mws-panel grid_8">
    <div class="dashboard" style="text-align: center">
        <br><br><br><br><br><br><br>
        <img src="<?php echo $this->webroot; ?>/img/logo-steelframe.png" alt="Steelframe Calculator" title="Steelframe Calculator" />
         <?php
        
         $i=0;
        
         for($j=0;$j<count($recibir);$j++)
        { 
             if($j==1)
             {
             echo "<b>USUARIOS REGISTRADOS POR PAIS</b>";
             }
            elseif($j==2)
             {
             echo "<br><b>USUARIOS REGISTRADOS POR EDAD</b>";
             }
             elseif($j==3)
             {
             echo "<br><b>USUARIOS REGISTRADOS POR PROFESION</b>";
             }
             elseif($j==4)
             {
             echo "<br><b>USUARIOS REGISTRADOS POR PROVINCIAS</b>";
             }
           //echo "<script>alert($i);</script>";

             echo "<br/>";
            for($i=0;$i<count($recibir[$j]);$i++){
             
               for($k=0;$k<count($recibir[$j][$i]);$k++){
               echo $recibir[$j][$i][$k];
             
                }
               
            } 
          
        }
        ?>

<link rel="stylesheet" type="text/css" href="<?php echo $this->webroot; ?>css/core/statistic.css" media="screen" />
        <script type="text/javascript">
            (function($) {
                $(document).ready(function(e) {
                    $(".da-circular-stat").daCircularStat();
                });
            })(jQuery);

        </script>
          <ul class="da-circular-stat-wrap">
            <li class="da-circular-stat {fillColor: '#a6d037', value:<?php echo $listados_usuarios[0];?>, maxValue: 98, label: 'Total Calculos'}"></li>
            <li class="da-circular-stat {fillColor: '#a6d037', value:<?php echo $listados_calculos[0];?>, maxValue: 100, label: 'Total Usuarios'}"></li>
            <li class="da-circular-stat {fillColor: '#fff', value:<?php echo $listados_calculos[0];?>, maxValue: 100, label: 'Total Descargas'}"></li>
            <li class="da-circular-stat {fillColor: '#1BEE57', value:<?php echo $listados_calculos[0];?>, maxValue: 100, label: 'Total Descargas'}"></li>
        </ul>
            
        
         
    </div>
</div>