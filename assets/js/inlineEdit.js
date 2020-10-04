function saveToDatabase(editableObj, column, id) {
	if (confirm('Do You really want to EDIT this field?')) {
		$.ajax({
			url : "./ajax-end-point/save-edit.php",
			type : "POST",
			data : 'column=' + column + '&editval=' + editableObj.innerHTML
				+ '&id=' + id,
			success : function(data) {
			}
		});
	}
}
