function saveToDatabase(editableObj, column, id) {
	$.ajax({
		url : "./ajax-end-point/save-edit.php",
		type : "POST",
		data : 'column=' + column + '&editval=' + editableObj.innerHTML
				+ '&id=' + id,
		success : function(data) {
		}
	});
}
