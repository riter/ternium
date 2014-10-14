<div class="proveedores view">
<h2><?php echo __('Proveedore'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($proveedore['Proveedore']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombres'); ?></dt>
		<dd>
			<?php echo h($proveedore['Proveedore']['nombres']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Direccion'); ?></dt>
		<dd>
			<?php echo h($proveedore['Proveedore']['direccion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contactos'); ?></dt>
		<dd>
			<?php echo h($proveedore['Proveedore']['contactos']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pais'); ?></dt>
		<dd>
			<?php echo $this->Html->link($proveedore['Pais']['id'], array('controller' => 'pais', 'action' => 'view', $proveedore['Pais']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Provincia'); ?></dt>
		<dd>
			<?php echo $this->Html->link($proveedore['Provincia']['id'], array('controller' => 'provincias', 'action' => 'view', $proveedore['Provincia']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Proveedore'), array('action' => 'edit', $proveedore['Proveedore']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Proveedore'), array('action' => 'delete', $proveedore['Proveedore']['id']), null, __('Are you sure you want to delete # %s?', $proveedore['Proveedore']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Proveedores'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Proveedore'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pais'), array('controller' => 'pais', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pais'), array('controller' => 'pais', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Provincias'), array('controller' => 'provincias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Provincia'), array('controller' => 'provincias', 'action' => 'add')); ?> </li>
	</ul>
</div>
