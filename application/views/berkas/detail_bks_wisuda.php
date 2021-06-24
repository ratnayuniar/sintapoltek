        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Detail Berkas wisuda</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('beranda'); ?>">Beranda</a></li>
                                <li class="breadcrumb-item"><a href="<?php echo base_url('bks_wisuda'); ?>">Data Berkas Wisuda</a></li>
                                <li class="breadcrumb-item">Detail Data Berkas Wisuda</li>
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
                                            <i class="fas fa-file"></i> Detail Berkas Pendaftaran Wisuda
                                        </h4>
                                    </div>
                                </div>
                                <div class="row invoice-info">
                                    <div class="col-sm-4 invoice-col">
                                        Nama : <strong><?= $bks_wisuda->nama; ?></strong><br>
                                        <!-- Email : <strong><?= $bks_wisuda->email; ?></strong> -->
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <b>Status Pendaftaran</b> :
                                        <?php if ($bks_wisuda->status == '0') {
                                            echo '<span class="badge badge-warning">Menunggu</span>';
                                        } else if ($bks_wisuda->status == '1') {
                                            echo '<span class="badge badge-info">Komentari</span>';
                                        } else if ($bks_wisuda->status == '2') {
                                            echo '<span class="badge badge-primary">Setujui</span>';
                                        } else {
                                            echo '<span class="badge badge-danger">Disetujui</span>';
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
                                                    <i class="fas fa-check-circle"></i> File Tugas Akhir
                                                </h4>
                                            </div>
                                        </div>
                                        <iframe type="application/pdf" src="<?php echo base_url('assets/berkas/wisuda/' . $bks_wisuda->file_ta); ?>" width="100%" height="600"></iframe><br>
                                        <div class="row">
                                            <div class="col-12">
                                                <h4>
                                                    <i class="fas fa-check-circle"></i> Jurnal
                                                </h4>
                                            </div>
                                        </div>
                                        <iframe type="application/pdf" src="<?php echo base_url('assets/berkas/wisuda/' . $bks_wisuda->jurnal); ?>" width="100%" height="600"></iframe><br><br>
                                        <div class="row">
                                            <div class="col-12">
                                                <h4>
                                                    <i class="fas fa-check-circle"></i> Laporan Tugas Akhir
                                                </h4>
                                            </div>
                                        </div>
                                        <iframe type="application/pdf" src="<?php echo base_url('assets/berkas/wisuda/' . $bks_wisuda->lap_ta_prodi); ?>" width="100%" height="600"></iframe><br><br>
                                        <div class="row">
                                            <div class="col-12">
                                                <h4>
                                                    <i class="fas fa-check-circle"></i> Aplikasi
                                                </h4>
                                            </div>
                                        </div>
                                        <iframe type="application/pdf" src="<?php echo base_url('assets/berkas/wisuda/' . $bks_wisuda->aplikasi); ?>" width="100%" height="600"></iframe><br><br>
                                        <div class="row">
                                            <div class="col-12">
                                                <h4>
                                                    <i class="fas fa-check-circle"></i> Powerpoint
                                                </h4>
                                            </div>
                                        </div>
                                        <iframe type="application/pdf" src="<?php echo base_url('assets/berkas/wisuda/' . $bks_wisuda->ppt); ?>" width="100%" height="600"></iframe><br>
                                        <div class="row">
                                            <div class="col-12">
                                                <h4>
                                                    <i class="fas fa-check-circle"></i> Foto Ijazah
                                                </h4>
                                            </div>
                                        </div>
                                        <iframe type="application/pdf" src="<?php echo base_url('assets/berkas/wisuda/' . $bks_wisuda->foto_ijazah); ?>" width="100%" height="600"></iframe><br>
                                        <div class="row">
                                            <div class="col-12">
                                                <h4>
                                                    <i class="fas fa-check-circle"></i> Foto Wisuda
                                                </h4>
                                            </div>
                                        </div>
                                        <iframe type="application/pdf" src="<?php echo base_url('assets/berkas/wisuda/' . $bks_wisuda->foto_wisuda); ?>" width="100%" height="600"></iframe><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>