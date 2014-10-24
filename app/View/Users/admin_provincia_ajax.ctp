<?php //print_r($provincias);exit;?>
<div class="mws-panel grid_8"> 
    <div class="mws-panel-header">
        <span class="mws-i-24 i-plus">Buscar por pais</span>
    </div> 
    
    <div class="mws-panel-body">
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
         <div id="mws-validate-error" class="mws-form-message error" style="display:none;"></div>
            <div class="mws-form-inline">
                <div class="mws-form-row">
                     <div class="mws-form-item small">
                        <?php echo $this->Form->input('pais_id', 
                        array('id'=>'pais_id',
                              'class' => 'mws-textinput required')); ?>  
                    </div>
                  </div>
                <?php    
                echo $this->Form->end(array(
                    'label' => __('Buscar'),
                   // 'action'=>'provincia_ajax',
                    'div' => array(
                    'class' => 'mws-button-row', ), 'class' => 'mws-button red'));
                
    
                ?>
        
                
                
            <div class="mws-panel-body">
                <table class="mws-datatable-fn mws-table">
                    <thead>
                        <tr>
                            <th>País</th>
                            <th>Provincia</th> 
                           
                        </tr>
                    </thead>
            <tbody>
                <?php foreach ($provincias as $provincia): ?> 
                    <tr>    
                        <td><?php echo $provincia['Paise']['nombre']; ?></td>
                        <td><?php echo $provincia['Provincia']['nombre']; ?></td> 
                        
                    </tr>
                <?php endforeach; ?>
                    <td>
                            <?php echo $this->Html->link('Buscar', array('action' => 'provincia_ajax', $provincia['Provincia']['pais_id']));
                            print_r( " si ".$provincia['Provincia']['nombre']);exit;?>
                        </td>
            </tbody>
        </table>
    </div>
                    
         </div> 
        </div> 
        </div> 