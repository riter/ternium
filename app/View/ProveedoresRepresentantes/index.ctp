<div class="proveedoresRepresentantes index">
	<h2><?php echo __('Proveedores Representantes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nombres'); ?></th>
			<th><?php echo $this->Paginator->sort('ap'); ?></th>
			<th><?php echo $this->Paginator->sort('am'); ?></th>
			<th><?php echo $this->Paginator->sort('direccion'); ?></th>
			<th><?php echo $this->Paginator->sort('telefono'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('contenido'); ?></th>
			<th><?php echo $this->Paginator->sort('proveedore_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($proveedoresRepresentantes as $proveedoresRepresentante): ?>
	<tr>
		<td><?php echo h($proveedoresRepresentante['ProveedoresRepresentante']['id']); ?>&nbsp;</td>
		<td><?php echo h($proveedoresRepresentante['ProveedoresRepresentante']['nombres']); ?>&nbsp;</td>
		<td><?php echo h($proveedoresRepresentante['ProveedoresRepresentante']['ap']); ?>&nbsp;</td>
		<td><?php echo h($proveedoresRepresentante['ProveedoresRepresentante']['am']); ?>&nbsp;</td>
		<td><?php echo h($proveedoresRepresentante['ProveedoresRepresentante']['direccion']); ?>&nbsp;</td>
		<td><?php echo h($proveedoresRepresentante['ProveedoresRepresentante']['telefono']); ?>&nbsp;</td>
		<td><?php echo h($proveedoresRepresentante['ProveedoresRepresentante']['email']); ?>&nbsp;</td>
		<td><?php echo h($proveedoresRepresentante['ProveedoresRepresentante']['contenido']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($proveedoresRepresentante['Proveedore']['id'], array('controller' => 'proveedores', 'action' => 'view', $proveedoresRepresentante['Proveedore']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $proveedoresRepresentante['ProveedoresRepresentante']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $proveedoresRepresentante['ProveedoresRepresentante']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $proveedoresRepresentante['ProveedoresRepresentante']['id']), null, __('Are you sure you want to delete # %s?', $proveedoresRepresentante['ProveedoresRepresentante']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Proveedores Representante'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Proveedores'), array('controller' => 'proveedores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Proveedore'), array('controller' => 'proveedores', 'action' => 'add')); ?> </li>
	</ul>
</div>
