<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <!-- <h3 class="m-2">Selamat Datang Admin Perpustakaan, <?php echo $user["nama"]; ?></h3>
              <h5 class="m-2">Terdaftar <?= date('d F Y', $user['tanggal_buat']); ?></h5> -->
            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="alert alert-info">Selamat Datang Admin Perpustakaan <b><?= $this->session->nama; ?><b></div>
                <div class="card mb-2 bg-gradient-dark">
                    <img class="card-img-top" src="<?= base_url('admin/dist/img/pnm.jpg'); ?>" alt="Dist Photo 1">
                    <div class="card-img-overlay d-flex flex-column justify-content-end">
                    </div>
                </div>
            </div>
            <div class="row">

            </div>
    </section>
</div>