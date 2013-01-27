<div id="tab-navigation">
	<ul>
		<li id="selected"><?php echo $this->Html->link(__('Dashboard', true), array('controller' => 'users', 'action' => 'dashboard')); ?></li>
	</ul>
</div>
<div id="tab-content">
	<div class="users index">
		<h2><?php __('Dashboard');?></h2>
		<table cellpadding="0" cellspacing="0">
		<tr>
	                <th><?php echo 'Select an action'; ?></th>
		</tr>
		<?php
		$i = 0;
		foreach ($availableModules as $label => $item):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $this->Html->link($label, array('controller' => $item[0], 'action' => $item[1])); ?>&nbsp;</td>
		</tr>
	        <?php endforeach; ?>
		</table>
	
	
	</div>
</div>