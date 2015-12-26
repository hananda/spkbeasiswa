<?php
if ($periode->num_rows > 0) {
	$periode = $periode->row();
	$tgl = $periode->tgl_awal_beasiswa." - ".$periode->tgl_akhir_beasiswa;
}else{
	$tgl = '-';
}
?>
	
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>SPK Beasiswa</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <meta name="base" content="<?php echo base_url(); ?>">
        <meta name="tp_us" content="<?php echo $this->session->userdata('user_tipe'); ?>">
        <!-- bootstrap 3.0.2 -->
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="<?php echo base_url(); ?>assets/css/ionicons.min.css" rel="stylesheet" type="text/css" />
         <!-- Date Picker -->
        <link href="<?php echo base_url(); ?>assets/css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="<?php echo base_url(); ?>assets/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url(); ?>assets/css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <link href="<?php echo base_url(); ?>assets/bootstrap-toastr/toastr.min.css" rel="stylesheet">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.<?php echo base_url(); ?>assets/js/1.3.0/respond.min.js"></script>
        <![endif]-->
         <!-- jQuery 2.0.2 -->
        <script src="<?php echo base_url(); ?>assets/js/jquery-2.0.2.js"></script>
        <!-- jQuery UI 1.10.3 -->
        <script src="<?php echo base_url(); ?>assets/js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- Morris.js charts -->
        <title>Laporan Beasiswa</title>
		<style type="text/css">
		.box-header{
			text-align: center;
			margin-left: 350px;
		}
		</style>
    </head>
    <body class="skin-blue">
        
        <div class="wrapper row-offcanvas row-offcanvas-left">
        	<div class="row">
        		<div class="col-md-1">
        			
        		</div>
                <div class="col-md-10">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Laporan Beasiswa Supersemar - Periode : <?php echo $tgl; ?></h3>
                        </div><!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
						<?php if ($data->num_rows > 0): ?>
                            <table class="table table-hover">
								<thead>
									<tr>
										<td>No</td>
										<td>Nim Mahasiswa</td>
										<td>Nama Mahasiswa</td>
										<td>Tanggal Daftar</td>
										<td>Status</td>
									</tr>
								</thead>
                                <tbody>
									<?php $i=1;foreach ($data->result() as $r): ?>
										<tr>
											<td><?php echo $i; ?></td>
											<td><?php echo $r->nim_mahasiswa; ?></td>
											<td><?php echo $r->nama_mahasiswa; ?></td>
											<td><?php echo $r->tgl_daftar_mahasiswa2; ?></td>
											<?php 
												$idstatus = $r->id_status;
												if ($idstatus == 1) {
													$label = 'default';
													$status = 'Berkas Diajukan';
												}else if($idstatus == 2){
													$label = 'warning';
													$status = 'Berkas Terverifikasi';
												}else if($idstatus == 3){
													$label = 'danger';
													$status = 'Berkas Kurang Lengkap';
												}else if($idstatus == 4){
													$label = 'success';
													$status = 'Mendapatkan Beasiswa';
												}else if($idstatus == 5){
													$label = 'danger';
													$status = 'Tidak Mendapatkan Beasiswa';
												}
											?>
											<td><span class="label label-<?php echo $label; ?>"><?php echo $status; ?></span></td>
										</tr>
										<?php $i++; ?>
									<?php endforeach ?>
                            	</tbody>
                            </table>
                        <?php endif; ?>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div>
                <div class="col-md-1">
                	
                </div>
            </div>
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->


       
        <script src="<?php echo base_url(); ?>assets/js/raphael-min.js"></script>
       <!-- jQuery Knob Chart -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
        <!-- datepicker -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

        <!-- AdminLTE App -->
        <script src="<?php echo base_url(); ?>assets/js/AdminLTE/app.js" type="text/javascript"></script>

        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo base_url(); ?>assets/js/AdminLTE/demo.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/bootstrap-toastr/toastr.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/global.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/page/main.js" type="text/javascript"></script>

    </body>
</html>