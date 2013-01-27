<div id="tab-navigation">
	<ul>
		<li id="selected"><?php echo $this->Html->link(__('Imports', true), array('controller' => 'importer', 'action' => 'index')); ?></li>
	</ul>
</div>
<div id="tab-content">
	<div class="importers index">
		<h2><?php __('Imports');?></h2>
		<table cellpadding="0" cellspacing="0">
			<tr>
				<td><?php echo $this->Html->link('Download data template', '/uploads/template.xls'); ?>&nbsp;</td>
			</tr>
			<tr>
				<td><?php echo $this->Html->link('Import Excel Data', array('controller' => 'imports', 'action' => 'excel')); ?>&nbsp;</td>
			</tr>
		</table>
	</div>
</div>