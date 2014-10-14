<div class="mws-panel grid_8">     
    <div class="mws-panel-header">
        <span class="mws-i-24 i-plus">Editar Comentario
        </span>
    </div> 

    <div class="mws-panel-body"> 
     <?php 
        echo $this->Form->create('Comentario', array
            (   
                'id' => 'comentario', 
                'class' => 'mws-form',
                'enctype' => 'multipart/form-data',
                'autocomplete' => 'off',
                'inputDefaults' => array
                (
                    'label' => false,
                    'div' => false, 
                    'error' => array('attributes' => array('class' => 'error' )) 
                )
        )); 
        ?>
        
            <div id="mws-validate-error" class="mws-form-message error" style="display:none;"></div> 


            <div class="mws-form-inline" > 
            	<div class="mws-form-row" style="display:none">
                    <label>ID</label> 
                    <div class="mws-form-item small"> 
                        <?php echo $this->Form->input('id',
                        array('id'=>'id','class' => 'mws-textinput required')); ?> 
                    </div>
                </div>

                <div class="mws-form-row">
                    <label>Tipo</label> 
                    <div class="mws-form-item small"> 
                        <?php echo $this->Form->input('nombre',
                        array('id'=>'nombre','class' => 'mws-textinput required')); ?> 
                    </div>
                </div>
            </div>

        <?php
        echo $this->Form->end(array(
            'label' => __('Guardar'),
            'div' => array(
                'class' => 'mws-button-row',
            ),
            'class' => 'mws-button red'
        ));
        ?>  

    <script>

   $(function() 
   {     
        $("#comentario").validate
        ({  
            rules: 
               {
                nombre: 
                {
                  required : true,                
                  minlength: 2
                } 
            },
             invalidHandler: function(form, validator) 
            {
                 var message = errors == 1
                    ? 'Olvido 1 campo. Ha sido remarcado'
                    : 'Ha olvidado ' + errors + ' campos. Han sido remarcados';
                    $("#mws-validate-error").html(message).show();
                } else {
                    $("#mws-validate-error").hide();
                }
            }
        });
    });

     </script> 
    </div>      
</div> 
     