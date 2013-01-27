<div id="tab-navigation">
	<ul>
		<li><?php echo $this->Html->link(__('Student', true), array('controller' => 'students', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Add Student', true), array('controller' => 'students', 'action' => 'add')); ?></li>
		<li id="selected"><?php echo $this->Html->link(__('Search', true), array('controller' => 'students', 'action' => 'search')); ?></li>		
	</ul>
</div>
<div id="tab-content">
	<div class="students form">
	<?php echo $this->Form->create('Student');?>
	<h2><?php __('Search Students'); ?></h2>
	<?php
		echo $this->Form->input('student_number');
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('level_id', array('empty' => 'All Levels'));
		echo $this->Form->input('Program', array('multiple' => 'checkbox'));
		echo $this->Form->input('membership_type_id', array('empty' => 'All Membership Types'));
		echo $this->Form->input('active_student', array('type' => 'checkbox'));
	?>
	<?php echo $this->Form->end(__('Submit', true));?>
	</div>
</div>