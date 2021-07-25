<?php if ($this->session->userdata('level') == 7) { ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Verifikasi Foto</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('beranda'); ?>">Beranda</a></li>
                            <li class="breadcrumb-item active">Verifikasi Foto</li>
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
                                <h3 class="card-title">Verifikasi Foto</h3>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th rowspan="2">No</th>
                                            <th rowspan="2">NIM</th>
                                            <th rowspan="2">Nama Mahasiswa</th>
                                            <th rowspan="2">Program Studi</th>
                                            <th rowspan="2">Foto Ijazah</th>
                                            <th colspan="2" width="20">Foto Wisuda</th>

                                        </tr>
                                        <tr>
                                            <th>Foto</th>
                                            <th>Keterangan</th>
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
                                                <td><?= $row->nama_prodi ?></td>
                                                <td> <?php if ($row->status_baak == '0') {
                                                            echo " <a href ='#' class ='btn btn-sm btn-warning btn-xs btn-block' data-toggle='modal' data-target='#modal_laporan' onClick=\"SetInput('" . $row->id_prodi . "','" . $row->id_bks_wisuda . "','" . $row->nim . "','" . $row->nama . "','" . $row->judul . "','" . $row->status_baak . "','" . $row->catatan_baak . "')\"> Belum</a>";
                                                        } else if ($row->status_baak == '1') {
                                                            echo " <a href ='#' class ='btn btn-sm btn-info btn-xs btn-block' data-toggle='modal' data-target='#modal_laporan' onClick=\"SetInput('" . $row->id_prodi . "','" . $row->id_bks_wisuda . "','" . $row->nim . "','" . $row->nama . "','" . $row->judul . "','" . $row->status_baak . "','" . $row->catatan_baak . "')\"> Kurang</a>";
                                                        } else {
                                                            echo " <a href ='#' class ='btn btn-sm btn-success btn-xs btn-block' data-toggle='modal' data-target='#modal_laporan' onClick=\"SetInput('" . $row->id_prodi . "','" . $row->id_bks_wisuda . "','" . $row->nim . "','" . $row->nama . "','" . $row->judul . "','" . $row->status_baak . "','" . $row->catatan_baak . "')\"> Lengkap</a>";
                                                        }
                                                        ?>
                                                    <?php if ($row->status_baak == '0') {
                                                        echo " <h6>Belum diverifikasi</h6>";
                                                    } else {
                                                        echo "<h6>" . $row->catatan_baak . "</h6> ";
                                                    }
                                                    ?>
                                                </td>
                                                <td><img src="<?php echo base_url('assets/berkas/wisuda/' . $row->foto_ijazah); ?>" width="200" height="300"></img><br></td>
                                                <td>
                                                    <?php if ($row->foto_wisuda == '0') {
                                                        echo " <a href ='#' class ='btn btn-sm btn-warning btn-xs btn-block' data-toggle='modal' data-target='#modal_tanggungan' onClick=\"SetInput2('" . $row->id_prodi . "','" . $row->id_bks_wisuda . "','" . $row->nim . "','" . $row->nama . "','" . $row->judul . "','" . $row->foto_wisuda . "','" . $row->catatan_tanggungan_perpus . "')\"> Belum</a>";
                                                    } else if ($row->foto_wisuda == '1') {
                                                        echo " <a href ='#' class ='btn btn-sm btn-info btn-xs btn-block' data-toggle='modal' data-target='#modal_tanggungan' onClick=\"SetInput2('" . $row->id_prodi . "','" . $row->id_bks_wisuda . "','" . $row->nim . "','" . $row->nama . "','" . $row->judul . "','" . $row->foto_wisuda . "','" . $row->catatan_tanggungan_perpus . "')\"> Kurang</a>";
                                                    } else {
                                                        echo " <a href ='#' class ='btn btn-sm btn-success btn-xs btn-block' data-toggle='modal' data-target='#modal_tanggungan' onClick=\"SetInput2('" . $row->id_prodi . "','" . $row->id_bks_wisuda . "','" . $row->nim . "','" . $row->nama . "','" . $row->judul . "','" . $row->foto_wisuda . "','" . $row->catatan_tanggungan_perpus . "')\"> Lengkap</a>";
                                                    }
                                                    ?>
                                                    <?php if ($row->foto_wisuda == '0') {
                                                        echo " <h6>Belum diverifikasi</h6>";
                                                    } else {
                                                        echo "<h6>" . $row->catatan_tanggungan_perpus . "</h6> ";
                                                    }
                                                    ?>
                                                </td>
                                                <!-- <td>
                                                    <a href="<?php echo site_url('verif_baak/save_belum/' . $row->id_bks_wisuda); ?>" id="btn-konfirmasi" class="btn btn-xs btn-info" id_prodi="<?= $row->id_prodi ?>">Belum</a>
                                                    <a href="<?php echo site_url('verif_baak/save_kurang/' . $row->id_bks_wisuda); ?>" id="btn-konfirmasi" class="btn btn-xs btn-primary" id_prodi="<?= $row->id_prodi ?>">Kurang</a>
                                                    <a href="<?php echo site_url('verif_baak/save_lengkap/' . $row->id_bks_wisuda); ?>" id="btn-konfirmasi" class="btn btn-xs btn-success" id_prodi="<?= $row->id_prodi ?>">Lengkap</a>
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
    <div id="modal_laporan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:55%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Verifikasi Foto Ijazah</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?= base_url('verif_baak/verify_statusbaak') ?>" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
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
                                <select class="form-control" data-live-search="true" data-style="btn-white" onclick="choose()" id="status_baak" name="status_baak" required>
                                    <option value="0">Belum</option>
                                    <option value="1">Kurang</option>
                                    <option value="2">Lengkap</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="persetujuan" class="col-sm-3 col-form-label">Catatan</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="catatan_baak" name="catatan_baak"></textarea>
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
                    <h4 class="modal-title">Verifikasi Foto Wisuda</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?= base_url('verif_baak/verify_wisuda') ?>" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
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
                                <select class="form-control" data-live-search="true" data-style="btn-white" onclick="choose()" id="foto_wisuda" name="foto_wisuda" required>
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

        function SetInput(id_prodi, id_bks_wisuda, nim, nama, judul, status_baak, catatan_laporan_perpus, tanggal) {
            document.getElementById('id_prodi').value = id_prodi;
            document.getElementById('id_bks_wisuda').value = id_bks_wisuda;
            document.getElementById('nim').value = nim;
            document.getElementById('nama').value = nama;
            document.getElementById('judul').value = judul;
            document.getElementById('status_baak').value = status_baak;
            document.getElementById('catatan_laporan_perpus').value = catatan_laporan_perpus;
            document.getElementById('tanggal').value = today;
        }

        function SetInput2(id_prodi, id_bks_wisuda, nim, nama, judul, foto_wisuda, catatan_tanggungan_perpus) {
            document.getElementById('id_prodi2').value = id_prodi;
            document.getElementById('id_bks_wisuda2').value = id_bks_wisuda;
            document.getElementById('nim2').value = nim;
            document.getElementById('nama2').value = nama;
            document.getElementById('judul2').value = judul;
            document.getElementById('foto_wisuda').value = foto_wisuda;
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
                        <h1>Verifikasi Foto</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('beranda'); ?>">Beranda</a></li>
                            <li class="breadcrumb-item active">Verifikasi Foto</li>
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
                                <h3 class="card-title">Verifikasi Foto</h3>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIM</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($bks_baak_user->result() as $row) { ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $row->nim ?></td>
                                                <td><?= $row->nama ?></td>
                                                <td> <?php if ($row->status_baak == '0') {
                                                            echo '<span class="badge badge-warning">Belum Diverifikasi</span>';
                                                        } else if ($row->status_baak == '1') {
                                                            echo '<span class="badge badge-primary">Kurang</span>';
                                                        } else {
                                                            echo '<span class="badge badge-success">Lengkap</span>';
                                                        }
                                                        ?>
                                                </td>
                                                <!-- <td>
                                                    <a href="<?php echo site_url('verif_baak/save_belum/' . $row->id_bks_wisuda); ?>" id="btn-konfirmasi" class="btn btn-xs btn-danger">Belum</a>
                                                    <a href="<?php echo site_url('verif_baak/save_kurang/' . $row->id_bks_wisuda); ?>" id="btn-konfirmasi" class="btn btn-xs btn-success">Kurang</a>
                                                    <a href="<?php echo site_url('verif_baak/save_lengkap/' . $row->id_bks_wisuda); ?>" id="btn-konfirmasi" class="btn btn-xs btn-primary">Lengkap</a>
                                                </td>
                                                <td><a href="<?= base_url('verif_baak/detail_foto/' . $row->id_bks_wisuda) ?>" class="btn btn-xs btn-info">
                                                        <i class="fa fa-search"></i> Detail</a>
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
<?php } ?>