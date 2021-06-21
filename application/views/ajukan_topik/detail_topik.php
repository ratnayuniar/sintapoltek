<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar Topik Tugas Akhir</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('beranda'); ?>">Beranda</a></li>
                        <li class="breadcrumb-item active">Data Topik</li>
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
                        <h5>NIM <?= $topik->nim ?></h5>
                    </div>
                    <div class="invoice p-3 mb-3">
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fas fa-book"></i> Pengajuan Topik
                                </h4>
                            </div>
                        </div>
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                Nama : <strong><?= $topik->nama; ?></strong><br>
                                Email: <strong><?= $topik->email; ?></strong>
                            </div>
                            <div class="col-sm-4 invoice-col">
                                <b>Status Topik</b> :
                                <?php if ($topik->status == '0') {
                                    echo '<span class="badge badge-warning">Menunggu</span>';
                                } else if ($topik->status == '1') {
                                    echo '<span class="badge badge-info">Telah Dikonfirmasi</span>';
                                } else if ($topik->status == '2') {
                                    echo '<span class="badge badge-primary">Proses</span>';
                                } else if ($topik->status == '4') {
                                    echo '<span class="badge badge-danger">Ditolak</span>';
                                } else {
                                    echo '<span class="badge badge-primary">Disetujui</span>';
                                }
                                ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="">Topik</label>
                                <input type="text" value="<?= $topik->judul ?>" readonly class="form-control">
                                <label for="">Bidang</label>
                                <input type="text" value="<?= $topik->bidang ?>" readonly class="form-control">
                                <label for="">Lokasi</label>
                                <input type="text" value="<?= $topik->lokasi ?>" readonly class="form-control">
                                <label for="">Deskripsi</label>
                                <textarea class="form-control" readonly rows="6"><?= $topik->deskripsi ?></textarea>
                            </div>
                            <div class="col-6">
                                <label for="">Komentar</label>
                                <textarea class="form-control" readonly rows="9"><?= $topik->komentar ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>