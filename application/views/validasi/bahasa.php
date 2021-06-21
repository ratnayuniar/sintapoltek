<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Validasi Bahasa Internasional</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('beranda'); ?>">Beranda</a></li>
                        <li class="breadcrumb-item active">Validasi Bahasa Internasional</li>
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
                            <h3 class="card-title">Validasi Bahasa Internasional</h3>
                        </div>
                        <div class="card-body">
                            <div style="text-align:right;margin-bottom: 10px ">
                                <!-- <a href="#" class="on-default edit-row btn btn-success pull-right" data-toggle="modal" pull="right" data-target="#custom-width-modal" onclick="ResetInput()"><i class="fa fa-plus"></i></a> -->
                            </div>
                            <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIM</th>
                                            <th>Nama</th>
                                            <th>Jumlah</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($bks_bahasa_admin->result() as $row) { ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $row->nim ?></td>
                                                <td><?= $row->nama ?></td>
                                                <td><?= $row->jumlah ?></td>
                                                <td><a href="<?= base_url('bks_bahasa/detail_bks_bahasa/' . $row->id_bks_bhs) ?>" class="btn btn-primary btn-sm">
                                                        <i class="fa fa-search"></i></td>
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
            <form action="<?php echo base_url() . 'verif_keuangan/add'; ?>" method="post" class="form-horizontal" role="form">
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