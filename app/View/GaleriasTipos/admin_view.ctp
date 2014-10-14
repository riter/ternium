<div class="galeriasTipos view">
<h2><?php echo __('Galerias Tipo'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($galeriasTipo['GaleriasTipo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo'); ?></dt>
		<dd>
			<?php echo h($galeriasTipo['GaleriasTipo']['tipo']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Galerias Tipo'), array('action' => 'edit', $galeriasTipo['GaleriasTipo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Galerias Tipo'), array('action' => 'delete', $galeriasTipo['GaleriasTipo']['id']), null, __('Are you sure you want to delete # %s?', $galeriasTipo['GaleriasTipo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Galerias Tipos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Galerias Tipo'), array('action' => 'add')); ?> </li>
	</ul>
</div>
