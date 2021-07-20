<!-- USER ADMIN -->
<?php if ($this->session->userdata('level') == 1) { ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Penguji Seminar</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('beranda'); ?>">Beranda</a></li>
                            <li class="breadcrumb-item active">Data Penguji Seminar</li>
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
                                <h3 class="card-title">Data Penguji Seminar</h3>
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
                                                if ($row->penguji1_sempro == "0") {
                                                    $dosen1_nama = "-";
                                                } else if ($row->penguji1_sempro != "") {
                                                    $dosen1_nama = $data['dosen1']->nama;
                                                } else {
                                                    $dosen1_nama = "-";
                                                }
                                                $data['dosen2'] = $this->m_penguji->getdosen2($row->penguji2_sempro);
                                                if ($row->penguji2_sempro == "0") {
                                                    $dosen2_nama = "-";
                                                } else if ($row->penguji2_sempro != "") {
                                                    $dosen2_nama = $data['dosen2']->nama;
                                                } else {
                                                    $dosen2_nama = "-";
                                                }
                                                $data['dosen3'] = $this->m_penguji->getdosen3($row->penguji3_sempro);
                                                if ($row->penguji3_sempro == "0") {
                                                    $dosen3_nama = "-";
                                                } else if ($row->penguji3_sempro != "") {
                                                    $dosen3_nama = $data['dosen3']->nama;
                                                } else {
                                                    $dosen3_nama = "-";
                                                }
                                                $data['dosen3'] = $this->m_penguji->getdosen3($row->penguji3_sempro);
                                                if ($row->penguji3_sempro == "0") {
                                                    $dosen3_nama = "-";
                                                } else if ($row->penguji3_sempro != "") {
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
                                                
                                                <a href ='#' class ='btn btn-sm btn-primary btn-xs' data-toggle='modal' data-target='#custom-width-modal' onClick=\"SetInput('" . $row->id_master_ta . "','" . $row->nim . "','" . $row->penguji1_sempro . "','" . $row->penguji2_sempro . "','" . $row->penguji3_sempro . "')\"><i class ='fa fa-edit'></i> Edit</a>
                                                                                                       
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

    <div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:55%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Dosen Penguji </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?php echo base_url() . 'penguji/add'; ?>" method="post" class="form-horizontal" role="form">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" id="id_master_ta" name="id_master_ta">
                            <label class="col-md-5 control-label">Mahasiswa</label>
                            <div class="col-md-9">
                                <select class="form-control" data-live-search="true" data-style="btn-white" onclick="choose()" id="nim" name="nim" required>
                                    <option value="">-- Pilih Mahasiswa --</option>
                                    <?php foreach ($mahasiswa->result() as $row) : ?>
                                        <option value="<?php echo $row->nim; ?>"><?php echo $row->nama; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-5 control-label">Dosen penguji 1</label>
                            <div class="col-md-9">
                                <select class="form-control" data-live-search="true" data-style="btn-white" id="penguji1_sempro" name="penguji1_sempro" required>
                                    <option value="">-- Pilih Dosen penguji 1 --</option>
                                    <?php foreach ($dosen->result() as $row) : ?>
                                        <option value="<?php echo $row->id_dosen; ?>"><?php echo $row->nama; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-5 control-label">Dosen penguji 2</label>
                            <div class="col-md-9">
                                <select class="form-control" data-live-search="true" data-style="btn-white" id="penguji2_sempro" name="penguji2_sempro" required>
                                    <option value="">-- Pilih Dosen penguji 2 --</option>
                                    <?php foreach ($dosen->result() as $row) : ?>
                                        <option value="<?php echo $row->id_dosen; ?>"><?php echo $row->nama; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-5 control-label">Dosen penguji 3</label>
                            <div class="col-md-9">
                                <select class="form-control" data-live-search="true" data-style="btn-white" id="penguji3_sempro" name="penguji3_sempro" required>
                                    <option value="">-- Pilih Dosen penguji 3 --</option>
                                    <?php foreach ($dosen->result() as $row) : ?>
                                        <option value="<?php echo $row->id_dosen; ?>"><?php echo $row->nama; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer ">
                            <button type="submit" class="btn btn-primary" style="float: right;">Simpan</button>
                        </div>

                    </div>
                </form>
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
                <form action="<?php echo base_url() . 'penguji/delete'; ?>" method="post" class="form-horizontal" role="form">
                    <div class="modal-body">
                        <p>Apakah anda yakin ingin menghapus?</p>
                        <div>
                            <input type="hidden" id="id_penguji2" name="id_penguji2">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-outline-light">Ya</button>
                    </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        function choose() {
            var zoo = document.getElementById('penguji1_sempro').value;
            document.getElementById('output').value = zoo;
            var zoo2 = document.getElementById('id_dosen').value;
            document.getElementById('output_id').value = zoo2;
        }
    </script>

    <script type="text/javascript">
        function pilih() {
            var zoo = document.getElementById('penguji2_sempro').value;
            document.getElementById('hasil').value = zoo;
        }
    </script>

    <script type="text/javascript">
        function pilih2() {
            var zoo = document.getElementById('penguji3_sempro').value;
            document.getElementById('hasil3').value = zoo;
        }
    </script>

    <script type="text/javascript">
        function SetInput(id_master_ta, nim, penguji1_sempro, penguji2_sempro, penguji3_sempro) {
            document.getElementById('id_master_ta').value = id_master_ta;
            document.getElementById('nim').value = nim;
            document.getElementById('penguji1_sempro').value = penguji1_sempro;
            document.getElementById('penguji2_sempro').value = penguji2_sempro;
            document.getElementById('penguji3_sempro').value = penguji3_sempro;
        }

        function SetInput2(id_master_ta, nim, penguji1_sempro, penguji2_sempro, penguji3_sempro) {
            document.getElementById('id_master_ta').value = id_master_ta;
            document.getElementById('nim').value = nim;
            document.getElementById('penguji1_sempro').value = "";
            document.getElementById('penguji2_sempro').value = "";
            document.getElementById('penguji3_sempro').value = "";
        }

        function SetInputs(id_master_ta, nim, penguji1_sempro, penguji2_sempro, penguji3_sempro) {

            document.getElementById('id_master_ta2').value = id_master_ta;
            document.getElementById('nim2').value = nim;
            document.getElementById('penguji1_sempro2').value = penguji1_sempro;
            document.getElementById('penguji2_sempro2').value = penguji2_sempro;
            document.getElementById('penguji3_sempro2').value = penguji3_sempro;

        }

        function ResetInput() {
            document.getElementById('id_master_ta').value = "";
            document.getElementById('nim').value = "";
            document.getElementById('penguji1_sempro').value = "";
            document.getElementById('penguji2_sempro').value = "";
            document.getElementById('penguji3_sempro').value = "";
        }
    </script>
<?php } else { ?>
    <!-- USER MAHASISWA -->
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Penguji dan Jadwal Seminar</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('beranda'); ?>">Beranda</a></li>
                            <li class="breadcrumb-item active">Data Penguji dan Jadwal Seminar</li>
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
                        <?php if (isset($cek['jadwal_seminar']) != NULL && $cek['jam'] != NULL && $cek['ruang_seminar'] != NULL) { ?>
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Data Penguji dan Jadwal Seminar</h3>
                                </div>
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Ruang</th>
                                                <th>Jadwal</th>
                                                <th>Waktu</th>
                                                <th>Dosen Penguji 1</th>
                                                <th>Dosen Penguji 2</th>
                                                <th>Dosen Penguji 3</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($query2->result() as $row) {
                                                $waktu = explode(" ", $row->jadwal_seminar);
                                                $data['user'] = $this->m_penguji->getmahasiswabyid($row->nim);
                                                $data['dosen1'] = $this->m_penguji->getdosen1($row->penguji1_sempro);
                                                $data['dosen2'] = $this->m_penguji->getdosen2($row->penguji2_sempro);
                                                $data['dosen3'] = $this->m_penguji->getdosen3($row->penguji3_sempro);
                                                echo
                                                "<tr>
											<td>" . $no . "</td>
                                            <td>" . $row->ruang_seminar . "</td>
                                        	<td>" . longdate_indo($waktu[0]) . "</td>
                                            <td>" . $row->jam . "</td>
											<td>" . $data['dosen1']->nama . "</td>
											<td>" . $data['dosen2']->nama . "</td>
											<td>" . $data['dosen3']->nama . "</td>									
											</tr>";
                                                $no++;
                                            }
                                            ?>
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
                                            Jadwal seminar belum ditentukan
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