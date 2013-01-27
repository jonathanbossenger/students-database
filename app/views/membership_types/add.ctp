<div class="membershipTypes form">
<?php echo $this->Form->create('MembershipType');?>
	<fieldset>
		<legend><?php __('Add Membership Type'); ?></legend>
	<?php
		echo $this->Form->input('title');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Membership Types', true), array('action' => 'index'));?></li>
	</ul>
</div>