<div class="mws-panel grid_8">

    <div class="mws-panel-header">
        <span class="mws-i-24 i-plus">Adicionar Usuarios</span>
    </div>

    <div class="mws-panel-body">
        <?php
        echo $this->Form->create('User', array
            (
            'id' => 'user',
            'class' => 'mws-form',
            'enctype' => 'multipart/form-data',
            'autocomplete' => 'off',
            'inputDefaults' => array(
                'label' => false,
                'div' => false, 
                'error' => array('attributes' => array('class' => 'error')) 
            )
        ));
        ?>
            <div id="mws-validate-error" class="mws-form-message error" style="display:none;"></div>
            <div class="mws-form-inline">
                
                <div class="mws-form-row">
                    <label>Nombre</label>
                    <div class="mws-form-item small">
                        <?php echo $this->Form->input('nombre',
                         array('id'=>'nombre','class' => 'mws-textinput required')); ?>
                    </div>
                </div>
                <div class="mws-form-row">
                    <label>Apellido</label>
                    <div class="mws-form-item small">
                        <?php echo $this->Form->input('apellido', array('id'=>'apellido','class' => 'mws-textinput required')); ?>
                    </div>
                </div> 
                <div class="mws-form-row">
                    <label>Telefono</label>
                    <div class="mws-form-item small">
                        <?php echo $this->Form->input('telefono', array('id'=>'telefono','class' => 'mws-textinput number')); ?>
                    </div>
                </div> 
                 <div class="mws-form-row">
                    <label>Email</label>
                    <div class="mws-form-item small">
                    <?php echo $this->Form->input('email', array('id' => 'email', 'class' => 'mws-textinput required')); ?>
                    </div>
                </div>

                  <div class="mws-form-row">
                    <label>Usuario</label>
                    <div class="mws-form-item small">
                        <?php echo $this->Form->input('username', array('id'=>'username','class' => 'mws-textinput required')); ?>
                    </div>
                </div>

               
               
                
                <div class="mws-form-row">
                    <label>Contraseña</label>
                    <div class="mws-form-item small">
               <?php echo $this->Form->input('password', array('id' => 'password', 'class' => 'mws-textinput required')); ?>
                    </div>
                </div>


                <div class="mws-form-row">
                    <label>Confirmar Contraseña</label>
                    <div class="mws-form-item small">
                        <?php  echo $this->Form->input('confirm_password', array('type'=>'password', 
                                'id' => 'confirm_password', 'class' => 'mws-textinput')); ?>      
                    </div>
                </div>

                  <div class="mws-form-row">
                    <label>País</label>
                    <div class="mws-form-item small">
                        <?php echo $this->Form->input('pais_id', 
                        array('id'=>'pais_id',
                              'class' => 'mws-textinput required')); ?>  
                    </div>
                </div>



                <div class="mws-form-row">
                    <label>Rol</label>
                    <div class="mws-form-item small">          
                        <?php $options = array('1'=>'Admin','2'=> 'Public') ?>
                       <?php echo $this->Form->input('role', array('type'=>'select','label' => false,'options' => $options,)); ?>                             
                    </div>
                </div>

                <!--
               <div class="mws-form-row">
                    <label>Notes</label>
                    <div class="mws-form-item small">                       
                        <?php  //echo $this->Form->textarea('notes', array('id' => 'notes', 'rows' => '4', 'cols' => 'auto','class' => 'mws-textinput')); ?>
                    </div>
                </div>
             -->
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
        $("#user").validate({
            rules: {
                 nombre: 
                {
                    required : true,                
                    minlength: 2
                },
                pais_id: 
                {
                    required : true,                
                    minlength: 2
                },
               
                username: 
                {

                    required : true,                
                    minlength: 2
                },
                 password: 
                {
                   required : true,                
                    minlength: 2
                },
                  email: 
                {

                    required : true,                
                    minlength: 2
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
        });
    });
        </script>
                
    </div>    	
</div> 
     