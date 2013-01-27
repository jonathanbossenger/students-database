<div class="membershipTypes index">
	<h2><?php __('Membership Types');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($membershipTypes as $membershipType):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $membershipType['MembershipType']['id']; ?>&nbsp;</td>
		<td><?php echo $membershipType['MembershipType']['title']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link($this->Html->image('icons/zoom.png', array('alt' => 'view', 'title' => 'View')), array('action' => 'view', $membershipType['MembershipType']['id']), array('escape' => false, 'class' => 'icon')); ?>
			<?php echo $this->Html->link($this->Html->image('icons/page_edit.png', array('alt' => 'edit', 'title' => 'Edit')), array('action' => 'edit', $membershipType['MembershipType']['id']), array('escape' => false, 'class' => 'icon')); ?>
			<?php echo $this->Html->link($this->Html->image('icons/delete.png', array('alt' => 'delete', 'title' => 'Delete')), array('action' => 'delete', $membershipType['MembershipType']['id']), array('escape' => false, 'class' => 'icon'), sprintf(__('Are you sure you want to delete # %s?', true), $membershipType['MembershipType']['id'])); ?>
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
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Membership Type', true), array('action' => 'add')); ?></li>
	</ul>
</div>