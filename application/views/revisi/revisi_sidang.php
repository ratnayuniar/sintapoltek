<?php if ($this->session->userdata('level') == 1) { ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Revisi Mahasiswa</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('Beranda'); ?>">Beranda</a></li>
                            <li class="breadcrumb-item active">Data Revisi Mahasiswa</li>
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
                                <h3 class="card-title">Data Revisi Mahasiswa</h3>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIM</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Dosen Penguji 1</th>
                                            <th>Dosen Penguji 2</th>
                                            <th>Dosen Penguji 3</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $id_prodi = $this->session->userdata('id_prodi');
                                        foreach ($this->m_penguji_sidang->tampil_data($id_prodi)->result() as $row) {
                                            if ($row->id_master_ta != "") {
                                                $data['user'] = $this->m_penguji_sidang->getmahasiswabyid($row->nim);
                                                $data['dosen1'] = $this->m_penguji_sidang->getdosen1($row->penguji1_sidang);
                                                if ($row->penguji1_sidang != "") {
                                                    $dosen1_nama = $data['dosen1']->nama;
                                                } else {
                                                    $dosen1_nama = "-";
                                                }
                                                $data['dosen2'] = $this->m_penguji_sidang->getdosen2($row->penguji2_sidang);
                                                if ($row->penguji1_sidang != "") {
                                                    $dosen2_nama = $data['dosen2']->nama;
                                                } else {
                                                    $dosen2_nama = "-";
                                                }
                                                $data['dosen3'] = $this->m_penguji_sidang->getdosen3($row->penguji3_sidang);
                                                if ($row->penguji1_sidang != "") {
                                                    $dosen3_nama = $data['dosen3']->nama;
                                                } else {
                                                    $dosen3_nama = "-";
                                                }
                                                $data['dosen3'] = $this->m_penguji_sidang->getdosen3($row->penguji3_sidang);
                                                if ($row->penguji1_sidang != "") {
                                                    $dosen3_nama = $data['dosen3']->nama;
                                                } else {
                                                    $dosen3_nama = "-";
                                                }
                                                echo
                                                "<tr>
                                                <td>" . $no . "</td>
                                                <td>" . $data['user']->nim   . "</td>
                                                <td>" . $data['user']->nama   . "</td>
                                                <td>" . $dosen1_nama . "</td>
                                                <td>" . $dosen2_nama . "</td>
                                                <td>" . $dosen3_nama . "</td>
                                                <td>
                                                <a href ='#' class ='btn btn-sm btn-primary btn-xs' data-toggle='modal' data-target='#file_ba' onClick=\"SetInput('" . $row->id_master_ta . "','" . $row->nim . "','" . $row->revisi_sidang . "','" . $row->status_sidang . "')\"><i class ='fa fa-file'></i> Hasil Sidang</a>
                                                                                                       
                                                </td>
                                            </tr>";
                                                $no++;
                                            }
                                        }
                                        ?>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div id="file_ba" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:55%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hasil Sidang</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?= base_url('revisi_sidang/upload_revisi_sidang') ?>" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <input type="hidden" id="id_master_ta" name="id_master_ta">
                            <input type="hidden" id="nim" name="nim">
                        </div>
                        <div class="form-group row">
                            <label for="berita_acara" class="col-sm-4 col-form-label">File Revisi Seminar</label>
                            <input type="file" name="revisi_sidang" required>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputjudul1" class="col-sm-4 col-form-label">Hasil Seminar</label>
                            <div class="col-sm-4">
                                <select class="form-control" data-live-search="true" data-style="btn-white" id="status_sidang" name="status_sidang" required>
                                    <option value="Lulus">Lulus</option>
                                    <option value="Lulus Dengan Revisi">Lulus Dengan Revisi</option>
                                    <option value="Ditolak">Ditolak</option>
                                </select>
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
        function SetInput(id_master_ta, nim, revisi_sidang) {
            document.getElementById('id_master_ta').value = id_master_ta;
            document.getElementById('nim').value = nim;
            document.getElementById('revisi_sidang').value = revisi_sidang;
            document.getElementById('status_sidang').value = status_sidang;
        }
    </script>
    <!-- USER DOSEN -->
<?php } else if (($this->session->userdata('level') == 3) ||  ($this->session->userdata('level') == 4)) { ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Revisi Mahasiswa</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('Beranda'); ?>">Beranda</a></li>
                            <li class="breadcrumb-item active">Data Revisi Mahasiswa</li>
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
                                <h3 class="card-title">Data Revisi Mahasiswa</h3>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIM</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Dosen Penguji 1</th>
                                            <th>Dosen Penguji 2</th>
                                            <th>Dosen Penguji 3</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $id_prodi = $this->session->userdata('id_prodi');
                                        foreach ($this->m_penguji_sidang->tampil_data($id_prodi)->result() as $row) {
                                            $data['user'] = $this->m_penguji_sidang->getmahasiswabyid($row->nim);
                                            $data['dosen1'] = $this->m_penguji_sidang->getdosen1($row->penguji1_sidang);
                                            $data['dosen2'] = $this->m_penguji_sidang->getdosen2($row->penguji2_sidang);
                                            $data['dosen3'] = $this->m_penguji_sidang->getdosen3($row->penguji3_sidang);
                                            echo
                                            "<tr>
											<td>" . $no . "</td>
                                            <td>" . $data['user']->nim   . "</td>
                                        	<td>" . $data['user']->nama   . "</td>
                                            <td>" . $data['dosen1']->nama . "</td>
											<td>" . $data['dosen2']->nama . "</td>
											<td>" . $data['dosen3']->nama . "</td>
											<td>
                                            <a href='" . base_url('revisi_sidang/detail_revisi_sidang2?id=' . $row->nim) . "' class='on-default edit-row btn btn-primary btn-sm' ><i class='fa fa-search'></i> Input Revisi</a>
											</td>
									    </tr>";
                                            $no++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- USER MAHASISWA -->
<?php } else { ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Revisi Mahasiswa</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('Beranda'); ?>">Beranda</a></li>
                            <li class="breadcrumb-item active">Revisi Mahasiswa</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <?php $cek = $this->db->get_where('master_ta', array('nim' => $this->session->userdata('email')))->row_array(); ?>
                        <?php if (isset($cek['revisi_sidang']) != NULL &&  $cek['status_sidang'] != NULL) { ?>
                            <div class="card">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="m-0">Revisi Mahasiswa</h5>
                                            </div>
                                            <div class="card-body">
                                                <?php
                                                foreach ($statusseminar->result() as $row) { ?>
                                                    <div class="form-group row">
                                                        <label for="nama" class="col-sm-2 col-form-label">Hasil</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="nama" value="<?= $row->status_sidang ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="nama" class="col-sm-2 col-form-label">File Revisi</label>
                                                        <div class="col-sm-10">
                                                            <a href="<?php echo base_url('assets/berkas/sidang/' . $row->revisi_sidang); ?>" target="_blank"><i class="far fa-file-pdf"> Download File Revisi</i></a>
                                                        </div>
                                                    </div>
                                            </div>
                                        <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Dosen Penguji</th>
                                                <th>Revisi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($query2->result() as $row) { ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $row->nama_dosen ?></td>
                                                    <td><?= $row->revisi ?></td>
                                                <?php } ?>
                                                </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="row">
                                <div class="col-12">
                                    <div class="card card-danger">
                                        <div class="card-header">
                                            <h3 class="card-title"><i class="fas fa-exclamation-triangle"></i> Pemberitahuan</h3>
                                        </div>
                                        <div class="card-body">
                                            Hasil revisi sidang tugas akhir belum tersedia
                                        </div>
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