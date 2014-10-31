<style type="text/css">
    .padre{
        display:inline-block;
        width:100%;
    }
    .hermanos{
        display:inline-block;
        width:33%;
        float:left;
    }
    li{
        list-style: none;
        text-align: left;
    }
    .prueba:before {
    background-color: #3d464b;
    border-radius: 50%;
    height: 20px;
    width: 20px;
    display: inline-block;
    text-align: left;
    content: "";
    position: absolute;
    left: 7px;
    }
    .prueba {
    position: relative;
    padding-left: 32px;
    margin-bottom: 9px;
    }
    b{
      margin-top:100px;
        margin-bottom: 20px;
      margin-left:-167px;
    }
  

</style>
<div class="mws-panel grid_8">
    <div class="dashboard" style="text-align: center">
        <br><br><br><br><br><br><br>
        <img src="<?php echo $this->webroot; ?>/img/logo-steelframe.png" alt="Steelframe Calculator" title="Steelframe Calculator" />
         <?php
        
         $i=0;
         ?><div class="padre"><?php
         for($j=0;$j<count($recibir);$j++){ 
           
             ?><div class="hermanos" ><?php
              if($j==1){
             echo "<b>USUARIOS REGISTRADOS POR PAIS<br/></b>";
             }
            elseif($j==2){
             echo "<b>USUARIOS REGISTRADOS POR EDAD</b><br/>";
             }
             elseif($j==3){
             echo "<b>USUARIOS REGISTRADOS POR PROFESION</b><br/>";
             }
             elseif($j==4){
             echo "<b>USUARIOS REGISTRADOS POR PROVINCIAS</b><br/>";
             }
             
             
             ?><ul><?php
            for($i=0;$i<count($recibir[$j]);$i++){
                echo "<br/>";
               ?><li><div class='prueba'><?php
               for($k=0;$k<count($recibir[$j][$i]);$k++){
                echo ($recibir[$j][$i][$k]);
                 
              }
                ?></div></li><?php
               
            } ?></ul></div><?php
          
        }
        ?></div>

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
            <li class="da-circular-stat {fillColor: '#fff', value:<?php echo $listados_paises[0];?>, maxValue: 100, label: 'Total Descargas'}"></li>
            <li class="da-circular-stat {fillColor: '#1BEE57', value:<?php echo $listados_calculos[0];?>, maxValue: 100, label: 'Total Descargas'}"></li>
        </ul>



    </div>
</div>