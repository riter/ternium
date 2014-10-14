<div class="galeriasTipos form">
<?php echo $this->Form->create('GaleriasTipo'); ?>
	<fieldset>
		<legend><?php echo __('Add Galerias Tipo'); ?></legend>
	<?php
		echo $this->Form->input('tipo');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Galerias Tipos'), array('action' => 'index')); ?></li>
	</ul>
</div>
