<div class="mws-panel grid_8"> 
    <div class="mws-panel-header">
        <span class="mws-i-24 i-plus">Editar Galería</span>
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
                <?php //pr($Galeria);?>
                <!--<div class="mws-form-row" style="display:none" >
                    <label>Imagen2</label> 
                    <div class="mws-form-item small">
                        <?php  /* echo $this->Form->input('imagen', 
                        array('id'=>'imagen2','name'=>'data[Galeria][imagen2]',
                                'class' => 'mws-textinput required')); */?> 
                    </div>
                </div>-->


                <div class="mws-form-row">
                    <label>Usuario</label>
                    <div class="mws-form-item small">
                        <?php echo $this->Form->input('user_id', 
                        array('id'=>'user_id','class' => 'mws-textinput required')); ?> 
                    </div>
                </div> 

                <div class="mws-form-row">
                    <label>Mensaje</label>
                    <div class="mws-form-item small">
                        <?php echo $this->Form->input('mensaje',
                        array('id'=>'mensaje','class' => 'mws-textinput required')); ?>
                    </div>
                </div> 

                <div class="mws-form-row">
                    <label>Comentarios</label>
                    <div class="mws-form-item small">
                        <?php echo $this->Form->input('comentario_id', 
                        array('id'=>'comentario_id','class' => 'mws-textinput required')); ?> 
                    </div>
                </div>       

                <div class="mws-form-row">
                    <label>Estado</label>
                    <div class="mws-form-item small">
                        <?php echo $this->Form->input('leido', 
                        array('id'=>'leido','class' => 'mws-textinput required')); ?>
                    </div>
                </div> 
            </div>
            
        <?php
        echo $this->Form->end(array(
            'label' => __('Save'),
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
                user_id: 
                {
                    required : true,                
                    minlength: 2
                },
                comentario_id: 
                {
                    required : true,                
                    minlength: 2
                },
                mensaje: 
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
        });
    });

     </script> 
    </div>      
</div> 
     