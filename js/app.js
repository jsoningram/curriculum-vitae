var json = (function() {
	var json = null;
	$.ajax({
		'async': false,
		'global': false,
		'url': "js/data.json",
		'dataType': "json",
		'success': function (data) {
			json = data;
		}
	});
	return json;
 })();