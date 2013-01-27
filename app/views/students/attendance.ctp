<div id="tab-navigation">
	<ul>
		<li id="selected"><?php echo $this->Html->link(__('Attendance', true), array('controller' => 'students', 'action' => 'attendance')); ?></li>
		<li><?php echo $this->Html->link(__('Report', true), array('controller' => 'students', 'action' => 'attendance_report')); ?></li>
	</ul>
</div>
<div id="tab-content">
	<div class="actions filter">
		<h3><?php __('Filter'); ?></h3>
		<ul>
	            <?php foreach ($alphas as $alpha){ ?>
			<li><?php echo $this->Html->link(__($alpha, true), array('controller' => 'students', 'action' => 'attendance', $alpha)); ?> </li>
	            <?php } ?>
		</ul>
	</div>
	<div class="students index">
		<h2><?php __('Student Attendance');?></h2>
		<table cellpadding="0" cellspacing="0">
		<tr>
				<th><?php echo $this->Paginator->sort('first_name');?></th>
				<th><?php echo $this->Paginator->sort('last_name');?></th>
				<th><?php echo $this->Paginator->sort('rank_id');?></th>
				<th><?php echo $this->Paginator->sort('membership_type_id');?></th>
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
	        <td><?php echo isset($student['Rank']['title']) ? $student['Rank']['title'] : '' ; ?>&nbsp;</td>
	        <td><?php echo $student['MembershipType']['title']; ?>&nbsp;</td>
	 		<td><?php echo $student['Student']['contract_renewal_date']; ?>&nbsp;</td>
			<td class="actions">
			<?php echo $this->Html->link($this->Html->image('icons/accept.png', array('alt' => 'present', 'title' => 'Present')), array('action' => 'present', $student['Student']['id'], 'attendance'), array('escape' => false, 'class' => 'icon')); ?>
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