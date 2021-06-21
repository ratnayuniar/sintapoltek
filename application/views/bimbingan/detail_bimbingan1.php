<?php if (($this->session->userdata('level') == 3) or ($this->session->userdata('level') == 4)) { ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Detail Lembar Bimbingan</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('beranda'); ?>">Beranda</a></li>
                            <li class="breadcrumb-item active">Detail Lembar Bimbingan</li>
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
                            <h5>NIM <?= $bimbingan->nim ?></h5>
                        </div>
                        <div class="invoice p-3 mb-3">
                            <div class="row">
                                <div class="col-12">
                                    <h4>
                                        <i class="fas fa-book"></i> Detail Lembar Bimbingan
                                    </h4>
                                </div>
                            </div>
                            <div class="row invoice-info">
                                <div class="col-sm-4 invoice-col">
                                    Nama : <b><?= $bimbingan->nama; ?></b><br>
                                    Email: <b><?= $bimbingan->email; ?></b>
                                </div>
                                <div class="col-sm-4 invoice-col">
                                    <b>Status Bimbingan</b> :
                                    <?php if ($bimbingan->status == '0') {
                                        echo '<span class="badge badge-warning">Menunggu</span>';
                                    } else if ($bimbingan->status == '1') {
                                        echo '<span class="badge badge-info">Komentari</span>';
                                    } else if ($bimbingan->status == '2') {
                                        echo '<span class="badge badge-primary">Telah Dikomentari</span>';
                                    } else {
                                        echo '<span class="badge badge-danger">Disetujui</span>';
                                    }
                                    ?>
                                    <br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label for="">Dosen</label>
                                    <input type="text" value="<?= $bimbingan->dosen ?>" readonly class="form-control">
                                    <label for="">Tanggal</label>
                                    <input type="text" value="<?= $bimbingan->tanggal ?>" readonly class="form-control">
                                    <label for="">Masalah</label>
                                    <textarea class="form-control" readonly rows="6"><?= $bimbingan->masalah ?></textarea>
                                </div>
                                <div class="col-6">
                                    <label for="">Solusi</label>
                                    <textarea class="form-control" readonly rows="9"><?= $bimbingan->solusi ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php } else { ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Detail Lembar Bimbingan</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('beranda'); ?>">Beranda</a></li>
                            <li class="breadcrumb-item active">Detail Lembar Bimbingan</li>
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
                            <h5>NIM <?= $bimbingan->nim ?></h5>
                        </div>
                        <div class="invoice p-3 mb-3">
                            <div class="row">
                                <div class="col-12">
                                    <h4>
                                        <i class="fas fa-book"></i> Detail Lembar Bimbingan
                                    </h4>
                                </div>
                            </div>
                            <div class="row invoice-info">
                                <div class="col-sm-4 invoice-col">
                                    Nama : <b><?= $bimbingan->nama; ?></b><br>
                                    Email: <b><?= $bimbingan->email; ?></b>
                                </div>
                                <div class="col-sm-4 invoice-col">
                                    <b>Status Bimbingan</b> :
                                    <?php if ($bimbingan->status == '0') {
                                        echo '<span class="badge badge-warning">Menunggu</span>';
                                    } else if ($bimbingan->status == '1') {
                                        echo '<span class="badge badge-info">Komentari</span>';
                                    } else if ($bimbingan->status == '2') {
                                        echo '<span class="badge badge-primary">Telah Dikomentari</span>';
                                    } else {
                                        echo '<span class="badge badge-danger">Disetujui</span>';
                                    }
                                    ?>
                                    <br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label for="">Dosen</label>
                                    <input type="text" value="<?= $bimbingan->dosen ?>" readonly class="form-control">
                                    <label for="">Tanggal</label>
                                    <input type="text" value="<?= $bimbingan->tanggal ?>" readonly class="form-control">
                                    <label for="">Masalah</label>
                                    <textarea class="form-control" readonly rows="6"><?= $bimbingan->masalah ?></textarea>
                                </div>
                                <div class="col-6">
                                    <label for="">Solusi</label>
                                    <textarea class="form-control" readonly rows="9"><?= $bimbingan->solusi ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php } ?>