<div id="tab-navigation">
	<ul>
		<li><?php echo $this->Html->link(__('Newsletters', true), array('controller' => 'newsletters', 'action' => 'index')); ?></li>
		<li id="selected"><?php echo $this->Html->link(__('Add Newsletter', true), array('controller' => 'newsletters', 'action' => 'add')); ?></li>
	</ul>
</div>
<div id="tab-content">
	<div class="newsletters form">
	<?php echo $this->Form->create('Newsletter', array('enctype' => 'multipart/form-data'));?>
		<h2><?php __('Add Newsletter'); ?></h2>
		<?php
			echo $this->Form->input('file.0', array('type' => 'file', 'label' => 'Attachment'));
			echo $this->Form->input('subject');
			//echo $this->Form->input('body');
            echo '<label for="NewsletterBody">Body</label>';
            echo $ckeditor->ckeditor(array('Newsletter', 'body'), $html->base);
		?>
	<?php echo $this->Form->end(__('Submit', true));?>
	</div>
</div>