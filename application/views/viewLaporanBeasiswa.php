<section class="content-header">
    <h1>
        Laporan Penerima beasiswa
        <!-- <small>advanced tables</small> -->
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Laporan Penerima beasiswa</li>
    </ol>
</section>
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


                <div class="box-footer">
                  <button type="button" id="btncetak" class="btn btn-primary">Cetak Laporan</button>
                </div>
          </div><!-- /.box -->
      </div>
    </div><!-- /.row -->
</section>

<script>
$("#btncetak").click(function(e) {
  if($("#periode").val() == "0"){
    NotifikasiToast({
        type : 'warning', // ini tipe notifikasi success,warning,info,error
        msg : 'Anda belum memilih periode !!', //ini isi pesan
        title : '', //ini judul pesan
    });
    return false;
  }
	
	window.open("<?php echo base_url(); ?>con_laporanbeasiswa/laporan/"+$("#periode").val(),"_blank");
});
</script>