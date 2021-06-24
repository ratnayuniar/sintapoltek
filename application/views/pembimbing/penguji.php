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
                                <div style="text-align:right;margin-bottom: 10px ">
                                    <a href="#" class="on-default edit-row btn btn-success pull-right" data-toggle="modal" pull="right" data-target="#custom-width-modal" onclick="ResetInput()"><i class="fa fa-plus"></i> Tambah Data Penguji</a>
                                </div>
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
											<td><a href ='#' class ='btn btn-sm btn-primary btn-xs' data-toggle='modal' data-target='#custom-width-modal' onClick=\"SetInput('" . $row->id_master_ta . "','" . $row->nim . "','" . $row->penguji1_sempro . "','" . $row->penguji2_sempro . "','" . $row->penguji3_sempro . "')\"><i class ='fa fa-edit'></i> Edit</a>
												<a href ='#' class ='btn btn-sm btn-danger btn-xs' data-toggle='modal' data-target='#delete-modal'onClick=\"SetInputs('" . $row->id_master_ta . "','" . $row->nim . "','" . $row->penguji1_sempro . "','" . $row->penguji2_sempro . "','" . $row->penguji3_sempro . "')\"><i class ='fa fa-trash'></i> Hapus</a>
                                                
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
                                <select class="form-control" data-live-search="true" data-style="btn-white" onclick="choose()" id="penguji1_sempro" name="" required>
                                    <option value="">-- Pilih Dosen penguji 1 --</option>
                                    <?php foreach ($dosen->result() as $row) : ?>
                                        <option value="<?php echo $row->id_dosen; ?>"><?php echo $row->nama; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="penguji1_sempro" id="output" class="form-control" value="" readonly />
                        </div>

                        <div class="form-group">
                            <label class="col-md-5 control-label">Dosen penguji 2</label>
                            <div class="col-md-9">
                                <select class="form-control" data-live-search="true" data-style="btn-white" onclick="pilih()" id="penguji2_sempro" name="" required>
                                    <option value="">-- Pilih Dosen penguji 2 --</option>
                                    <?php foreach ($dosen->result() as $row) : ?>
                                        <option value="<?php echo $row->id_dosen; ?>"><?php echo $row->nama; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="penguji2_sempro" id="hasil" class="form-control" value="" readonly />
                        </div>

                        <div class="form-group">
                            <label class="col-md-5 control-label">Dosen penguji 3</label>
                            <div class="col-md-9">
                                <select class="form-control" data-live-search="true" data-style="btn-white" onclick="pilih2()" id="penguji3_sempro" name="" required>
                                    <option value="">-- Pilih Dosen penguji 3 --</option>
                                    <?php foreach ($dosen->result() as $row) : ?>
                                        <option value="<?php echo $row->id_dosen; ?>"><?php echo $row->nama; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="penguji3_sempro" id="hasil3" class="form-control" value="" readonly />
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
    <!-- USER DOSEN -->
<?php } else if (($this->session->userdata('level') == 3) ||  ($this->session->userdata('level') == 4)) { ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Penguji</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('Beranda'); ?>">Beranda</a></li>
                            <li class="breadcrumb-item active">Data Penguji</li>
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
                                <h3 class="card-title">Data Penguji</h3>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Dosen Penguji 1</th>
                                            <th>Dosen Penguji 2</th>
                                            <th>Dosen Penguji 3</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($query3->result() as $row) {
                                            $data['user'] = $this->m_penguji->getmahasiswabyid($row->nim);
                                            $data['dosen1'] = $this->m_penguji->getdosen1($row->penguji1_sempro);
                                            $data['dosen2'] = $this->m_penguji->getdosen2($row->penguji2_sempro);
                                            $data['dosen3'] = $this->m_penguji->getdosen2($row->penguji3_sempro);
                                            echo
                                            "<tr>
											<td>" . $no . "</td>
                                        	<td>" . $data['user']->nama   . "</td>
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
                    </div>
                </div>
            </div>
        </section>
    </div>

<?php } else { ?>
    <!-- USER MAHASISWA -->
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
                                <h3 class="card-title">Data Pembimbing Seminar</h3>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Dosen Penguji 1</th>
                                            <th>Dosen Penguji 2</th>
                                            <th>Dosen Penguji 3</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($query2->result() as $row) {
                                            $data['user'] = $this->m_penguji->getmahasiswabyid($row->nim);
                                            $data['dosen1'] = $this->m_penguji->getdosen1($row->penguji1_sempro);
                                            $data['dosen2'] = $this->m_penguji->getdosen2($row->penguji2_sempro);
                                            $data['dosen3'] = $this->m_penguji->getdosen3($row->penguji3_sempro);
                                            echo
                                            "<tr>
											<td>" . $no . "</td>
                                        	<td>" . $data['user']->nama   . "</td>
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
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:55%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Dosen Penguji</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?php echo base_url() . 'penguji/add'; ?>" method="post" class="form-horizontal" role="form">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" id="id_penguji" name="id_penguji">
                            <label class="col-md-5 control-label">Mahasiswa</label>
                            <div class="col-md-9">
                                <select class="form-control" data-live-search="true" data-style="btn-white" onclick="choose()" id="id_mahasiswa" name="id_mahasiswa" required>
                                    <option>-- Pilih Mahasiswa --</option>
                                    <?php foreach ($mahasiswa as $row) : ?>
                                        <option value="<?php echo $row->id_user; ?>"><?php echo $row->nama; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-5 control-label">Dosen Penguji 1</label>
                            <div class="col-md-9">
                                <select class="form-control" data-live-search="true" data-style="btn-white" onclick="choose()" id="nama" name="" required>
                                    <option>-- Pilih Dosen Penguji 1 --</option>
                                    <?php foreach ($dosen as $row) : ?>
                                        <option value="<?php echo $row->id_user; ?>"><?php echo $row->nama; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="penguji1" id="output" class="form-control" value="" readonly />
                        </div>

                        <div class="form-group">
                            <label class="col-md-5 control-label">Dosen Penguji 2</label>
                            <div class="col-md-9">
                                <select class="form-control" data-live-search="true" data-style="btn-white" onclick="pilih()" id="nama2" name="" required>
                                    <option>-- Pilih Dosen Penguji 2 --</option>
                                    <?php foreach ($dosen as $row) : ?>
                                        <option value="<?php echo $row->id_user; ?>"><?php echo $row->nama; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="penguji2" id="hasil" class="form-control" value="" readonly />
                        </div>

                        <div class="form-group">
                            <label class="col-md-5 control-label">Dosen Penguji 3</label>
                            <div class="col-md-9">
                                <select class="form-control" data-live-search="true" data-style="btn-white" onclick="pilih()" id="nama2" name="" required>
                                    <option>-- Pilih Dosen Penguji 3 --</option>
                                    <?php foreach ($dosen as $row) : ?>
                                        <option value="<?php echo $row->id_user; ?>"><?php echo $row->nama; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="penguji3" id="hasil" class="form-control" value="" readonly />
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
            var zoo = document.getElementById('nama').value;
            document.getElementById('output').value = zoo;
        }
    </script>

    <script type="text/javascript">
        function pilih() {
            var zoo = document.getElementById('nama2').value;
            document.getElementById('hasil').value = zoo;
        }
    </script>

    <script type="text/javascript">
        function pilih2() {
            var zoo = document.getElementById('nama3').value;
            document.getElementById('hasil3').value = zoo;
        }
    </script>

    <script type="text/javascript">
        function SetInput(id_jurusan, id_prodi, nama_prodi, kode_prodi) {
            document.getElementById('id_jurusan').value = id_jurusan;
            document.getElementById('id_prodi').value = id_prodi;
            document.getElementById('nama_prodi').value = nama_prodi;
            document.getElementById('kode_prodi').value = kode_prodi;
        }

        function SetInputs(id_penguji, nim, penguji1, penguji2, penguji3) {

            document.getElementById('id_penguji2').value = id_penguji;
            document.getElementById('nim2').value = nim;
            document.getElementById('penguji12').value = penguji1;
            document.getElementById('penguji22').value = penguji2;
            document.getElementById('penguji32').value = penguji3;

        }

        function ResetInput() {
            document.getElementById('id_jurusan').value = "";
            document.getElementById('id_prodi').value = "";
            document.getElementById('nama_prodi').value = "";
            document.getElementById('kode_prodi').value = "";
        }
    </script>
<?php } ?>