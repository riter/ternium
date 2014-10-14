
<div class="content news">
    <div class="loraxian">
        
    </div>
     <?php
        echo strval(date("YmdHis",mktime(date("H"),date("i"),date("s"),date("m"),date("d"),date("Y"))));
        ?>
    <?php foreach ($news as $n): ?>
        <article>
            <h2><?php
                $time = strtotime($n['Posts']['created']);
                $newformat = date('F j, Y', $time);
                echo $newformat;
                ?></h2>
            <span>
                <?php echo $n['Posts']['description']; ?>
            </span>
        </article>    
    <?php endforeach; ?>
    <!--               
    <article class="last">
        <h2>February 14, 2014</h2>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
        <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
    </article>
    <a href="#">< View Older News</a>
    -->
    <script type="text/javascript" charset="utf-8" async defer>
var contador = 0;

$(document).ready(function () {
    carregar();
    $(this).on('scroll', function () {
        if ($(window).scrollTop() + $(window).height() >= $(this).height()) {
            carregar();
        }
    });
});

function carregar() {
    /*for (var i = 0; i < 10; i++) {
        $("#lista").append('<li><img src="http://placehold.it/100x100"/><div><h4>' + contador + ' Item</h4><p>Descrição do item '+contador+'</p></div></li>');
        contador++;
    }
    */
    $.ajax({
        dataType: "json",
        type: "POST",
        evalScripts: true,
        url: '<?php echo Router::url(array('controller' => 'home', 'action' => 'index_ajax')); ?>',
        data: ({type: contador}),
        success: function (data, textStatus, XMLHttpRequest){
            $("#lista").append('<li><img src="http://placehold.it/100x100"/><div><h4>' + contador + ' Item</h4><p>Descrição do item '+contador+'</p></div></li>');
        }
    });
    contador++;
}

</script>
    <div id="conteudo">
        <ul id="lista"></ul>
    </div>
    
</div>
<aside>
    <h2>What's New</h2>
    <?php foreach ($ultimo as $ul): ?>
        <article>
            <h3>
                <?php
                $time = strtotime($ul['News']['created']);
                $newformat = date('F j, Y', $time);
                echo $newformat;
                ?>
            </h3>
            <?php
            $expresionregular = "/(^.{0,245})(\W+.*$)/";
            $cadena = $ul['News']['description'];
            $reemplazo = "\${1}";
            ?>
            <p><?php echo preg_replace($expresionregular, $reemplazo, $cadena); ?></p>
            <a href="<?php echo $this->webroot; ?>uploads/news/<?php echo $ul['News']['files']; ?>" target="_blank">DOWNLOAD NOW</a>
        </article>
    <?php endforeach; ?>

</aside>
           
        
        
