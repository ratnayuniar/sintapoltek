    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Detail Berkas Seminar</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('beranda'); ?>">Beranda</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo base_url('bks_sidang'); ?>">Data Berkas Sidang</a></li>
                            <li class="breadcrumb-item">Detail Data Berkas Sidang</li>

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
                            <h5>NIM <?= $bks_sidang->nim ?></h5>
                        </div>
                        <div class="invoice p-3 mb-3">
                            <div class="row">
                                <div class="col-12">
                                    <h4>
                                        <i class="fas fa-file"></i> Detail Berkas Sidang
                                    </h4>
                                </div>
                            </div>
                            <div class="row invoice-info">
                                <div class="col-sm-4 invoice-col">
                                    Nama : <strong><?= $bks_sidang->nama; ?></strong><br>
                                    <!-- Email : <strong><?= $bks_sidang->email; ?></strong> -->
                                </div>
                                <div class="col-sm-4 invoice-col">
                                    <b>Status Pendaftaran</b> :
                                    <?php if ($bks_sidang->status == '0') {
                                        echo '<span class="badge badge-warning">Menunggu</span>';
                                    } else if ($bks_sidang->status == '1') {
                                        echo '<span class="badge badge-info">Belum Lengkap</span>';
                                    } else if ($bks_sidang->status == '2') {
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
                                                <i class="fas fa-check-circle"></i> Proposal
                                            </h4>
                                        </div>
                                    </div>
                                    <iframe type="application/pdf" src="<?php echo base_url('assets/berkas/sidang/' . $bks_sidang->proposal); ?>" width="100%" height="600"></iframe><br>
                                    <div class="row">
                                        <div class="col-12">
                                            <h4>
                                                <i class="fas fa-check-circle"></i> Sertifikat PKKMB
                                            </h4>
                                        </div>
                                    </div>
                                    <iframe type="application/pdf" src="<?php echo base_url('assets/berkas/sidang/' . $bks_sidang->pkkmb); ?>" width="100%" height="600"></iframe><br><br>
                                    <div class="row">
                                        <div class="col-12">
                                            <h4>
                                                <i class="fas fa-check-circle"></i> Pengesahan
                                            </h4>
                                        </div>
                                    </div>
                                    <iframe type="application/pdf" src="<?php echo base_url('assets/berkas/sidang/' . $bks_sidang->pengesahan); ?>" width="100%" height="600"></iframe><br><br>
                                    <div class="row">
                                        <div class="col-12">
                                            <h4>
                                                <i class="fas fa-check-circle"></i> Monitoring
                                            </h4>
                                        </div>
                                    </div>
                                    <iframe type="application/pdf" src="<?php echo base_url('assets/berkas/sidang/' . $bks_sidang->monitoring); ?>" width="100%" height="600"></iframe><br><br>
                                    <div class="row">
                                        <div class="col-12">
                                            <h4>
                                                <i class="fas fa-check-circle"></i> Persetujuan
                                            </h4>
                                        </div>
                                    </div>
                                    <iframe type="application/pdf" src="<?php echo base_url('assets/berkas/sidang/' . $bks_sidang->persetujuan); ?>" width="100%" height="600"></iframe><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>