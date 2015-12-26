<section class="content-header">
    <h1>
        Home
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li class="active">Home</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- Small boxes (Stat box) -->
    <div class="row">
        <!-- <div class="col-md-6">
            <div class="box box-danger">
                <div class="box-header">
                    <i class="fa fa-warning"></i>
                    <h3 class="box-title">Info Terbaru</h3>
                </div>
                <div class="box-body">
                    <div class="alert alert-danger alert-dismissable">
                        <i class="fa fa-ban"></i>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <b>Alert!</b> Danger alert preview. This alert is dismissable. A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.
                    </div>
                    <div class="alert alert-info alert-dismissable">
                        <i class="fa fa-info"></i>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <b>Alert!</b> Info alert preview. This alert is dismissable.
                    </div>
                    <div class="alert alert-warning alert-dismissable">
                        <i class="fa fa-warning"></i>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <b>Alert!</b> Warning alert preview. This alert is dismissable.
                    </div>
                    <div class="alert alert-success alert-dismissable">
                        <i class="fa fa-check"></i>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <b>Alert!</b> Success alert preview. This alert is dismissable.
                    </div>
                </div>
            </div>
        </div> -->
        <div class="col-md-12">
            <div class="callout callout-info">
                <h4>Selamat Datang</h4>
                <p>Di Aplikasi SPK Beasiswa</p>
            </div>
        </div>
    </div>
    <h2>Pengumuman</h2>
    <div class="row">
        <?php if ($pengumuman): ?>
            <?php foreach ($pengumuman->result() as $r): ?>
                <div class="col-md-12">
                    <div class="callout callout-info">
                        <h4><?php echo $r->judul_pengumuman; ?></h4>
                        <?php echo $r->desc_pengumuman; ?>
                    </div>
                </div>
            <?php endforeach ?>
        <?php endif ?>
    </div>
    <hr>
</section>