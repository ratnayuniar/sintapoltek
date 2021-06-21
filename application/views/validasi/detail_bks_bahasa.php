<?php if ($this->session->userdata('id_role') == 4) { ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Detail Berkas Seminar</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">General Form</li>
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
                                        <i class="fas fa-book"></i> Pengajuan Topik
                                        <!-- <small class="float-right">Date: <?= $bks_seminar->tanggal_ajukan; ?></small> -->
                                    </h4>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- info row -->
                            <div class="row invoice-info">
                                <div class="col-sm-4 invoice-col">
                                    Nama
                                    <address>
                                        <strong><?= $bks_seminar->nama; ?></strong><br>
                                        <!-- Program Studi : <?= $bks_seminar->nama_prodi; ?><br>
                                        Jurusan : <?= $bks_seminar->nama_jurusan; ?><br> -->
                                        Email: <?= $bks_seminar->email; ?>
                                    </address>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 invoice-col">
                                    <b>Status Pendaftaran</b> : <?php if ($bks_seminar->status == '0') {
                                                                    echo '<span class="badge badge-warning">Menunggu</span>';
                                                                } else if ($bks_seminar->status == '1') {
                                                                    echo '<span class="badge badge-info">Komentari</span>';
                                                                } else if ($bks_seminar->status == '2') {
                                                                    echo '<span class="badge badge-primary">Setujui</span>';
                                                                } else {
                                                                    echo '<span class="badge badge-danger">Disetujui</span>';
                                                                }
                                                                ?>

                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- Table row -->
                            <div class="row">
                                <div class="col-6">
                                    <label for="">Topik</label>
                                    <input type="text" value="<?= $bks_seminar->judul ?>" readonly class="form-control">
                                    <label for="">Bidang</label>
                                    <input type="text" value="<?= $bks_seminar->bidang ?>" readonly class="form-control">
                                    <label for="">Lokasi</label>
                                    <input type="text" value="<?= $bks_seminar->lokasi ?>" readonly class="form-control">
                                    <label for="">Deskripsi</label>
                                    <textarea class="form-control" readonly rows="6"><?= $bks_seminar->deskripsi ?></textarea>
                                </div>
                                <div class="col-6">
                                    <label for="">Komentar</label>
                                    <textarea class="form-control" readonly rows="9"><?= $bks_seminar->komentar ?></textarea>
                                </div>
                                <!-- /.col -->
                            </div>
                        </div>
                        <!-- /.invoice -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>

        <!-- /.content -->
    </div>

    <div id="delete-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content bg-danger">
                <div class="modal-header">
                    <h4 class="modal-title">Konfirmasi Hapus</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?php echo base_url() . 'topik/delete'; ?>" method="post" class="form-horizontal" role="form">
                    <div class="modal-body">
                        <p>Apakah anda yakin ingin menghapus?</p>
                        <div>
                            <input type="hidden" id="id_topik2" name="id_topik2">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-outline-light">Ya</button>
                    </div>
            </div>

            <!-- /.modal-content -->
        </div>
    </div>
    <script type="text/javascript">
        function SetInput(id_topik, nim, bidang, judul, lokasi) {
            document.getElementById('id_topik').value = id_topik;
            document.getElementById('nim').value = nim;
            document.getElementById('bidang').value = bidang;
            document.getElementById('judul').value = judul;
            document.getElementById('lokasi').value = lokasi;
        }

        function SetInputs(id_topik, nim, bidang, judul, lokasi) {
            document.getElementById('id_topik2').value = id_topik;
            document.getElementById('nim2').value = nim;
            document.getElementById('bidang2').value = bidang;
            document.getElementById('judul2').value = judul;
            document.getElementById('lokasi2').value = lokasi;
        }

        function ResetInput(id_topik, nim, bidang, judul, lokasi) {
            document.getElementById('id_topik').value = "";
            document.getElementById('nim').value = "";
            document.getElementById('bidang').value = "";
            document.getElementById('judul').value = "";
            document.getElementById('lokasi').value = "";
        }
    </script>
<?php } else { ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Detail Data Bahasa Internasional</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('beranda'); ?>">Beranda</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo base_url('verif_bahasa'); ?>">Data Berkas Bahasa</a></li>
                            <li class="breadcrumb-item">Detail Data Berkas Bahasa</li>
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
                                        <!-- Email : <?= $bks_bahasa->email; ?> -->
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

    <script type="text/javascript">
        function SetInput(id_topik, nim, bidang, judul, lokasi, deskripsi) {
            document.getElementById('id_topik').value = id_topik;
            document.getElementById('nim').value = nim;
            document.getElementById('bidang').value = bidang;
            document.getElementById('judul').value = judul;
            document.getElementById('lokasi').value = lokasi;
            document.getElementById('deskripsi').value = deskripsi;
        }

        function SetInputs(id_topik, nim, bidang, judul, lokasi, deskripsi) {
            document.getElementById('id_topik2').value = id_topik;
            document.getElementById('nim2').value = nim;
            document.getElementById('bidang2').value = bidang;
            document.getElementById('judul2').value = judul;
            document.getElementById('lokasi2').value = lokasi;
            document.getElementById('deskripsi2').value = deskripsi;
        }

        function ResetInput(id_topik, nim, bidang, judul, lokasi, deskripsi) {
            document.getElementById('id_topik').value = "";
            document.getElementById('nim').value = "";
            document.getElementById('bidang').value = "";
            document.getElementById('judul').value = "";
            document.getElementById('lokasi').value = "";
            document.getElementById('deskripsi').value = "";
        }
    </script>
<?php } ?>