<div class="mws-panel grid_8"> 
    <div class="mws-panel-header">
        <span class="mws-i-24 i-plus">Adicionar Proveedor Representante</span>
    </div> 
    
    <div class="mws-panel-body">
    <?php 
        echo $this->Form->create('ProveedoresRepresentante', array
            (
                'id' => 'proveedores_representante',
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
            <div id="mws-validate-error" class="mws-form-message error" style="display:none;"></div>
            <div class="mws-form-inline"> 
                <div class="mws-form-row">
                    <label>Nombres</label>
                    <div class="mws-form-item small">
                        <?php echo $this->Form->input('nombres', 
                        array('id'=>'nombres','class' => 'mws-textinput required')); ?>
                    </div>
                </div> 

                <div class="mws-form-row">
                    <label>Apellido Paterno</label>
                    <div class="mws-form-item small">
                        <?php echo $this->Form->input('ap', 
                        array('id'=>'ap','class' => 'mws-textinput required')); ?>
                    </div>
                </div> 


                <div class="mws-form-row">
                    <label>Apellido Materno</label>
                    <div class="mws-form-item small">
                     <?php echo $this->Form->input('am', 
                       array('id'=>'am','class' => 'mws-textinput required')); ?>
                    </div>
                </div> 
                <div class="mws-form-row">
                    <label>Direccion</label>
                    <div class="mws-form-item small">
                     <?php echo $this->Form->input('direccion', 
                       array('id'=>'direccion','class' => 'mws-textinput required')); ?>
                    </div>
                </div> 
                <div class="mws-form-row">
                    <label>Teléfono</label>
                    <div class="mws-form-item small">
                        <?php echo $this->Form->input('telefono', 
                        array('id'=>'telefono','class' => 'mws-textinput required')); ?>
                    </div>
                </div> 
                <div class="mws-form-row">
                    <label>Email</label>
                    <div class="mws-form-item small">
                        <?php echo $this->Form->input('email', 
                        array('id'=>'email','class' => 'mws-textinput required')); ?>
                    </div>
                </div> 


                <div class="mws-form-row">
                    <label>Contenido</label>
                    <div class="mws-form-item small"> 
                        <?php echo $this->Form->input('contenido', 
                        array('id'=>'contenido',
                            'class' => 'mws-textinput required')); ?>
                    </div>
                </div> 


                <div class="mws-form-row">  
                    <label>Proveedor</label>

                    <div class="mws-form-item small">
                        <?php echo $this->Form->input('proveedore_id', 
                        array('id'=>'proveedore_id',
                              'class' => 'mws-textinput required')); ?>  
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
   $(function() {
        $("#proveedores_representante").validate({
            rules: {
                nombres: 
                {
                    required : true,                
                    minlength: 2
                },
                ap: 
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
                    : 'You missed ' + errors + ' fields. They have been highlighted';
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
     