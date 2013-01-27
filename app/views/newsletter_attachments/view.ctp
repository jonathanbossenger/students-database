<div class="newsletterAttachments view">
<h2><?php  __('Newsletter Attachment');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $newsletterAttachment['NewsletterAttachment']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Newsletter'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($newsletterAttachment['Newsletter']['subject'], array('controller' => 'newsletters', 'action' => 'view', $newsletterAttachment['Newsletter']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('File'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $newsletterAttachment['NewsletterAttachment']['file']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $newsletterAttachment['NewsletterAttachment']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $newsletterAttachment['NewsletterAttachment']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Newsletter Attachment', true), array('action' => 'edit', $newsletterAttachment['NewsletterAttachment']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Newsletter Attachment', true), array('action' => 'delete', $newsletterAttachment['NewsletterAttachment']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $newsletterAttachment['NewsletterAttachment']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Newsletter Attachments', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Newsletter Attachment', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Newsletters', true), array('controller' => 'newsletters', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Newsletter', true), array('controller' => 'newsletters', 'action' => 'add')); ?> </li>
	</ul>
</div>
