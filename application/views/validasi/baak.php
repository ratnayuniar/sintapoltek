<?php if ($this->session->userdata('level') == 7) { ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Verifikasi Foto</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('beranda'); ?>">Beranda</a></li>
                            <li class="breadcrumb-item active">Verifikasi Foto</li>
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
                                <h3 class="card-title">Verifikasi Foto</h3>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIM</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Status</th>
                                            <th>Konfirmasi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($get_mahasiswa as $row) { ?> 
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $row->nim ?></td>
                                                <td><?= $row->nama ?></td>
                                                <td> <?php if ($row->status_baak == '0') {
                                                            echo '<span class="badge badge-info">Belum</span>';
                                                        } else if ($row->status_baak == '1') {
                                                            echo '<span class="badge badge-primary">Kurang</span>';
                                                        } else {
                                                            echo '<span class="badge badge-success">Lengkap</span>';
                                                        }
                                                        ?>
                                                </td>
                                                <td>
                                                    <a href="<?php echo site_url('verif_baak/save_belum/' . $row->id_bks_wisuda); ?>" id="btn-konfirmasi" class="btn btn-xs btn-info">Belum</a>
                                                    <a href="<?php echo site_url('verif_baak/save_kurang/' . $row->id_bks_wisuda); ?>" id="btn-konfirmasi" class="btn btn-xs btn-primary">Kurang</a>
                                                    <a href="<?php echo site_url('verif_baak/save_lengkap/' . $row->id_bks_wisuda); ?>" id="btn-konfirmasi" class="btn btn-xs btn-success">Lengkap</a>
                                                </td>
                                                <td><a href="<?= base_url('verif_baak/detail_foto/' . $row->id_bks_wisuda) ?>" class="btn btn-xs btn-info">
                                                        <i class="fa fa-search"></i> Detail</a>
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
<?php } else { ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Verifikasi Foto</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('beranda'); ?>">Beranda</a></li>
                            <li class="breadcrumb-item active">Verifikasi Foto</li>
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
                                <h3 class="card-title">Verifikasi Foto</h3>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIM</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Status</th>
                                            <!-- <th>Konfirmasi</th>
                                            <th>Aksi</th> -->
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
                                                <td> <?php if ($row->status_baak == '0') {
                                                            echo '<span class="badge badge-info">Belum</span>';
                                                        } else if ($row->status_baak == '1') {
                                                            echo '<span class="badge badge-primary">Kurang</span>';
                                                        } else {
                                                            echo '<span class="badge badge-success">Lengkap</span>';
                                                        }
                                                        ?>
                                                </td>
                                                <!-- <td>
                                                    <a href="<?php echo site_url('verif_baak/save_belum/' . $row->id_bks_wisuda); ?>" id="btn-konfirmasi" class="btn btn-xs btn-danger">Belum</a>
                                                    <a href="<?php echo site_url('verif_baak/save_kurang/' . $row->id_bks_wisuda); ?>" id="btn-konfirmasi" class="btn btn-xs btn-success">Kurang</a>
                                                    <a href="<?php echo site_url('verif_baak/save_lengkap/' . $row->id_bks_wisuda); ?>" id="btn-konfirmasi" class="btn btn-xs btn-primary">Lengkap</a>
                                                </td>
                                                <td><a href="<?= base_url('verif_baak/detail_foto/' . $row->id_bks_wisuda) ?>" class="btn btn-xs btn-info">
                                                        <i class="fa fa-search"></i> Detail</a>
                                                </td> -->
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
<?php } ?>