<div id="tab-navigation">
	<ul>
		<li><?php echo $this->Html->link(__('Student', true), array('controller' => 'students', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Add Student', true), array('controller' => 'students', 'action' => 'add')); ?></li>
		<li id="selected"><?php echo $this->Html->link(__('Search', true), array('controller' => 'students', 'action' => 'search')); ?></li>		
	</ul>
</div>
<div id="tab-content">
	<div class="students index">
		<h2><?php __('Search Results');?></h2>
		<table cellpadding="0" cellspacing="0">
		<tr>
				<th><?php echo $this->Paginator->sort('first_name');?></th>
				<th><?php echo $this->Paginator->sort('last_name');?></th>
				<th><?php echo $this->Paginator->sort('join_date');?></th>
				<th><?php echo $this->Paginator->sort('level_id');?></th>
				<th><?php echo $this->Paginator->sort('membership_type_id');?></th>
				<th><?php echo $this->Paginator->sort('payment_method_id');?></th>
				<th><?php echo $this->Paginator->sort('payment_amount');?></th>
				<th><?php echo $this->Paginator->sort('payment_date');?></th>
				<th><?php echo $this->Paginator->sort('account_number');?></th>
				<th><?php echo $this->Paginator->sort('branch_code');?></th>
				<th><?php echo $this->Paginator->sort('account_type_id');?></th>
				<th><?php echo $this->Paginator->sort('bank_id');?></th>
				<th><?php echo $this->Paginator->sort('cancellation_date');?></th>
				<th><?php echo $this->Paginator->sort('contract_renewal_date');?></th>
				<th class="actions"><?php __('Actions');?></th>
		</tr>
		<?php
		$i = 0;
		foreach ($students as $student):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $student['Student']['first_name']; ?>&nbsp;</td>
			<td><?php echo $student['Student']['last_name']; ?>&nbsp;</td>
			<td><?php echo $student['Student']['join_date']; ?>&nbsp;</td>
	        <td><?php echo $student['Level']['title']; ?>&nbsp;</td>
	        <td><?php echo $student['MembershipType']['title']; ?>&nbsp;</td>
	        <td><?php echo $student['PaymentMethod']['title']; ?>&nbsp;</td>
			<td><?php echo $student['Student']['payment_amount']; ?>&nbsp;</td>
			<td><?php echo $student['Student']['payment_date']; ?>&nbsp;</td>
			<td><?php echo $student['Student']['account_number']; ?>&nbsp;</td>
			<td><?php echo $student['Student']['branch_code']; ?>&nbsp;</td>
            <td><?php echo $student['AccountType']['title']; ?>&nbsp;</td>
            <td><?php echo $student['Bank']['title']; ?>&nbsp;</td>
			<td><?php echo $student['Student']['cancellation_date']; ?>&nbsp;</td>
			<td><?php echo $student['Student']['contract_renewal_date']; ?>&nbsp;</td>
			<td class="actions">
                <?php echo $this->Html->link($this->Html->image('icons/accept.png', array('alt' => 'present', 'title' => 'Present')), array('action' => 'present', $student['Student']['id']), array('escape' => false, 'class' => 'icon')); ?>
				<?php echo $this->Html->link($this->Html->image('icons/zoom.png', array('alt' => 'view', 'title' => 'View')), array('action' => 'view', $student['Student']['id']), array('escape' => false, 'class' => 'icon')); ?>
				<?php echo $this->Html->link($this->Html->image('icons/page_edit.png', array('alt' => 'edit', 'title' => 'Edit')), array('action' => 'edit', $student['Student']['id']), array('escape' => false, 'class' => 'icon')); ?>
				<?php echo $this->Html->link($this->Html->image('icons/delete.png', array('alt' => 'delete', 'title' => 'Delete')), array('action' => 'delete', $student['Student']['id']), array('escape' => false, 'class' => 'icon'), sprintf(__('Are you sure you want to delete # %s?', true), $student['Student']['id'])); ?>
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
			<?php $this->Paginator->options(array('url' => $searchId)); ?>
			<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
		 | 	<?php echo $this->Paginator->numbers();?>
	 |
			<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
		</div>
	</div>
	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Export to Excel', true), array('action' => 'export', $searchId)); ?></li>
	        <li><?php echo $this->Html->link(__('Create Mailing List From Search Results', true), array('controller' => 'mailing_lists', 'action' => 'create_from_search', $searchId)); ?> </li>
		</ul>
	</div>
</div>