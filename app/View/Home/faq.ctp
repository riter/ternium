<div class="content faq library">
    <div class="loraxian"></div>
    <h1>Library</h1>

    <h2>Frequently Asked Questions</h2>
    <!--
    <div class="question">
        <span>q:</span> 
        <h3>This is an example question for the frequently asked questions section?</h3>
    </div>
    <div class="answer">
        <span>a:</span>
        <p> 
            This is an example response to a frequently asked question. This is an example   
            response to a frequently asked question. This is an example response to a frequently 
            asked question. This is an example response to a frequently asked question. This is an 
            example response to a frequently asked question. This is an example response to a 
            frequently asked question. This is an example response to a frequently asked question.
        </p>
    </div> 
    -->
    <div style="display: block;">
    <?php foreach ($Question as $n): ?>
    <div class="question">
        <span>q:</span> 
        <h3><?php echo $n['Question']['question']; ?></h3>
    </div>
        <br>
    <div class="answer">
        <span>a:</span>
        <p><?php echo $n['Question']['answer'];  ?></p>
    </div> 
    <?php endforeach; ?>
    </div>
    <br>
    <div id="faq" style="display: block;"> </div>
    <a href="#" onclick="cargar(event)">< View Older Faq</a>   
<!-- ----------------------------------------------------------------------------------------------------------------------  -->   
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
<script type="text/javascript" charset="utf-8" async defer>
var contador = 8;
function cargar(evt) { 
    evt.preventDefault();
    $.ajax({
        dataType: "json",
        type: "POST",
        evalScripts: true,
        url: '<?php echo Router::url(array('controller' => 'home', 'action' => 'faq_ajax')); ?>',
        data: ({type: contador}),
        success: function (data, textStatus, XMLHttpRequest){   
            
            //console.log(data);
            
            for (var i=0;i<data.length;i++)
            {  
               var question = data[i].Question.question;
               var answer = data[i].Question.answer;
            
               
               var nhtml ="<div class='question'>";
               nhtml += "<span>q:</span>";
               nhtml += "<h3>"+ question  +"</h3>"; 
               nhtml += "</div> <br>";
               nhtml += "<div class='answer'>";
               nhtml += "<span>a:</span>";
               nhtml += "<p>"+ answer +"</p>";
               nhtml += "</div>";
               //console.log(nhtml );                          
               $("#faq").append(nhtml); 
            }
          
        }
    });
    contador = contador + 8;
}

</script>
<script>
    $('.table .col:nth-child(2n)').addClass('odd');
</script>
