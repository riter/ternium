<?php //echo "<pre>";print_r($calculos); echo "</pre>";exit;?>
<div class="mws-panel grid_8"> 
    <div class="mws-panel-header">
        <span class="mws-i-24 i-plus">Adicionar C&aacute;lculo</span>
    </div>

    <div class="mws-panel-body">
        <?php

            echo $this->Form->create('Calculo', array
            (   
                'id' => 'calculo',
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

            <div class="mws-form-inline">  

                <div class="mws-form-row" style="display:none">
                    <label>ID</label>
                    <div class="mws-form-item small">
                        <?php echo $this->Form->input('id', 
                        array('id'=>'id','class' => 'mws-textinput required')); ?> 
                    </div>
                </div> 

              <div class="mws-form-row">
                    <label>C&aacute;lculo</label>
                    <div class="mws-form-item small">
                        <?php echo $this->Form->input('nombre', 
                        array('id'=>'nombre','class' => 'mws-textinput required')); ?> 
                    </div>
                </div> 

                

                <div class="mws-form-row">
                    <label>Usuario</label>
                    <div class="mws-form-item small">
                        <?php echo $this->Form->input('users_id', 
                        array('id'=>'users_id','class' => 'mws-textinput required')); ?> 
                    </div>
                </div>                 

                <div class="mws-form-row">
                    <label>Tipo de C&aacute;lculos</label>
                    <div class="mws-form-item small">
                        <?php echo $this->Form->input('calculostipos_id', 
                        array('id'=>'calculostipo_id','class' => 'mws-textinput required')); ?>
                    </div>
                </div>
              
              <div class="mws-form-row">
                    <label>Fecha creaci&oacute;n</label>
                    <div class="mws-form-item small">
                        <?php echo $this->Form->input('created', 
                        array('id'=>'created','class' => 'mws-textinput required')); ?>
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
        $("#calculo").validate
        ({  
            rules: 
               {
                nombre: 
                {
                    required : true,                
                    minlength: 2
                },
                data: 
                {
                    required : true,                
                    minlength: 2
                }
            },
             invalidHandler: function(form, validator) {
                var errors = validator.numberOfInvalids();
                if (errors) 
                {
                    var message = errors == 1
                    ? 'Olvidastes 1 campo. Ha sido remarcado'
                    : 'Te olvidaste ' + errors + ' campos. Han sido remarcados.';
                    $("#mws-validate-error").html(message).show();
                } else {
                    $("#mws-validate-error").hide();
                }
            }
           /* invalidHandler: function(form, validator) 
            {
                var errors = validator.numberOfInvalids();
                if (errors) 
                {
                    var message = errors == 1
                    ? 'You missed 1 field. It has been highlighted'
                    : 'You missed ' + errors + ' fields. They have been highlighted';
                    $("#mws-validate-error").html(message).show();
                } else {
                    $("#mws-validate-error").hide();
                }
            }*/
        });
    });

     </script> 
    </div>      
</div> 
     