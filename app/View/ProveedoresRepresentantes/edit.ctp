<div class="proveedoresRepresentantes form">
<?php echo $this->Form->create('ProveedoresRepresentante'); ?>
	<fieldset>
		<legend><?php echo __('Edit Proveedores Representante'); ?></legend>
	<?php
		echo $this->Form->input('id');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ProveedoresRepresentante.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('ProveedoresRepresentante.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Proveedores Representantes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Proveedores'), array('controller' => 'proveedores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Proveedore'), array('controller' => 'proveedores', 'action' => 'add')); ?> </li>
	</ul>
</div>
