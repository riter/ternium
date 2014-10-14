<?php // pr($paises); ?>
<!--
<style type="text/css">

	.paises table{ width: 100%}
	.paises table tr:hover{background-color:#ff9900  }
	.paises table tr td{color: #3d464b}
	.paises table tr td a{color: #3d464b}

	.paises table tr th a{text-decoration:none!important; 
								font-size: 14px;
								font-weight:bold;color: #3d464b }

</style>

<div class="paises index">
	<h2><?php echo __('Paises'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('codigo'); ?></th>
			<th><?php echo $this->Paginator->sort('nombre'); ?></th>
			<th class="actions"><?php echo __('Aciones'); ?></th>
	</tr>
	<?php foreach ($paises as $paise): ?>
	<tr>
		<td><?php echo h($paise['Paise']['id']); ?>&nbsp;</td>
		<td><?php echo h($paise['Paise']['codigo']); ?>&nbsp;</td>
		<td><?php echo h($paise['Paise']['nombre']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $paise['Paise']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $paise['Paise']['id'])); ?>
			<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $paise['Paise']['id']), null, __('Are you sure you want to delete # %s?', $paise['Paise']['id'])); ?>
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

-->