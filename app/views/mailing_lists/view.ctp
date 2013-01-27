<div class="mailingLists view">
<h2><?php  __('Mailing List');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mailingList['MailingList']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Title'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mailingList['MailingList']['title']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mailingList['MailingList']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mailingList['MailingList']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Mailing List', true), array('action' => 'edit', $mailingList['MailingList']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Mailing List', true), array('action' => 'delete', $mailingList['MailingList']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $mailingList['MailingList']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Mailing Lists', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mailing List', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Students', true), array('controller' => 'students', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student', true), array('controller' => 'students', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Students');?></h3>
	<?php if (!empty($mailingList['Student'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Student Number'); ?></th>
		<th><?php __('First Name'); ?></th>
		<th><?php __('Last Name'); ?></th>
		<th><?php __('Telephone'); ?></th>
		<th><?php __('Email'); ?></th>
		<th><?php __('Join Date'); ?></th>
		<th><?php __('Rank Id'); ?></th>
		<th><?php __('Membership Type Id'); ?></th>
		<th><?php __('Payment Method Id'); ?></th>
		<th><?php __('Payment Amount'); ?></th>
		<th><?php __('Payment Date'); ?></th>
		<th><?php __('Account Number'); ?></th>
		<th><?php __('Branch Code'); ?></th>
		<th><?php __('Account Type Id'); ?></th>
		<th><?php __('Bank Id'); ?></th>
		<th><?php __('Notes'); ?></th>
		<th><?php __('Cancellation Date'); ?></th>
		<th><?php __('Contract Renewal Date'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($mailingList['Student'] as $student):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $student['id'];?></td>
			<td><?php echo $student['student_number'];?></td>
			<td><?php echo $student['first_name'];?></td>
			<td><?php echo $student['last_name'];?></td>
			<td><?php echo $student['telephone'];?></td>
			<td><?php echo $student['email'];?></td>
			<td><?php echo $student['join_date'];?></td>
			<td><?php echo $student['rank_id'];?></td>
			<td><?php echo $student['membership_type_id'];?></td>
			<td><?php echo $student['payment_method_id'];?></td>
			<td><?php echo $student['payment_amount'];?></td>
			<td><?php echo $student['payment_date'];?></td>
			<td><?php echo $student['account_number'];?></td>
			<td><?php echo $student['branch_code'];?></td>
			<td><?php echo $student['account_type_id'];?></td>
			<td><?php echo $student['bank_id'];?></td>
			<td><?php echo $student['notes'];?></td>
			<td><?php echo $student['cancellation_date'];?></td>
			<td><?php echo $student['contract_renewal_date'];?></td>
			<td><?php echo $student['created'];?></td>
			<td><?php echo $student['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'students', 'action' => 'view', $student['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'students', 'action' => 'edit', $student['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'students', 'action' => 'delete', $student['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $student['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Student', true), array('controller' => 'students', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
