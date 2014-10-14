
                <div class="content documents library">
                    <div class="loraxian"></div>
                    <h1>Library</h1>

                    <h2>Document Downloads</h2>

                    <ul>
                        <?php 
                         //print_r($documents);                        
                        ?>
                         <?php foreach ($documents as $doc): ?>
                        <li>
                            <p> <?php echo $doc['Document']['title']; ?></p>  
                            (<a href="<?php echo $this->webroot; ?>uploads/files/<?php echo $doc['Document']['files']; ?>" target="_blank">DOWNLOAD</a>)                            
                        </li>
                        <?php endforeach; ?>
                        
                    </ul>
                    
                    <div>
                     <?php echo '<h2>'.$this->Paginator->numbers().'</h2>'; ?>    
                    </div>
                   
                   

                    
                </div>
                <aside>
                    <h2>What's New</h2>
                    <?php foreach ($ultimo as $ul): ?>
                        <article>          
                            <?php
                            $time = strtotime($ul['News']['created']);
                            $newformat = date('F j, Y', $time);
                            ?>
                            <a href='news/<?php echo base64_encode($ul['News']['id']); ?> ' style="text-decoration: none;" ><h3><?php echo $newformat; ?> </h3></a>

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
   