<div id="tab-navigation">
	<ul>
		<li><?php echo $this->Html->link(__('Mailing Lists', true), array('controller' => 'mailing_lists', 'action' => 'index')); ?></li>
		<li id="selected"><?php echo $this->Html->link(__('New Mailing List', true), array('controller' => 'mailing_lists', 'action' => 'add')); ?></li>
	</ul>
</div>
<div id="tab-content">
	<div class="mailingLists form">
	<?php echo $this->Form->create('MailingList');?>
		<h2><?php __('Add Mailing List'); ?></h2>
		<?php
			echo $this->Form->input('title');
	                echo __('Use CTRL or SHIFT to select multiple students');
			echo $this->Form->input('Student');
		?>
	<?php echo $this->Form->end(__('Submit', true));?>
	</div>
</div>