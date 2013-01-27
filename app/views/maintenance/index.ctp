<div class="maintenace index">
	<h2><?php __('Maintenance');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
                <th><?php echo 'Item'; ?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($items as $controller => $item):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $this->Html->link($item[0], array('controller' => $controller, 'action' => 'index')); ?>&nbsp;</td>
	</tr>
        <?php endforeach; ?>
	<tr<?php echo $class;?>>
		<td><?php echo $this->Html->link(__('Delete unsent emails', true), array('controller' => 'system_emails', 'action' => 'delete_email_queue'), array(), 'Are you sure you want to delete ALL current unsent emails'); ?>&nbsp;</td>
	</tr>
	</table>


</div>