<div id="tab-navigation">
	<ul>
		<li id="selected"><?php echo $this->Html->link(__('Imports', true), array('controller' => 'imports', 'action' => 'index')); ?></li>
	</ul>
</div>
<div id="tab-content">
	<div class="importer form">
	<?php echo $this->Form->create('Import', array('enctype' => 'multipart/form-data'));?>
		<h2><?php __('Import Excel data'); ?></h2>
		<?php
			echo $this->Form->input('file', array('type' => 'file'));
		?>
	<?php echo $this->Form->end(__('Submit', true));?>
	</div>
</div>