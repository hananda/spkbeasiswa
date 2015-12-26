<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h4 class="modal-title" id="exampleModalLabel">Tolak berkas</h4>
</div>
<div class="modal-body">
  <div class="container-fluid">
    <div class="row">
      <form role="form" id="formtolak">
        <!-- text input -->
        <input type="hidden" name="id" value="<?php echo $id; ?>" />
        <div class="form-group">
            <label>Catatan Penolakan</label>
            <textarea placeholder="Berkas ini ditolak karena?" rows="4" name="catatanpenolakan" class="form-control"></textarea>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-default" id="btnbataltolak" data-dismiss="modal">Batal</button>
  <button type="button" class="btn btn-primary" id="btnsimpantolak">Simpan</button>
</div>
<script type="text/javascript">
  $("#btnsimpantolak").click(function(e) {
    e.preventDefault();
    $("#formtolak").submit();
  });

  $("#formtolak").submit(function(e) {
    
    var data = $(this).serialize();
    var formData = new FormData($(this)[0]);
    console.info(data);
    $.ajax({
        url: global.baseUrl+'con_verifberkas/tolakberkas',
        type: 'POST',
        dataType: 'json',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        async: false,
    })
    .done(function(response) {
        if(response.status){
            NotifikasiToast({
                type : 'success', // ini tipe notifikasi success,warning,info,error
                msg : 'Berkas Berhasil ditolak', //ini isi pesan
                title : '', //ini judul pesan
            });
            $("#btnbataltolak").click();
            table.ajax.reload();
        }
        else{
            NotifikasiToast({
                type : 'error', // ini tipe notifikasi success,warning,info,error
                msg : 'Berkas Gagal Ditolak', //ini isi pesan
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
</script>