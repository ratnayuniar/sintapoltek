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
                                <table id="example1" class="table table-bordered table-striped">
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
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>