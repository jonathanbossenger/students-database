<div id="tab-navigation">
	<ul>
		<li><?php echo $this->Html->link(__('Students', true), array('controller' => 'students', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Edit Student', true), array('controller' => 'students', 'action' => 'edit', $studentId)); ?></li>
		<li id="selected"><?php echo $this->Html->link(__('Contact Info', true), array('controller' => 'contacts', 'action' => 'index', $studentId)); ?></li>
		<li><?php echo $this->Html->link(__('Add Contact', true), array('controller' => 'contacts', 'action' => 'add', $studentId)); ?></li>
	</ul>
</div>
<div id="tab-content">
	<div class="contacts index">
		<h2><?php __('Contact Info');?></h2>
		<table cellpadding="0" cellspacing="0">
		<tr>
				<th><?php echo $this->Paginator->sort('id');?></th>
				<th><?php echo $this->Paginator->sort('primary');?></th>
				<th><?php echo $this->Paginator->sort('title');?></th>
				<th><?php echo $this->Paginator->sort('telephone');?></th>
				<th><?php echo $this->Paginator->sort('mobile');?></th>
				<th><?php echo $this->Paginator->sort('email');?></th>
				<th><?php echo $this->Paginator->sort('created');?></th>
				<th><?php echo $this->Paginator->sort('modified');?></th>
				<th class="actions"><?php __('Actions');?></th>
		</tr>
		<?php
		$i = 0;
		foreach ($contacts as $contact):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $contact['Contact']['id']; ?>&nbsp;</td>
			<td><?php echo ($contact['Contact']['primary'] == '1' ? 'x' : ''); ?>&nbsp;</td>
			<td><?php echo $contact['Contact']['title']; ?>&nbsp;</td>
			<td><?php echo $contact['Contact']['telephone']; ?>&nbsp;</td>
			<td><?php echo $contact['Contact']['mobile']; ?>&nbsp;</td>
			<td><?php echo $contact['Contact']['email']; ?>&nbsp;</td>
			<td><?php echo $contact['Contact']['created']; ?>&nbsp;</td>
			<td><?php echo $contact['Contact']['modified']; ?>&nbsp;</td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('action' => 'view', $contact['Contact']['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $contact['Contact']['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $contact['Contact']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $contact['Contact']['id'])); ?>
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