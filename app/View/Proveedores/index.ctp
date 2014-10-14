<div class="proveedores index">
	<h2><?php echo __('Proveedores'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nombres'); ?></th>
			<th><?php echo $this->Paginator->sort('direccion'); ?></th>
			<th><?php echo $this->Paginator->sort('contactos'); ?></th>
			<th><?php echo $this->Paginator->sort('pais_id'); ?></th>
			<th><?php echo $this->Paginator->sort('provincia_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($proveedores as $proveedore): ?>
	<tr>
		<td><?php echo h($proveedore['Proveedore']['id']); ?>&nbsp;</td>
		<td><?php echo h($proveedore['Proveedore']['nombres']); ?>&nbsp;</td>
		<td><?php echo h($proveedore['Proveedore']['direccion']); ?>&nbsp;</td>
		<td><?php echo h($proveedore['Proveedore']['contactos']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($proveedore['Pais']['id'], array('controller' => 'pais', 'action' => 'view', $proveedore['Pais']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($proveedore['Provincia']['id'], array('controller' => 'provincias', 'action' => 'view', $proveedore['Provincia']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $proveedore['Proveedore']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $proveedore['Proveedore']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $proveedore['Proveedore']['id']), null, __('Are you sure you want to delete # %s?', $proveedore['Proveedore']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Proveedore'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Pais'), array('controller' => 'pais', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pais'), array('controller' => 'pais', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Provincias'), array('controller' => 'provincias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Provincia'), array('controller' => 'provincias', 'action' => 'add')); ?> </li>
	</ul>
</div>
