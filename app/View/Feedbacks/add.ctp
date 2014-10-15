<div class="galerias form">
<?php echo $this->Form->create('Galeria'); ?>
	<fieldset>
		<legend><?php echo __('Add Galeria'); ?></legend>
	<?php
		echo $this->Form->input('imagen');
		echo $this->Form->input('titulo');
		echo $this->Form->input('descripcion');
		echo $this->Form->input('user_id');
		echo $this->Form->input('galeriastipo_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Galerias'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Galeriastipos'), array('controller' => 'galeriastipos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Galeriastipo'), array('controller' => 'galeriastipos', 'action' => 'add')); ?> </li>
	</ul>
</div>
