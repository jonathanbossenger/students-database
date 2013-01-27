var fileAttachmentCount = 0;
var fileAttachment = '#file' + fileAttachmentCount;
var categoryLevel = 2;
$(document).ready(function() {
	
	$(fileAttachment).change(function() {
		fileAttachmentCount++;
		var insertHtml = '<div class="input file"><label for="file'+fileAttachmentCount+'">Attachment</label><input id="file'+fileAttachmentCount+'" type="file" name="data[file]['+fileAttachmentCount+']"></div>';
		$(insertHtml).insertAfter($(this).parent());
	});	
	
	$("body").delegate(".categoryselect", "change", function(){
		var value = $(this).val();
		console.log(value);
		var insertHtml = '<select id="CategoryParentCategory" name="data[Category][parent_category]" class="level-'+categoryLevel+' categoryselect"><option value="1">My Categories</option><option value="16">Another Top Level Category</option></select>';
		$(insertHtml).insertAfter($(this));
		categoryLevel = categoryLevel + 1;
	});	
	
});