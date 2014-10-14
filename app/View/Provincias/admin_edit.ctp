<div class="mws-panel grid_8"> 
    <div class="mws-panel-header">
        <span class="mws-i-24 i-plus">Editar Provincias</span>
    </div>
    <div class="mws-panel-body">
        <?php         
        echo $this->Form->create('Provincia', array(
            'id' => 'provincia',
            'class' => 'mws-form',
            'enctype' => 'multipart/form-data',
            'autocomplete' => 'off', 
            'inputDefaults' => array
            ( 
                'label' => false,
                'div' => false,
                'error' => array('attributes' => array('class' => 'error'))
            ) 
        ));
        ?>
            <div id="mws-validate-error" class="mws-form-message error" style="display:none;"></div>
            <div class="mws-form-inline">
                
                <div class="mws-form-row" style="display:none" >
                    <label></label>
                    <div class="mws-form-item small">
                        <?php echo $this->Form->input('id', array('id'=>'id','class' => 'mws-textinput required')); ?> 
                    </div>
                </div> -->

                
                <div class="mws-form-row">
                    <label>Provincia</label>
                    <div class="mws-form-item small">
                        <?php echo $this->Form->input('nombre', array('id'=>'nombre','class' => 'mws-textinput required')); ?> 
                    </div>
                </div> 

                <div class="mws-form-row">
                    <label>País</label>
                    <div class="mws-form-item small">
                        <?php echo $this->Form->input('pais_id', array('id'=>'pais_id','class' => 'mws-textinput required')); ?>
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
   $(function() {
        $("#provincia").validate({
            rules: {
                pais_id: 
                {
                    required : true,
                    minlength: 2
                },
                nombre: 
                {
                    required : true,
                    minlength: 5
                }
                }
            },
             invalidHandler: function(form, validator) {
                var errors = validator.numberOfInvalids();
                if (errors) { /* 'Olvidastes 1 campo. Ha sido remarcado'  : 'o olvidado ' + errors + ' fields. They have been highlighted';*/
                    var message = errors == 1
                    ? 'Olvido 1 campo. Ha sido remarcado'
                    : 'Ha olvidado ' + errors + ' campos. Han sido remarcados';
                    $("#mws-validate-error").html(message).show();
                } else {
                    $("#mws-validate-error").hide();
                }
            }
           /* invalidHandler: function(form, validator) {
                var errors = validator.numberOfInvalids();
                if (errors) {
                    var message = errors == 1
                    ? 'Olvidastes 1 campo. Ha sido remarcado'
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
    