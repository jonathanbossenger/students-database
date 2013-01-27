<div class="studentAttendances view">
<h2><?php  __('Student Attendance');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $studentAttendance['StudentAttendance']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Student'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($studentAttendance['Student']['student_number'], array('controller' => 'students', 'action' => 'view', $studentAttendance['Student']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Date'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $studentAttendance['StudentAttendance']['date']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Student Attendance', true), array('action' => 'edit', $studentAttendance['StudentAttendance']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Student Attendance', true), array('action' => 'delete', $studentAttendance['StudentAttendance']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $studentAttendance['StudentAttendance']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Student Attendances', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student Attendance', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Students', true), array('controller' => 'students', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student', true), array('controller' => 'students', 'action' => 'add')); ?> </li>
	</ul>
</div>
