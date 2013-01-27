<div class="systemEmails form">
<?php echo $this->Form->create('SystemEmail');?>
	<fieldset>
		<legend><?php __('Add System Email'); ?></legend>
	<?php
		echo $this->Form->input('from');
		echo $this->Form->input('replyTo');
		echo $this->Form->input('to');
		echo $this->Form->input('cc');
		echo $this->Form->input('bcc');
		echo $this->Form->input('body');
		echo $this->Form->input('attachments');
		echo $this->Form->input('layout');
		echo $this->Form->input('template');
		echo $this->Form->input('sendAs');
		echo $this->Form->input('subject');
		echo $this->Form->input('processed');
		echo $this->Form->input('date');
		echo $this->Form->input('opened');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List System Emails', true), array('action' => 'index'));?></li>
	</ul>
</div>