<div class="programs form">
<?php echo $this->Form->create('Program');?>
	<fieldset>
		<legend><?php __('Edit Program'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		//echo $this->Form->input('Student');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Program.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Program.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Programs', true), array('action' => 'index'));?></li>
	</ul>
</div>