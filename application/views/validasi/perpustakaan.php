<?php if ($this->session->userdata('level') == 6) { ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Verifikasi Perpustakaan</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('beranda'); ?>">Beranda</a></li>
                            <li class="breadcrumb-item active">Verifikasi Perpustakaan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Verifikasi Data Perpustakaan</h3>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead style="text-align:center; ">
                                        <tr>
                                            <th rowspan="2">No</th>
                                            <th rowspan="2">NIM</th>
                                            <th rowspan="2">Nama</th>
                                            <th rowspan="2" width="20">Status Laporan</th>
                                            <th rowspan="2" width="20">Status Tanggungan</th>
                                            <th colspan="2">Validasi</th>
                                        </tr>
                                        <tr>

                                            <th>Laporan</th>
                                            <th>Tanggungan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($get_mahasiswa->result() as $row) { ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $row->nim ?></td>
                                                <td><?= $row->nama ?></td>
                                                <td> <?php if ($row->laporan_perpus == '0') {
                                                            echo '<span class="badge badge-info">Belum</span>';
                                                        } else if ($row->laporan_perpus == '1') {
                                                            echo '<span class="badge badge-primary">Kurang</span>';
                                                        } else {
                                                            echo '<span class="badge badge-success">Lengkap</span>';
                                                        }
                                                        ?>
                                                </td>
                                                <td> <?php if ($row->tanggungan_perpus == '0') {
                                                            echo '<span class="badge badge-info">Belum</span>';
                                                        } else if ($row->tanggungan_perpus  == '1') {
                                                            echo '<span class="badge badge-primary">Kurang</span>';
                                                        } else {
                                                            echo '<span class="badge badge-success">Lengkap</span>';
                                                        }
                                                        ?>
                                                </td>
                                                <td>
                                                    <?php if ($row->laporan_perpus == '0') {
                                                        echo " <a href ='#' class ='btn btn-sm btn-warning btn-xs btn-block' data-toggle='modal' data-target='#modal_laporan' onClick=\"SetInput('" . $row->id_prodi . "','" . $row->id_bks_wisuda . "','" . $row->nim . "','" . $row->nama . "','" . $row->judul . "','" . $row->laporan_perpus . "','" . $row->catatan_laporan_perpus . "')\"> Belum</a>";
                                                    } else if ($row->laporan_perpus == '1') {
                                                        echo " <a href ='#' class ='btn btn-sm btn-info btn-xs btn-block' data-toggle='modal' data-target='#modal_laporan' onClick=\"SetInput('" . $row->id_prodi . "','" . $row->id_bks_wisuda . "','" . $row->nim . "','" . $row->nama . "','" . $row->judul . "','" . $row->laporan_perpus . "','" . $row->catatan_laporan_perpus . "')\"> Kurang</a>";
                                                    } else {
                                                        echo " <a href ='#' class ='btn btn-sm btn-success btn-xs btn-block' data-toggle='modal' data-target='#modal_laporan' onClick=\"SetInput('" . $row->id_prodi . "','" . $row->id_bks_wisuda . "','" . $row->nim . "','" . $row->nama . "','" . $row->judul . "','" . $row->laporan_perpus . "','" . $row->catatan_laporan_perpus . "')\"> Lengkap</a>";
                                                    }
                                                    ?>
                                                    <?php if ($row->laporan_perpus == '0') {
                                                        echo " <h6>Belum diverifikasi</h6>";
                                                    } else {
                                                        echo "<h6>" . $row->catatan_laporan_perpus . "</h6> ";
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php if ($row->tanggungan_perpus == '0') {
                                                        echo " <a href ='#' class ='btn btn-sm btn-warning btn-xs btn-block' data-toggle='modal' data-target='#modal_tanggungan' onClick=\"SetInput2('" . $row->id_prodi . "','" . $row->id_bks_wisuda . "','" . $row->nim . "','" . $row->nama . "','" . $row->judul . "','" . $row->tanggungan_perpus . "','" . $row->catatan_tanggungan_perpus . "')\"> Belum</a>";
                                                    } else if ($row->tanggungan_perpus == '1') {
                                                        echo " <a href ='#' class ='btn btn-sm btn-info btn-xs btn-block' data-toggle='modal' data-target='#modal_tanggungan' onClick=\"SetInput2('" . $row->id_prodi . "','" . $row->id_bks_wisuda . "','" . $row->nim . "','" . $row->nama . "','" . $row->judul . "','" . $row->tanggungan_perpus . "','" . $row->catatan_tanggungan_perpus . "')\"> Kurang</a>";
                                                    } else {
                                                        echo " <a href ='#' class ='btn btn-sm btn-success btn-xs btn-block' data-toggle='modal' data-target='#modal_tanggungan' onClick=\"SetInput2('" . $row->id_prodi . "','" . $row->id_bks_wisuda . "','" . $row->nim . "','" . $row->nama . "','" . $row->judul . "','" . $row->tanggungan_perpus . "','" . $row->catatan_tanggungan_perpus . "')\"> Lengkap</a>";
                                                    }
                                                    ?>
                                                    <?php if ($row->tanggungan_perpus == '0') {
                                                        echo " <h6>Belum diverifikasi</h6>";
                                                    } else {
                                                        echo "<h6>" . $row->catatan_tanggungan_perpus . "</h6> ";
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div id="modal_laporan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:55%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Verifikasi Laporan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?= base_url('veri_perpus/verify_laporan') ?>" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group row">
                            <input type="hidden" id="id_bks_wisuda" name="id_bks_wisuda">
                            <input type="hidden" id="id_prodi" name="id_prodi">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">NIM</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nim" name="nim" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Mahasiswa</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nama" name="nama" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="persetujuan" class="col-sm-3 col-form-label">Judul TA</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="judul" name="judul" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="exampleInputjudul1" class="col-sm-3 col-form-label">Keterangan</label>
                            <div class="col-sm-4">
                                <select class="form-control" data-live-search="true" data-style="btn-white" onclick="choose()" id="laporan_perpus" name="laporan_perpus" required>
                                    <option value="0">Belum</option>
                                    <option value="1">Kurang</option>
                                    <option value="2">Lengkap</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="persetujuan" class="col-sm-3 col-form-label">Catatan</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="catatan_laporan_perpus" name="catatan_laporan_perpus"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="persetujuan" class="col-sm-3 col-form-label">Tanggal</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="tanggal" name="tanggal">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="submit" class="btn btn-primary" style="float: right;">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="modal_tanggungan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:55%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Verifikasi Tanggungan Perpustakaan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?= base_url('veri_perpus/verify_tanggungan') ?>" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group row">
                            <input type="hidden" id="id_bks_wisuda2" name="id_bks_wisuda">
                            <input type="hidden" id="id_prodi2" name="id_prodi">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">NIM</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nim2" name="nim" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Mahasiswa</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nama2" name="nama" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="persetujuan" class="col-sm-3 col-form-label">Judul TA</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="judul2" name="judul" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputjudul1" class="col-sm-3 col-form-label">Keterangan</label>
                            <div class="col-sm-4">
                                <select class="form-control" data-live-search="true" data-style="btn-white" onclick="choose()" id="tanggungan_perpus" name="tanggungan_perpus" required>
                                    <option value="0">Belum</option>
                                    <option value="1">Kurang</option>
                                    <option value="2">Lengkap</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="persetujuan" class="col-sm-3 col-form-label">Catatan</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="catatan_tanggungan_perpus" name="catatan_tanggungan_perpus"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="persetujuan" class="col-sm-3 col-form-label">Tanggal</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="tanggal_tg" name="tanggal_tg">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="submit" class="btn btn-primary" style="float: right;">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var date = new Date();
        var day = date.getDate();
        var month = date.getMonth() + 1;
        var year = date.getFullYear();
        if (month < 10) month = "0" + month;
        if (day < 10) day = "0" + day;
        var today = year + "-" + month + "-" + day;

        function SetInput(id_prodi, id_bks_wisuda, nim, nama, judul, laporan_perpus, catatan_laporan_perpus, tanggal) {
            document.getElementById('id_prodi').value = id_prodi;
            document.getElementById('id_bks_wisuda').value = id_bks_wisuda;
            document.getElementById('nim').value = nim;
            document.getElementById('nama').value = nama;
            document.getElementById('judul').value = judul;
            document.getElementById('laporan_perpus').value = laporan_perpus;
            document.getElementById('catatan_laporan_perpus').value = catatan_laporan_perpus;
            document.getElementById('tanggal').value = today;
        }

        function SetInput2(id_prodi, id_bks_wisuda, nim, nama, judul, tanggungan_perpus, catatan_tanggungan_perpus) {
            document.getElementById('id_prodi2').value = id_prodi;
            document.getElementById('id_bks_wisuda2').value = id_bks_wisuda;
            document.getElementById('nim2').value = nim;
            document.getElementById('nama2').value = nama;
            document.getElementById('judul2').value = judul;
            document.getElementById('tanggungan_perpus').value = tanggungan_perpus;
            document.getElementById('catatan_tanggungan_perpus').value = catatan_tanggungan_perpus;
            document.getElementById('tanggal_tg').value = today;
        }
    </script>
<?php } else { ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Verifikasi Perpustakaan</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('beranda'); ?>">Beranda</a></li>
                            <li class="breadcrumb-item active">Verifikasi Perpustakaan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Verifikasi Data Perpustakaan</h3>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead style="text-align:center; ">
                                        <tr>
                                            <th>No</th>
                                            <th>NIM</th>
                                            <th>Nama</th>
                                            <th>Status Laporan</th>
                                            <th>Status Tanggungan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($bks_perpus_user->result() as $row) { ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $row->nim ?></td>
                                                <td><?= $row->nama ?></td>
                                                <td> <?php if ($row->laporan_perpus == '0') {
                                                            echo '<span class="badge badge-warning">Belum Diverifikasi</span>';
                                                        } else if ($row->laporan_perpus == '1') {
                                                            echo '<span class="badge badge-primary">Kurang</span>';
                                                        } else {
                                                            echo '<span class="badge badge-success">Lengkap</span>';
                                                        }
                                                        ?>
                                                </td>
                                                <td><?php if ($row->tanggungan_perpus == '0') {
                                                        echo '<span class="badge badge-warning">Belum Diverifikasi</span>';
                                                    } else if ($row->tanggungan_perpus == '1') {
                                                        echo '<span class="badge badge-primary">Kurang</span>';
                                                    } else {
                                                        echo '<span class="badge badge-success">Lengkap</span>';
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


    <div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:55%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Data Jurusan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?php echo base_url() . 'veri_perpus/add'; ?>" method="post" class="form-horizontal" role="form">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" id="id_perpus" name="id_perpus">
                            <label class="col-md-3 control-label">Nim</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="nim" name="nim" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-5 control-label">Nama Mahasiswa</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-5 control-label">Laporan Tugas Akhir</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <select class="form-control" data-live-search="true" data-style="btn-white" id="laporan" name="laporan" required>
                                        <option value="">-- Pilih Status --</option>
                                        <option value="Belum">Belum</option>
                                        <option value="Kurang">Kurang</option>
                                        <option value="Lengkap">Lengkap</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-8 control-label">Tanggungan Perpustakaan</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <select class="form-control" data-live-search="true" data-style="btn-white" id="tanggungan" name="tanggungan" required>
                                        <option value="">-- Pilih Status --</option>
                                        <option value="Belum">Belum</option>
                                        <option value="Kurang">Kurang</option>
                                        <option value="Lengkap">Lengkap</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>

                        </div>

                    </div>
                </form>
            </div>

        </div>
    </div>
    <div id="delete-modassl" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:55%;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="custom-width-modalLabel">Konfirmasi Hapus</h4>
                </div>
                <form action="<?php echo base_url() . 'jurusan/delete'; ?>" method="post" class="form-horizontal" role="form">
                    <div class="modal-body">
                        <p>Apakah anda yakin ingin menghapus?</p>
                        <div>
                            <input type="hidden" id="id_jurusan2" name="id_jurusan2">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-success waves-effect waves-light">Ya</button>
                    </div>
            </div>
        </div>
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
                <div class="modal-body">
                    <p>Apakah anda yakin ingin menghapus?</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-outline-light">Ya</button>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        function SetInput(nim, nama, id_jurusan, id_prodi) {
            document.getElementById('nim').value = nim;
            document.getElementById('nama').value = nama;
            document.getElementById('id_prodi').value = id_prodi;
            document.getElementById('id_jurusan').value = id_jurusan;
        }

        function SetInputs(id_jurusan, id_prodi, nim, nama) {

            document.getElementById('nim2').value = nim;
            document.getElementById('nama').value = nama;
        }

        function ResetInput() {
            document.getElementById('nim').value = "";
            document.getElementById('nama').value = "";
            document.getElementById('id_prodi').value = "";
            document.getElementById('id_jurusan').value = "";
        }
    </script>
<?php } ?>