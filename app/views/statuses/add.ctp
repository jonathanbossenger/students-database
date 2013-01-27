<div class="statuses form">
<?php echo $this->Form->create('Status');?>
	<fieldset>
		<legend><?php __('Add System Action'); ?></legend>
	<?php
		echo $this->Form->input('mail');
		echo $this->Form->input('search');
		echo $this->Form->input('attendance');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List System Actions', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Students', true), array('controller' => 'students', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student', true), array('controller' => 'students', 'action' => 'add')); ?> </li>
	</ul>
</div>