<link href="<?php echo base_url(); ?>assets/css/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url(); ?>assets/js/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrapPager.js" type="text/javascript"></script>
<section class="content-header">
    <h1>
        Master Detail Kriteria
        <!-- <small>advanced tables</small> -->
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Master Detail Kriteria</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-8">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Grid Detail Kriteria</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="tabeldetailkriteria" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                              <th></th>
                            	<th></th>
                            	<th>No</th>
                              <th>Aksi</th>
                              <th>Kriteria</th>
                              <th>Detail Kriteria</th>
                              <th>Bobot</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Form Detail Kriteria</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" id="formdetilkriteria">
                    <input type="hidden" name="task" id="task" value="" />
                    <input type="hidden" name="id_detail_kriteria" id="iddetilkriteria" value="" />
                    <div class="box-body">
                        <div class="form-group">
                            <label>Kriteria</label>
                            <select class="form-control" name="idkriteria" id="idkriteria">
                                <option></option>
                                <?php if ($kriteria->num_rows > 0 ): ?>
                                  <?php foreach ($kriteria->result() as $r): ?>
                                    <option value="<?php echo $r->id_kriteria; ?>"><?php echo $r->nama_kriteria; ?></option> 
                                  <?php endforeach ?>  
                                <?php endif ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nmdetilkriteria">Nama Detail Kriteria</label>
                            <input type="text" class="form-control" id="nmdetilkriteria" placeholder="" name="nmdetilkriteria">
                        </div>
                        <div class="form-group">
                            <label for="btdetilkriteria">Bobot Detail Kriteria</label>
                            <input type="text" class="form-control" id="btdetilkriteria" placeholder="" name="btdetilkriteria">
                        </div>
                    </div><!-- /.box-body -->

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
$("#formdetilkriteria input,select,textarea").attr('disabled',true);

$("#btntambah").click(function(e) {
  e.preventDefault();
  $("#task").val('tambah');
  $("#formdetilkriteria input,select,textarea").attr('disabled',false);
  $("#btnsimpan").show();
  $("#btnbatal").show();
  $(this).hide();
});

$("#btnsimpan").click(function(e) {
  e.preventDefault();
  $("#formdetilkriteria").submit();
});

$("#btnbatal").click(function(e) {
  e.preventDefault();
  clear();
});

$("#formdetilkriteria").submit(function(e) {
    
    var data = $(this).serialize();
    var formData = new FormData($(this)[0]);
    // formData += '&task='+task+'&idkriteria='+idkriteria;
    console.info(data);
    $.ajax({
        url: global.baseUrl+'con_detailkriteria/crud_kriteria',
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

var table = $('#tabeldetailkriteria').DataTable({
          "order": [[ 3, "asc" ]],
          "columns": [
            {"visible" : false,"orderable":false },
            {"visible" : false,"orderable":false },
            {"orderable":false },
            {"orderable":false },
            {"orderable":true},
            {"orderable":true},
            {"orderable":true}
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
            url: "<?php echo base_url(); ?>con_detailkriteria/getData",
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

function clear () {
  $("#task").val('');
  $("#iddetilkriteria").val('');
  $("#idkriteria").val('');
  $("#nmdetilkriteria").val('');
  $("#btdetilkriteria").val('');
  $("#btnsimpan").hide();
  $("#btnbatal").hide();
  $("#btntambah").show();
  $("#formdetilkriteria input,select,textarea").attr('disabled',true);
  table.ajax.reload();
}

function delete_data(id) {
    $.post("<?php echo base_url(); ?>con_detailkriteria/crud_kriteria", {'id_detail_kriteria': id,'task':'hapus'}, function (response) {
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

        $("#iddetilkriteria").val(dataedit[0]);
        $("#idkriteria").val(dataedit[1]);
        $("#nmdetilkriteria").val(dataedit[5]);
        $("#btdetilkriteria").val(dataedit[6]);
        
        $("#task").val('ubah');
        $("#btnsimpan").show();
        $("#btnbatal").show();
        $("#btntambah").hide();
        $("#formdetilkriteria input,select,textarea").attr('disabled',false);
    });
}
</script>