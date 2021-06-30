<?php if ($this->session->userdata('level') == 8) { ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Verifikasi LAB</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('beranda'); ?>">Beranda</a></li>
                            <li class="breadcrumb-item active">Verifikasi LAB</li>
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
                                <h3 class="card-title">Verifikasi Data LAB</h3>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead style="text-align:center; ">
                                        <tr>
                                            <th>No</th>
                                            <th>NIM</th>
                                            <th>Nama</th>
                                            <th>Status LAB</th>
                                            <th>Validasi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($get_mahasiswa as $row) { ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $row->nim ?></td>
                                                <td><?= $row->nama ?></td>
                                                <td> <?php if ($row->pinjaman_alat == '0') {
                                                            echo '<span class="badge badge-primary">Belum</span>';
                                                        } else if ($row->pinjaman_alat == '1') {
                                                            echo '<span class="badge badge-success">Kurang</span>';
                                                        } else {
                                                            echo '<span class="badge badge-danger">Lengkap</span>';
                                                        }
                                                        ?>
                                                </td>
                                                <td>
                                                    <a href="<?php echo site_url('verif_lab/save_lab_belum/' . $row->nim); ?>" id="btn-konfirmasi" class="btn btn-outline-primary btn-xs">Belum</a>
                                                    <a href="<?php echo site_url('verif_lab/save_lab_kurang/' . $row->nim); ?>" id="btn-konfirmasi" class="btn btn-outline-success btn-xs">Kurang</a>
                                                    <a href="<?php echo site_url('verif_lab/save_lab_lengkap/' . $row->nim); ?>" id="btn-konfirmasi" class="btn btn-outline-danger btn-xs">Lengkap</a>
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
                <form action="<?php echo base_url() . 'verif_lab/add'; ?>" method="post" class="form-horizontal" role="form">
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
<?php } else { ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Verifikasi LAB</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('beranda'); ?>">Beranda</a></li>
                            <li class="breadcrumb-item active">Verifikasi LAB</li>
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
                                <h3 class="card-title">Verifikasi Data LAB</h3>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead style="text-align:center; ">
                                        <tr>
                                            <th>No</th>
                                            <th>NIM</th>
                                            <th>Nama</th>
                                            <th>Status LAB</th>
                                            <!-- <th>Validasi</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($bks_wisuda_user->result() as $row) { ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $row->nim ?></td>
                                                <td><?= $row->nama ?></td>
                                                <td> <?php if ($row->pinjaman_alat == '0') {
                                                            echo '<span class="badge badge-primary">Belum</span>';
                                                        } else if ($row->pinjaman_alat == '1') {
                                                            echo '<span class="badge badge-success">Kurang</span>';
                                                        } else {
                                                            echo '<span class="badge badge-danger">Lengkap</span>';
                                                        }
                                                        ?>
                                                </td>
                                                <!-- <td>
                                                    <a href="<?php echo site_url('verif_lab/save_lab_belum/' . $row->nim); ?>" id="btn-konfirmasi" class="btn btn-outline-primary btn-xs">Belum</a>
                                                    <a href="<?php echo site_url('verif_lab/save_lab_kurang/' . $row->nim); ?>" id="btn-konfirmasi" class="btn btn-outline-success btn-xs">Kurang</a>
                                                    <a href="<?php echo site_url('verif_lab/save_lab_lengkap/' . $row->nim); ?>" id="btn-konfirmasi" class="btn btn-outline-danger btn-xs">Lengkap</a>
                                                </td> -->
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
                <form action="<?php echo base_url() . 'verif_lab/add'; ?>" method="post" class="form-horizontal" role="form">
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