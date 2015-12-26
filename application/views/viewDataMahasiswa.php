<link href="<?php echo base_url(); ?>assets/css/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url(); ?>assets/js/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrapPager.js" type="text/javascript"></script>
<section class="content-header">
    <h1>
        Data Mahasiswa
        <!-- <small>advanced tables</small> -->
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Mahasiswa</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Grid Mahasiswa</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="tabelmahasiswa" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                            	<th></th>
                            	<th>No</th>
                              <th>NIM Mahasiswa</th>
                              <th>Nama Mahasiswa</th>
                              <th>Alamat </th>
                              <th>Prodi </th>
                              <th>Jurusan </th>
                              <th>User </th>
                              <th>Aksi </th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>

</section><!-- /.content -->
<script>
var table = $('#tabelmahasiswa').DataTable({
          "order": [[ 3, "asc" ]],
          "columns": [
            {"visible" : false,"orderable":false },
            {"orderable":false },
            {"orderable":true},
            {"orderable":true},
            {"orderable":true},
            {"orderable":true},
            {"orderable":true},
            {"orderable":false},
            {"orderable":false}
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
            url: "<?php echo base_url(); ?>con_datamahasiswa/getData",
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
  $.post("<?php echo base_url(); ?>con_datamahasiswa/nonaktif", {'idmhs': id}, function (response) {
      if(response.status){
          NotifikasiToast({
              type : 'success', // ini tipe notifikasi success,warning,info,error
              msg : response.message, //ini isi pesan
              title : '', //ini judul pesan
          });
          table.ajax.reload();
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
    $(".viewmahasiswa").click(function(e) {
      e.preventDefault();
      var id = $(this).data().id;
      $(".modal-content").load('<?php echo base_url(); ?>con_datamahasiswa/viewmahasiswa/'+id,function () {
        $('#mymodal').modal('show');
      });
    });

    $(".nonaktif").click(function(event) {
      event.preventDefault();
      var sure = confirm("Apakah Anda yakin?");
      if (sure) {
          var id = $(this).data().id;
          delete_data(id);
      }
    });
  }
</script>