<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Data Bahasa Internasional</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Berkas Wisuda</a></li>
                        <li class="breadcrumb-item active">Detail Data Bahasa Internasional</li>
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
                        <h5>NIM <?= $bks_bahasa->nim ?></h5>
                    </div>
                    <div class="invoice p-3 mb-3">
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fas fa-file"></i> Detail Data Bahasa Internasional
                                </h4>
                            </div>
                        </div>
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                Nama : <strong><?= $bks_bahasa->nama; ?></strong>
                                <address>
                                    <!-- <strong><?= $bks_seminar->nama; ?></strong><br> -->
                                    <!-- Program Studi : <?= $bks_seminar->nama_prodi; ?><br>
                                        Jurusan : <?= $bks_seminar->nama_jurusan; ?><br> -->
                                    Email : <?= $bks_bahasa->email; ?>
                                </address>
                            </div>
                            <div class="col-sm-4 invoice-col">
                                <b>Status Pendaftaran</b> :
                                <?php if ($bks_bahasa->status == '0') {
                                    echo '<span class="badge badge-warning">Menunggu</span>';
                                } else if ($bks_bahasa->status == '1') {
                                    echo '<span class="badge badge-info">Belum Lengkap</span>';
                                } else if ($bks_bahasa->status == '2') {
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
                                            <i class="fas fa-check-circle"></i> Periode<br>
                                            <input type="text" class="form-control col-sm-8" value="<?= $bks_bahasa->periode; ?>" readonly><br>
                                        </h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <h4>
                                            <i class="fas fa-check-circle"></i> Tahun<br>
                                            <input type="text" class="form-control col-sm-8" value="<?= $bks_bahasa->tahun; ?>" readonly><br>
                                        </h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <h4>
                                            <i class="fas fa-check-circle"></i> Nama Bahasa<br>
                                            <input type="text" class="form-control col-sm-8" value="<?= $bks_bahasa->nama_bhs; ?>" readonly><br>
                                        </h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <h4>
                                            <i class="fas fa-check-circle"></i> Skor<br>
                                            <input type="text" class="form-control col-sm-8" value="<?= $bks_bahasa->skor; ?>" readonly><br>
                                        </h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <h4>
                                            <i class="fas fa-check-circle"></i> Tanggal<br>
                                            <input type="text" class="form-control col-sm-8" value="<?= $bks_bahasa->tanggal; ?>" readonly><br>
                                        </h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <h4>
                                            <i class="fas fa-check-circle"></i> Surat Keterangan
                                        </h4>
                                    </div>
                                </div>
                                <iframe type="application/pdf" src="<?php echo base_url('assets/berkas/bahasa/' . $bks_bahasa->sk_bahasa); ?>" width="100%" height="600"></iframe><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>