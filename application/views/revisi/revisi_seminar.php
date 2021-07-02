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
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Data Revisi Seminar</h3>
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
                                        $id_prodi = $this->session->userdata('id_prodi');
                                        // $no = 1; 
                                        foreach ($this->m_penguji->tampil_data($id_prodi)->result() as $row) {
                                            $data['user'] = $this->m_penguji->getmahasiswabyid($row->nim);
                                            $data['dosen1'] = $this->m_penguji->getdosen2($row->penguji1_sempro);
                                            $data['dosen2'] = $this->m_penguji->getdosen2($row->penguji2_sempro);
                                            $data['dosen3'] = $this->m_penguji->getdosen3($row->penguji3_sempro);
                                            $data['revisi1'] = $this->m_revisi_seminar->revisi_mhs();
                                            $data['revisi2'] = $this->m_revisi_seminar->revisi_mhs();
                                            $data['revisi3'] = $this->m_revisi_seminar->revisi_mhs();


                                            echo
                                            "<tr>
											<td>" . '1.' . "</td>
											<td>" . $data['dosen1']->nama . "</td>
                                            <td>" . $data['revisi1']->revisi1 . "</td>
											</tr>
                                            <tr>
                                            <td>" . '2.' . "</td>
                                            <td>" . $data['dosen2']->nama . "</td>
                                            <td>" . $data['revisi2']->revisi2 . "</td>
                                            </tr>
                                            <tr>
                                            <td>" . '3.' . "</td>
                                            <td>" . $data['dosen3']->nama . "</td>
                                            <td>" . $data['revisi3']->revisi3 . "</td>
                                            </tr>
                                            
                                            ";
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
<?php } ?>