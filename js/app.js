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

$( ".about-me" ).click(function(e) {
	e.preventDefault();
	$("#experience").addClass("hide");
	$("#portfolio").addClass("hide");
	$("#about").removeClass("hide");
	$(".about-me").addClass("hide");
	$(".return").removeClass("hide");
});

$( ".return" ).click(function(e) {
	e.preventDefault();
	$("#experience").removeClass("hide");
	$("#portfolio").removeClass("hide");
	$("#about").addClass("hide");
	$(".return").addClass("hide");
	$(".about-me").removeClass("hide");
});