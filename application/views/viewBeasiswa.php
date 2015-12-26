<link href="<?php echo base_url(); ?>assets/css/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url(); ?>assets/js/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrapPager.js" type="text/javascript"></script>
<!-- Daterange picker -->
        <!-- datepicker -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
<link href="<?php echo base_url(); ?>assets/css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url(); ?>assets/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
<section class="content-header">
    <h1>
        Master Beasiswa
        <!-- <small>advanced tables</small> -->
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Master Beasiswa</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-8">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Grid Beasiswa</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="tabelbeasiswa" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                            	<th></th>
                            	<th>No</th>
                                <th>Aksi</th>
                                <th>Periode awal</th>
                                <th>Periode akhir</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                        <!-- <tfoot>
                            <tr>
                                <th>Rendering engine</th>
                                <th>Browser</th>
                                <th>Platform(s)</th>
                                <th>Engine version</th>
                                <th>CSS grade</th>
                            </tr>
                        </tfoot> -->
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Form Beasiswa</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" id="formperiode">
                    <input type="hidden" name="task" id="task" value="" />
                    <input type="hidden" name="idperiode" id="idperiode" value="" />
                    <div class="box-body">
                      <div class="form-group">
                          <label>No Surat Pengesahan</label>
                          <input type="text" placeholder="" name="nosurat" id="nosurat" class="form-control">
                      </div>
                      <div class="form-group">
                          <label>Tgl Pengesahan :</label>
                          <div class="input-group">
                              <div class="input-group-addon">
                                  <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" class="form-control pull-right" id="tglpengesahan" name="tglpengesahan" />
                          </div><!-- /.input group -->
                      </div>
                      <div class="form-group">
                          <label>Periode :</label>
                          <div class="input-group">
                              <div class="input-group-addon">
                                  <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" class="form-control pull-right" id="periodebeasiswa" name="periodebeasiswa" />
                          </div><!-- /.input group -->
                      </div><!-- /.form group -->
                    </div>
                    <div class="box-footer">
                        <button type="submit" id="btntambah" class="btn btn-info">Tambah Baru</button>
                        <button type="submit" id="btnsimpan" class="btn btn-success">Simpan</button>
                        <button type="submit" id="btnbatal" class="btn btn-danger">Batal</button>
                    </div>
                </form>
            </div><!-- /.box -->
        </div>
    </div>

</section><!-- /.content -->
<script>
$("#btnsimpan").hide();
$("#btnbatal").hide();
$("#formperiode input,select,textarea").attr('disabled',true);

$("#btntambah").click(function(e) {
  e.preventDefault();
  $("#task").val('tambah');
  $("#formperiode input,select,textarea").attr('disabled',false);
  $("#btnsimpan").show();
  $("#btnbatal").show();
  $(this).hide();
});

$("#btnsimpan").click(function(e) {
  e.preventDefault();
  $("#formperiode").submit();
});

$("#btnbatal").click(function(e) {
  e.preventDefault();
  clear();
});

$("#formperiode").submit(function(e) {
    
    var data = $(this).serialize();
    var formData = new FormData($(this)[0]);
    // formData += '&task='+task+'&idperiode='+idperiode;
    console.info(data);
    $.ajax({
        url: global.baseUrl+'con_beasiswa/crud_periode',
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
                msg : response.message, //ini isi pesan
                title : '', //ini judul pesan
            });
            clear();
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

function clear () {
  $("#task").val('');
  $("#idperiode").val('');
  $("#periodebeasiswa").val('');
  $("#nosurat").val('');
  $("#tglpengesahan").val('');
  $("#btnsimpan").hide();
  $("#btnbatal").hide();
  $("#btntambah").show();
  $("#formperiode input,select,textarea").attr('disabled',true);
  table.ajax.reload();
}

$('#periodebeasiswa').daterangepicker({format: 'DD/MM/YYYY'});
$('#tglpengesahan').datepicker({format: 'dd/mm/yyyy',autoclose:true});

var table = $('#tabelbeasiswa').DataTable({
          "order": [[ 4, "asc" ]],
          "columns": [
            {"visible" : false,"orderable":false },
            {"orderable":false },
            {"orderable":false },
            {"orderable":true},
            {"orderable":true},
            {"visible" : false,"orderable":false },
            {"visible" : false,"orderable":false },
          ],
          pagingType: "bootstrapPager",
          "sDom": "Rfrtlip",
          pagerSettings: {
              searchOnEnter: true,
              language: "Halaman ~ Dari ~"
          },
          processing: true,
          serverSide: true,
          ajax: {
            url: "<?php echo base_url(); ?>con_beasiswa/getData",
        	type: "POST",
            data: function (d) {
                
            }
          },
          paginate: true
      });

table.on('xhr.dt', function (e, settings, json) {
      setTimeout(function () {
          initEvent();
      }, 500);
  });

function delete_data(id) {
    $.post("<?php echo base_url(); ?>con_beasiswa/crud_periode", {'idperiode': id,'task':'hapus'}, function (response) {
        if(response.status){
            NotifikasiToast({
                type : 'success', // ini tipe notifikasi success,warning,info,error
                msg : response.message, //ini isi pesan
                title : '', //ini judul pesan
            });
            clear();
        }
        else{
            NotifikasiToast({
                type : 'error', // ini tipe notifikasi success,warning,info,error
                msg : response.message, //ini isi pesan
                title : '', //ini judul pesan
            });
        }
    });
}

function initEvent() {
    $("[id^=deleteData]").click(function (e) {
        var sure = confirm("Apakah Anda yakin?");
        if (sure) {
            var id = $(this).data().id;
            delete_data(id);
        }
        e.preventDefault();
    });

    $("[id^=editData]").click(function (e) {
        e.preventDefault();
        var parent = $(this).parent().parent();
        var dataedit = table.row( parent ).data();

        $("#idperiode").val(dataedit[0]);
        $("#periodebeasiswa").val(dataedit[3] + " - " +dataedit[4]);
        $("#nosurat").val(dataedit[5]);
        $("#tglpengesahan").val(dataedit[6]);
        
        $("#task").val('ubah');
        $("#btnsimpan").show();
        $("#btnbatal").show();
        $("#btntambah").hide();
        $("#formperiode input,select,textarea").attr('disabled',false);
    });
}
</script>