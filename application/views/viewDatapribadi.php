<section class="content-header">
    <h1>
        Data Pribadi Mahasiswa
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Pribadi Mahasiswa</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title"></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" id="formdatapribadi" action="" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                        <input type="hidden" name="idmhs" value="<?php echo @$datamahasiswa->id_mahasiswa; ?>" />
                        <div class="form-group">
                            <label for="nimmahasiswa">NIM Mahasiswa</label>
                            <input type="text" value="<?php echo @$datamahasiswa->nim_mahasiswa; ?>" class="form-control" id="nimmahasiswa" placeholder="NIM" name="nimmhs" disabled >
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Mahasiswa</label>
                            <input type="text" value="<?php echo @$datamahasiswa->nama_mahasiswa; ?>" class="form-control" id="nama" placeholder="Nama Mahasiswa" name="nmmhs" disabled >
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select class="form-control" name="jenkel" id="jenkel" disabled >
                                <option value=""></option>
                                <option value="L" <?php echo (@$datamahasiswa->jenis_kelamin == 'L') ? 'selected' : ''; ?>>Laki - Laki</option>
                                <option value="P" <?php echo (@$datamahasiswa->jenis_kelamin == 'P') ? 'selected' : ''; ?>>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Alamat Mahasiswa</label>
                            <textarea class="form-control" name="almtmhs" rows="3" placeholder="Alamat" disabled ><?php echo @$datamahasiswa->alamat_mahasiswa; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="telpon">Telpon Mahasiswa</label>
                            <input type="text" class="form-control" value="<?php echo @$datamahasiswa->telpon_mahasiswa; ?>" id="telpon" placeholder="Telpon Mahasiswa" name="tlpmhs" disabled >
                        </div>
                        <div class="form-group">
                            <label>Jurusan</label>
                            <select class="form-control" name="jrsan" id="jurusan" disabled >
                                <option value=""></option>
                                <?php if ($jurusan): ?>
                                    <?php foreach (@$jurusan->result() as $r): ?>
                                        <option value="<?php echo $r->id_jurusan; ?>" <?php echo ($r->id_jurusan == @$datamahasiswa->jurusan_mahasiswa) ? 'selected' : ''; ?>><?php echo $r->nama_jurusan; ?></option>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Prodi</label>
                            <select class="form-control" id="prodi" name="prd" disabled >
                                <option value=""></option>
                                <?php if ($prodi): ?>
                                    <?php foreach (@$prodi->result() as $r): ?>
                                        <option value="<?php echo $r->id_prodi; ?>" <?php echo ($r->id_prodi == @$datamahasiswa->prodi_mahasiswa) ? 'selected' : ''; ?>><?php echo $r->nama_prodi; ?></option>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputFile">Foto Mahasiswa</label>
                                    <input type="file" name="fotomahasiswa" id="exampleInputFile">
                                    <p class="help-block">Example block-level help text here.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <?php if (@$datamahasiswa->foto_mahasiswa): ?>
                                    <img src="<?php echo base_url(); ?>foto_mahasiswa/<?php echo @$datamahasiswa->id_mahasiswa; ?>/<?php echo $datamahasiswa->foto_mahasiswa; ?>" width="128" height="128" />
                                <?php else : ?>
                                    <img src="<?php echo base_url(); ?>assets/img/No_Image.jpg" width="128" height="128" />
                                <?php endif ?>
                            </div>
                        </div>
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <button id="btnedit" class="btn btn-info">Edit</button>
                        <button id="btnsimpan" type="submit" class="btn btn-success">Simpan</button>
                        <button id="btnbatal" class="btn btn-danger">Batal</button>
                    </div>
                </form>
            </div><!-- /.box -->
        </div>
    </div><!-- /.row -->
</section><!-- /.content -->

<script>
$("#btnsimpan").hide();
$("#btnbatal").hide();
$("#formdatapribadi input,select,textarea").attr('disabled',true);

$("#btnedit").click(function(e) {
    e.preventDefault();
    $(this).hide();
    $("#btnsimpan").show();
    $("#btnbatal").show(); 
    $("#formdatapribadi input,select,textarea").removeAttr('disabled'); 
});

$("#btnsimpan").click(function(e) {
    e.preventDefault();
    $("#formdatapribadi").submit();
});

$("#btnbatal").click(function(e) {  
    e.preventDefault();  
    $("#btnsimpan").hide();
    $(this).hide();
    $("#btnedit").show();
    $("#formdatapribadi input,select,textarea").attr('disabled',true);
});

$("#formdatapribadi").submit(function(e) {
    
    var data = $(this).serialize();
    var formData = new FormData($(this)[0]);
    console.info(data);
    $.ajax({
        url: global.baseUrl+'con_datamahasiswa/editData',
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
            $("#formdatapribadi input,select,textarea").val('');
            setTimeout(function() {location.replace('<?php echo base_url(); ?>datapribadi');}, 500);
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

$("#jurusan").change(function(event) {
    $("#prodi").attr('disabled',true);
    $.post(global.baseUrl+'con_datamahasiswa/getProdi', {idjrsn: $(this).val()}, function(data, textStatus, xhr) {
        var html = '<option value="0"></option>';
        for(var i = 0;i<data.length;i++){
            html += '<option value="'+data[i].id_prodi+'">'+data[i].nama_prodi+'</option>';
        }
        $("#prodi").html(html);
        $("#prodi").attr('disabled',false);
    });
});
</script>