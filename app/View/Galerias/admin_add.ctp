<?php error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING ^ E_DEPRECATED);?>
<div class="mws-panel grid_8"> 
    <div class="mws-panel-header">
        <span class="mws-i-24 i-plus">Adicionar Imagen</span>
    </div>

    <div class="mws-panel-body">
        <?php

            echo $this->Form->create('Galeria', array
            (   
                'id' => 'galeria',
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
                    <label for="FileImage">Imagen</label>
                    <div class="mws-form-item small"> 
                        <div style="display: inline;">
                        <?php echo $this->Form->input('imagen',
                             array('type' => 'file')); 'mws-textinput required  '?> 
                            <div>
                                <img style="width: 70px; height: 50px;" src="<?php echo $this->webroot; ?>app/webroot/img/Profile.png"  />
                            </div>
                        </div>
                    </div>
                </div>
            <div class="mws-form-row">
                    <label>T&iacute;tulo</label>
                    <div class="mws-form-item small">
                        <?php echo $this->Form->input('titulo', 
                        array('id'=>'titulo','class' => 'mws-textinput required')); ?> 
                    </div>
                </div> 

                <div class="mws-form-row">
                    <label>Descripci&oacute;n</label>
                    <div class="mws-form-item small">
                        <?php echo $this->Form->input('descripcion',
                        array('id'=>'descripcion','class' => 'mws-textinput required')); ?>
                    </div>
                </div> 

                     

                <div class="mws-form-row">
                    <label>Tipo de Galer&iacute;a</label>
                    <div class="mws-form-item small">
                        <?php echo $this->Form->input('galeriastipo_id', 
                        array('id'=>'galeriastipo_id','class' => 'mws-textinput required')); ?>
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
        $("#galeria").validate
        ({  
            rules: 
               {
                codigo: 
                {
                    required : true,                
                    minlength: 2
                },
                
                imagen: 
                {
                    required : true,                
                    minlength: 2
                },
                titulo: 
                {
                    required : true,                
                    minlength: 2
                },
                descripcion:{

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
     