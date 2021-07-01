<?php if ($this->session->userdata('level') == 1) { ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Berkas Perdaftaran Wisuda</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('beranda'); ?>">Beranda</a></li>
                            <li class="breadcrumb-item active"> Data Berkas Pendaftaran Wisuda</li>
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
                                <h3 class="card-title">Data Berkas Pendaftaran Wisuda</h3>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIM</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>File TA</th>
                                            <th>File Jurnal</th>
                                            <th>Lap.TA</th>
                                            <th>File Aplikasi</th>
                                            <th>File PPT</th>
                                            <th>File Video</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $id_prodi = $this->session->userdata('id_prodi');
                                        foreach ($this->m_bks_wisuda->bks_wisuda_admin($id_prodi)->result() as $row) { ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $row->nim ?></td>
                                                <td><?= $row->nama ?></td>
                                                <td> <?php if ($row->status_file_ta == '0') {
                                                            echo " <a href='" . base_url(' bks_wisuda/save_bks_belum/' . $row->id_bks_wisuda) . "' class='btn btn-xs btn-danger'>Belum</a>";
                                                        } else if ($row->status_file_ta == '1') {
                                                            echo " <a href='" . base_url(' bks_wisuda/save_bks_kurang/' . $row->id_bks_wisuda) . "' class='btn btn-xs btn-primary'>Kurang</a>";
                                                        } else {
                                                            echo " <a href='" . base_url(' bks_wisuda/save_bks_lengkap/' . $row->id_bks_wisuda) . "' class='btn btn-xs btn-success'>Lengkap</a>";
                                                        }
                                                        ?>

                                                </td>
                                                <td> <?php if ($row->status_jurnal == '0') {
                                                            echo " <a href='" . base_url(' bks_wisuda/save_bks_belum/' . $row->id_bks_wisuda) . "' class='btn btn-xs btn-danger'>Belum</a>";
                                                        } else if ($row->status_jurnal == '1') {
                                                            echo " <a href='" . base_url(' bks_wisuda/save_bks_kurang/' . $row->id_bks_wisuda) . "' class='btn btn-xs btn-primary'>Kurang</a>";
                                                        } else {
                                                            echo " <a href='" . base_url(' bks_wisuda/save_bks_lengkap/' . $row->id_bks_wisuda) . "' class='btn btn-xs btn-success'>Lengkap</a>";
                                                        }
                                                        ?>
                                                </td>
                                                <td> <?php if ($row->status_lap_ta == '0') {
                                                            echo " <a href='" . base_url(' bks_wisuda/save_bks_belum/' . $row->id_bks_wisuda) . "' class='btn btn-xs btn-danger'>Belum</a>";
                                                        } else if ($row->status_lap_ta == '1') {
                                                            echo " <a href='" . base_url(' bks_wisuda/save_bks_kurang/' . $row->id_bks_wisuda) . "' class='btn btn-xs btn-primary'>Kurang</a>";
                                                        } else {
                                                            echo " <a href='" . base_url(' bks_wisuda/save_bks_lengkap/' . $row->id_bks_wisuda) . "' class='btn btn-xs btn-success'>Lengkap</a>";
                                                        }
                                                        ?>
                                                </td>
                                                <td> <?php if ($row->status_aplikasi == '0') {
                                                            echo " <a href='" . base_url(' bks_wisuda/save_bks_belum/' . $row->id_bks_wisuda) . "' class='btn btn-xs btn-danger'>Belum</a>";
                                                        } else if ($row->status_aplikasi == '1') {
                                                            echo " <a href='" . base_url(' bks_wisuda/save_bks_kurang/' . $row->id_bks_wisuda) . "' class='btn btn-xs btn-primary'>Kurang</a>";
                                                        } else {
                                                            echo " <a href='" . base_url(' bks_wisuda/save_bks_lengkap/' . $row->id_bks_wisuda) . "' class='btn btn-xs btn-success'>Lengkap</a>";
                                                        }
                                                        ?>
                                                </td>
                                                <td> <?php if ($row->status_ppt == '0') {
                                                            echo " <a href='" . base_url(' bks_wisuda/save_bks_belum/' . $row->id_bks_wisuda) . "' class='btn btn-xs btn-danger'>Belum</a>";
                                                        } else if ($row->status_ppt == '1') {
                                                            echo " <a href='" . base_url(' bks_wisuda/save_bks_kurang/' . $row->id_bks_wisuda) . "' class='btn btn-xs btn-primary'>Kurang</a>";
                                                        } else {
                                                            echo " <a href='" . base_url(' bks_wisuda/save_bks_lengkap/' . $row->id_bks_wisuda) . "' class='btn btn-xs btn-success'>Lengkap</a>";
                                                        }
                                                        ?>
                                                </td>
                                                <td> <?php if ($row->status_video == '0') {
                                                            echo " <a href='" . base_url(' bks_wisuda/save_bks_belum/' . $row->id_bks_wisuda) . "' class='btn btn-xs btn-danger'>Belum</a>";
                                                        } else if ($row->status_video == '1') {
                                                            echo " <a href='" . base_url(' bks_wisuda/save_bks_kurang/' . $row->id_bks_wisuda) . "' class='btn btn-xs btn-primary'>Kurang</a>";
                                                        } else {
                                                            echo " <a href='" . base_url(' bks_wisuda/save_bks_lengkap/' . $row->id_bks_wisuda) . "' class='btn btn-xs btn-success'>Lengkap</a>";
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
    <!-- USER MAHASISWA -->
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Berkas Pendaftaran Wisuda</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('beranda'); ?>">Beranda</a></li>
                            <li class="breadcrumb-item active">Data Berkas Wisuda</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div style="text-align:right;margin-bottom: 10px ">
                            <a href="#" class="on-default edit-row btn btn-success pull-right" data-toggle="modal" pull="right" data-target="#custom-width-modal" onclick="ResetInput()"><i class="fa fa-plus"></i> Tambah Berkas</a>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Data Berkas Pendaftaran Wisuda</h3>
                            </div>
                            <div class="card-body">
                                <div id="flash" data-flash="<?= $this->session->flashdata('pesan'); ?>">
                                    <!-- <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NIM</th>
                                                <th>Nama Mahasiswa</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
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
                                                    <td class="text-center" width="160px">
                                                        <?php if ($row->status == '0') {
                                                            echo '<span class="badge badge-warning">Menunggu</span>';
                                                        } else if ($row->status == '1') {
                                                            echo '<span class="badge badge-info">Belum Lengkap</span>';
                                                        } else if ($row->status == '2') {
                                                            echo '<span class="badge badge-primary">Kurang Lengkap</span>';
                                                        } else {
                                                            echo '<span class="badge badge-danger">Lengkap</span>';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-center" width="160px">
                                                        <a href="<?php echo base_url('bks_wisuda/delete_users/' . $row->id_bks_wisuda) ?>" id="btn-hapus" data-toggle="tooltip" data-placement="bottom" title="Hapus Mahasiswa" class="btn btn-sm btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>
                                                        <a href="<?= base_url('bks_wisuda/detail_bks_wisuda/' . $row->id_bks_wisuda) ?>" class="on-default edit-row btn btn-info pull-right btn-xs"><i class="fa fa-search"></i> Detail </a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table> -->
                                    <form action="<?= base_url('bks_wisuda/create') ?>" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                                        <input type="hidden" id="id_bks_wisuda" name="id_bks_wisuda">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Persyaratan</th>
                                                    <th>Unggah Bukti</th>
                                                    <th>Status</th>
                                                    <th>Keterangan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1.</td>
                                                    <td>File TA</td>
                                                    <td>
                                                        <!-- <input type="file" class="form-control col-md-5" name="file_ta"> -->
                                                        <button type="submit" name="submit" class="badge badge-primary"><i class="fa fa-upload">Unggah</i></button>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>2.</td>
                                                    <td>File Jurnal</td>
                                                    <td>
                                                        <!-- <input type="file" class="form-control col-md-5" name="file_ta"> -->
                                                        <button type="submit" name="submit" class="badge badge-primary"><i class="fa fa-upload">Unggah</i></button>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>3.</td>
                                                    <td>Lap.TA</td>
                                                    <td>
                                                        <!-- <input type="file" class="form-control col-md-5" name="file_ta"> -->
                                                        <button type="submit" name="submit" class="badge badge-primary"><i class="fa fa-upload">Unggah</i></button>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>4.</td>
                                                    <td>File Aplikasi</td>
                                                    <td>
                                                        <!-- <input type="file" class="form-control col-md-5" name="file_ta"> -->
                                                        <button type="submit" name="submit" class="badge badge-primary"><i class="fa fa-upload">Unggah</i></button>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>5.</td>
                                                    <td>File PPT</td>
                                                    <td>
                                                        <!-- <input type="file" class="form-control col-md-5" name="file_ta"> -->
                                                        <button type="submit" name="submit" class="badge badge-primary"><i class="fa fa-upload">Unggah</i></button>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>6.</td>
                                                    <td>File Video</td>
                                                    <td>
                                                        <!-- <input type="file" class="form-control col-md-5" name="file_ta"> -->
                                                        <button type="submit" name="submit" class="badge badge-primary"><i class="fa fa-upload">Unggah</i></button>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </form>
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
                    <h4 class="modal-title">Berkas Pendaftaran Wisuda</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?= base_url('bks_wisuda/create') ?>" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <input type="hidden" id="id_bks_wisuda" name="id_bks_wisuda">

                            <label for="exampleInputjudul1">NIM</label>
                            <input type="hidden" class="form-control" id="nim" name="nim" placeholder="NIM">
                            <input type="text" class="form-control" id="nim2" name="nim2" readonly placeholder="NIM">
                        </div>
                        <div class="form-group">
                            <label for="berita_acara">File Tugas Akhir</label><br>
                            <input type="file" name="file_ta" required>
                        </div>
                        <div class="form-group">
                            <label for="persetujuan">Jurnal</label><br>
                            <input type="file" name="jurnal" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputjudul1">Laporan Tugas Akhir</label><br>
                            <input type="file" name="lap_ta_prodi" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputjudul1">Aplikasi</label><br>
                            <input type="file" name="aplikasi" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputjudul1">Powerpoint</label><br>
                            <input type="file" name="ppt" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputjudul1">Video</label><br>
                            <input type="file" name="video" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputjudul1">Foto Ijazah</label><br>
                            <input type="file" name="foto_ijazah" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputjudul1">Foto Wisuda</label><br>
                            <input type="file" name="foto_wisuda" required>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function ResetInput(id_bks_wisuda, nim, file_ta, jurnal, lap_ta_prodi, aplikasi, ppt, video, foto_ijazah, foto_wisuda) {
            document.getElementById('id_bks_wisuda').value = "";
            document.getElementById('nim').value = <?php echo $this->session->userdata('email'); ?>;
            document.getElementById('nim2').value = <?php echo $this->session->userdata('email'); ?>;
            document.getElementById('file_ta').value = "";
            document.getElementById('jenis').value = "";
            document.getElementById('lap_ta_prodi').value = "";
            document.getElementById('aplikasi').value = "";
            document.getElementById('ppt').value = "";
            document.getElementById('video').value = "";
            document.getElementById('foto_ijazah').value = "";
            document.getElementById('foto_wisuda').value = "";
        }
    </script>
<?php } ?>