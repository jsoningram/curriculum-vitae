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

// document.getElementById("phone").innerHTML = json.contactdetails[0].phone;
// document.getElementById("email").innerHTML = json.contactdetails[0].email;
// document.getElementById("linkedin").innerHTML = json.contactdetails[0].linkedin;