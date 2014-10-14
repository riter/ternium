<div class="provincias view">
<h2><?php echo __('Provincia'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($provincia['Provincia']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($provincia['Provincia']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Paise'); ?></dt>
		<dd>
			<?php echo $this->Html->link($provincia['Paise']['id'], array('controller' => 'paises', 'action' => 'view', $provincia['Paise']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Provincia'), array('action' => 'edit', $provincia['Provincia']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Provincia'), array('action' => 'delete', $provincia['Provincia']['id']), null, __('Are you sure you want to delete # %s?', $provincia['Provincia']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Provincias'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Provincia'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Paises'), array('controller' => 'paises', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pais'), array('controller' => 'paises', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Proveedores'), array('controller' => 'proveedores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Proveedore'), array('controller' => 'proveedores', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Proveedores'); ?></h3>
	<?php if (!empty($provincia['Proveedore'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nombres'); ?></th>
		<th><?php echo __('Direccion'); ?></th>
		<th><?php echo __('Contactos'); ?></th>
		<th><?php echo __('Pais Id'); ?></th>
		<th><?php echo __('Provincia Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($provincia['Proveedore'] as $proveedore): ?>
		<tr>
			<td><?php echo $proveedore['id']; ?></td>
			<td><?php echo $proveedore['nombres']; ?></td>
			<td><?php echo $proveedore['direccion']; ?></td>
			<td><?php echo $proveedore['contactos']; ?></td>
			<td><?php echo $proveedore['pais_id']; ?></td>
			<td><?php echo $proveedore['provincia_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'proveedores', 'action' => 'view', $proveedore['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'proveedores', 'action' => 'edit', $proveedore['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'proveedores', 'action' => 'delete', $proveedore['id']), null, __('Are you sure you want to delete # %s?', $proveedore['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Proveedore'), array('controller' => 'proveedores', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
