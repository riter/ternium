<div class="calculosTipos index">
	<h2><?php echo __('Calculos Tipos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nombre'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($calculosTipos as $calculosTipo): ?>
	<tr>
		<td><?php echo h($calculosTipo['CalculosTipo']['id']); ?>&nbsp;</td>
		<td><?php echo h($calculosTipo['CalculosTipo']['tipo']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $calculosTipo['CalculosTipo']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $calculosTipo['CalculosTipo']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $calculosTipo['CalculosTipo']['id']), null, __('Esta seguro de eliminar # %s?', $calculosTipo['CalculosTipo']['id'])); ?>
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
