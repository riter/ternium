<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span class="mws-i-24 i-plus">Add Video</span>
    </div>
    <div class="mws-panel-body">
        <?php
        echo $this->Form->create('Library', array(
            'id' => 'library',
            'class' => 'mws-form',           
            'type' => 'file',
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
                    <label>Title</label>
                    <div class="mws-form-item small">
                        <?php echo $this->Form->input('title', array('id'=>'title', 'class' => 'mws-textinput required')); ?>
                    </div>
                </div>
                <div class="mws-form-row">
                    <label>Position</label>
                    <div class="mws-form-item small">
                        <?php echo $this->Form->input('position', array('id'=>'position','class' => 'mws-textinput required number')); ?>
                    </div>
                </div>
                <div class="mws-form-row">
                    <label for="Created">Created</label>
                    <div class="mws-form-item small">                   
                        <?php echo $this->Form->input('created', array('value' => '','id'=>'created', 'type' => 'text', 'readonly'=>true, 'class' => 'mws-datepicker')); ?>                 
                    </div>
                </div>
                <div class="mws-form-row">
                    <label>Type of Video</label>
                    <div class="mws-form-item small">
                        <input type="radio" name="typevideo" id="url_video" value="1" /> URL of Video &nbsp;&nbsp;&nbsp;
                        <input type="radio" name="typevideo" id="upload_video" value="2" /> Upload Video                      
                    </div>
                </div>                
                <div id="urlvideo" class="mws-form-row" style="display: none;">
                    <label>Url Video</label>
                    <div class="mws-form-item small">                                            
                        <?php echo $this->Form->textarea('video', array('id' => 'video', 'rows' => '5', 'cols' => 'auto','class' => 'mws-textinput required')); ?>
                        <?php 

                        ?>
                    </div>
                </div>      
                <div id="uploadvideo" class="mws-form-row" style="display: none;">
                    <label>Upload Video</label>
                    <div class="mws-form-item small">                   
                        <?php echo $this->Form->input('nvideo', array('type' => 'file')); ?>                        
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
                function unhide_url() {                    
                    $('#urlvideo').css({'display': 'block'});
                    hide_upload();
                }
                function hide_url() {                   
                    $('#urlvideo').css({'display': 'none'});
                }
                function unhide_upload() {                    
                    $('#uploadvideo').css({'display': 'block'});
                    hide_url();
                }
                function hide_upload() {                   
                    $('#uploadvideo').css({'display': 'none'});
                }
                
                $('#url_video').click(function(){
                    if($(this).is(':checked'))
                        unhide_url();
                    else
                        hide_url();
                });
                $('#upload_video').click(function(){
                    if($(this).is(':checked'))
                        unhide_upload();
                    else
                        hide_upload();
                });
                
            });
        </script>
        
        <script>    
   $(function() {
        $("#library").validate({
            rules: {
                title: {
                    required : true,                
                    minlength: 5
                },
                video:{
                    required : true
                   
                }
            },
            invalidHandler: function(form, validator) {
                var errors = validator.numberOfInvalids();
                if (errors) {
                    var message = errors == 1
                    ? 'You missed 1 field. It has been highlighted'
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