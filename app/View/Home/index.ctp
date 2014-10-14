
<div class="content news">
    <div class="loraxian">
        
    </div>
    <?php
    $i=0;
    foreach ($news as $n): ?>
        <article>
            <h2><?php
                $time = strtotime($n['Posts']['fecha_creacion']);
                $newformat = date('F j, Y', $time);               
                echo $this->Html->link($newformat, array('controller' => 'home', 'action' => 'posts', base64_encode($n['Posts']['id'])),array('style' => 'color:#00659C;'));
                ?></h2>
            <span>
                <?php if($i == 0 ) echo substr(strip_tags($n['Posts']['description']),0,265).' ...'; else echo substr(strip_tags($n['Posts']['description']),0,265).' ...';?>
            </span>
        </article>    
    <?php $i++; endforeach; ?>
    <!--              
    <article class="last">
        <h2>February 14, 2014</h2>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
        <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
    </article>
    -->
    <div id="posts">
    </div>
    <a href="#" onclick="cargar(event)">< View Older News</a>
    
<script type="text/javascript" charset="utf-8" async defer>
var contador = 20;
/*
$(document).ready(function () {
    //carregar();
    $(this).on('scroll', function () {
        if ($(window).scrollTop() + $(window).height() >= $(this).height()) {
           // carregar();
        }
    });
});
*/
function cargar(evt) { 
    evt.preventDefault();
    $.ajax({
        dataType: "json",
        type: "POST",
        evalScripts: true,
        url: '<?php echo Router::url(array('controller' => 'home', 'action' => 'index_ajax')); ?>',
        data: ({type: contador}),
        success: function (data, textStatus, XMLHttpRequest){   
            
            //console.log(data);
            for (var i=0;i<data.length;i++)
            {  
               var idp = data[i].Posts.id;                
               var fecha = data[i].Posts.fecha_creacion;
               var descripcion = data[i].Posts.description;
               
               var nhtml = "<article>";
               nhtml +="<a href='home/posts/"+ idp +"'><h2>"+ fecha +"</h2></a>"; 
               nhtml +="<span> ";
               nhtml +=descripcion;
               nhtml +="</span>";
               nhtml +="</article>";
               //console.log(nhtml );  
                        
               $("#posts").append(nhtml); 
            }
          
        }
    });
    contador = contador + 20;
}
</script>  
</div>
<aside>
    <h2>What's New</h2>
    <?php /* foreach ($ultimo as $ul): ?>
        <article>          
                <?php
                $time = strtotime($ul['News']['fecha_creacion']);
                $newformat = date('F j, Y', $time);
                
                ?>
            <!-- <a href='home/news/<?php// echo base64_encode($ul['News']['id']);?> ' style="text-decoration: none;" ><h3><?php// echo $newformat; ?> </h3></a>#BE1E2D -->
            <h3><?php echo $this->Html->link($newformat, array('controller' => 'home', 'action' => 'news', base64_encode($ul['News']['id'])),array('style' => 'text-decoration: none;color:#BE1E2D;')); ?></h3>
            <?php      
            $expresionregular = "/(^.{0,45})(\W+.*$)/";
            $cadena = $ul['News']['description'];
            $reemplazo = "\${1}";
            ?>
            <p><?php echo substr($ul['News']['description'],0, 54).'...'; ?></p>
            <?php 
                if($ul['News']['files'] != "" && $ul['News']['views']== 1):
            ?>
                <a href="<?php echo $this->webroot; ?>uploads/news/<?php echo $ul['News']['files']; ?>" target="_blank">DOWNLOAD NOW</a>
            <?php
                endif;
            ?>
            
        </article>
    <?php endforeach; ?>*/

?></aside>
<!-- --------------------------------------------------------------------------------------- -->
        
        
