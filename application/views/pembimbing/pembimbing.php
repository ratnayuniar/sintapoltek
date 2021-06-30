<?php if ($this->session->userdata('level') == 1) { ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Pembimbing</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('beranda'); ?>">Beranda</a></li>
                            <li class="breadcrumb-item active">Data Pembimbing</li>
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
                                <h3 class="card-title">Data Pembimbing</h3>
                            </div>
                            <div class="card-body">
                                <div style="text-align:right;margin-bottom: 10px ">
                                    <a href="#" class="on-default edit-row btn btn-success pull-right" data-toggle="modal" pull="right" data-target="#custom-width-modal" onclick="ResetInput()"><i class="fa fa-plus"></i> Tambah Data Pembimbing</a>
                                </div>
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Mahasiswa</th>
                                            <th>Dosen Pembimbing 1</th>
                                            <th>Dosen Pembimbing 2</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $id_prodi = $this->session->userdata('id_prodi');
                                        foreach ($this->m_pembimbing->tampil_data($id_prodi)->result() as $row) {
                                            // foreach ($query->result() as $row) {
                                            $data['user'] = $this->m_pembimbing->getmahasiswabyid($row->nim);
                                            $data['dosen1'] = $this->m_pembimbing->getdosen1($row->pembimbing1);
                                            $data['dosen2'] = $this->m_pembimbing->getdosen2($row->pembimbing2);
                                            echo
                                            "<tr>
											<td>" . $no . "</td>
                                        	<td>" . $data['user']->nama   . "</td>
											<td>" . $data['dosen1']->nama . "</td>
											<td>" . $data['dosen2']->nama . "</td>
											<td><a href ='#' class ='btn btn-sm btn-primary btn-xs' data-toggle='modal' data-target='#custom-width-modal' onClick=\"SetInput('" . $row->pembimbing1 . "','" . $row->pembimbing2 . "','" . $row->id_master_ta . "','" . $row->nim . "')\"><i class ='fa fa-edit'></i> Edit</a>
												<a href='" . base_url('pembimbing/delete2/' . $row->id_master_ta) . "' id='btn-hapus' class='btn btn-sm btn-danger btn-xs' ><i class='fa fa-trash'></i> Hapus</a>
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
                    <h4 class="modal-title">Data Dosen Pembimbing</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?php echo base_url() . 'pembimbing/add'; ?>" method="post" class="form-horizontal" role="form">
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
                            <label class="col-md-5 control-label">Dosen Pembimbing 1</label>
                            <div class="col-md-9">
                                <select class="form-control" data-live-search="true" data-style="btn-white" onclick="choose()" id="pembimbing1" name="pembimbing1" required>
                                    <option value="">-- Pilih Dosen Pembimbing 1 --</option>
                                    <?php foreach ($dosen->result() as $row) : ?>
                                        <option value="<?php echo $row->id_dosen; ?>" required><?php echo $row->nama; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="pembimbing1" id="output" class="form-control" value="" readonly />
                        </div>

                        <div class="form-group">
                            <label class="col-md-5 control-label">Dosen Pembimbing 2</label>
                            <div class="col-md-9">
                                <select class="form-control" data-live-search="true" data-style="btn-white" onclick="pilih()" id="pembimbing2" name="pembimbing2" required>
                                    <option value="">-- Pilih Dosen Pembimbing 2 --</option>
                                    <?php foreach ($dosen->result() as $row) : ?>
                                        <option value="<?php echo $row->id_dosen; ?>"><?php echo $row->nama; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="pembimbing2" id="hasil" class="form-control" value="" readonly />
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
                <form action="<?php echo base_url() . 'pembimbing/delete'; ?>" method="post" class="form-horizontal" role="form">
                    <div class="modal-body">
                        <p>Apakah anda yakin ingin menghapus?</p>
                        <div>
                            <input type="hidden" id="id_master_ta2" name="id_master_ta2">
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
            var data = document.getElementById('pembimbing1').value;
            document.getElementById('output').value = data;
        }
    </script>

    <script type="text/javascript">
        function pilih() {
            var data = document.getElementById('pembimbing2').value;
            document.getElementById('hasil').value = data;
        }
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#pembimbing1').on('change', function() {
                var id_dosen = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('pembimbing/get_id_dosen') ?>",
                    dataType: "JSON",
                    data: {
                        id_dosen: id_dosen
                    },
                    cache: false,
                    success: function(data) {
                        $.each(data, function($id_dosen, nama) {
                            $('[name="id_dosen"]').val(data.id_dosen);
                            $('[name="nama_pembimbing1"]').val(data.nama);


                        });
                    }
                });
                return false;
            });
        });
    </script>

    <script type="text/javascript">
        function SetInput(id_master_ta, nim, pembimbing1, pembimbing2) {
            document.getElementById('id_master_ta').value = id_master_ta;
            document.getElementById('nim').value = nim;
            document.getElementById('pembimbing1').value = pembimbing1;
            document.getElementById('pembimbing2').value = pembimbing2;

        }

        function SetInputs(id_master_ta, pembimbing1, pembimbing2) {

            document.getElementById('id_master_ta2').value = id_master_ta;
            document.getElementById('nim2').value = nim;
            document.getElementById('pembimbing12').value = pembimbing1;
            document.getElementById('pembimbing22').value = pembimbing2;

        }

        function ResetInput() {
            document.getElementById('id_master_ta').value = "";
            document.getElementById('nim').value = "";
            document.getElementById('pembimbing1').value = "";
            document.getElementById('pembimbing2').value = "";
        }
    </script>

    <!-- USER DOSEN -->
<?php } else if (($this->session->userdata('level') == 3) || ($this->session->userdata('level') == 4)) { ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Pembimbing</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('beranda'); ?>">Beranda</a></li>
                            <li class="breadcrumb-item active">Data Pembimbing</li>
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
                                <h3 class="card-title">Data Pembimbing</h3>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Dosen Pembimbing 1</th>
                                            <th>Dosen Pembimbing 2</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($query3->result() as $row) {
                                            $data['user'] = $this->m_pembimbing->getmahasiswabyid($row->nim);
                                            $data['dosen1'] = $this->m_pembimbing->getdosen1($row->pembimbing1);
                                            $data['dosen2'] = $this->m_pembimbing->getdosen2($row->pembimbing2);
                                            echo
                                            "<tr>
											<td>" . $no . "</td>
                                        	<td>" . $data['user']->nama   . "</td>
											<td>" . $data['dosen1']->nama . "</td>
											<td>" . $data['dosen2']->nama . "</td>
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
                        <h1>Data Pembimbing Mahasiswa</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('beranda'); ?>">Beranda</a></li>
                            <li class="breadcrumb-item active">Data Pembimbing</li>
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
                                <h3 class="card-title">Data Pembimbing Mahasiswa</h3>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Dosen Pembimbing 1</th>
                                            <th>Dosen Pembimbing 2</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($query2->result() as $row) {
                                            $data['user'] = $this->m_pembimbing->getmahasiswabyid($row->nim);
                                            $data['dosen1'] = $this->m_pembimbing->getdosen1($row->pembimbing1);
                                            $data['dosen2'] = $this->m_pembimbing->getdosen2($row->pembimbing2);
                                            echo
                                            "<tr>
											<td>" . $no . "</td>
                                        	<td>" . $data['user']->nama   . "</td>
											<td>" . $data['dosen1']->nama . "</td>
											<td>" . $data['dosen2']->nama . "</td>
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
<?php } ?>