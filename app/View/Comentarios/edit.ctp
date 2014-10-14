<div class="galeriasTipos form">
<?php echo $this->Form->create('GaleriasTipo'); ?>
	<fieldset>
		<legend><?php echo __('Edit Galerias Tipo'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('tipo');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('GaleriasTipo.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('GaleriasTipo.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Galerias Tipos'), array('action' => 'index')); ?></li>
	</ul>
</div>
