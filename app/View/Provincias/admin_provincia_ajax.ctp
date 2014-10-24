<?php //print_r($provincias);exit;?>


    
    <div class="mws">
    <?php 
        echo $this->Form->create('Provincia', array
            (
                'id' => 'provincia',
                'class' => 'mws-form',
                'enctype' => 'multipart/form-data',
                'autocomplete' => 'off',
                'inputDefaults' =>array
                (
                    'label' => false,
                    'div' => false, 
                    'error' => array('attributes' => array('class' => 'error' ))
            )
        ));
        ?>
                      <div class="mws-form-item small">
                         <?php echo $this->Form->input('pais_id', array('options' => $provincias,'label'=>false,'div'=>null));?>
                    </div>
                  
                
               
                <?php    
                echo $this->Form->end();
                               ?>
        
                
          
                    
      
        </div> 
         
<script type="text/javascript" src="http://jqueryjs.googlecode.com/files/jquery-1.3.2.min.js"></script>
<script>
$("document").ready(
function() {
 
  $('#pais_id').bind('click', function()
   {
        $.ajax({
               type: "GET",
               url: "/provincias/provincia_ajax/"+$(this).val(),
               beforeSend: function() {
                     $('#div_provincias_wrapper').html('<div class="rating-flash" id="cargando_div">Cargando </div>');
                     },
               success: function(msg){
                   $('#div_provincias_wrapper').html(msg);
              }
             });
    });
}
);
</script>