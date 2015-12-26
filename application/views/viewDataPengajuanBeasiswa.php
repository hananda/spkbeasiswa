<link href="<?php echo base_url(); ?>assets/css/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url(); ?>assets/js/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrapPager.js" type="text/javascript"></script>
<section class="content-header">
    <h1>
        Data Pengajuan
        <!-- <small>advanced tables</small> -->
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Pengajuan</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Daftar Data Pengajuan Beasiswa</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="tabelpengajuan" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                            	<th></th>
                            	<th>No</th>
                                <th>Aksi</th>
                                <th>Beasiswa</th>
                                <th>Periode</th>
                                <th>Tanggal Daftar</th>
                                <th>Status</th>
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
var table = $('#tabelpengajuan').DataTable({
          "order": [[ 3, "asc" ]],
          "columns": [
            {"visible" : false,"orderable":false },
            {"orderable":false },
            {"orderable":false },
            {"orderable":true},
            {"orderable":false},
            {"orderable":true},
            {"orderable":false}
          ],bFilter: false, bInfo: false,
          pagingType: "bootstrapPager",
          "sDom": "Rfrtlip",
          pagerSettings: {
              searchOnEnter: true,
              language: "Halaman ~ Dari ~"
          },
          processing: true,
          serverSide: true,
          ajax: {
            url: "<?php echo base_url(); ?>con_datapengajuanbeasiswa/getData",
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
      $.post("<?php echo base_url(); ?>con_formpengajuanbeasiswa/delete", {'id': id}, function (data) {
          table.ajax.reload();
      });
  }
function initEvent() {
      $("[id^=deleteData]").click(function (e) {
          var sure = confirm("Apakah Anda yakin untuk menghapus data ini?");
          if (sure) {
              var id = $(this).data().id;
              delete_data(id);
          }
          e.preventDefault();
      });
  }
</script>