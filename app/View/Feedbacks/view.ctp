<div class="galerias view">
<h2><?php echo __('Galeria'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($galeria['Galeria']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Imagen'); ?></dt>
		<dd>
			<?php echo h($galeria['Galeria']['imagen']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Texto1'); ?></dt>
		<dd>
			<?php echo h($galeria['Galeria']['texto1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Texto2'); ?></dt>
		<dd>
			<?php echo h($galeria['Galeria']['texto2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($galeria['User']['id'], array('controller' => 'users', 'action' => 'view', $galeria['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Galeriastipo'); ?></dt>
		<dd>
			<?php echo $this->Html->link($galeria['Galeriastipo']['id'], array('controller' => 'galeriastipos', 'action' => 'view', $galeria['Galeriastipo']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Galeria'), array('action' => 'edit', $galeria['Galeria']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Galeria'), array('action' => 'delete', $galeria['Galeria']['id']), null, __('Are you sure you want to delete # %s?', $galeria['Galeria']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Galerias'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Galeria'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Galeriastipos'), array('controller' => 'galeriastipos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Galeriastipo'), array('controller' => 'galeriastipos', 'action' => 'add')); ?> </li>
	</ul>
</div>
