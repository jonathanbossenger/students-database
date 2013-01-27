<div id="tab-navigation">
	<ul>
		<li><?php echo $this->Html->link(__('Newsletters', true), array('controller' => 'newsletters', 'action' => 'index')); ?></li>
		<li id="selected"><?php echo $this->Html->link(__('Send Newsletter', true), array('controller' => 'newsletters', 'action' => 'send', $id)); ?></li>
	</ul>
</div>
<div id="tab-content">

	<div class="newsletters form">
	<?php echo $this->Form->create('Newsletter');?>
		<h2>Send Newsletter</h2>
		<fieldset>
			<legend><?php __('Newsletter Content'); ?></legend>
		<?php
			echo $this->Form->input('id');
			foreach ($this->data['NewsletterAttachment'] as $attachment){
				
				
				echo '<div class="email attachment"><a href="' .$this->Html->url('/' . $attachment['file'], true) .  '">' . basename($attachment['file']) . '</a></div>';
			}
			
			echo '<div class="email subject">Subject: ' . $this->data['Newsletter']['subject'] . '</div>';
            echo '<div class="email body">' . $this->data['Newsletter']['body'] . '</div>';;
		?>
		</fieldset>
		<?php echo $this->Form->input('MailingList', array('label' => 'Select a Mailing List for the Newsletter', 'empty' => 'Select Mailing List')); ?>
		OR
		<?php echo $this->Form->input('Program', array('multiple' => 'checkbox', 'label' => 'Select from the Programs')); ?>
	<?php echo $this->Form->end(__('Submit', true));?>
	</div>
</div>	