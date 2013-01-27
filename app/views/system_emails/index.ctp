<div class="systemEmails index">
	<h2><?php __('System Emails');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('to');?></th>
			<th><?php echo $this->Paginator->sort('subject');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th><?php echo $this->Paginator->sort('processed');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($systemEmails as $systemEmail):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $systemEmail['SystemEmail']['to']; ?>&nbsp;</td>
		<td><?php echo $systemEmail['SystemEmail']['subject']; ?>&nbsp;</td>
		<td><?php echo $systemEmail['SystemEmail']['created']; ?>&nbsp;</td>
		<td><?php echo $systemEmail['SystemEmail']['modified']; ?>&nbsp;</td>
		<td><?php echo ($systemEmail['SystemEmail']['processed'] ? 'Yes' : 'No'); ?>&nbsp;</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>