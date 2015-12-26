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
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="<?php echo base_url(); ?>home" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                SPK Beasiswa
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <!-- <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a> -->
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        
                        <!-- User Account: style can be found in dropdown.less -->
                        <!-- <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-warning"></i>
                                <span class="label label-warning">10</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">Anda Memiliki 10 Pemberitahuan</li>
                                <li>
                                    <!-- inner menu: contains the actual data 
                                    <ul class="menu">
                                        <li>
                                            <a href="#">
                                                <i class="ion ion-ios7-people info"></i> 5 new members joined today
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-warning danger"></i> Very long description here that may not fit into the page and may cause design problems
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users warning"></i> 5 new members joined
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#">
                                                <i class="ion ion-ios7-cart success"></i> 25 sales made
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="ion ion-ios7-person danger"></i> You changed your username
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li> -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo @$this->session->userdata('user_nama'); ?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="<?php echo base_url() ?>assets/avatar/avatar.png" class="img-circle" alt="User Image" />
                                    <p>
                                        <?php echo @$this->session->userdata('user_nama'); ?>
                                        <!-- <small>Member since Nov. 2012</small> -->
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <!-- <li class="user-body">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Followers</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Sales</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Friends</a>
                                    </div>
                                </li> -->
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <!-- <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div> -->
                                    <div class="pull-right">
                                        <a href="" id="btnlogout" class="btn btn-default btn-flat">Log out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <!-- <div class="pull-left image">
                            <img src="<?php echo base_url() ?>assets/avatar/avatar.png" class="img-circle" alt="User Image" />
                        </div> -->
                        <div class="pull-left info">
                            <p>Hello, <?php echo @$this->session->userdata('user_nama'); ?></p>

                            <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
                        </div>
                    </div>
                    <!-- search form -->
                    <!-- <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form> -->
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <?php $url = $this->uri->segment(1);$url1 = $this->uri->segment(2);?>
                    <ul class="sidebar-menu">
                        <?php if ($this->session->userdata('user_tipe') == "3" ): ?>
                            <?php $menu = "datapribadi"; ?>
                            <li <?php echo ($url == $menu) ? 'class="active"' : ''; ?>>
                                <a href="<?php echo base_url().$menu; ?>">
                                    <i class="fa fa-dashboard"></i> <span>Data Pribadi</span>
                                </a>
                            </li>
                            <?php $menu = "formpengajuan"; ?>
                            <li <?php echo ($url == $menu) ? 'class="active"' : ''; ?>>
                                <a href="<?php echo base_url().$menu; ?>">
                                    <i class="fa fa-th"></i> <span>Form Pengajuan Beasiswa</span>
                                </a>
                            </li>
                            <?php $menu = "datapengajuan"; ?>
                            <li <?php echo ($url == $menu) ? 'class="active"' : ''; ?>>
                                <a href="<?php echo base_url().$menu; ?>">
                                    <i class="fa fa-bar-chart-o"></i> <span>Data Pengajuan Beasiswa</span>
                                </a>
                            </li>   
                        <?php elseif ($this->session->userdata('user_tipe')== "2") : ?>
                            <?php $menu = "master"; ?>
                            <li class="<?php echo ($url == $menu) ? 'active' : ''; ?> treeview">
                                <a href="">
                                    <i class="fa fa-dashboard"></i> <span>Master Data</span><i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <?php $menu1 = "kriteria"; ?>
                                    <li <?php echo ($url1 == $menu1) ? 'class="active"' : ''; ?>><a href="<?php echo base_url(); ?>master/kriteria"><i class="fa fa-angle-double-right"></i> Kriteria</a></li>
                                    <?php $menu1 = "detailkriteria"; ?>
                                    <li <?php echo ($url1 == $menu1) ? 'class="active"' : ''; ?>><a href="<?php echo base_url(); ?>master/detailkriteria"><i class="fa fa-angle-double-right"></i> Detail Kriteria</a></li>
                                    <?php $menu1 = "beasiswa"; ?>
                                    <li <?php echo ($url1 == $menu1) ? 'class="active"' : ''; ?>><a href="<?php echo base_url(); ?>master/beasiswa"><i class="fa fa-angle-double-right"></i>Periode Beasiswa</a></li>
                                    <?php $menu1 = "dokumensyarat"; ?>
                                    <li <?php echo ($url1 == $menu1) ? 'class="active"' : ''; ?>><a href="<?php echo base_url(); ?>master/dokumensyarat"><i class="fa fa-angle-double-right"></i> Dokumen Syarat Beasiswa</a></li>
                                    <?php $menu1 = "jurusan"; ?>
                                    <li <?php echo ($url1 == $menu1) ? 'class="active"' : ''; ?>><a href="<?php echo base_url(); ?>master/jurusan"><i class="fa fa-angle-double-right"></i> Jurusan</a></li>
                                    <?php $menu1 = "prodi"; ?>
                                    <li <?php echo ($url1 == $menu1) ? 'class="active"' : ''; ?>><a href="<?php echo base_url(); ?>master/prodi"><i class="fa fa-angle-double-right"></i> Prodi</a></li>
                                </ul>
                            </li>
                            <?php $menu = "datamahasiswa"; ?>
                            <li <?php echo ($url == $menu) ? 'class="active"' : ''; ?>>
                                <a href="<?php echo base_url().$menu; ?>">
                                    <i class="fa fa-th"></i> <span>Data Mahasiswa</span>
                                </a>
                            </li>
                            <?php $menu = "verifberkas"; ?>
                            <li <?php echo ($url == $menu) ? 'class="active"' : ''; ?>>
                                <a href="<?php echo base_url().$menu; ?>">
                                    <i class="fa fa-bar-chart-o"></i> <span>Verifikasi Berkas Beasiswa</span>
                                </a>
                            </li>
                            <?php $menu = "penerimabeasiswa"; ?>
                            <li <?php echo ($url == $menu) ? 'class="active"' : ''; ?>>
                                <a href="<?php echo base_url().$menu; ?>">
                                    <i class="fa fa-bar-chart-o"></i> <span>Penerima Beasiswa (SPK Promethe)</span>
                                </a>
                            </li>
                            <?php $menu = "laporanbeasiswa"; ?>
                            <li <?php echo ($url == $menu) ? 'class="active"' : ''; ?>>
                                <a href="<?php echo base_url().$menu; ?>">
                                    <i class="fa fa-bar-chart-o"></i> <span>Laporan Beasiswa</span>
                                </a>
                            </li>
                            <?php $menu = "pengumuman"; ?>
                            <li <?php echo ($url == $menu) ? 'class="active"' : ''; ?>>
                                <a href="<?php echo base_url().$menu; ?>">
                                    <i class="fa fa-bar-chart-o"></i> <span>Pengumuman</span>
                                </a>
                            </li>
                        <?php elseif($this->session->userdata('user_tipe') == "1") : ?>
                            <?php $menu = "laporanbeasiswa"; ?>
                            <li <?php echo ($url == $menu) ? 'class="active"' : ''; ?>>
                                <a href="<?php echo base_url().$menu; ?>">
                                    <i class="fa fa-bar-chart-o"></i> <span>Laporan Beasiswa</span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <!-- <li class="treeview">
                            <a href="#">
                                <i class="fa fa-bar-chart-o"></i>
                                <span>Charts</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="pages/charts/morris.html"><i class="fa fa-angle-double-right"></i> Morris</a></li>
                                <li><a href="pages/charts/flot.html"><i class="fa fa-angle-double-right"></i> Flot</a></li>
                                <li><a href="pages/charts/inline.html"><i class="fa fa-angle-double-right"></i> Inline charts</a></li>
                            </ul>
                        </li> -->
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <?php echo @$content; ?>
            </aside>
            
            <div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                </div>
              </div>
            </div>
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->


       
        <script src="<?php echo base_url(); ?>assets/js/raphael-min.js"></script>
       <!-- jQuery Knob Chart -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
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