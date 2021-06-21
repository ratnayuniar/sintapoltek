<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Disuksi Bimbingan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/#">Home</a></li>
                        <li class="breadcrumb-item active">Disuksi Bimbingan</li>
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
                            <h3 class="card-title">Disuksi Bimbingan</h3>
                        </div>
                        <div class="card-body">
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
                                    foreach ($query->result() as $row) :
                                        $data['user'] = $this->m_pembimbing->getmahasiswabyid($row->id_mahasiswa);
                                        $data['dosen1'] = $this->m_pembimbing->getdosen1($row->pembimbing1);
                                        $data['dosen2'] = $this->m_pembimbing->getdosen2($row->pembimbing2);
                                    ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $data['user']->nama; ?></td>
                                            <td><?php echo $data['dosen1']->nama; ?></td>
                                            <td><?php echo $data['dosen2']->nama; ?></td>
                                            <td><a href='<?php echo site_url('bimbingandosen/reply/' . $row->id_mahasiswa); ?>' class='on-default edit-row btn btn-primary'>Masuk Diskusi</a>
                                            </td>
                                        </tr>
                                    <?php
                                        $no++;
                                    endforeach;
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
                <h4 class="modal-title">Tambah Data Dosen Pembimbing</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?php echo base_url() . 'pembimbing/add'; ?>" method="post" class="form-horizontal" role="form">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" id="id_pembimbing" name="id_pembimbing">
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
                        <label class="col-md-5 control-label">Dosen Pembimbing 1</label>
                        <div class="col-md-9">
                            <select class="form-control" data-live-search="true" data-style="btn-white" onclick="choose()" id="nama" name="" required>
                                <option>-- Pilih Dosen Pembimbing 1 --</option>
                                <?php foreach ($dosen as $row) : ?>
                                    <option value="<?php echo $row->id_user; ?>"><?php echo $row->nama; ?></option>
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
                            <select class="form-control" data-live-search="true" data-style="btn-white" onclick="pilih()" id="nama2" name="" required>
                                <option>-- Pilih Dosen Pembimbing 2 --</option>
                                <?php foreach ($dosen as $row) : ?>
                                    <option value="<?php echo $row->id_user; ?>"><?php echo $row->nama; ?></option>
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