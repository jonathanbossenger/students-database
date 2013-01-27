<div id="tab-navigation">
	<ul>
		<li id="selected"><?php echo $this->Html->link(__('Newsletters', true), array('controller' => 'newsletters', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Add Newsletter', true), array('controller' => 'newsletters', 'action' => 'add')); ?></li>
	</ul>
</div>
<div id="tab-content">
	<div class="newsletters index">
		<h2><?php __('Newsletters');?></h2>
		<table cellpadding="0" cellspacing="0">
		<tr>
				<th><?php echo $this->Paginator->sort('id');?></th>
				<th><?php echo $this->Paginator->sort('subject');?></th>
				<th><?php echo $this->Paginator->sort('created');?></th>
				<th><?php echo $this->Paginator->sort('modified');?></th>
				<th class="actions"><?php __('Actions');?></th>
		</tr>
		<?php
		$i = 0;
		foreach ($newsletters as $newsletter):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $newsletter['Newsletter']['id']; ?>&nbsp;</td>
			<td><?php echo $this->Html->link($newsletter['Newsletter']['subject'], array('action' => 'edit', $newsletter['Newsletter']['id'])); ?>&nbsp;</td>
			<td><?php echo $newsletter['Newsletter']['created']; ?>&nbsp;</td>
			<td><?php echo $newsletter['Newsletter']['modified']; ?>&nbsp;</td>
			<td class="actions">
				<?php echo $this->Html->link($this->Html->image('icons/zoom.png', array('alt' => 'view', 'title' => 'View')), array('action' => 'view', $newsletter['Newsletter']['id']), array('escape' => false, 'class' => 'icon')); ?>
				<?php echo $this->Html->link($this->Html->image('icons/page_edit.png', array('alt' => 'edit', 'title' => 'Edit')), array('action' => 'edit', $newsletter['Newsletter']['id']), array('escape' => false, 'class' => 'icon')); ?>
				<?php echo $this->Html->link($this->Html->image('icons/delete.png', array('alt' => 'delete', 'title' => 'Delete')), array('action' => 'delete', $newsletter['Newsletter']['id']), array('escape' => false, 'class' => 'icon'), sprintf(__('Are you sure you want to delete # %s?', true), $newsletter['Newsletter']['id'])); ?>
	                        <?php echo $this->Html->link($this->Html->image('icons/email_go.png', array('alt' => 'send', 'title' => 'Send')), array('action' => 'send', $newsletter['Newsletter']['id']), array('escape' => false, 'class' => 'icon')); ?>
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