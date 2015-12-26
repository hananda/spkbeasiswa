<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h4 class="modal-title" id="exampleModalLabel">Info Mahasiswa</h4>
</div>
<div class="modal-body">
  <div class="container-fluid">
    <div class="row">
      <form role="form">
        <div class="box-body">
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
                <input type="text" class="form-control" value="<?php echo @$datamahasiswa->nama_jurusan; ?>" disabled >
            </div>
            <div class="form-group">
                <label>Prodi</label>
                <input type="text" class="form-control" value="<?php echo @$datamahasiswa->nama_prodi; ?>" disabled >
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputFile">Foto Mahasiswa</label>
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
      </form>
    </div>
  </div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-default" id="btnbataltolak" data-dismiss="modal">Tutup</button>
</div>