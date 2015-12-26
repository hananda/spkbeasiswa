<section class="content-header">
    <h1>
        Pengajuan Beasiswa
        <!-- <small>advanced tables</small> -->
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Pengajuan Beasiswa</li>
    </ol>
</section>

<section class="content">

    <!-- Small boxes (Stat box) -->
    <form role="form" id="formbeasiswa">
        <input type="hidden" name="idmahasiswa" value="<?php echo $mahasiswa->id_mahasiswa; ?>" />
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
                                    <option value="">Pilih Periode Beasiswa supersemar</option>
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

        <!-- kriterkonten -->
        <div class="row" style="display:none;" id="contentkriteria">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Kriteria</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                        <div class="box-body">
                            <?php if ($kriteria): ?>
                                <?php foreach ($kriteria->result() as $r): ?>
                                    <div class="form-group">
                                        <label><?php echo $r->nama_kriteria ?></label>
                                        <select class="form-control" name="kriteria_<?php echo $r->id_kriteria; ?>">
                                            <option value="">Pilih Detail Kriteria</option>
                                            <?php if ($detilkriteria): ?>
                                                <?php foreach ($detilkriteria->result() as $s): ?>
                                                    <?php if ($r->id_kriteria == $s->id_kriteria): ?>
                                                        <option value="<?php echo $s->id_detail_kriteria; ?>"><?php echo $s->nama_detail_kriteria; ?></option>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            <?php endif ?>
                                        </select>
                                    </div>
                                <?php endforeach ?>
                                
                            <?php endif ?>
                        </div><!-- /.box-body -->


                        <div class="box-footer">
                            <button id="btnsimpan" class="btn btn-success">Simpan Dan Lanjutkan</button>
                        </div>
                </div><!-- /.box -->
            </div>
        </div>
    </form>
</section><!-- /.content -->
<script type="text/javascript">
    $("#periode").change(function(e) {
        console.info($(this).val());
        if($(this).val() == "")
            $("#contentkriteria").hide('slow');
        else
            $("#contentkriteria").show('slow');
    });

    $("#btnsimpan").click(function(e) {
        e.preventDefault();
        $("#formbeasiswa").submit();
    });

    $("#formbeasiswa").submit(function(e) {
        var data = $(this).serialize();
        var formData = new FormData($(this)[0]);

        $.ajax({
            url: '<?php echo base_url(); ?>con_formpengajuanbeasiswa/ajukanbeasiswa',
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
                setTimeout(function() {location.replace('<?php echo base_url(); ?>con_formpengajuanbeasiswa/uploadsyarat/'+response.id);}, 500);
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
</script>