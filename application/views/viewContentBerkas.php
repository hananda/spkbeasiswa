<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
<script src="<?php echo base_url(); ?>assets/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
<style type="text/css">
    ul li { display: inline; }

    h4 {
                font-family: Georgia;
                font-style: italic;
                margin: 0 0 5px 0;
            }
</style>
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h4 class="modal-title" id="exampleModalLabel">Detail berkas</h4>
</div>
<div class="modal-body">
  <div class="container-fluid">
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
                                  <select disabled class="form-control" name="kriteria_<?php echo $r->id_kriteria; ?>">
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
          </div><!-- /.box -->
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
          <div class="box box-success">
              <div class="box-header">
                  <h3 class="box-title">Berkas Upload</h3>
              </div><!-- /.box-header -->
              <!-- form start -->
                  <div class="box-body">
                      <?php if ($syarat): ?>
                          <?php foreach ($syarat->result() as $r): ?>
                              <div class="row">
                                  <div class="col-md-12">
                                      <h4>Hasil Upload <?php echo $r->nama_syarat_beasiswa ?></h4>
                                      <ul class="gallery clearfix" id="viewimage_<?php echo $r->id_syarat_beasiswa; ?>">
                                          <?php if ($datasyarat->num_rows>0): ?>
                                              <?php foreach ($datasyarat->result() as $s): ?>
                                                  <?php if ($s->id_syarat == $r->id_syarat_beasiswa): ?>
                                                      <li>
                                                          <a href="<?php echo base_url(); ?>upload_syarat/<?php echo $id; ?>/<?php echo $r->id_syarat_beasiswa; ?>/<?php echo $s->foto_syarat_beasiswa; ?>" rel="prettyPhoto[gallery<?php echo $r->id_syarat_beasiswa; ?>]">
                                                              <img src="<?php echo base_url(); ?>upload_syarat/<?php echo $id; ?>/<?php echo $r->id_syarat_beasiswa; ?>/<?php echo $s->foto_syarat_beasiswa; ?>" width="60" height="60" alt="" />
                                                          </a>
                                                      </li>
                                                  <?php endif ?>
                                              <?php endforeach ?>
                                          <?php endif ?>
                                      </ul>
                                  </div>
                              </div>
                          <?php endforeach ?>
                          
                      <?php endif ?>
                  </div>
          </div><!-- /.box -->
      </div>
  </div>
  </div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-default" id="btnbataltolak" data-dismiss="modal">Tutup</button>
</div>
<script type="text/javascript">
  $(".gallery a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',social_tools: false,theme:'light_square',slideshow:3000, autoplay_slideshow: false});
</script>