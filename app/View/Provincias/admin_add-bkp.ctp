<style type="text/css">

			
		/*.provincias fieldset .textarea label 
		{vertical-align: top}
*/
		.provincias fieldset .select label,
		.provincias fieldset .select select{float: left;}
		.provincias fieldset .select label
		{width: 4.7%;}
	
		.provincias fieldset .select select
		{ 
		  max-width: 95.3%;
		  width: auto;
		  min-width: 1%; 
		}
</style>
<div class="provincias form">
<?php echo $this->Form->create('Provincia'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Provincia'); ?></legend>
	<?php
		echo $this->Form->input('nombre');
		echo $this->Form->input('pais_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

<!--
<div class="actions">
	<h3><?php //echo __('Actions'); ?></h3>
	<ul>

		<li><?php //echo $this->Html->link(__('List Provincias'), array('action' => 'index')); ?></li>
		<li><?php //echo $this->Html->link(__('List Paises'), array('controller' => 'paises', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('New Pais'), array('controller' => 'paises', 'action' => 'add')); ?> </li>
		<li><?php //echo $this->Html->link(__('List Proveedores'), array('controller' => 'proveedores', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('New Proveedore'), array('controller' => 'proveedores', 'action' => 'add')); ?> </li>
	</ul>
</div>
-->