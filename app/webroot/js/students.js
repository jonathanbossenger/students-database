var Students;
Students = { version: '0.0.1' };

Students.fileAttachmentCount = 0;
Students.fileAttachment = '#file' + Students.fileAttachmentCount;
Students.categoryLevel = 1;

Students.buildCategorySelect = function(topLevelId, categoryLevel){
	var categorySelect = '';
	
	$.ajax({
		url: 'get/' + topLevelId,
		success: function(data) {
			var categories = jQuery.parseJSON(data);
			if (categories.length > 0){
				categorySelect += '<select id="CategoryParentCategory" name="data[Category][parent_category]['+categoryLevel+']" class="level-'+categoryLevel+' categoryselect">';
				categorySelect += '<option value="0">None</option>';
				$( categories ).each(function( index, category ) {
					console.log( category.Category.name );
					categorySelect += '<option value="'+category.Category.id+'">'+category.Category.name+'</option>';
				});			
				categorySelect += '</select>';
			}
		},
		async:false
	});	
	return categorySelect;
}

$(document).ready(function() {
	
	$(Students.fileAttachment).change(function() {
		Students.fileAttachmentCount++;
		var insertHtml = '<div class="input file"><label for="file'+Students.fileAttachmentCount+'">Attachment</label><input id="file'+Students.fileAttachmentCount+'" type="file" name="data[file]['+Students.fileAttachmentCount+']"></div>';
		$(insertHtml).insertAfter($(this).parent());
	});	
	
	$("body").delegate(".categoryselect", "change", function(){
		var value = $(this).val();
		var name = $(this).attr('name');
		var nameParts = name.split("][");
		console.log(nameParts[2]);
		Students.categoryLevel = parseInt(nameParts[2].replace("]",""));
		Students.categoryLevel = Students.categoryLevel + 1
		var categorySelect = Students.buildCategorySelect(value, Students.categoryLevel)
		$(this).nextAll().remove();
		if (categorySelect.length > 0){
			$(categorySelect).insertAfter($(this));
			Students.categoryLevel = Students.categoryLevel + 1;			
		}
	});	
	
});