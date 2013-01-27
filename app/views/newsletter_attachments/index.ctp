<div id="tab-navigation">
	<ul>
		<li><?php echo $this->Html->link(__('Newsletters', true), array('controller' => 'newsletters', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Edit Newsletter', true), array('controller' => 'newsletters', 'action' => 'edit', $newsletterId)); ?></li>
		<li id="selected"><?php echo $this->Html->link(__('Newsletter Files', true), array('controller' => 'newsletter_attachments', 'action' => 'index', $newsletterId)); ?></li>
		<li><?php echo $this->Html->link(__('Add File', true), array('controller' => 'newsletter_attachments', 'action' => 'add', $newsletterId)); ?></li>
	</ul>
</div>
<div id="tab-content">

	<div class="newsletterAttachments index">
		<h2><?php __('Newsletter Files');?></h2>
		<table cellpadding="0" cellspacing="0">
		<tr>
				<th><?php echo $this->Paginator->sort('newsletter_id');?></th>
				<th><?php echo $this->Paginator->sort('file');?></th>
				<th><?php echo $this->Paginator->sort('created');?></th>
				<th><?php echo $this->Paginator->sort('modified');?></th>
				<th class="actions"><?php __('Actions');?></th>
		</tr>
		<?php
		$i = 0;
		foreach ($newsletterAttachments as $newsletterAttachment):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $newsletterAttachment['Newsletter']['subject']; ?>&nbsp;</td>
			<td><?php echo $newsletterAttachment['NewsletterAttachment']['file']; ?>&nbsp;</td>
			<td><?php echo $newsletterAttachment['NewsletterAttachment']['created']; ?>&nbsp;</td>
			<td><?php echo $newsletterAttachment['NewsletterAttachment']['modified']; ?>&nbsp;</td>
			<td class="actions">
				<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $newsletterAttachment['NewsletterAttachment']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $newsletterAttachment['NewsletterAttachment']['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
		</table>
		<p>
		<?php
		echo $this->Paginator->counter(array(
		'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
		));
		?>	</p>
	
		<div class="paging">
			<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
		 | 	<?php echo $this->Paginator->numbers();?>
	 |
			<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
		</div>
	</div>
</div>