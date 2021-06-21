    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Detail Foto</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('beranda'); ?>">Beranda</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo base_url('verif_baak'); ?>">Verifikasi Foto</a></li>
                            <li class="breadcrumb-item">Detail Data Foto</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="callout callout-info">
                            <h5>NIM <?= $bks_wisuda->nim ?></h5>
                        </div>
                        <div class="invoice p-3 mb-3">
                            <div class="row">
                                <div class="col-12">
                                    <h4>
                                        <i class="fas fa-file"></i> Detail Berkas Foto
                                    </h4>
                                </div>
                            </div>
                            <div class="row invoice-info">
                                <div class="col-sm-4 invoice-col">
                                    Nama : <strong><?= $bks_wisuda->nama; ?></strong>
                                    <address>
                                        <!-- Program Studi : <?= $this->session->userdata('nama_prodi'); ?><br>
                                        Jurusan : <?= $this->session->userdata('nama_jurusan'); ?><br> -->
                                        Email : <?= $bks_wisuda->email; ?>
                                    </address>
                                </div>
                                <div class="col-sm-4 invoice-col">
                                    <b>Status Pendaftaran</b> :
                                    <?php if ($bks_wisuda->status_baak == '0') {
                                        echo '<span class="badge badge-warning">Menunggu</span>';
                                    } else if ($bks_wisuda->status_baak == '1') {
                                        echo '<span class="badge badge-info">Belum Lengkap</span>';
                                    } else if ($bks_wisuda->status_baak == '2') {
                                        echo '<span class="badge badge-primary">Kurang Lengkap</span>';
                                    } else {
                                        echo '<span class="badge badge-danger">Lengkap</span>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <br>
                                    <div class="row">
                                        <div class="col-12">
                                            <h4>
                                                <i class="fas fa-check-circle"></i> Foto Ijazah
                                            </h4>
                                            <a href="<?= base_url("/assets/berkas/wisuda/$bks_wisuda->foto_ijazah") ?>" class="btn btn-primary" download>Unduh</a>
                                        </div>
                                    </div>
                                    <br>
                                    <iframe type="application/pdf" src="<?php echo base_url('assets/berkas/wisuda/' . $bks_wisuda->foto_ijazah); ?>" width="100%" height="600"></iframe><br>

                                    <div class="row">
                                        <div class="col-12">
                                            <h4>
                                                <i class="fas fa-check-circle"></i> Foto Wisuda
                                            </h4>
                                            <a href="<?= base_url("/assets/berkas/wisuda/$bks_wisuda->foto_wisuda") ?>" class="btn btn-primary" download>Unduh</a>
                                        </div>
                                    </div>
                                    <br>
                                    <iframe type="application/pdf" src="<?php echo base_url('assets/berkas/wisuda/' . $bks_wisuda->foto_wisuda); ?>" width="100%" height="600"></iframe><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
