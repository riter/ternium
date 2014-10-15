<div class="feedbacks view">
<h2><? php echo __('Feedback'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?><   /dt>
		<dd>
			<?php echo h($feedback['Feedback']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Imagen'); ?></dt>
		<dd>
			<?php echo h($feedback['Feedback']['mensaje']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Texto1'); ?></dt>
		<dd>
			<?php echo h($feedback['Comentario']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Texto2'); ?></dt>
		<dd>
			<?php echo h($feedback['Feedback']['texto2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($feedback['User']['id'], array('controller' => 'users', 'action' => 'view', $feedback['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Feedbacks'); ?></dt>
		<dd>
			<?php echo $this->Html->link($feedback['Feedback']['id'], array('controller' => 'feedbacks', 'action' => 'view', $feedback['Feedbackstipo']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Feedback'), array('action' => 'edit', $feedback['Feedback']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Feedback'), array('action' => 'delete', $feedback['Feedback']['id']), null, __('Are you sure you want to delete # %s?', $feedback['Feedback']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Feedbacks'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Feedback'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Feedbackstipos'), array('controller' => 'feedbackstipos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Feedbackstipo'), array('controller' => 'feedbackstipos', 'action' => 'add')); ?> </li>
	</ul>
</div>
