<div class="CalculosTipos view">
<h2><?php echo __('Calculos Tipo'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($CalculosTipo['CalculosTipo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo'); ?></dt>
		<dd>
			<?php echo h($CalculosTipo['CalculosTipo']['tipo']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Calculos Tipo'), array('action' => 'edit', $CalculosTipo['CalculosTipo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Eliminar Calculos Tipo'), array('action' => 'delete', $CalculosTipo['CalculosTipo']['id']), null, __('Esta seguro de eliminar', $CalculosTipo['CalculosTipo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar de Calculos Tipos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Calculos Tipo'), array('action' => 'add')); ?> </li>
	</ul>
</div>
