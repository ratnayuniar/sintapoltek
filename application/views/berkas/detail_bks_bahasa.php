<?php if ($this->session->userdata('level') == 9) { ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Detail Data Bahasa</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('beranda'); ?>">Beranda</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo base_url('bks_bahasa/admin'); ?>">List Verifikasi Bahasa</a></li>
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
                        <?php
                        foreach ($bks_bahasa->result() as $row) { ?>
                            <div class="invoice p-3 mb-3">
                                <div class="row">
                                    <div class="col-12">
                                        <h4>
                                            <i class="fas fa-file"></i> Detail Data Bahasa
                                        </h4>
                                    </div>
                                </div>
                                <div class="row invoice-info">
                                    <div class="col-sm-4 invoice-col">
                                        Nama : <strong><?= $row->nama; ?></strong><br>
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
                                        <a href="<?php echo site_url('bks_bahasa/save_bks_valid/' . $row->id_bks_bhs); ?>" id="btn-konfirmasi" class="btn btn-xs btn-success">Valid</a>
                                        <a href="<?php echo site_url('bks_bahasa/save_bks_tidakvalid/' . $row->id_bks_bhs); ?>" id="btn-konfirmasi" class="btn btn-xs btn-danger">Tidak Valid</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <br>
                                        <div class="row">
                                            <div class="col-12">
                                                <h4>
                                                    <i class="fas fa-check-circle"></i> Nama Bahasa<br>
                                                    <input type="text" class="form-control col-sm-8" value="<?= $row->nama_bhs ?>" readonly><br>
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <h4>
                                                    <i class="fas fa-check-circle"></i> Periode<br>
                                                    <input type="text" class="form-control col-sm-8" value="<?= $row->periode ?>" readonly><br>
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <h4>
                                                    <i class="fas fa-check-circle"></i> Tahun<br>
                                                    <input type="text" class="form-control col-sm-8" value="<?= $row->tahun ?>" readonly><br>
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <h4>
                                                    <i class="fas fa-check-circle"></i> Skor<br>
                                                    <input type="text" class="form-control col-sm-8" value="<?= $row->skor ?>" readonly><br>
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <h4>
                                                    <i class="fas fa-check-circle"></i> Tanggal<br>
                                                    <input type="text" class="form-control col-sm-8" value="<?= $row->tanggal ?>" readonly><br>
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
                                        <iframe type="application/pdf" src="<?php echo base_url('assets/berkas/bahasa/' . $row->sk_bahasa); ?>" width="100%" height="600"></iframe><br>
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
                        <h1>Detail Data Bahasa</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('beranda'); ?>">Beranda</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo base_url('bks_bahasa'); ?>">Berkas Bahasa</a></li>
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
                        <?php
                        foreach ($bks_bahasa->result() as $row) { ?>
                            <div class="invoice p-3 mb-3">
                                <div class="row">
                                    <div class="col-12">
                                        <h4>
                                            <i class="fas fa-file"></i> Detail Data Bahasa
                                        </h4>
                                    </div>
                                </div>
                                <div class="row invoice-info">
                                    <div class="col-sm-4 invoice-col">
                                        Nama : <strong><?= $row->nama; ?></strong><br>
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
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <br>
                                        <div class="row">
                                            <div class="col-12">
                                                <h4>
                                                    <i class="fas fa-check-circle"></i> Nama Bahasa<br>
                                                    <input type="text" class="form-control col-sm-8" value="<?= $row->nama_bhs ?>" readonly><br>
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <h4>
                                                    <i class="fas fa-check-circle"></i> Periode<br>
                                                    <input type="text" class="form-control col-sm-8" value="<?= $row->periode ?>" readonly><br>
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <h4>
                                                    <i class="fas fa-check-circle"></i> Tahun<br>
                                                    <input type="text" class="form-control col-sm-8" value="<?= $row->tahun ?>" readonly><br>
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <h4>
                                                    <i class="fas fa-check-circle"></i> Skor<br>
                                                    <input type="text" class="form-control col-sm-8" value="<?= $row->skor ?>" readonly><br>
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <h4>
                                                    <i class="fas fa-check-circle"></i> Tanggal<br>
                                                    <input type="text" class="form-control col-sm-8" value="<?= $row->tanggal ?>" readonly><br>
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
                                        <iframe type="application/pdf" src="<?php echo base_url('assets/berkas/bahasa/' . $row->sk_bahasa); ?>" width="100%" height="600"></iframe><br>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php } ?>