<div class="students form">
<?php echo $this->Form->create('Student');?>
	<fieldset>
		<legend><?php __('Search Student Payments'); ?></legend>
	<?php
				echo $this->Form->input('first_name');
				echo $this->Form->input('last_name');
                echo $this->Form->input('payment_method_id', array('empty' => 'Select Payment Method'));
                
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>

<?php if (isset($students)) { ?>

    <?php if (empty($students)) { ?>

        <div class="students index">
                <h2><?php __('Empty Student Results');?></h2>
        </div>

    <?php } else { ?>

        <div class="students index">
        <?php echo $this->Form->create('Payment', array('url' => array('controller' => 'students', 'action' => 'process_payments')));?>
                <h2><?php __('Student Results');?></h2>
                <table cellpadding="0" cellspacing="0">
                <tr>
                                <th><?php echo __('First Name');?></th>
                                <th><?php echo __('Last Name');?></th>
                                <th><?php echo __('Payment Amount');?></th>
                                <th><?php echo __('Account Number');?></th>
                                <th><?php echo __('Branch Code');?></th>
                                <th><?php echo __('Account Type');?></th>
                                <th><?php echo __('Bank');?></th>
                                <th><?php echo __('Date');?></th>
                                <th class="actions"><?php __('Paid');?></th>
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
							<td><?php echo $student['Student']['payment_amount']; ?>&nbsp;</td>
							<td><?php echo $student['Student']['account_number']; ?>&nbsp;</td>
							<td><?php echo $student['Student']['branch_code']; ?>&nbsp;</td>
			                <td><?php echo $student['AccountType']['title']; ?>&nbsp;</td>
			                <td><?php echo $student['Bank']['title']; ?>&nbsp;</td>
                            <td>
                            	<?php echo $this->Form->input('StudentPayment.'.$i.'.student_id', array('type' => 'hidden', 'value' => $student['Student']['id'])); ?>
                            	<?php echo $this->Form->input('StudentPayment.'.$i.'.month', array('label' => false, 'div' => false, 'options' => $months, 'selected' => date('m'))); ?>
                            	&nbsp;
                            	<?php echo $this->Form->input('StudentPayment.'.$i.'.year', array('label' => false, 'div' => false, 'options' => $years, 'selected' => date('Y'))); ?></td>
                            <td class="actions">
                            	<?php echo $this->Form->input('StudentPayment.'.$i.'.paid', array('type' => 'checkbox', 'label' => false, 'div' => false)); ?>
                            </td>
                    </tr>
                <?php endforeach; ?>
                </table>
        <?php echo $this->Form->end(__('Submit', true));?>        
        </div>
    <?php } ?>
<?php } ?>