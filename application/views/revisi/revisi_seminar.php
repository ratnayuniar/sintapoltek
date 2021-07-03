<?php if ($this->session->userdata('level') == 1) { ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Hasil Seminar</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('Beranda'); ?>">Beranda</a></li>
                            <li class="breadcrumb-item active">Data Hasil Seminar</li>
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
                                <h3 class="card-title">Data Hasil Seminar</h3>
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
                                        foreach ($this->m_penguji->tampil_data2($id_prodi)->result() as $row) {
                                            if ($row->id_master_ta != "") {
                                                $data['user'] = $this->m_penguji->getmahasiswabyid($row->nim);
                                                $data['dosen1'] = $this->m_penguji->getdosen1($row->penguji1_sempro);
                                                if ($row->penguji1_sempro != "") {
                                                    $dosen1_nama = $data['dosen1']->nama;
                                                } else {
                                                    $dosen1_nama = "-";
                                                }
                                                $data['dosen2'] = $this->m_penguji->getdosen2($row->penguji2_sempro);
                                                if ($row->penguji1_sempro != "") {
                                                    $dosen2_nama = $data['dosen2']->nama;
                                                } else {
                                                    $dosen2_nama = "-";
                                                }
                                                $data['dosen3'] = $this->m_penguji->getdosen3($row->penguji3_sempro);
                                                if ($row->penguji1_sempro != "") {
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
                                                <a href ='#' class ='btn btn-sm btn-primary btn-xs' data-toggle='modal' data-target='#file_ba' onClick=\"SetInput('" . $row->id_master_ta . "','" . $row->nim . "','" . $row->revisi_seminar . "')\"><i class ='fa fa-edit'></i> Edit</a>
                                                                                                       
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
                    <h4 class="modal-title">Hasil Seminar</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?= base_url('revisi_seminar/upload_revisi_seminar') ?>" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <input type="hidden" id="id_master_ta" name="id_master_ta">
                            <input type="hidden" id="nim" name="nim">
                        </div>
                        <div class="form-group row">
                            <label for="berita_acara" class="col-sm-4 col-form-label">File Revisi Seminar</label>
                            <input type="file" name="revisi_seminar" required>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputjudul1" class="col-sm-4 col-form-label">Hasil Seminar</label>
                            <div class="col-sm-4">
                                <select class="form-control" data-live-search="true" data-style="btn-white" id="status_seminar" name="status_seminar" required>
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
        function SetInput(id_master_ta, nim, revisi_seminar) {
            document.getElementById('id_master_ta').value = id_master_ta;
            document.getElementById('nim').value = nim;
            document.getElementById('revisi_seminar').value = revisi_seminar;
        }
    </script>
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
                                        foreach ($this->m_penguji->tampil_data($id_prodi)->result() as $row) {
                                            $data['user'] = $this->m_penguji->getmahasiswabyid($row->nim);
                                            $data['dosen1'] = $this->m_penguji->getdosen1($row->penguji1_sempro);
                                            $data['dosen2'] = $this->m_penguji->getdosen2($row->penguji2_sempro);
                                            $data['dosen3'] = $this->m_penguji->getdosen3($row->penguji3_sempro);
                                            echo
                                            "<tr>
											<td>" . $no . "</td>
                                            <td>" . $data['user']->nim   . "</td>
                                        	<td>" . $data['user']->nama   . "</td>
                                            <td>" . $data['dosen1']->nama . "</td>
											<td>" . $data['dosen2']->nama . "</td>
											<td>" . $data['dosen3']->nama . "</td>
											<td>
                                            <a href='" . base_url('revisi_seminar/detail_revisi_seminar2?id=' . $row->nim) . "' class='on-default edit-row btn btn-primary btn-sm' ><i class='fa fa-search'></i> Input Revisi</a>
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
    <!-- user mahasiswa -->
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
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Hasil Seminar : <?= $query2->row()->status_seminar ?> </h3>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Dosen Penguji</th>
                                            <th>Revisi</th>
                                            <th>Download Revisi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($query2->result() as $row) { ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $row->penguji ?></td>
                                                <td><?= $row->revisi ?></td>

                                                <td><a href="<?php echo base_url('assets/berkas/seminar/' . $row->revisi_seminar); ?>" download><i class="far fa-file-pdf"></i></a></td>
                                                </td>
                                            <?php } ?>
                                            </tr>

                                            </tr>

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