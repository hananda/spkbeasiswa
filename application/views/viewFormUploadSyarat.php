<link href="<?php echo base_url(); ?>assets/css/uploadfile.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url(); ?>assets/js/jquery.uploadfile.min.js" type="text/javascript"></script>
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
<section class="content-header">
    <h1>
        Upload Syarat Beasiswa
        <!-- <small>advanced tables</small> -->
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Upload Syarat</li>
    </ol>
</section>

<section class="content">

    <!-- Small boxes (Stat box) -->
    <form role="form">

        <!-- syarat konten -->
        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title">Upload Syarat</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                        <div class="box-body">
                            <?php if ($syarat): ?>
                                <?php foreach ($syarat->result() as $r): ?>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><?php echo $r->nama_syarat_beasiswa ?></label>
                                                <div id="mulitplefileuploader_<?php echo $r->id_syarat_beasiswa; ?>">Upload</div>
                                                <div id="status_<?php echo $r->id_syarat_beasiswa; ?>"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h4>Hasil Upload <?php echo $r->nama_syarat_beasiswa ?></h4>
                                            <ul class="gallery clearfix" id="viewimage_<?php echo $r->id_syarat_beasiswa; ?>">
                                                <?php if ($datasyarat->num_rows>0): ?>
                                                    <?php foreach ($datasyarat->result() as $s): ?>
                                                        <?php if ($s->id_syarat == $r->id_syarat_beasiswa): ?>
                                                            <li>
                                                                <a href="<?php echo base_url(); ?>upload_syarat/<?php echo $id; ?>/<?php echo $r->id_syarat_beasiswa; ?>/<?php echo $s->foto_syarat_beasiswa; ?>" rel="prettyPhoto[gallery<?php echo $r->id_syarat_beasiswa; ?>]">
                                                                    <img src="<?php echo base_url(); ?>upload_syarat/<?php echo $id; ?>/<?php echo $r->id_syarat_beasiswa; ?>/<?php echo $s->foto_syarat_beasiswa; ?>" width="60" height="60" alt="" />
                                                                </a>
                                                                <button class="btn btn-info btn-sm btnhapusfoto" data-id="<?php echo $s->id_transaksi_syarat_beasiswa; ?>" data-idsyarat="<?php echo $r->id_syarat_beasiswa ?>">Hapus</button>
                                                            </li>
                                                        <?php endif ?>
                                                    <?php endforeach ?>
                                                <?php endif ?>
                                            </ul>
                                        </div>
                                    </div>

                                    <script type="text/javascript">
                                        var settings = {
                                                url: "<?php echo base_url(); ?>con_formpengajuanbeasiswa/uploadberkas/<?php echo $id; ?>/<?php echo $r->id_syarat_beasiswa; ?>",
                                                dragDrop:true,
                                                fileName: "myfile",
                                                allowedTypes:"jpg,png,gif,doc,pdf,zip,jpeg", 
                                                returnType:"json",
                                                 onSuccess:function(files,data,xhr)
                                                {
                                                   reloadimage('<?php echo $r->id_syarat_beasiswa ?>');
                                                },
                                                showDelete:false,
                                                showDone:true,
                                                deleteCallback: function(data,pd)
                                                {
                                                for(var i=0;i<data.length;i++)
                                                {
                                                    $.post("delete.php",{op:"delete",name:data[i]},
                                                    function(resp, textStatus, jqXHR)
                                                    {
                                                        //Show Message  
                                                        $("#status_<?php echo $r->id_syarat_beasiswa; ?>").append("<div>File Deleted</div>");      
                                                    });
                                                 }      
                                                pd.statusbar.hide(); //You choice to hide/not.

                                            }
                                        }
                                        var uploadObj_<?php echo $r->id_syarat_beasiswa; ?> = $("#mulitplefileuploader_<?php echo $r->id_syarat_beasiswa; ?>").uploadFile(settings);
                                    </script>
                                <?php endforeach ?>
                                
                            <?php endif ?>
                        </div><!-- /.box-body -->


                        <div class="box-footer">
                            <button class="btn btn-success" id="btnsimpanupload">Simpan</button>
                        </div>
                </div><!-- /.box -->
            </div>
        </div>
    </form>
</section><!-- /.content -->
<script type="text/javascript">
    $("#btnsimpanupload").click(function(e) {
        e.preventDefault();
        window.location.replace("<?php echo base_url(); ?>datapengajuan");     
    });

    function reloadimage (id) {
        $("#viewimage_"+id).load('<?php echo base_url(); ?>con_formpengajuanbeasiswa/reloadimage/<?php echo $id; ?>/'+id, function() {
            //$(".gallery a[rel='prettyPhoto[gallery"+id+"]']").prettyPhoto({animation_speed:'normal',social_tools: false,theme:'light_square',slideshow:3000, autoplay_slideshow: false});
            initevent();
        });
    }

    initevent();

    function initevent(){
        $(".btnhapusfoto").click(function(e) {
            e.preventDefault();
            var id = $(this).data().id;
            var idsyarat = $(this).data().idsyarat;
            $.post('<?php echo base_url() ?>con_formpengajuanbeasiswa/deletefoto/'+id,function(data) {
                reloadimage(idsyarat);
            });
        });
        $(".gallery a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',social_tools: false,theme:'light_square',slideshow:3000, autoplay_slideshow: false});
    }
</script>