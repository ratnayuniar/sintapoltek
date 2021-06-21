<?php if ($this->session->userdata('level') == 1) { ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Detail Data Organisasi</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('beranda'); ?>">Beranda</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo base_url('bks_organisasi'); ?>">Data Berkas Organisasi</a></li>
                            <li class="breadcrumb-item">Detail Data Berkas Organisasi</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <?php
                        foreach ($bks_organisasi->result() as $row) { ?>
                            <div class="invoice p-3 mb-3">
                                <div class="row">
                                    <div class="col-12">
                                        <h4>
                                            <i class="fas fa-file"></i> Detail Data Organisasi
                                        </h4>
                                    </div>
                                </div>
                                <div class="row invoice-info">
                                    <div class="col-sm-4 invoice-col">
                                        Nama : <strong><?= $row->nama; ?></strong><br>
                                        Email : <strong><?= $row->email; ?></strong>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <b>Status Pendaftaran</b> :
                                        <?php if ($row->status == '0') {
                                            echo '<span class="badge badge-warning">Menunggu</span>';
                                        } else if ($row->status == '1') {
                                            echo '<span class="badge badge-info">Valid</span>';
                                        } else {
                                            echo '<span class="badge badge-danger">Tidak Valid</span>';
                                        }
                                        ?><br>
                                        <b>Aksi</b> :
                                        <a href="<?php echo site_url('bks_organisasi/save_bks_valid/' . $row->id_bks_org); ?>" id="btn-konfirmasi" class="btn btn-xs btn-success">Valid</a>
                                        <a href="<?php echo site_url('bks_organisasi/save_bks_tidakvalid/' . $row->id_bks_org); ?>" id="btn-konfirmasi" class="btn btn-xs btn-danger">Tidak Valid</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <br>
                                        <div class="row">
                                            <div class="col-12">
                                                <h4>
                                                    <i class="fas fa-check-circle"></i> Nama Organisasi<br>
                                                    <input type="text" class="form-control col-sm-8" value="<?= $row->nama_org; ?>" readonly><br>
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <h4>
                                                    <i class="fas fa-check-circle"></i> Tempat<br>
                                                    <input type="text" class="form-control col-sm-8" value="<?= $row->tempat; ?>" readonly><br>
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <h4>
                                                    <i class="fas fa-check-circle"></i> Tahun Masuk<br>
                                                    <input type="text" class="form-control col-sm-8" value="<?= $row->tahun_masuk; ?>" readonly><br>
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <h4>
                                                    <i class="fas fa-check-circle"></i> Tahun Keluar<br>
                                                    <input type="text" class="form-control col-sm-8" value="<?= $row->tahun_keluar; ?>" readonly><br>
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <h4>
                                                    <i class="fas fa-check-circle"></i> Jabatan<br>
                                                    <input type="text" class="form-control col-sm-8" value="<?= $row->jabatan; ?>" readonly><br>
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
                                        <iframe type="application/pdf" src="<?php echo base_url('assets/berkas/organisasi/' . $row->sk_org); ?>" width="100%" height="600"></iframe><br>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        $(document).on('click', '#btn-konfirmasi', function(e) {
            e.preventDefault();
            var link = $(this).attr('href');
            Swal.fire({
                title: 'Apakah Anda Yakin ? ',
                text: "Data akan dikonfirmasi ?",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = link;
                    Swal.fire(
                        'Sukses',
                        'Data berhasil di konfirmasi',
                        'success'
                    )
                }
            });
        });
    </script>
<?php } else { ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Detail Data Organisasi</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('beranda'); ?>">Beranda</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo base_url('bks_organisasi'); ?>">Data Berkas Organisasi</a></li>
                            <li class="breadcrumb-item">Detail Data Berkas Organisasi</li>
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
                            <h5>NIM <?= $bks_organisasi->nim ?></h5>
                        </div>
                        <div class="invoice p-3 mb-3">
                            <div class="row">
                                <div class="col-12">
                                    <h4>
                                        <i class="fas fa-file"></i> Detail Data Organisasi
                                    </h4>
                                </div>
                            </div>
                            <div class="row invoice-info">
                                <div class="col-sm-4 invoice-col">
                                    Nama : <strong><?= $bks_organisasi->nama; ?></strong>
                                    Email : <strong>Email : <?= $bks_organisasi->email; ?></strong>
                                </div>
                                <div class="col-sm-4 invoice-col">
                                    <b>Status Pendaftaran</b> :
                                    <?php if ($bks_organisasi->status == '0') {
                                        echo '<span class="badge badge-warning">Menunggu</span>';
                                    } else if ($bks_organisasi->status == '1') {
                                        echo '<span class="badge badge-info">Belum Lengkap</span>';
                                    } else if ($bks_organisasi->status == '2') {
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
                                                <i class="fas fa-check-circle"></i> Nama Organisasi<br>
                                                <input type="text" class="form-control col-sm-8" value="<?= $bks_organisasi->nama_org; ?>" readonly><br>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <h4>
                                                <i class="fas fa-check-circle"></i> Tempat<br>
                                                <input type="text" class="form-control col-sm-8" value="<?= $bks_organisasi->tempat; ?>" readonly><br>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <h4>
                                                <i class="fas fa-check-circle"></i> Tahun Masuk<br>
                                                <input type="text" class="form-control col-sm-8" value="<?= $bks_organisasi->tahun_masuk; ?>" readonly><br>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <h4>
                                                <i class="fas fa-check-circle"></i> Tahun Keluar<br>
                                                <input type="text" class="form-control col-sm-8" value="<?= $bks_organisasi->tahun_keluar; ?>" readonly><br>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <h4>
                                                <i class="fas fa-check-circle"></i> Jabatan<br>
                                                <input type="text" class="form-control col-sm-8" value="<?= $bks_organisasi->jabatan; ?>" readonly><br>
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
                                    <iframe type="application/pdf" src="<?php echo base_url('assets/berkas/organisasi/' . $bks_organisasi->sk_org); ?>" width="100%" height="600"></iframe><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php } ?>