<div id="tab-navigation">
	<ul>
		<li><?php echo $this->Html->link(__('Newsletters', true), array('controller' => 'newsletters', 'action' => 'index')); ?></li>
		<li id="selected"><?php echo $this->Html->link(__('Edit Newsletter', true), array('controller' => 'newsletters', 'action' => 'edit', $this->data['Newsletter']['id'])); ?></li>
		<li><?php echo $this->Html->link(__('Newsletter Files', true), array('controller' => 'newsletter_attachments', 'action' => 'index', $this->data['Newsletter']['id'])); ?></li>
	</ul>
</div>
<div id="tab-content">
	<div class="newsletters form">
	<?php echo $this->Form->create('Newsletter');?>
		<h2><?php __('Edit Newsletter'); ?></h2>
		<?php
			echo $this->Form->input('id');
			echo $this->Form->input('subject');
	                echo '<label for="NewsletterBody">Body</label>';
	                echo $ckeditor->ckeditor(array('Newsletter', 'body'), $html->base, $this->data['Newsletter']['body']);
		?>
	<?php echo $this->Form->end(__('Submit', true));?>
	</div>
</div>