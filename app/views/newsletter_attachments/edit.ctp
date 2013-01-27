<div class="newsletterAttachments form">
<?php echo $this->Form->create('NewsletterAttachment');?>
	<fieldset>
		<legend><?php __('Edit Newsletter Attachment'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('newsletter_id', array('value' => $newsletterId, 'type' => 'hidden'));
		echo $this->Form->input('file');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('NewsletterAttachment.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('NewsletterAttachment.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Newsletter Attachments', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Newsletters', true), array('controller' => 'newsletters', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Newsletter', true), array('controller' => 'newsletters', 'action' => 'add')); ?> </li>
	</ul>
</div>