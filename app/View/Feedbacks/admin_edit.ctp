<style>
    #radio-leido{
        background-color:green;
        float:none !important;
    }
</style>

<div class="mws-panel grid_8"> 
    <div class="mws-panel-header">
        <span class="mws-i-24 i-plus">Editar Feedback</span>
    </div>

    <div class="mws-panel-body">
        <?php 

            echo $this->Form->create('Feedback', array
            (   
                'id' => 'feedback',
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
                <label>Usuario</label>
                <div class="mws-form-item small">
                        <?php echo $this->Form->input('user_id', 
                        array('id'=>'user_id','class' => 'mws-textinput required','disabled')); ?> 
                </div>
            </div> 

            <div class="mws-form-row">
                <label>Mensaje</label>
                <div class="mws-form-item small">
                        <?php echo $this->Form->input('mensaje',
                        array('id'=>'mensaje','class' => 'mws-textinput required','disabled')); ?>
                </div>
            </div> 

            <div class="mws-form-row">
                <label>Tipo mensajes</label>
                <div class="mws-form-item small">
                        <?php echo $this->Form->input('comentario_id', 
                        array('id'=>'comentario_id','class' => 'mws-textinput required','disabled')); ?> 
                </div>
            </div>       

            <div class="mws-form-row">
                <label>Estado</label>
                <div class="mws-form-item small">
                    <?php
                        $options = array('1' => 'Leido', '0' => 'No Leido');
                         $attributes = array('separator' => false,'legend'=>false);
                         echo $this->Form->radio('leido', $options, $attributes);
                         //echo $this->Form->input('comentario_id',   array('id'=>'comentario_id','class' => 'mws-textinput required')); ?>


                   
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
                $("#feedback").validate
                        ({
                            rules:
                                    {
                                        user_id:
                                                {
                                                    required: false,
                                                    minlength: 2
                                                },
                                        comentario_id:
                                                {
                                                    required: true,
                                                    minlength: 2
                                                },
                                        mensaje:
                                                {
                                                    required: true,
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
