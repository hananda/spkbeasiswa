<link href="<?php echo base_url(); ?>assets/css/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url(); ?>assets/js/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrapPager.js" type="text/javascript"></script>
<section class="content-header">
    <h1>
        Perhitungan Penerima beasiswa
        <!-- <small>advanced tables</small> -->
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Perhitungan Penerima beasiswa</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
      <div class="col-md-12">
          <div class="box box-primary">
              <div class="box-header">
                  <h3 class="box-title"></h3>
              </div><!-- /.box-header -->
              <!-- form start -->
                  <div class="box-body">
                      <div class="form-group">
                          <label>Beasiswa</label>
                          <select class="form-control" name="periode" id="periode">
                              <option value="0">Pilih Periode Beasiswa supersemar</option>
                              <?php if ($periode): ?>
                                  <?php 
                                      $periode = $periode->result_array(); 
                                      var_dump($periode);
                                      for ($i=0; $i < count($periode); $i++) { 
                                  ?>
                                      <option value="<?php echo $periode[$i]['id_transaksi_beasiswa'] ?>">Periode <?php echo " ".$periode[$i]['tgl_awal_beasiswa'] ." - ".$periode[$i]['tgl_akhir_beasiswa']; ?></option>
                                  <?php        
                                      }
                                  ?>
                              <?php endif ?>
                          </select>
                      </div>
                  </div><!-- /.box-body -->


                  <!-- <div class="box-footer">
                      <button type="submit" class="btn btn-success">Ajukan Diri</button>
                  </div> -->
          </div><!-- /.box -->
      </div>
    </div><!-- /.row -->
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Daftar Calon Penerima Beasiswa</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="tabelcalonpenerimabeasiswa" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                            	<th></th>
                              <th>No</th>
                              <th>NIM Mahasiswa</th>
                              <th>Nama Mahasiswa</th>
                              <th>Beasiswa yang diajukan </th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
                <div class="box-footer">
                  <button type="button" id="btnhitungspk" class="btn btn-primary">Hitung SPK</button>
                </div>
            </div><!-- /.box -->
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Hasil Ranking Penerima Beasiswa</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="tabelrankingbeasiswa" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                              <th>NIM Mahasiswa</th>
                              <th>Nama Mahasiswa</th>
                              <th>Beasiswa yang diajukan </th>
                              <th>Ranking</th>
                              <th>Nilai SPK</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
                <div class="box-footer">
                  <button type="button" id="btnsetujuiranking" class="btn btn-success">Setujui Ranking</button>
                </div>
            </div><!-- /.box -->
        </div>
    </div>

</section>
<script>
var table = $('#tabelcalonpenerimabeasiswa').DataTable({
          "order": [[ 3, "asc" ]],
          "columns": [
            {"visible" : false,"orderable":false },
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
            url: "<?php echo base_url(); ?>con_penerimabeasiswa/getData",
            type: "POST",
              data: function (d) {
                  d.periode = $("#periode").val();
              }
          },
          paginate: true
      });

var tableranking = $('#tabelrankingbeasiswa').DataTable({
          "columns": [
            {"orderable":false },
            {"orderable":false},
            {"orderable":false},
            {"orderable":false},
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
            url: "<?php echo base_url(); ?>con_penerimabeasiswa/getDataranking",
        	type: "POST",
            data: function (d) {
                d.periode = $("#periode").val();
            }
          },
          paginate: true
      });

table.on('xhr.dt', function (e, settings, json) {
      setTimeout(function () {
          // initEvent();
      }, 500);
  });

$("#periode").change(function(e) {
  table.ajax.reload();
  tableranking.ajax.reload();
});

$("#btnhitungspk").click(function(e) {
  if($("#periode").val() == "0"){
    NotifikasiToast({
        type : 'warning', // ini tipe notifikasi success,warning,info,error
        msg : 'Anda belum memilih periode !!', //ini isi pesan
        title : '', //ini judul pesan
    });
    return false;
  }

  e.preventDefault();
  $.post('<?php echo base_url(); ?>con_penerimabeasiswa/hitungspk/'+$("#periode").val(),function(data, textStatus, xhr) {
    console.info(data);
    if(data.status){
      NotifikasiToast({
          type : 'success', // ini tipe notifikasi success,warning,info,error
          msg : data.msg, //ini isi pesan
          title : '', //ini judul pesan
      });
      tableranking.ajax.reload();
    }else{
      NotifikasiToast({
          type : 'error', // ini tipe notifikasi success,warning,info,error
          msg : data.msg, //ini isi pesan
          title : '', //ini judul pesan
      });
    }
  });
  // window.open("<?php echo base_url(); ?>con_penerimabeasiswa/hitungspk/"+$("#periode").val(),"_blank");
});

$("#btnsetujuiranking").click(function(event) {
  event.preventDefault();

  if($("#periode").val() == "0"){
    NotifikasiToast({
        type : 'warning', // ini tipe notifikasi success,warning,info,error
        msg : 'Anda belum memilih periode !!', //ini isi pesan
        title : '', //ini judul pesan
    });
    return false;
  }

  $.post('<?php echo base_url() ?>con_penerimabeasiswa/setujuibeasiswa/'+$("#periode").val(), function(data, textStatus, xhr) {
    console.info(data);
    if(data.status){
      NotifikasiToast({
          type : 'success', // ini tipe notifikasi success,warning,info,error
          msg : data.msg, //ini isi pesan
          title : '', //ini judul pesan
      });
      tableranking.ajax.reload();
    }else{
      NotifikasiToast({
          type : 'error', // ini tipe notifikasi success,warning,info,error
          msg : data.msg, //ini isi pesan
          title : '', //ini judul pesan
      });
    }
  });
});
</script>