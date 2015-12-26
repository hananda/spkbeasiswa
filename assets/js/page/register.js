$("#registerform").submit(function(e) {
	console.info($("[name=p]").val());
	console.info($("[name=cp]").val());
	if ($("[name=p]").val() != $("[name=cp]").val()) {
		NotifikasiToast({
				type : 'error', // ini tipe notifikasi success,warning,info,error
    			msg : 'Konfirmasi Password tidak sesuai', //ini isi pesan
    			title : '', //ini judul pesan
			});
		return false;
	}

	var data = $(this).serialize();

	$.ajax({
		url: global.baseUrl+'con_user/registersubmit',
		type: 'POST',
		dataType: 'json',
		data: data,
	})
	.done(function(response) {
		if(response.status){
			NotifikasiToast({
				type : 'success', // ini tipe notifikasi success,warning,info,error
    			msg : 'User Berhasil Dibuat', //ini isi pesan
    			title : '', //ini judul pesan
			});
			setTimeout(function() {
				window.location.replace(response.url);
			}, 500);
		}
		else{
			NotifikasiToast({
				type : 'error', // ini tipe notifikasi success,warning,info,error
    			msg : response.message, //ini isi pesan
    			title : '', //ini judul pesan
			});
		}
	})
	.fail(function() {
		NotifikasiToast({
			type : 'error', // ini tipe notifikasi success,warning,info,error
			msg : 'Network Error', //ini isi pesan
			title : '', //ini judul pesan
		});
	});
	

	return false;
});