<div class="studentAttendances index">
	<h2><?php __('Student Attendances');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('student_id');?></th>
			<th><?php echo $this->Paginator->sort('date');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($studentAttendances as $studentAttendance):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $studentAttendance['StudentAttendance']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($studentAttendance['Student']['student_number'], array('controller' => 'students', 'action' => 'view', $studentAttendance['Student']['id'])); ?>
		</td>
		<td><?php echo $studentAttendance['StudentAttendance']['date']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link($this->Html->image('icons/zoom.png', array('alt' => 'view', 'title' => 'View')), array('action' => 'view', $studentAttendance['StudentAttendance']['id']), array('escape' => false, 'class' => 'icon')); ?>
			<?php echo $this->Html->link($this->Html->image('icons/page_edit.png', array('alt' => 'edit', 'title' => 'Edit')), array('action' => 'edit', $studentAttendance['StudentAttendance']['id']), array('escape' => false, 'class' => 'icon')); ?>
			<?php echo $this->Html->link($this->Html->image('icons/delete.png', array('alt' => 'delete', 'title' => 'Delete')), array('action' => 'delete', $studentAttendance['StudentAttendance']['id']), array('escape' => false, 'class' => 'icon'), sprintf(__('Are you sure you want to delete # %s?', true), $studentAttendance['StudentAttendance']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Student Attendance', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Students', true), array('controller' => 'students', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student', true), array('controller' => 'students', 'action' => 'add')); ?> </li>
	</ul>
</div>