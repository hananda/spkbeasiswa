<link href="<?php echo base_url(); ?>assets/css/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url(); ?>assets/js/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrapPager.js" type="text/javascript"></script>
<section class="content-header">
    <h1>
        Verifikasi Berkas
        <!-- <small>advanced tables</small> -->
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Verifikasi Berkas</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Daftar Pengajuan Beasiswa</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="tabelmahasiswa" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                            	<th></th>
                              <th>No</th>
                            	<th>Aksi</th>
                              <th>NIM Mahasiswa</th>
                              <th>Nama Mahasiswa</th>
                              <th>Beasiswa yang diajukan </th>
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
<!-- Large modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mymodal">Large modal</button> -->


<script>
var table = $('#tabelmahasiswa').DataTable({
          "order": [[ 3, "asc" ]],
          "columns": [
            {"visible" : false,"orderable":false },
            {"orderable":false },
            {"orderable":false },
            {"orderable":true},
            {"orderable":true},
            {"orderable":false}
          ],
          pagingType: "bootstrapPager",
          "sDom": "Rfrtlip",
          pagerSettings: {
              searchOnEnter: true,
              language: "Halaman ~ Dari ~"
          },bFilter:false,
          processing: true,
          serverSide: true,
          ajax: {
            url: "<?php echo base_url(); ?>con_verifberkas/getData",
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
function verifberkas(id) {
      $.post("<?php echo base_url(); ?>con_verifberkas/setujui", {'id': id}, function (data) {
        if(data.status){
          NotifikasiToast({
              type : 'success', // ini tipe notifikasi success,warning,info,error
              msg : 'Berkas berhasil disetujui', //ini isi pesan
              title : '', //ini judul pesan
          });
          table.ajax.reload();
        }else{
          NotifikasiToast({
              type : 'error', // ini tipe notifikasi success,warning,info,error
              msg : 'Berkas gagal disetujui', //ini isi pesan
              title : '', //ini judul pesan
          });
        }
      });
  }
function initEvent() {
      $("[id^=setujui]").click(function (e) {
          var sure = confirm("Apakah Anda yakin menyetujui berkas ini?");
          if (sure) {
              var id = $(this).data().id;
              verifberkas(id);
          }
          e.preventDefault();
      });

      $("[id^=tolak]").click(function (e) {
          var sure = confirm("Apakah Anda yakin menolak berkas ini?");
          if (sure) {
              var id = $(this).data().id;
              $(".modal-content").load('<?php echo base_url(); ?>con_verifberkas/contenttolak/'+id,function () {
                $('#mymodal').modal('show');
              });
          }
          e.preventDefault();
      });

      $("[id^=view]").click(function(e) {
        e.preventDefault();
        var id = $(this).data().id;
        $(".modal-content").load('<?php echo base_url(); ?>con_verifberkas/contentview/'+id,function () {
          $('#mymodal').modal('show');
        });
      });

      $(".viewmahasiswa").click(function(e) {
        e.preventDefault();
        var id = $(this).data().id;
        $(".modal-content").load('<?php echo base_url(); ?>con_datamahasiswa/viewmahasiswa/'+id,function () {
          $('#mymodal').modal('show');
        });
      });
  }
</script>