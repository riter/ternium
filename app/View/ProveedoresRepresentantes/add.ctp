<div class="proveedoresRepresentantes form">
<?php echo $this->Form->create('ProveedoresRepresentante'); ?>
	<fieldset>
		<legend><?php echo __('Add Proveedores Representante'); ?></legend>
	<?php
		echo $this->Form->input('nombres');
		echo $this->Form->input('ap');
		echo $this->Form->input('am');
		echo $this->Form->input('direccion');
		echo $this->Form->input('telefono');
		echo $this->Form->input('email');
		echo $this->Form->input('contenido');
		echo $this->Form->input('proveedore_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Proveedores Representantes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Proveedores'), array('controller' => 'proveedores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Proveedore'), array('controller' => 'proveedores', 'action' => 'add')); ?> </li>
	</ul>
</div>
