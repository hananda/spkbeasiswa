<link href="<?php echo base_url(); ?>assets/css/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url(); ?>assets/js/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrapPager.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url(); ?>assets/ckeditor/adapters/jquery.js"></script> 
<section class="content-header">
    <h1>
        Master Pengumuman
        <!-- <small>advanced tables</small> -->
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Master Pengumuman</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row" id="contentformpengumuman" style="display:none;">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Form Pengumuman</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" id="formpengumuman">
                    <input type="hidden" name="task" id="task" value="" />
                    <input type="hidden" name="idpengumuman" id="idpengumuman" value="" />
                    <div class="box-body">
                        <div class="form-group">
                            <label for="jdlpengumuman" class="control-label">Judul Pengumuman</label>
                            <input type="text" class="form-control" id="jdlpengumuman" placeholder="Judul Pengumuman" name="jdlpengumuman">
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Deskripsi Pengumuman</label>
                          <div class="col-md-9 col-sm-9 col-xs-12">
                              <textarea id="descr">

                              </textarea>
                          </div>
                      </div>
                        <!-- <div class="form-group">
                            <label for="btpengumuman">Bobot pengumuman</label>
                            <input type="text" class="form-control" id="btpengumuman" placeholder="Bobot" name="btpengumuman">
                        </div> -->
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" id="btnsimpan" class="btn btn-success">Simpan</button>
                        <button type="submit" id="btnbatal" class="btn btn-danger">Batal</button>
                    </div>
                </form>
            </div><!-- /.box -->
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Grid Pengumuman</h3>
                    <button type="submit" id="btntambah" style="margin-left:750px;" class="btn btn-info">Tambah Baru</button>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="tabelpengumuman" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                            	<th></th>
                            	<th>No</th>
                                <th>Aksi</th>
                                <th>Judul Pengumuman</th>
                                <!-- <th>Bobot</th> -->
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
    </div>

</section><!-- /.content -->
<script>

// $("#btnsimpan").hide();
// $("#btnbatal").hide();
// $("#formpengumuman input,select,textarea").attr('disabled',true);
CKEDITOR.disableAutoInline = true;
var roxyFileman = '<?php echo base_url(); ?>assets/fileman/index.html';

$( '#descr' ).ckeditor({
    // "filebrowserImageUploadUrl": "/path_to/ckeditor/plugins/imgupload.php"
    filebrowserBrowseUrl:roxyFileman,
    filebrowserImageBrowseUrl:roxyFileman+'?type=image',
    removeDialogTabs: 'link:upload;image:upload'
}); // Use CKEDITOR.replace() if element is <textarea>.

//autosize($('.resizable_textarea'));

var jendela = false;
// $("#formcollapse").click();

$("#btntambah").click(function(e) {
  e.preventDefault();
  $("#task").val('tambah');
  if (!jendela) {
      $("#contentformpengumuman").show();
      jendela = !jendela;
  };
});

$("#btnsimpan").click(function(e) {
  e.preventDefault();
  $("#formpengumuman").submit();
});

$("#btnbatal").click(function(e) {
  e.preventDefault();
  jendela =false;
  clear();
});

$("#formpengumuman").submit(function(e) {
    
    var data = $(this).serialize();
    var formData = new FormData($(this)[0]);
    var isi = CKEDITOR.instances.descr.getData();
    formData.append('desc',isi);
    // formData += '&task='+task+'&idpengumuman='+idpengumuman;
    console.info(data);
    $.ajax({
        url: global.baseUrl+'con_pengumuman/crud_pengumuman',
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

var table = $('#tabelpengumuman').DataTable({
          "order": [[ 3, "asc" ]],
          "columns": [
            {"visible" : false,"orderable":false },
            {"orderable":false },
            {"orderable":false },
            {"orderable":true},
            // {"orderable":true}
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
            url: "<?php echo base_url(); ?>con_pengumuman/getData",
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
  $("#idpengumuman").val('');
  $("#jdlpengumuman").val('');
  CKEDITOR.instances.descr.setData('');
  table.ajax.reload();
  $("#contentformpengumuman").hide();
}

function delete_data(id,aktif) {
      $.post("<?php echo base_url(); ?>con_pengumuman/crud_pengumuman", {'idpengumuman': id,'task':'hapus',aktif:aktif}, function (response) {
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
      $(".btnaktif").click(function (e) {
          var sure = confirm("Apakah Anda yakin?");
          if (sure) {
              var id = $(this).data().id;
              var aktif = $(this).data().aktif;
              delete_data(id,aktif);
          }
          e.preventDefault();
      });

      $(".editData").click(function (e) {
          e.preventDefault();
          var parent = $(this).parent().parent();
          var dataedit = table.row( parent ).data();

          $("#idpengumuman").val(dataedit[0]);
          $("#jdlpengumuman").val(dataedit[3]);
          
          $("#task").val('ubah');
          $.post('<?php echo base_url() ?>con_pengumuman/getdesc', {idpengumuman:dataedit[0]}, function(json, textStatus) {
              CKEDITOR.instances.descr.setData(json.desc_pengumuman);
              if (!jendela) {
                  $("#contentformpengumuman").show();
                  jendela = !jendela;
              };
          });
      });
  }
</script>