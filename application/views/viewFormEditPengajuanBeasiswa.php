<section class="content-header">
    <h1>
        Edit Kriteria Beasiswa
        <!-- <small>advanced tables</small> -->
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Kriteria Beasiswa</li>
    </ol>
</section>

<section class="content">

    <!-- Small boxes (Stat box) -->
    <form role="form" id="formeditbeasiswa">
        <input type="hidden" name="id" value="<?php echo $id; ?>" />
        
        <div class="row" id="contentkriteria">
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
                                                        <?php
                                                            $selected = "";
                                                            if($r->id_detail_kriteria == $s->id_detail_kriteria)
                                                                $selected = "selected";
                                                        ?>
                                                        <option value="<?php echo $s->id_detail_kriteria; ?>" <?php echo $selected; ?>><?php echo $s->nama_detail_kriteria; ?></option>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            <?php endif ?>
                                        </select>
                                    </div>
                                <?php endforeach ?>
                                
                            <?php endif ?>
                        </div><!-- /.box-body -->


                        <div class="box-footer">
                            <button id="btnsimpan" class="btn btn-success">Simpan</button>
                            <button id="btnbatal" class="btn btn-info">Batal</button>
                        </div>
                </div><!-- /.box -->
            </div>
        </div>
    </form>
</section><!-- /.content -->
<script type="text/javascript">


    $("#btnsimpan").click(function(e) {
        e.preventDefault();
        $("#formeditbeasiswa").submit();
    });    

    $("#btnbatal").click(function(e) {
        e.preventDefault();
        window.location.replace('<?php echo base_url(); ?>datapengajuan');
    });

    $("#formeditbeasiswa").submit(function(e) {
        var data = $(this).serialize();
        var formData = new FormData($(this)[0]);

        $.ajax({
            url: '<?php echo base_url(); ?>con_formpengajuanbeasiswa/saveedit',
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
                setTimeout(function() {location.replace('<?php echo base_url(); ?>datapengajuan');}, 500);
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