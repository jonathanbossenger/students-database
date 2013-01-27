<div id="tab-navigation">
	<ul>
		<li><?php echo $this->Html->link(__('Students', true), array('controller' => 'students', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Edit Student', true), array('controller' => 'students', 'action' => 'edit', $studentId)); ?></li>
		<li><?php echo $this->Html->link(__('Contact Info', true), array('controller' => 'contacts', 'action' => 'index', $studentId)); ?></li>
		<li id="selected"><?php echo $this->Html->link(__('Add Contact', true), array('controller' => 'contacts', 'action' => 'add', $studentId)); ?></li>
	</ul>
</div>
<div id="tab-content">
	<div class="contacts form">
	<?php echo $this->Form->create('Contact');?>
		<h2><?php __('Add Contact'); ?></h2>
		<?php
			echo $this->Form->input('student_id', array('value' => $studentId, 'type' => 'hidden'));
			echo $this->Form->input('title');
			echo $this->Form->input('telephone');
			echo $this->Form->input('mobile');
			echo $this->Form->input('email');
			echo $this->Form->input('primary');			
		?>
	<?php echo $this->Form->end(__('Submit', true));?>
	</div>
</div>	