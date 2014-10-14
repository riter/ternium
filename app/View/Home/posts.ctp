<div class="content library videos">
    <div class="loraxian"></div>
    <?php
    //echo '<pre>';    print_r($posts);
    ?>
    <article class="last">
        <h2>
            <?php
            $time = strtotime($posts['Posts']['created']);
            $newformat = date('F j, Y', $time);
            echo $newformat;
            ?>
        </h2>
        <p>
            <?php echo $posts['Posts']['description']; ?>
        </p>
    </article>

</div>

<aside>
    <h2>What's New</h2>
    <?php foreach ($ultimo as $ul): ?>
        <article>          
            <?php
            $time = strtotime($ul['News']['created']);
            $newformat = date('F j, Y', $time);                  
            ?>
            <a href='../news/<?php echo base64_encode($ul['News']['id']); ?> ' style="text-decoration: none;" ><h3><?php echo $newformat; ?> </h3></a>
            
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
<!-- ----------------------------------------------------------------------------------- -->