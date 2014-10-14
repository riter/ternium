<style type="text/css">

	.proveedores table{ width: 100%}
	.proveedores table tr:hover{background-color:#ff9900  }
	
	.proveedores table tr td{color: #3d464b}
	.proveedores table tr td a{color: #3d464b}

	.proveedores table tr th a
	{ text-decoration:none!important; 
	  font-size: 14px;
	 font-weight:bold;color: #3d464b }

</style>
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
			<th class="actions"><?php echo __('Aciones'); ?></th>
	</tr>
	<?php foreach ($proveedores as $proveedore): ?>
	<tr>
		<td><?php echo h($proveedore['Proveedore']['id']); ?>&nbsp;</td>
		<td><?php echo h($proveedore['Proveedore']['nombres']); ?>&nbsp;</td>
		<td><?php echo h($proveedore['Proveedore']['direccion']); ?>&nbsp;</td>
		<td><?php echo h($proveedore['Proveedore']['contactos']); ?>&nbsp;</td>
		<td>
			<?php //echo $this->Html->link($proveedore['Paise']['nombre'], array('controller' => 'paises', 'action' => 'view', $proveedore['Paise']['id'])); ?>
			<?php echo h($proveedore['Paise']['nombre']); ?>&nbsp;
		</td>
		<td>
			<?php // echo $this->Html->link($proveedore['Provincia']['nombre'], array('controller' => 'provincias', 'action' => 'view', $proveedore['Provincia']['id'])); ?>
			<?php echo h($proveedore['Provincia']['nombre']); ?>&nbsp;

		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $proveedore['Proveedore']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $proveedore['Proveedore']['id'])); ?>
			<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $proveedore['Proveedore']['id']), null, __('Are you sure you want to delete # %s?', $proveedore['Proveedore']['id'])); ?>
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
<!--
<div class="actions">
	<h3><?php //echo __('Actions'); ?></h3>
	<ul>
		<li><?php //echo $this->Html->link(__('New Proveedore'), array('action' => 'add')); ?></li>
		<li><?php //echo $this->Html->link(__('List Pais'), array('controller' => 'paises', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('New Pais'), array('controller' => 'paises', 'action' => 'add')); ?> </li>
		<li><?php //echo $this->Html->link(__('List Provincias'), array('controller' => 'provincias', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('New Provincia'), array('controller' => 'provincias', 'action' => 'add')); ?> </li>
	</ul>
</div>
--> 
