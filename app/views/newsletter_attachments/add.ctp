<div id="tab-navigation">
	<ul>
		<li><?php echo $this->Html->link(__('Newsletters', true), array('controller' => 'newsletters', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Edit Newsletter', true), array('controller' => 'newsletters', 'action' => 'edit', $newsletterId)); ?></li>
		<li><?php echo $this->Html->link(__('Newsletter Files', true), array('controller' => 'newsletter_attachments', 'action' => 'index', $newsletterId)); ?></li>
		<li id="selected"><?php echo $this->Html->link(__('Add File', true), array('controller' => 'newsletter_attachments', 'action' => 'add', $newsletterId)); ?></li>
	</ul>
</div>
<div id="tab-content">
	<div class="newsletterAttachments form">
	<?php echo $this->Form->create('NewsletterAttachment', array('enctype' => 'multipart/form-data'));?>
		<h2><?php __('Add Newsletter File'); ?></h2>
		<?php
			echo $this->Form->input('newsletter_id', array('value' => $newsletterId, 'type' => 'hidden'));
			echo $this->Form->input('file', array('type' => 'file'));
		?>
	<?php echo $this->Form->end(__('Submit', true));?>
	</div>
</div>