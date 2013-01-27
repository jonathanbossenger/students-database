<div class="ranks form">
<?php echo $this->Form->create('Rank');?>
	<fieldset>
		<legend><?php __('Add Rank'); ?></legend>
	<?php
		echo $this->Form->input('title');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Ranks', true), array('action' => 'index'));?></li>
	</ul>
</div>