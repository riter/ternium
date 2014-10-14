<div class="content library videos">
    <div class="loraxian"></div>
    <h1>Library</h1>

    <h2>Training Videos</h2>
        <?php 
         // print_r($library);
          $i=0;
        ?>
        <?php foreach ($library as $video): 
            if($i == 0):
        ?>        
            <div class="row">
        <?php        
            endif;
        ?>    
        <article>
            <div class="video">
                
                <!-- <img src="<?php //echo $this->webroot; ?>img/video.png" height="133" width="237" alt=""> -->
                <a href="#" onclick="changeLink('<?php echo $video['library']['id']; ?>')" ><img src="<?php echo $this->webroot; ?>img/video.jpg" height="133" width="237"></a> 
                
            </div>
            <h3><?php echo $video['library']['title']; ?></h3>
            <span class="autor">by: U2</span>
            <span class="views" id='<?php echo $video['library']['id']; ?>'><?php echo $video['library']['views']; ?> views</span>
        </article>
        <?php    
            $i++;
            if($i == 2 ):
                $i=0;
        ?>    
               </div> 
        <?PHP       
            endif;
        endforeach; 
        if( $i == 1): 
            echo '</div> ';   
        endif;

            ?>

</div>

<aside>
    <h2>What's New</h2>
    <?php foreach ($ultimo as $ul): ?>
        <article>          
            <?php
            $time = strtotime($ul['News']['created']);
            $newformat = date('F j, Y', $time);                  
            ?>
            <a href='./news/<?php echo base64_encode($ul['News']['id']); ?> ' style="text-decoration: none;" ><h3><?php echo $newformat; ?> </h3></a>
            
            <p><?php echo substr($ul['News']['description'], 0, 54) . '...'; ?></p>
            <?php
                if ($ul['News']['files'] != "" && $ul['News']['views']== 1):
                    ?>
                    <a href="<?php echo $this->webroot; ?>uploads/news/<?php echo $ul['News']['files']; ?>" target="_blank">DOWNLOAD NOW</a>
                    <?php
                endif;
            ?>
        </article>
    <?php endforeach; ?>
</aside>   
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php echo $this->webroot; ?>js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
<script src="<?php echo $this->webroot; ?>js/plugins.js"></script>
<script src="<?php echo $this->webroot; ?>js/main.js"></script>
<script>
    $('.table .col:nth-child(2n)').addClass('odd');
</script>

<script>
 function changeLink (code) {
     
		var id = '#dialog';                       
		var maskHeight = $(document).height();
		var maskWidth = $(window).width();
	
		$('#mask').css({'width':maskWidth,'height':maskHeight});

		$('#mask').fadeIn(1000);	
		$('#mask').fadeTo("slow",0.8);	
	
		//Get the window height and width
		var winH = $(window).height();
		var winW = $(window).width();
              
		$(id).css('top',  winH/2-$(id).height()/2);
		$(id).css('left', (winW/2-$(id).width()/2)-110);
	
		$(id).fadeIn(2000);
                //--------------------------------

                    $.ajax({
                        dataType: "json",
                        type: "POST",
                        evalScripts: true,
                        url: '<?php echo Router::url(array('controller' => 'home', 'action' => 'addviewVideo')); ?>',
                        data: ({type: code}),
                        success: function (data, textStatus, XMLHttpRequest){
                            if(data.type == 1){ // url video
                                $("#myvideo").html(data.video);
                            }else{
                                if(data.type == 2){ //video
                                    var nhtml = "<video width='550px' height='300px' controls>";
                                        nhtml +="<source src='<?php echo $this->webroot; ?>uploads/video/" + data.video + "' type='video/mp4'>";
                                        nhtml +=" </video> ";
                                    $("#myvideo").html(nhtml);    
                                }
                            }
                        
                        $("#"+code).html(data.views + '   views');
                        }
                    });
                  
  }
</script>
<!-- ----------------------------------------------------------------------------------- -->
<script type="text/javascript">

$(document).ready(function() {	
	$('.window .close').click(function (e) {
		e.preventDefault();
		$('#mask').hide();
		$('.window').hide();
                $("#myvideo").html("");
	});		
	
	$('#mask').click(function () {
		$(this).hide();
		$('.window').hide();
                $("#myvideo").html("");
	});			
	
});

</script>
<style type="text/css">

#mask {
  position:absolute;
  left:0;
  top:0;
  z-index:9000;
  background-color:#000;
  display:none;
}
  
#boxes .window {
  position:absolute;
  left:0;
  top:0;
  width:440px;
  height:200px;
  display:none;
  z-index:9999;
  padding:20px;
}

#boxes #dialog {
  width:350px; 
  height:200px;
  padding:0px;
  background-color:#333333;
}

.close{display:block; text-align:right;}

</style>

 <div id="boxes">

<div id="dialog" class="window">
<div id="myvideo"> </div>
<div id="video">
    
</div>
</div>
 
<!-- Máscara para cobrir a tela -->
  <div id="mask"></div>

</div> 