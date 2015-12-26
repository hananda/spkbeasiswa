$("#btnlogout").click(function(e) {
	e.preventDefault();
	$.post(global.baseUrl+'con_login/logout')
	.done(function(response) {
		window.location.replace(response.url);
	})
	.fail(function() {
		alert("Terjadi kesalahan");
	});
});