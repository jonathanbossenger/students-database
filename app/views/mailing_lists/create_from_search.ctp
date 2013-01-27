<?php echo $this->Html->script('mailing_list_select', array('inline' => false)); ?>
<div class="mailingLists form">
<?php echo $this->Form->create('MailingList');?>
	<fieldset>
		<legend><?php __('Create Mailing List from Search Results'); ?></legend>
	<?php
                echo $this->Form->input('searchId', array('type' => 'hidden', 'value' => $searchId));
		echo $this->Form->input('title');
                echo __('Use CTRL or SHIFT to select multiple students');
		echo $this->Form->input('Student');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Mailing Lists', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Students', true), array('controller' => 'students', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student', true), array('controller' => 'students', 'action' => 'add')); ?> </li>
	</ul>
</div>
<script>
    selectAll('StudentStudent', true);
</script>