<div class="paymentMethods form">
<?php echo $this->Form->create('PaymentMethod');?>
	<fieldset>
		<legend><?php __('Add Payment Method'); ?></legend>
	<?php
		echo $this->Form->input('title');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Payment Methods', true), array('action' => 'index'));?></li>
	</ul>
</div>