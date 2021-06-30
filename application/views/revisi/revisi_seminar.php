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
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Data Revisi Seminar Proposal</h3>
                            </div>
                            <form action="<?php echo base_url() . 'revisi_seminar/add'; ?>" method="post" class="form-horizontal" role="form">
                                <div class="card-body">
                                    <!-- <input type="hidden" id="id_dosen" name="id_dosen" value="<?php echo $this->session->userdata('id_dosen'); ?>"> -->

                                    <input type="hidden" id="jenis" name="jenis">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-5 col-form-label">Dosen Penguji 1</label>
                                        <div class="col-sm-5">
                                            <?php
                                            $id_prodi = $this->session->userdata('id_prodi');
                                            foreach ($this->m_penguji->tampil_data($id_prodi)->result() as $row) {
                                                $data['user'] = $this->m_penguji->getmahasiswabyid($row->nim);
                                                $data['dosen1'] = $this->m_penguji->getdosen1($row->penguji1_sempro);
                                                echo
                                                " 
											<input type='text' class='form-control' id='dosen' readonly name='dosen' placeholder='Nama Dosen' value='" . $data['dosen1']->nama . "'></td>
											<input type='hidden' class='form-control' id='id_dosen' readonly name='penguji1' placeholder='Nama Dosen' value='" . $data['dosen1']->id_dosen . "'></td>
											";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-5 col-form-label">Revisi Dosen Penguji 1</label>
                                        <div class="col-sm-5">
                                            <textarea type="text" class="form-control" rows="7" id="revisi1" name="revisi1" readonly><?= $query2->revisi1; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-5 col-form-label">Dosen Penguji 2</label>
                                        <div class="col-sm-5">
                                            <?php
                                            $id_prodi = $this->session->userdata('id_prodi');
                                            foreach ($this->m_penguji->tampil_data($id_prodi)->result() as $row) {
                                                $data['user'] = $this->m_penguji->getmahasiswabyid($row->nim);
                                                $data['dosen2'] = $this->m_penguji->getdosen2($row->penguji2_sempro);
                                                echo
                                                " 
											<input type='text' class='form-control' id='dosen' readonly name='dosen' placeholder='Nama Dosen' value='" . $data['dosen2']->nama . "'></td>
											<input type='hidden' class='form-control' id='id_dosen' readonly name='penguji2' placeholder='Nama Dosen' value='" . $data['dosen2']->id_dosen . "'></td>
											";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-5 col-form-label">Revisi Dosen Penguji 2</label>
                                        <div class="col-sm-5">
                                            <textarea type="text" class="form-control" rows="7" id="revisi1" name="revisi1" readonly><?= $query2->revisi2; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-5 col-form-label">Dosen Penguji 3</label>
                                        <div class="col-sm-5">
                                            <?php
                                            $id_prodi = $this->session->userdata('id_prodi');
                                            foreach ($this->m_penguji->tampil_data($id_prodi)->result() as $row) {
                                                $data['user'] = $this->m_penguji->getmahasiswabyid($row->nim);
                                                $data['dosen3'] = $this->m_penguji->getdosen3($row->penguji3_sempro);
                                                echo
                                                " 
											<input type='text' class='form-control' id='dosen' readonly name='dosen' placeholder='Nama Dosen' value='" . $data['dosen3']->nama . "'></td>
											<input type='hidden' class='form-control' id='id_dosen' readonly name='penguji3' placeholder='Nama Dosen' value='" . $data['dosen3']->id_dosen . "'></td>
											";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-5 col-form-label">Revisi Dosen Penguji 3</label>
                                        <div class="col-sm-5">
                                            <textarea type="text" class="form-control" rows="7" id="revisi1" name="revisi1" readonly><?= $query2->revisi3; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php } ?>