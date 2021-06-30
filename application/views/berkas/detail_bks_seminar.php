    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Detail Berkas Seminar Proposal</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('beranda'); ?>">Beranda</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo base_url('bks_seminar'); ?>">Data Berkas Seminar Proposal</a></li>
                            <li class="breadcrumb-item active">Detail Berkas Seminar Proposal</li>
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
                            <h5>NIM <?= $bks_seminar->nim ?></h5>
                        </div>
                        <div class="invoice p-3 mb-3">
                            <div class="row">
                                <div class="col-12">
                                    <h4>
                                        <i class="fas fa-file"></i> Detail Berkas Seminar Proposal
                                    </h4>
                                </div>
                            </div>
                            <div class="row invoice-info">
                                <div class="col-sm-4 invoice-col">
                                    Nama : <strong><?= $bks_seminar->nama; ?></strong><br>
                                </div>
                                <div class="col-sm-4 invoice-col">
                                    <b>Status Pendaftaran</b> :
                                    <?php if ($bks_seminar->status == '0') {
                                        echo '<span class="badge badge-warning">Menunggu</span>';
                                    } else if ($bks_seminar->status == '1') {
                                        echo '<span class="badge badge-info">Belum Lengkap</span>';
                                    } else if ($bks_seminar->status == '2') {
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
                                                <i class="fas fa-check-circle"></i> Berita Acara
                                            </h4>
                                            <a href="<?php echo base_url('assets/berkas/seminar/' . $bks_seminar->berita_acara); ?>" class="btn btn-primary" download>Unduh</a>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-12">
                                            <h4>
                                                <i class="fas fa-check-circle"></i> Lembar Persetujuan
                                            </h4>
                                            <a href="<?php echo base_url('assets/berkas/seminar/' . $bks_seminar->persetujuan); ?>" class="btn btn-primary" download>Unduh</a>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-12">
                                            <h4>
                                                <i class="fas fa-check-circle"></i> Presentasi
                                            </h4>
                                            <a href="<?php echo base_url('assets/berkas/seminar/' . $bks_seminar->presentasi); ?>" class="btn btn-primary" download>Unduh</a>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-12">
                                            <h4>
                                                <i class="fas fa-check-circle"></i> Proposal
                                            </h4>
                                        </div>
                                    </div>
                                    <iframe type="application/pdf" src="<?php echo base_url('assets/berkas/seminar/' . $bks_seminar->proposal); ?>" width="100%" height="600"></iframe><br><br>
                                    <div class="row">
                                        <div class="col-12">
                                            <h4>
                                                <i class="fas fa-check-circle"></i> Monitoring
                                            </h4>
                                        </div>
                                    </div>
                                    <iframe type="application/pdf" src="<?php echo base_url('assets/berkas/seminar/' . $bks_seminar->monitoring); ?>" width="100%" height="600"></iframe><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>