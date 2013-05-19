<div id="tab-navigation">
	<ul>
		<li><?php echo $this->Html->link(__('Attendance', true), array('controller' => 'students', 'action' => 'attendance')); ?></li>
		<li id="selected"><?php echo $this->Html->link(__('Report', true), array('controller' => 'students', 'action' => 'attendance_report')); ?></li>
		<li><?php echo $this->Html->link(__('Loyalty Search', true), array('controller' => 'students', 'action' => 'attendance_search')); ?></li>
	</ul>
</div>
<div id="tab-content">
	<div class="students form">
	<?php echo $this->Form->create('Student');?>
		<h2><?php __('Search Student Attendance'); ?></h2>
		<?php
            echo $this->Form->input('start_date', array( 'type' => 'date', 'label' => 'Start Date', 'dateFormat' => 'DMY'));
            echo $this->Form->input('end_date', array( 'type' => 'date', 'label' => 'End Date', 'dateFormat' => 'DMY'));
            echo $this->Form->input('attendance_type');
		?>
	<?php echo $this->Form->end(__('Submit', true));?>
	</div>
	
	<?php if (isset($students)) { ?>
	
	
	    <?php if (empty($students)) { ?>
	
	        <div class="students index">
	                <h2><?php __('Empty Student Results');?></h2>
	        </div>
	
	    <?php } else { ?>
	
	        <div class="students index">
	                <h2><?php __('Student Results');?></h2>
	                <table cellpadding="0" cellspacing="0">
	                <tr>
	                                <th><?php echo __('First Name');?></th>
	                                <th><?php echo __('Last Name');?></th>
	                                <th><?php echo __('Join Date');?></th>
	                                <th><?php echo __('Cancellation Date');?></th>
	                                <th><?php echo __('Contract Renewal Date');?></th>
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
	                            <td><?php echo $student['Student']['cancellation_date']; ?>&nbsp;</td>
	                            <td><?php echo $student['Student']['contract_renewal_date']; ?>&nbsp;</td>
	                            <td class="actions">
	                                    <?php echo $this->Html->link($this->Html->image('icons/accept.png', array('alt' => 'present', 'title' => 'Present')), array('action' => 'present', $student['Student']['id']), array('escape' => false, 'class' => 'icon')); ?>
	                                    <?php echo $this->Html->link($this->Html->image('icons/page_edit.png', array('alt' => 'edit', 'title' => 'Edit')), array('action' => 'edit', $student['Student']['id']), array('escape' => false, 'class' => 'icon')); ?>
	                                    <?php echo $this->Html->link($this->Html->image('icons/delete.png', array('alt' => 'delete', 'title' => 'Delete')), array('action' => 'delete', $student['Student']['id']), array('escape' => false, 'class' => 'icon'), sprintf(__('Are you sure you want to delete # %s?', true), $student['Student']['id'])); ?>
	                            </td>
	                    </tr>
	                <?php endforeach; ?>
	                </table>
	        </div>
	    <?php } ?>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Export to Excel', true), array('action' => 'export', $searchId)); ?></li>
		        <li><?php echo $this->Html->link(__('Create Mailing List', true), array('controller' => 'mailing_lists', 'action' => 'create_from_search', $searchId)); ?> </li>
			</ul>
		</div>
	<?php } ?>
</div>	