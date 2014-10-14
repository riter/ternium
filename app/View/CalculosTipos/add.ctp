<div class="galeriasTipos form">
<?php echo $this->Form->create('CalculosTipo'); ?>
	<fieldset>
		<legend><?php echo __('Add Calculo Tipo'); ?></legend>
	<?php
		echo $this->Form->input('nombre');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Calculo Tipos'), array('action' => 'index')); ?></li>
	</ul>
</div>
