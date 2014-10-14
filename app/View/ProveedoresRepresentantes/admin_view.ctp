<div class="proveedoresRepresentantes view">
<h2><?php echo __('Proveedores Representante'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($proveedoresRepresentante['ProveedoresRepresentante']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombres'); ?></dt>
		<dd>
			<?php echo h($proveedoresRepresentante['ProveedoresRepresentante']['nombres']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ap'); ?></dt>
		<dd>
			<?php echo h($proveedoresRepresentante['ProveedoresRepresentante']['ap']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Am'); ?></dt>
		<dd>
			<?php echo h($proveedoresRepresentante['ProveedoresRepresentante']['am']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Direccion'); ?></dt>
		<dd>
			<?php echo h($proveedoresRepresentante['ProveedoresRepresentante']['direccion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Telefono'); ?></dt>
		<dd>
			<?php echo h($proveedoresRepresentante['ProveedoresRepresentante']['telefono']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($proveedoresRepresentante['ProveedoresRepresentante']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contenido'); ?></dt>
		<dd>
			<?php echo h($proveedoresRepresentante['ProveedoresRepresentante']['contenido']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Proveedore'); ?></dt>
		<dd>
			<?php echo $this->Html->link($proveedoresRepresentante['Proveedore']['id'], array('controller' => 'proveedores', 'action' => 'view', $proveedoresRepresentante['Proveedore']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Proveedores Representante'), array('action' => 'edit', $proveedoresRepresentante['ProveedoresRepresentante']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Proveedores Representante'), array('action' => 'delete', $proveedoresRepresentante['ProveedoresRepresentante']['id']), null, __('Are you sure you want to delete # %s?', $proveedoresRepresentante['ProveedoresRepresentante']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Proveedores Representantes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Proveedores Representante'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Proveedores'), array('controller' => 'proveedores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Proveedore'), array('controller' => 'proveedores', 'action' => 'add')); ?> </li>
	</ul>
</div>
