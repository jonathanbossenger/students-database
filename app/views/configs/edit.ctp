<div class="configs form">
<?php echo $this->Form->create('Config');?>
	<fieldset>
		<legend><?php __('Edit Config'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('site_url');
		echo $this->Form->input('contact_email');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Show Configuration', true), array('action' => 'index'));?></li>
	</ul>
</div>