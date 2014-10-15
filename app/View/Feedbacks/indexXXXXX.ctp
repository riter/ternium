<div class="galerias index">
	<h2><?php echo __('Galerias'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('imagen'); ?></th>
			<th><?php echo $this->Paginator->sort('texto1'); ?></th>
			<th><?php echo $this->Paginator->sort('texto2'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('galeriastipo_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($galerias as $galeria): ?>
	<tr>
		<td><?php echo h($galeria['Galeria']['id']); ?>&nbsp;</td>
		<td><?php echo h($galeria['Galeria']['imagen']); ?>&nbsp;</td>
		<td><?php echo h($galeria['Galeria']['texto1']); ?>&nbsp;</td>
		<td><?php echo h($galeria['Galeria']['texto2']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($galeria['User']['id'], array('controller' => 'users', 'action' => 'view', $galeria['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($galeria['Galeriastipo']['id'], array('controller' => 'galeriastipos', 'action' => 'view', $galeria['Galeriastipo']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $galeria['Galeria']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $galeria['Galeria']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $galeria['Galeria']['id']), null, __('Are you sure you want to delete # %s?', $galeria['Galeria']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Galeria'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Galeriastipos'), array('controller' => 'galeriastipos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Galeriastipo'), array('controller' => 'galeriastipos', 'action' => 'add')); ?> </li>
	</ul>
</div>
