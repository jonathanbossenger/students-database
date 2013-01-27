<div id="tab-navigation">
	<ul>
		<li><?php echo $this->Html->link(__('Student', true), array('controller' => 'students', 'action' => 'index')); ?></li>
		<li id="selected"><?php echo $this->Html->link(__('Add Student', true), array('controller' => 'students', 'action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Search', true), array('controller' => 'students', 'action' => 'search')); ?></li>		
	</ul>
</div>
<div id="tab-content">
	<div class="students form">
	<?php echo $this->Form->create('Student');?>
		<h2><?php __('Add Student'); ?></h2>
		<?php
			echo $this->Form->input('first_name');
			echo $this->Form->input('last_name');
			echo $this->Form->input('join_date', array('dateFormat' => 'DMY'));
			echo $this->Form->input('level_id');
			echo $this->Form->input('Program', array('multiple' => 'checkbox'));
			echo $this->Form->input('graded_date', array('dateFormat' => 'DMY', 'empty' => true));
			echo $this->Form->input('membership_type_id');
			echo $this->Form->input('payment_method_id');
			echo $this->Form->input('payment_amount');
			echo $this->Form->input('payment_date');
			echo $this->Form->input('account_number');
			echo $this->Form->input('branch_code');
			echo $this->Form->input('account_type_id');
			echo $this->Form->input('bank_id');
			echo $this->Form->input('notes');
			echo $this->Form->input('cancellation_date', array('dateFormat' => 'DMY', 'empty' => true));
			echo $this->Form->input('contract_renewal_date', array('dateFormat' => 'DMY', 'empty' => true));
			echo $this->Form->input('on_hold');
			echo $this->Form->input('status_id', array('empty' => true, 'label' => 'System Action'));			
		?>
	<?php echo $this->Form->end(__('Submit', true));?>
	</div>
</div>	