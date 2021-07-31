<?php if ($this->session->userdata('level') == 1) { ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Berkas Perdaftaran Wisuda</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('beranda'); ?>">Beranda</a></li>
                            <li class="breadcrumb-item active"> Data Berkas Pendaftaran Wisuda</li>
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
                                <h3 class="card-title">Data Berkas Pendaftaran Wisuda</h3>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIM</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>File TA</th>
                                            <th>File Jurnal</th>
                                            <th>Lap.TA</th>
                                            <th>File Aplikasi</th>
                                            <th>File PPT</th>
                                            <th>File Video</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $id_prodi = $this->session->userdata('id_prodi');
                                        foreach ($this->m_bks_wisuda->bks_wisuda_admin($id_prodi)->result() as $row) { ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $row->nim ?></td>
                                                <td><?= $row->nama ?></td>
                                                <td> <?php if ($row->status_file_ta == '0') {
                                                            echo " <a href ='#' class ='btn btn-sm btn-warning btn-xs btn-block' data-toggle='modal' data-target='#modal_file_ta' onClick=\"SetInput('" . $row->id_bks_wisuda . "','" . $row->nim . "','" . $row->nama . "','" . $row->judul . "','" . $row->status_file_ta . "','" . $row->catatan_file_ta . "','" . $row->tgl_file_ta . "')\"> Belum</a>";
                                                        } else if ($row->status_file_ta == '1') {
                                                            echo " <a href ='#' class ='btn btn-sm btn-info btn-xs btn-block' data-toggle='modal' data-target='#modal_file_ta' onClick=\"SetInput('" . $row->id_bks_wisuda . "','" . $row->nim . "','" . $row->nama . "','" . $row->judul . "','" . $row->status_file_ta . "','" . $row->catatan_file_ta . "','" . $row->tgl_file_ta . "')\"> Kurang</a>";
                                                        } else if ($row->status_file_ta == '2') {
                                                            echo " <a href ='#' class ='btn btn-sm btn-success btn-xs btn-block' data-toggle='modal' data-target='#modal_file_ta' onClick=\"SetInput('" . $row->id_bks_wisuda . "','" . $row->nim . "','" . $row->nama . "','" . $row->judul . "','" . $row->status_file_ta . "','" . $row->catatan_file_ta . "','" . $row->tgl_file_ta . "')\"> Lengkap</a>";
                                                        } else {
                                                            echo "";
                                                        }
                                                        ?>
                                                    <?php if ($row->status_file_ta == '0') {
                                                        echo " <h6>Belum diverifikasi</h6>";
                                                    } else {
                                                        echo "<h6>" . $row->catatan_file_ta . "</h6> ";
                                                    }
                                                    ?>
                                                    <?php if ($row->file_ta != NULL) {
                                                        echo "  <h6><a href='" . base_url('assets/berkas/wisuda/' . $row->file_ta) . "' download><i class='far fa-file-pdf'></i></i></a></h6>";
                                                    } else {
                                                        echo " ";
                                                    }
                                                    ?>
                                                </td>
                                                <td> <?php if ($row->status_jurnal == '0') {
                                                            echo " <a href ='#' class ='btn btn-sm btn-warning btn-xs btn-block' data-toggle='modal' data-target='#modal_jurnal' onClick=\"SetInput2('" . $row->id_bks_wisuda . "','" . $row->nim . "','" . $row->nama . "','" . $row->judul . "','" . $row->status_jurnal . "','" . $row->catatan_jurnal . "','" . $row->tgl_jurnal . "')\"> Belum</a>";
                                                        } else if ($row->status_jurnal == '1') {
                                                            echo " <a href ='#' class ='btn btn-sm btn-info btn-xs btn-block' data-toggle='modal' data-target='#modal_jurnal' onClick=\"SetInput2('" . $row->id_bks_wisuda . "','" . $row->nim . "','" . $row->nama . "','" . $row->judul . "','" . $row->status_jurnal . "','" . $row->catatan_jurnal . "','" . $row->tgl_jurnal . "')\"> Kurang</a>";
                                                        } else if ($row->status_jurnal == '2') {
                                                            echo " <a href ='#' class ='btn btn-sm btn-success btn-xs btn-block' data-toggle='modal' data-target='#modal_jurnal' onClick=\"SetInput2('" . $row->id_bks_wisuda . "','" . $row->nim . "','" . $row->nama . "','" . $row->judul . "','" . $row->status_jurnal . "','" . $row->catatan_jurnal . "','" . $row->tgl_jurnal . "')\"> Lengkap</a>";
                                                        } else {
                                                            echo "";
                                                        }
                                                        ?>
                                                    <?php if ($row->status_jurnal == '0') {
                                                        echo " <h6>Belum diverifikasi</h6>";
                                                    } else {
                                                        echo "<h6>" . $row->catatan_jurnal . "</h6> ";
                                                    }
                                                    ?>
                                                    <?php if ($row->jurnal != NULL) {
                                                        echo "  <h6><a href='" . base_url('assets/berkas/wisuda/' . $row->jurnal) . "' download><i class='far fa-file-pdf'></i></i></a></h6>";
                                                    } else {
                                                        echo " ";
                                                    }
                                                    ?>
                                                </td>
                                                <td> <?php if ($row->status_lap_ta == '0') {
                                                            echo " <a href ='#' class ='btn btn-sm btn-warning btn-xs btn-block' data-toggle='modal' data-target='#modal_lapta' onClick=\"SetInput3('" . $row->id_bks_wisuda . "','" . $row->nim . "','" . $row->nama . "','" . $row->judul . "','" . $row->status_lap_ta . "','" . $row->catatan_lap_ta . "','" . $row->tgl_lap_ta . "')\"> Belum</a>";
                                                        } else if ($row->status_lap_ta == '1') {
                                                            echo " <a href ='#' class ='btn btn-sm btn-info btn-xs btn-block' data-toggle='modal' data-target='#modal_lapta' onClick=\"SetInput3('" . $row->id_bks_wisuda . "','" . $row->nim . "','" . $row->nama . "','" . $row->judul . "','" . $row->status_lap_ta . "','" . $row->catatan_lap_ta . "','" . $row->tgl_lap_ta . "')\"> Kurang</a>";
                                                        } else if ($row->status_lap_ta == '2') {
                                                            echo " <a href ='#' class ='btn btn-sm btn-success btn-xs btn-block' data-toggle='modal' data-target='#modal_lapta' onClick=\"SetInput3('" . $row->id_bks_wisuda . "','" . $row->nim . "','" . $row->nama . "','" . $row->judul . "','" . $row->status_lap_ta . "','" . $row->catatan_lap_ta . "','" . $row->tgl_lap_ta . "')\"> Lengkap</a>";
                                                        } else {
                                                            echo "";
                                                        }
                                                        ?>
                                                    <?php if ($row->status_lap_ta == '0') {
                                                        echo " <h6>Belum diverifikasi</h6>";
                                                    } else {
                                                        echo "<h6>" . $row->catatan_lap_ta . "</h6> ";
                                                    }
                                                    ?>
                                                </td>
                                                <td> <?php if ($row->status_aplikasi == '0') {
                                                            echo " <a href ='#' class ='btn btn-sm btn-warning btn-xs btn-block' data-toggle='modal' data-target='#modal_aplikasi' onClick=\"SetInput4('" . $row->id_bks_wisuda . "','" . $row->nim . "','" . $row->nama . "','" . $row->judul . "','" . $row->status_aplikasi . "','" . $row->catatan_aplikasi . "','" . $row->tgl_aplikasi . "')\"> Belum</a>";
                                                        } else if ($row->status_aplikasi == '1') {
                                                            echo " <a href ='#' class ='btn btn-sm btn-info btn-xs btn-block' data-toggle='modal' data-target='#modal_aplikasi' onClick=\"SetInput4('" . $row->id_bks_wisuda . "','" . $row->nim . "','" . $row->nama . "','" . $row->judul . "','" . $row->status_aplikasi . "','" . $row->catatan_aplikasi . "','" . $row->tgl_aplikasi . "')\"> Kurang</a>";
                                                        } else if ($row->status_aplikasi == '2') {
                                                            echo " <a href ='#' class ='btn btn-sm btn-success btn-xs btn-block' data-toggle='modal' data-target='#modal_aplikasi' onClick=\"SetInput4('" . $row->id_bks_wisuda . "','" . $row->nim . "','" . $row->nama . "','" . $row->judul . "','" . $row->status_aplikasi . "','" . $row->catatan_aplikasi . "','" . $row->tgl_aplikasi . "')\"> Lengkap</a>";
                                                        } else {
                                                            echo "";
                                                        }
                                                        ?>
                                                    <?php if ($row->status_aplikasi == '0') {
                                                        echo " <h6>Belum diverifikasi</h6>";
                                                    } else {
                                                        echo "<h6>" . $row->catatan_aplikasi . "</h6> ";
                                                    }
                                                    ?>
                                                    <?php if ($row->aplikasi != NULL) {
                                                        echo "  <h6><a href='" . base_url('assets/berkas/wisuda/' . $row->aplikasi) . "' download><i class='far fa-file-pdf'></i></i></a></h6>";
                                                    } else {
                                                        echo " ";
                                                    }
                                                    ?>
                                                </td>
                                                <td> <?php if ($row->status_ppt == '0') {
                                                            echo " <a href ='#' class ='btn btn-sm btn-warning btn-xs btn-block' data-toggle='modal' data-target='#modal_ppt' onClick=\"SetInput5('" . $row->id_bks_wisuda . "','" . $row->nim . "','" . $row->nama . "','" . $row->judul . "','" . $row->status_ppt . "','" . $row->catatan_ppt . "','" . $row->tgl_ppt . "')\"> Belum</a>";
                                                        } else if ($row->status_ppt == '1') {
                                                            echo " <a href ='#' class ='btn btn-sm btn-info btn-xs btn-block' data-toggle='modal' data-target='#modal_ppt' onClick=\"SetInput5('" . $row->id_bks_wisuda . "','" . $row->nim . "','" . $row->nama . "','" . $row->judul . "','" . $row->status_ppt . "','" . $row->catatan_ppt . "','" . $row->tgl_ppt . "')\"> Kurang</a>";
                                                        } else if ($row->status_ppt == '2') {
                                                            echo " <a href ='#' class ='btn btn-sm btn-success btn-xs btn-block' data-toggle='modal' data-target='#modal_ppt' onClick=\"SetInput5('" . $row->id_bks_wisuda . "','" . $row->nim . "','" . $row->nama . "','" . $row->judul . "','" . $row->status_ppt . "','" . $row->catatan_ppt . "','" . $row->tgl_ppt . "')\"> Lengkap</a>";
                                                        } else {
                                                            echo "";
                                                        }
                                                        ?>
                                                    <?php if ($row->status_ppt == '0') {
                                                        echo " <h6>Belum diverifikasi</h6>";
                                                    } else {
                                                        echo "<h6>" . $row->catatan_ppt . "</h6> ";
                                                    }
                                                    ?>
                                                    <?php if ($row->ppt != NULL) {
                                                        echo "  <h6><a href='" . base_url('assets/berkas/wisuda/' . $row->ppt) . "' download><i class='far fa-file-pdf'></i></i></a></h6>";
                                                    } else {
                                                        echo " ";
                                                    }
                                                    ?>
                                                </td>
                                                <td> <?php if ($row->status_video == '0') {
                                                            echo " <a href ='#' class ='btn btn-sm btn-warning btn-xs btn-block' data-toggle='modal' data-target='#modal_video' onClick=\"SetInput6('" . $row->id_bks_wisuda . "','" . $row->nim . "','" . $row->nama . "','" . $row->judul . "','" . $row->status_video . "','" . $row->catatan_video . "','" . $row->tgl_video . "')\"> Belum</a>";
                                                        } else if ($row->status_video == '1') {
                                                            echo " <a href ='#' class ='btn btn-sm btn-info btn-xs btn-block' data-toggle='modal' data-target='#modal_video' onClick=\"SetInput6('" . $row->id_bks_wisuda . "','" . $row->nim . "','" . $row->nama . "','" . $row->judul . "','" . $row->status_video . "','" . $row->catatan_video . "','" . $row->tgl_video . "')\"> Kurang</a>";
                                                        } else if ($row->status_video == '2') {
                                                            echo " <a href ='#' class ='btn btn-sm btn-success btn-xs btn-block' data-toggle='modal' data-target='#modal_video' onClick=\"SetInput6('" . $row->id_bks_wisuda . "','" . $row->nim . "','" . $row->nama . "','" . $row->judul . "','" . $row->status_video . "','" . $row->catatan_video . "','" . $row->tgl_video . "')\"> Lengkap</a>";
                                                        } else {
                                                            echo "";
                                                        }
                                                        ?>
                                                    <?php if ($row->status_video == '0') {
                                                        echo " <h6>Belum diverifikasi</h6>";
                                                    } else {
                                                        echo "<h6>" . $row->catatan_video . "</h6> ";
                                                    }
                                                    ?>
                                                    <?php if ($row->video != NULL) {
                                                        echo "  <h6><a href='" . base_url('assets/berkas/wisuda/' . $row->video) . "' download><i class='far fa-file-pdf'></i></i></a></h6>";
                                                    } else {
                                                        echo " ";
                                                    }
                                                    ?>
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


    <div id="modal_file_ta" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:55%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Verifikasi Persyaratan File TA</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?= base_url('bks_wisuda/verif_fileta') ?>" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group row">
                            <input type="hidden" id="id_bks_wisuda" name="id_bks_wisuda">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">NIM</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nim" name="nim" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Mahasiswa</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nama" name="nama" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="persetujuan" class="col-sm-3 col-form-label">Judul TA</label>
                            <div class="col-sm-9">
                                <textarea type="text" class="form-control" id="judul" name="judul" readonly></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputjudul1" class="col-sm-3 col-form-label">Keterangan</label>
                            <div class="col-sm-4">
                                <select class="form-control" data-live-search="true" data-style="btn-white" onclick="choose()" id="status_file_ta" name="status_file_ta" required>
                                    <option value="0">Belum</option>
                                    <option value="1">Kurang</option>
                                    <option value="2">Lengkap</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="persetujuan" class="col-sm-3 col-form-label">Catatan</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="catatan_file_ta" name="catatan_file_ta"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="persetujuan" class="col-sm-3 col-form-label">Tanggal Verifikasi</label>
                            <div class="col-sm-9">
                                <input type="date" id="tgl_file_ta" name="tgl_file_ta" class="form-control">
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

    <div id="modal_jurnal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:55%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Verifikasi Persyaratan Jurnal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?= base_url('bks_wisuda/verif_jurnal') ?>" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group row">
                            <input type="hidden" id="id_bks_wisuda" name="id_bks_wisuda">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">NIM</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nim2" name="nim" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Mahasiswa</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nama2" name="nama" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="persetujuan" class="col-sm-3 col-form-label">Judul TA</label>
                            <div class="col-sm-9">
                                <textarea type="text" class="form-control" id="judul2" name="judul" readonly></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputjudul1" class="col-sm-3 col-form-label">Keterangan</label>
                            <div class="col-sm-4">
                                <select class="form-control" data-live-search="true" data-style="btn-white" onclick="choose()" id="status_jurnal" name="status_jurnal" required>
                                    <option value="0">Belum</option>
                                    <option value="1">Kurang</option>
                                    <option value="2">Lengkap</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="persetujuan" class="col-sm-3 col-form-label">Catatan</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="catatan_jurnal" name="catatan_jurnal"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="persetujuan" class="col-sm-3 col-form-label">Tanggal Verifikasi</label>
                            <div class="col-sm-9">
                                <input type="date" id="tgl_jurnal" name="tgl_jurnal" class="form-control">
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

    <div id="modal_lapta" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:55%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Verifikasi Persyaratan Laporan TA</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?= base_url('bks_wisuda/verif_lapta') ?>" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group row">
                            <input type="hidden" id="id_bks_wisuda" name="id_bks_wisuda">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">NIM</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nim3" name="nim" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Mahasiswa</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nama3" name="nama" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="persetujuan" class="col-sm-3 col-form-label">Judul TA</label>
                            <div class="col-sm-9">
                                <textarea type="text" class="form-control" id="judul3" name="judul" readonly></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputjudul1" class="col-sm-3 col-form-label">Keterangan</label>
                            <div class="col-sm-4">
                                <select class="form-control" data-live-search="true" data-style="btn-white" onclick="choose()" id="status_lap_ta" name="status_lap_ta" required>
                                    <option value="0">Belum</option>
                                    <option value="1">Kurang</option>
                                    <option value="2">Lengkap</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="persetujuan" class="col-sm-3 col-form-label">Catatan</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="catatan_lap_ta" name="catatan_lap_ta"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="persetujuan" class="col-sm-3 col-form-label">Tanggal Verifikasi</label>
                            <div class="col-sm-9">
                                <input type="date" id="tgl_lap_ta" name="tgl_lap_ta" class="form-control">
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

    <div id="modal_aplikasi" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:55%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Verifikasi Persyaratan Aplikasi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?= base_url('bks_wisuda/verif_aplikasi') ?>" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group row">
                            <input type="hidden" id="id_bks_wisuda" name="id_bks_wisuda">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">NIM</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nim4" name="nim" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Mahasiswa</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nama4" name="nama" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="persetujuan" class="col-sm-3 col-form-label">Judul TA</label>
                            <div class="col-sm-9">
                                <textarea type="text" class="form-control" id="judul4" name="judul" readonly></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputjudul1" class="col-sm-3 col-form-label">Keterangan</label>
                            <div class="col-sm-4">
                                <select class="form-control" data-live-search="true" data-style="btn-white" onclick="choose()" id="status_aplikasi" name="status_aplikasi" required>
                                    <option value="0">Belum</option>
                                    <option value="1">Kurang</option>
                                    <option value="2">Lengkap</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="persetujuan" class="col-sm-3 col-form-label">Catatan</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="catatan_aplikasi" name="catatan_aplikasi"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="persetujuan" class="col-sm-3 col-form-label">Tanggal Verifikasi</label>
                            <div class="col-sm-9">
                                <input type="date" id="tgl_aplikasi" name="tgl_aplikasi" class="form-control">
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

    <div id="modal_ppt" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:55%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Verifikasi Persyaratan Aplikasi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?= base_url('bks_wisuda/verif_ppt') ?>" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group row">
                            <input type="hidden" id="id_bks_wisuda" name="id_bks_wisuda">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">NIM</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nim5" name="nim" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Mahasiswa</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nama5" name="nama" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="persetujuan" class="col-sm-3 col-form-label">Judul TA</label>
                            <div class="col-sm-9">
                                <textarea type="text" class="form-control" id="judul5" name="judul" readonly></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputjudul1" class="col-sm-3 col-form-label">Keterangan</label>
                            <div class="col-sm-4">
                                <select class="form-control" data-live-search="true" data-style="btn-white" onclick="choose()" id="status_ppt" name="status_ppt" required>
                                    <option value="0">Belum</option>
                                    <option value="1">Kurang</option>
                                    <option value="2">Lengkap</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="persetujuan" class="col-sm-3 col-form-label">Catatan</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="catatan_ppt" name="catatan_ppt"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="persetujuan" class="col-sm-3 col-form-label">Tanggal Verifikasi</label>
                            <div class="col-sm-9">
                                <input type="date" id="tgl_ppt" name="tgl_ppt" class="form-control">
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

    <div id="modal_video" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:55%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Verifikasi Persyaratan Aplikasi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?= base_url('bks_wisuda/verif_video') ?>" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group row">
                            <input type="hidden" id="id_bks_wisuda" name="id_bks_wisuda">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">NIM</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nim6" name="nim" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Mahasiswa</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nama6" name="nama" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="persetujuan" class="col-sm-3 col-form-label">Judul TA</label>
                            <div class="col-sm-9">
                                <textarea type="text" class="form-control" id="judul6" name="judul" readonly></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputjudul1" class="col-sm-3 col-form-label">Keterangan</label>
                            <div class="col-sm-4">
                                <select class="form-control" data-live-search="true" data-style="btn-white" onclick="choose()" id="status_video" name="status_video" required>
                                    <option value="0">Belum</option>
                                    <option value="1">Kurang</option>
                                    <option value="2">Lengkap</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="persetujuan" class="col-sm-3 col-form-label">Catatan</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="catatan_video" name="catatan_video"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="persetujuan" class="col-sm-3 col-form-label">Tanggal Verifikasi</label>
                            <div class="col-sm-9">
                                <input type="date" id="tgl_video" name="tgl_video" class="form-control">
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
        var date = new Date();
        var day = date.getDate();
        var month = date.getMonth() + 1;
        var year = date.getFullYear();
        if (month < 10) month = "0" + month;
        if (day < 10) day = "0" + day;
        var today = year + "-" + month + "-" + day;

        function SetInput(id_bks_wisuda, nim, nama, judul, status_file_ta, catatan_file_ta, tgl_file_ta) {
            document.getElementById('id_bks_wisuda').value = id_bks_wisuda;
            document.getElementById('nim').value = nim;
            document.getElementById('nama').value = nama;
            document.getElementById('judul').value = judul;
            document.getElementById('status_file_ta').value = status_file_ta;
            document.getElementById('catatan_file_ta').value = catatan_file_ta;
            document.getElementById('tgl_file_ta').value = today;
        }

        function SetInput2(id_bks_wisuda, nim, nama, judul, status_jurnal, catatan_jurnal, tgl_jurnal) {
            document.getElementById('id_bks_wisuda').value = id_bks_wisuda;
            document.getElementById('nim2').value = nim;
            document.getElementById('nama2').value = nama;
            document.getElementById('judul2').value = judul;
            document.getElementById('status_jurnal').value = status_jurnal;
            document.getElementById('catatan_jurnal').value = catatan_jurnal;
            document.getElementById('tgl_jurnal').value = today;
        }

        function SetInput3(id_bks_wisuda, nim, nama, judul, status_lap_ta, catatan_lap_ta, tgl_lap_ta) {
            document.getElementById('id_bks_wisuda').value = id_bks_wisuda;
            document.getElementById('nim3').value = nim;
            document.getElementById('nama3').value = nama;
            document.getElementById('judul3').value = judul;
            document.getElementById('status_lap_ta').value = status_lap_ta;
            document.getElementById('catatan_lap_ta').value = catatan_lap_ta;
            document.getElementById('tgl_lap_ta').value = today;
        }

        function SetInput4(id_bks_wisuda, nim, nama, judul, status_aplikasi, catatan_aplikasi, tgl_aplikasi) {
            document.getElementById('id_bks_wisuda').value = id_bks_wisuda;
            document.getElementById('nim4').value = nim;
            document.getElementById('nama4').value = nama;
            document.getElementById('judul4').value = judul;
            document.getElementById('status_aplikasi').value = status_aplikasi;
            document.getElementById('catatan_aplikasi').value = catatan_aplikasi;
            document.getElementById('tgl_aplikasi').value = today;
        }

        function SetInput5(id_bks_wisuda, nim, nama, judul, status_ppt, catatan_ppt, tgl_ppt) {
            document.getElementById('id_bks_wisuda').value = id_bks_wisuda;
            document.getElementById('nim5').value = nim;
            document.getElementById('nama5').value = nama;
            document.getElementById('judul5').value = judul;
            document.getElementById('status_ppt').value = status_ppt;
            document.getElementById('catatan_ppt').value = catatan_ppt;
            document.getElementById('tgl_ppt').value = today;
        }

        function SetInput6(id_bks_wisuda, nim, nama, judul, status_video, catatan_video, tgl_video) {
            document.getElementById('id_bks_wisuda').value = id_bks_wisuda;
            document.getElementById('nim6').value = nim;
            document.getElementById('nama6').value = nama;
            document.getElementById('judul6').value = judul;
            document.getElementById('status_video').value = status_video;
            document.getElementById('catatan_video').value = catatan_video;
            document.getElementById('tgl_video').value = today;
        }
    </script>

    <script>
        $(document).on('click', '#btn-konfirmasi', function(e) {
            e.preventDefault();
            var link = $(this).attr('href');
            Swal.fire({
                title: 'Apakah Anda Yakin ? ',
                text: "Data akan dikonfirmasi ?",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = link;
                    Swal.fire(
                        'Sukses',
                        'Data berhasil di konfirmasi',
                        'success'
                    )
                }
            });
        });
    </script>
<?php } else { ?>
    <!-- USER MAHASISWA -->
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
                        <?php $cek = $this->db->get_where('persetujuan', array('nim' => $this->session->userdata('email'), 'jenis' => 'ta')) ?>
                        <?php if ($cek->num_rows() < 2) { ?>
                            <div class="row">
                                <div class="col-12">
                                    <div class="card card-danger">
                                        <div class="card-header">
                                            <h3 class="card-title"><i class="fas fa-exclamation-triangle"></i> Pemberitahuan</h3>
                                        </div>
                                        <div class="card-body">
                                            Anda belum berhak melakukan registrasi wisuda
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Data Berkas Pendaftaran Wisuda</h3>
                                </div>
                                <div class="card-body">
                                    <div id="flash" data-flash="<?= $this->session->flashdata('pesan'); ?>">
                                        <div id="gagal" data-flash="<?= $this->session->flashdata('gagal'); ?>">
                                            <form action="<?= base_url('bks_wisuda/create') ?>" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                                                <input type="hidden" id="id_bks_wisuda" name="id_bks_wisuda">
                                                <table id="example1" class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Persyaratan</th>
                                                            <th>Unggah Bukti</th>
                                                            <th>Status</th>
                                                            <th>Keterangan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1.</td>
                                                            <td>File TA</td>
                                                            <td>
                                                                <a href="#" class="btn btn-info" data-toggle="modal" pull="right" data-target="#file_ta" onclick="ResetInput()"><i class="fa fa-file"></i> Unggah</a>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                if ($bks_wisuda == "") {
                                                                    echo "";
                                                                } else {
                                                                    echo "$bks_wisuda->file_ta";
                                                                }
                                                                ?>
                                                            </td>
                                                            <td align="center">
                                                                <?php
                                                                if ($bks_wisuda == "") {
                                                                    echo "";
                                                                } else {
                                                                    if ($bks_wisuda->status_file_ta == '0') {
                                                                        echo '<span class="badge badge-warning">Belum Diverifikasi</span>';
                                                                    } else if ($bks_wisuda->status_file_ta == '1') {
                                                                        echo '<span class="badge badge-info">Kurang Lengkap</span>';
                                                                    } else if ($bks_wisuda->status_file_ta == '2') {
                                                                        echo '<span class="badge badge-success">Lengkap</span>';
                                                                    }
                                                                }

                                                                ?>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td>2.</td>
                                                            <td>File Jurnal</td>
                                                            <td>
                                                                <a href="#" class="btn btn-info" data-toggle="modal" pull="right" data-target="#file_jurnal" onclick="ResetInput()"><i class="fa fa-file"></i> Unggah</a>
                                                            </td>
                                                            <td><?php
                                                                if ($bks_wisuda == "") {
                                                                    echo "";
                                                                } else {
                                                                    echo "$bks_wisuda->jurnal";
                                                                }
                                                                ?></td>
                                                            <td align="center">
                                                                <?php
                                                                if ($bks_wisuda == "") {
                                                                    echo "";
                                                                } else {
                                                                    if ($bks_wisuda->status_jurnal == '0') {
                                                                        echo '<span class="badge badge-warning">Belum Diverifikasi</span>';
                                                                    } else if ($bks_wisuda->status_jurnal == '1') {
                                                                        echo '<span class="badge badge-info">Kurang Lengkap</span>';
                                                                    } else if ($bks_wisuda->status_jurnal == '2') {
                                                                        echo '<span class="badge badge-success">Lengkap</span>';
                                                                    }
                                                                }

                                                                ?>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>3.</td>
                                                            <td>File Aplikasi</td>
                                                            <td>
                                                                <a href="#" class="btn btn-info" data-toggle="modal" pull="right" data-target="#file_aplikasi" onclick="ResetInput()"><i class="fa fa-file"></i> Unggah</a>
                                                            </td>
                                                            <td><?php
                                                                if ($bks_wisuda == "") {
                                                                    echo "";
                                                                } else {
                                                                    echo "$bks_wisuda->aplikasi";
                                                                }
                                                                ?></td>
                                                            <td align="center">
                                                                <?php
                                                                if ($bks_wisuda == "") {
                                                                    echo "";
                                                                } else {
                                                                    if ($bks_wisuda->status_aplikasi == '0') {
                                                                        echo '<span class="badge badge-warning">Belum Diverifikasi</span>';
                                                                    } else if ($bks_wisuda->status_aplikasi == '1') {
                                                                        echo '<span class="badge badge-info">Kurang Lengkap</span>';
                                                                    } else if ($bks_wisuda->status_aplikasi == '2') {
                                                                        echo '<span class="badge badge-success">Lengkap</span>';
                                                                    }
                                                                }

                                                                ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>4.</td>
                                                            <td>File PPT</td>
                                                            <td>
                                                                <a href="#" class="btn btn-info" data-toggle="modal" pull="right" data-target="#file_ppt" onclick="ResetInput()"><i class="fa fa-file"></i> Unggah</a>
                                                            </td>
                                                            <td><?php
                                                                if ($bks_wisuda == "") {
                                                                    echo "";
                                                                } else {
                                                                    echo "$bks_wisuda->ppt";
                                                                }
                                                                ?></td>
                                                            <td align="center">
                                                                <?php
                                                                if ($bks_wisuda == "") {
                                                                    echo "";
                                                                } else {
                                                                    if ($bks_wisuda->status_ppt == '0') {
                                                                        echo '<span class="badge badge-warning">Belum Diverifikasi</span>';
                                                                    } else if ($bks_wisuda->status_ppt == '1') {
                                                                        echo '<span class="badge badge-info">Kurang Lengkap</span>';
                                                                    } else if ($bks_wisuda->status_ppt == '2') {
                                                                        echo '<span class="badge badge-success">Lengkap</span>';
                                                                    }
                                                                }

                                                                ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>5.</td>
                                                            <td>File Video</td>
                                                            <td>
                                                                <a href="#" class="btn btn-info" data-toggle="modal" pull="right" data-target="#file_video" onclick="ResetInput()"><i class="fa fa-file"></i> Unggah</a>
                                                            </td>
                                                            <td><?php
                                                                if ($bks_wisuda == "") {
                                                                    echo "";
                                                                } else {
                                                                    echo "$bks_wisuda->video";
                                                                }
                                                                ?></td>
                                                            <td align="center">
                                                                <?php
                                                                if ($bks_wisuda == "") {
                                                                    echo "";
                                                                } else {
                                                                    if ($bks_wisuda->status_video == '0') {
                                                                        echo '<span class="badge badge-warning">Belum Diverifikasi</span>';
                                                                    } else if ($bks_wisuda->status_video == '1') {
                                                                        echo '<span class="badge badge-info">Kurang Lengkap</span>';
                                                                    } else if ($bks_wisuda->status_video == '2') {
                                                                        echo '<span class="badge badge-success">Lengkap</span>';
                                                                    }
                                                                }

                                                                ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>5.</td>
                                                            <td>Foto</td>
                                                            <td>
                                                                <a href="#" class="btn btn-info" data-toggle="modal" pull="right" data-target="#file_foto" onclick="ResetInput()"><i class="fa fa-file"></i> Unggah</a>
                                                            </td>
                                                            <td><?php
                                                                if ($bks_wisuda == "") {
                                                                    echo "";
                                                                } else {
                                                                    echo "$bks_wisuda->foto_ijazah";
                                                                }
                                                                ?></td>
                                                            <td align="center">
                                                                <?php
                                                                if ($bks_wisuda == "") {
                                                                    echo "";
                                                                } else {
                                                                    if ($bks_wisuda->status_baak == '0') {
                                                                        echo '<span class="badge badge-warning">Belum Diverifikasi</span>';
                                                                    } else if ($bks_wisuda->status_baak == '1') {
                                                                        echo '<span class="badge badge-info">Kurang Lengkap</span>';
                                                                    } else if ($bks_wisuda->status_baak == '2') {
                                                                        echo '<span class="badge badge-success">Lengkap</span>';
                                                                    }
                                                                }

                                                                ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>6.</td>
                                                            <td>Lap.TA</td>
                                                            <td>
                                                                <!-- <a href="#" class="btn btn-info" data-toggle="modal" pull="right" data-target="#lap_ta" onclick="ResetInput()"><i class="fa fa-file"></i> Unggah</a> -->
                                                            </td>
                                                            <td><?php
                                                                if ($bks_wisuda == "") {
                                                                    echo "";
                                                                } else {
                                                                    echo "<?= $bks_wisuda->file_ta ?>";
                                                                }
                                                                ?></td>
                                                            <td align="center">
                                                                <?php
                                                                if ($bks_wisuda == "") {
                                                                    echo "";
                                                                } else {
                                                                    if ($bks_wisuda->status_lap_ta == '0') {
                                                                        echo '<span class="badge badge-warning">Belum Diverifikasi</span>';
                                                                    } else if ($bks_wisuda->status_lap_ta == '1') {
                                                                        echo '<span class="badge badge-info">Kurang Lengkap</span>';
                                                                    } else if ($bks_wisuda->status_lap_ta == '2') {
                                                                        echo '<span class="badge badge-success">Lengkap</span>';
                                                                    }
                                                                }

                                                                ?>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </form>
                                        <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
        </section>
    </div>

    <div id="file_ta" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:55%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Berkas Pendaftaran Wisuda</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?= base_url('bks_wisuda/upload_fileta') ?>" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <input type="hidden" id="id_bks_wisuda" name="id_bks_wisuda">
                            <input type="hidden" value="<?php echo $this->session->userdata('email'); ?>" class="form-control" id="nim" name="nim" placeholder="NIM">
                            <input type="hidden" value="<?php echo $this->session->userdata('email'); ?>" class="form-control" id="nim2" name="nim2" readonly placeholder="NIM">
                        </div>
                        <div class="form-group">
                            <label for="berita_acara">File Tugas Akhir</label><br>
                            <input type="file" name="file_ta" required>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="submit" class="btn btn-primary" style="float: right;">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="file_jurnal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:55%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Berkas Pendaftaran Wisuda</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?= base_url('bks_wisuda/upload_jurnal') ?>" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <!-- <input type="text" id="id_bks_wisuda" name="id_bks_wisuda"> -->
                            <input type="hidden" id="jurnal" name="jurnal">
                            <input type="hidden" value="<?php echo $this->session->userdata('email'); ?>" class="form-control" id="nim" name="nim" placeholder="NIM">
                            <input type="hidden" value="<?php echo $this->session->userdata('email'); ?>" class="form-control" id="nim2" name="nim2" readonly placeholder="NIM">
                        </div>

                        <div class="form-group">
                            <label for="persetujuan">Jurnal</label><br>
                            <input type="file" name="jurnal" required>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" name="submit" class="btn btn-primary" style="float: right;">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="lap_ta" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:55%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Berkas Pendaftaran Wisuda</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?= base_url('bks_wisuda/create') ?>" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <input type="hidden" id="id_bks_wisuda" name="id_bks_wisuda">
                            <input type="hidden" value="<?php echo $this->session->userdata('email'); ?>" class="form-control" id="nim" name="nim" placeholder="NIM">
                            <input type="hidden" value="<?php echo $this->session->userdata('email'); ?>" class="form-control" id="nim2" name="nim2" readonly placeholder="NIM">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputjudul1">Laporan Tugas Akhir</label><br>
                            <input type="file" name="lap_ta_prodi" required>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" name="submit" class="btn btn-primary" style="float: right;">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="file_aplikasi" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:55%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Berkas Pendaftaran Wisuda</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?= base_url('bks_wisuda/upload_aplikasi') ?>" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <input type="hidden" id="id_bks_wisuda" name="id_bks_wisuda">
                            <input type="hidden" value="<?php echo $this->session->userdata('email'); ?>" class="form-control" id="nim" name="nim" placeholder="NIM">
                            <input type="hidden" value="<?php echo $this->session->userdata('email'); ?>" class="form-control" id="nim2" name="nim2" readonly placeholder="NIM">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputjudul1">Aplikasi</label><br>
                            <input type="file" name="aplikasi" required>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="submit" class="btn btn-primary" style="float: right;">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="file_ppt" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:55%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Berkas Pendaftaran Wisuda</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?= base_url('bks_wisuda/upload_ppt') ?>" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <input type="hidden" id="id_bks_wisuda" name="id_bks_wisuda">
                            <input type="hidden" value="<?php echo $this->session->userdata('email'); ?>" class="form-control" id="nim" name="nim" placeholder="NIM">
                            <input type="hidden" value="<?php echo $this->session->userdata('email'); ?>" class="form-control" id="nim2" name="nim2" readonly placeholder="NIM">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputjudul1">Powerpoint</label><br>
                            <input type="file" name="ppt" required>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="submit" class="btn btn-primary" style="float: right;">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="file_video" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:55%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Berkas Pendaftaran Wisuda</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?= base_url('bks_wisuda/upload_video') ?>" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <input type="hidden" id="id_bks_wisuda" name="id_bks_wisuda">
                            <input type="hidden" value="<?php echo $this->session->userdata('email'); ?>" class="form-control" id="nim" name="nim" placeholder="NIM">
                            <input type="hidden" value="<?php echo $this->session->userdata('email'); ?>" class="form-control" id="nim2" name="nim2" readonly placeholder="NIM">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputjudul1">Video</label><br>
                            <input type="file" name="video" required>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="submit" class="btn btn-primary" style="float: right;">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="file_foto" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:55%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Berkas Pendaftaran Wisuda</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?= base_url('bks_wisuda/upload_foto') ?>" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <input type="hidden" id="id_bks_wisuda" name="id_bks_wisuda">
                            <input type="hidden" value="<?php echo $this->session->userdata('email'); ?>" class="form-control" id="nim" name="nim" placeholder="NIM">
                            <input type="hidden" value="<?php echo $this->session->userdata('email'); ?>" class="form-control" id="nim2" name="nim2" readonly placeholder="NIM">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputjudul1">Foto</label><br>
                            <input type="file" name="foto_ijazah" required>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="submit" class="btn btn-primary" style="float: right;">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:55%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Berkas Pendaftaran Wisuda</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?= base_url('bks_wisuda/create') ?>" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <input type="hidden" id="id_bks_wisuda" name="id_bks_wisuda">

                            <label for="exampleInputjudul1">NIM</label>
                            <input type="hidden" class="form-control" id="nim" name="nim" placeholder="NIM">
                            <input type="text" class="form-control" id="nim2" name="nim2" readonly placeholder="NIM">
                        </div>
                        <div class="form-group">
                            <label for="berita_acara">File Tugas Akhir</label><br>
                            <input type="file" name="file_ta" required>
                        </div>
                        <div class="form-group">
                            <label for="persetujuan">Jurnal</label><br>
                            <input type="file" name="jurnal" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputjudul1">Laporan Tugas Akhir</label><br>
                            <input type="file" name="lap_ta_prodi" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputjudul1">Aplikasi</label><br>
                            <input type="file" name="aplikasi" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputjudul1">Powerpoint</label><br>
                            <input type="file" name="ppt" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputjudul1">Video</label><br>
                            <input type="file" name="video" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputjudul1">Foto Ijazah</label><br>
                            <input type="file" name="foto_ijazah" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputjudul1">Foto Wisuda</label><br>
                            <input type="file" name="foto_wisuda" required>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function ResetInput(id_bks_wisuda, nim, file_ta, jurnal, lap_ta_prodi, aplikasi, ppt, video, foto_ijazah, foto_wisuda) {
            document.getElementById('id_bks_wisuda').value = "";
            document.getElementById('nim').value = <?php echo $this->session->userdata('email'); ?>;
            document.getElementById('nim2').value = <?php echo $this->session->userdata('email'); ?>;
            document.getElementById('file_ta').value = "";
            document.getElementById('jenis').value = "";
            document.getElementById('lap_ta_prodi').value = "";
            document.getElementById('aplikasi').value = "";
            document.getElementById('ppt').value = "";
            document.getElementById('video').value = "";
            document.getElementById('foto_ijazah').value = "";
            document.getElementById('foto_wisuda').value = "";
        }
    </script>
<?php } ?>