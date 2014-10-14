<div class="galeriasTipos index">
	<h2><?php echo __('Galerias Tipos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('tipo'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($galeriasTipos as $galeriasTipo): ?>
	<tr>
		<td><?php echo h($galeriasTipo['GaleriasTipo']['id']); ?>&nbsp;</td>
		<td><?php echo h($galeriasTipo['GaleriasTipo']['tipo']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $galeriasTipo['GaleriasTipo']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $galeriasTipo['GaleriasTipo']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $galeriasTipo['GaleriasTipo']['id']), null, __('Are you sure you want to delete # %s?', $galeriasTipo['GaleriasTipo']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Galerias Tipo'), array('action' => 'add')); ?></li>
	</ul>
</div>
