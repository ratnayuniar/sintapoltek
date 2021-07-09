<!-- USER ADMIN -->
<?php if ($this->session->userdata('level') == 1) { ?>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Berkas Sidang Tugas Akhir</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('beranda'); ?>">Beranda</a></li>
              <li class="breadcrumb-item active"> Data Berkas Sidang Tugas Akhir</li>
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
                <h3 class="card-title">Data Berkas Pendaftaran Seminar</h3>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>NIM</th>
                      <th>Nama Mahasiswa</th>
                      <th>Berita Acara</th>
                      <th>Persetujuan</th>
                      <th>File TA</th>
                      <th>Monitoring</th>
                      <th>Presentasi</th>
                      <th>PKKMB</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    $id_prodi = $this->session->userdata('id_prodi');
                    foreach ($this->m_bks_sidang->bks_sidang_admin($id_prodi)->result() as $row) { ?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row->nim ?></td>
                        <td><?= $row->nama ?></td>
                        <td><?php if ($row->st_berita_acara == '0') {
                              echo " <a href ='#' class ='btn btn-sm btn-warning btn-xs btn-block' data-toggle='modal' data-target='#modal_berita_acara' onClick=\"SetInput('" . $row->id_seminar_ta . "','" . $row->nim . "','" . $row->nama . "','" . $row->judul . "','" . $row->st_berita_acara . "','" . $row->catatan_berita_acara . "','" . $row->tgl_berita_acara . "')\"> Belum</a>";
                            } else if ($row->st_berita_acara == '1') {
                              echo " <a href ='#' class ='btn btn-sm btn-info btn-xs btn-block' data-toggle='modal' data-target='#modal_berita_acara' onClick=\"SetInput('" . $row->id_seminar_ta . "','" . $row->nim . "','" . $row->nama . "','" . $row->judul . "','" . $row->st_berita_acara . "','" . $row->catatan_berita_acara . "','" . $row->tgl_berita_acara . "')\"> Kurang</a>";
                            } else {
                              echo " <a href ='#' class ='btn btn-sm btn-success btn-xs btn-block' data-toggle='modal' data-target='#modal_berita_acara' onClick=\"SetInput('" . $row->id_seminar_ta . "','" . $row->nim . "','" . $row->nama . "','" . $row->judul . "','" . $row->st_berita_acara . "','" . $row->catatan_berita_acara . "','" . $row->tgl_berita_acara . "')\"> Lengkap</a>";
                            }
                            ?>
                          <?php if ($row->st_berita_acara == '0') {
                            echo " <h6>Belum diverifikasi</h6>";
                          } else {
                            echo "<h6>" . $row->catatan_berita_acara . "</h6> ";
                          }
                          ?>
                          <h6><a href="<?php echo base_url('assets/berkas/sidang/' . $row->berita_acara); ?>" download><i class="far fa-file-pdf"></i></a></h6>
                        </td>
                        <td> <?php if ($row->st_persetujuan == '0') {
                                echo " <a href ='#' class ='btn btn-sm btn-warning btn-xs btn-block' data-toggle='modal' data-target='#modal_persetujuan' onClick=\"SetInput2('" . $row->id_seminar_ta . "','" . $row->nim . "','" . $row->nama . "','" . $row->judul . "','" . $row->st_persetujuan . "','" . $row->catatan_persetujuan . "','" . $row->tgl_persetujuan . "')\"> Belum</a>";
                              } else if ($row->st_persetujuan == '1') {
                                echo " <a href ='#' class ='btn btn-sm btn-info btn-xs btn-block' data-toggle='modal' data-target='#modal_persetujuan' onClick=\"SetInput2('" . $row->id_seminar_ta . "','" . $row->nim . "','" . $row->nama . "','" . $row->judul . "','" . $row->st_persetujuan . "','" . $row->catatan_persetujuan . "','" . $row->tgl_persetujuan . "')\"> Kurang</a>";
                              } else {
                                echo " <a href ='#' class ='btn btn-sm btn-success btn-xs btn-block' data-toggle='modal' data-target='#modal_persetujuan' onClick=\"SetInput2('" . $row->id_seminar_ta . "','" . $row->nim . "','" . $row->nama . "','" . $row->judul . "','" . $row->st_persetujuan . "','" . $row->catatan_persetujuan . "','" . $row->tgl_persetujuan . "')\"> Lengkap</a>";
                              }
                              ?>
                          <?php if ($row->st_persetujuan == '0') {
                            echo " <h6>Belum diverifikasi</h6>";
                          } else {
                            echo "<h6>"  . $row->catatan_persetujuan . "</h6> ";
                          }
                          ?>
                          <h6><a href="<?php echo base_url('assets/berkas/sidang/' . $row->persetujuan); ?>" download><i class="far fa-file-pdf"></i></a></h6>
                        </td>
                        <td> <?php if ($row->st_file_ta == '0') {
                                echo " <a href ='#' class ='btn btn-sm btn-warning btn-xs btn-block' data-toggle='modal' data-target='#modal_file_ta' onClick=\"SetInput3('" . $row->id_seminar_ta . "','" . $row->nim . "','" . $row->nama . "','" . $row->judul . "','" . $row->st_file_ta . "','" . $row->catatan_file_ta . "','" . $row->tgl_file_ta . "')\"> Belum</a>";
                              } else if ($row->st_file_ta == '1') {
                                echo " <a href ='#' class ='btn btn-sm btn-info btn-xs btn-block' data-toggle='modal' data-target='#modal_file_ta' onClick=\"SetInput3('" . $row->id_seminar_ta . "','" . $row->nim . "','" . $row->nama . "','" . $row->judul . "','" . $row->st_file_ta . "','" . $row->catatan_file_ta . "','" . $row->tgl_file_ta . "')\"> Kurang</a>";
                              } else {
                                echo " <a href ='#' class ='btn btn-sm btn-success btn-xs btn-block' data-toggle='modal' data-target='#modal_file_ta' onClick=\"SetInput3('" . $row->id_seminar_ta . "','" . $row->nim . "','" . $row->nama . "','" . $row->judul . "','" . $row->st_file_ta . "','" . $row->catatan_file_ta . "','" . $row->tgl_file_ta . "')\"> Lengkap</a>";
                              }
                              ?>
                          <?php if ($row->st_file_ta == '0') {
                            echo " <h6>Belum diverifikasi</h6>";
                          } else {
                            echo "<h6>"  . $row->catatan_file_ta . "</h6> ";
                          }
                          ?>
                          <h6><a href="<?php echo base_url('assets/berkas/sidang/' . $row->file_ta); ?>" download><i class="far fa-file-pdf"></i></a></h6>
                        </td>
                        <td> <?php if ($row->st_monitoring == '0') {
                                echo " <a href ='#' class ='btn btn-sm btn-warning btn-xs btn-block' data-toggle='modal' data-target='#modal_monitoring' onClick=\"SetInput4('" . $row->id_seminar_ta . "','" . $row->nim . "','" . $row->nama . "','" . $row->judul . "','" . $row->st_monitoring . "','" . $row->catatan_monitoring . "','" . $row->tgl_monitoring . "')\"> Belum</a>";
                              } else if ($row->st_monitoring == '1') {
                                echo " <a href ='#' class ='btn btn-sm btn-info btn-xs btn-block' data-toggle='modal' data-target='#modal_monitoring' onClick=\"SetInput4('" . $row->id_seminar_ta . "','" . $row->nim . "','" . $row->nama . "','" . $row->judul . "','" . $row->st_monitoring . "','" . $row->catatan_monitoring . "','" . $row->tgl_monitoring . "')\"> Kurang</a>";
                              } else {
                                echo " <a href ='#' class ='btn btn-sm btn-success btn-xs btn-block' data-toggle='modal' data-target='#modal_monitoring' onClick=\"SetInput4('" . $row->id_seminar_ta . "','" . $row->nim . "','" . $row->nama . "','" . $row->judul . "','" . $row->st_monitoring . "','" . $row->catatan_monitoring . "','" . $row->tgl_monitoring . "')\"> Lengkap</a>";
                              }
                              ?>
                          <?php if ($row->st_monitoring == '0') {
                            echo " <h6>Belum diverifikasi</h6>";
                          } else {
                            echo "<h6>"  . $row->catatan_monitoring . "</h6> ";
                          }
                          ?>
                          <h6><a href="<?php echo base_url('assets/berkas/sidang/' . $row->monitoring); ?>" download><i class="far fa-file-pdf"></i></i></a></h6>
                        </td>
                        <td> <?php if ($row->st_presentasi == '0') {
                                echo " <a href ='#' class ='btn btn-sm btn-warning btn-xs btn-block' data-toggle='modal' data-target='#modal_presentasi' onClick=\"SetInput5('" . $row->id_seminar_ta . "','" . $row->nim . "','" . $row->nama . "','" . $row->judul . "','" . $row->st_presentasi . "','" . $row->catatan_presentasi . "','" . $row->tgl_presentasi . "')\"> Belum</a>";
                              } else if ($row->st_presentasi == '1') {
                                echo " <a href ='#' class ='btn btn-sm btn-info btn-xs btn-block' data-toggle='modal' data-target='#modal_presentasi' onClick=\"SetInput5('" . $row->id_seminar_ta . "','" . $row->nim . "','" . $row->nama . "','" . $row->judul . "','" . $row->st_presentasi . "','" . $row->catatan_presentasi . "','" . $row->tgl_presentasi . "')\"> Kurang</a>";
                              } else {
                                echo " <a href ='#' class ='btn btn-sm btn-success btn-xs btn-block' data-toggle='modal' data-target='#modal_presentasi' onClick=\"SetInput5('" . $row->id_seminar_ta . "','" . $row->nim . "','" . $row->nama . "','" . $row->judul . "','" . $row->st_presentasi . "','" . $row->catatan_presentasi . "','" . $row->tgl_presentasi . "')\"> Lengkap</a>";
                              }
                              ?>
                          <?php if ($row->st_presentasi == '0') {
                            echo " <h6>Belum diverifikasi</h6>";
                          } else {
                            echo "<h6>"  . $row->catatan_presentasi . "</h6> ";
                          }
                          ?>
                          <h6><a href="<?php echo base_url('assets/berkas/sidang/' . $row->presentasi); ?>" download><i class="far fa-file-powerpoint"></i></a></h6>
                        </td>
                        <td> <?php if ($row->st_pkkmb == '0') {
                                echo " <a href ='#' class ='btn btn-sm btn-warning btn-xs btn-block' data-toggle='modal' data-target='#modal_pkkmb' onClick=\"SetInput6('" . $row->id_seminar_ta . "','" . $row->nim . "','" . $row->nama . "','" . $row->judul . "','" . $row->st_pkkmb . "','" . $row->catatan_pkkmb . "','" . $row->tgl_pkkmb . "')\"> Belum</a>";
                              } else if ($row->st_pkkmb == '1') {
                                echo " <a href ='#' class ='btn btn-sm btn-info btn-xs btn-block' data-toggle='modal' data-target='#modal_pkkmb' onClick=\"SetInput6('" . $row->id_seminar_ta . "','" . $row->nim . "','" . $row->nama . "','" . $row->judul . "','" . $row->st_pkkmb . "','" . $row->catatan_pkkmb . "','" . $row->tgl_pkkmb . "')\"> Kurang</a>";
                              } else {
                                echo " <a href ='#' class ='btn btn-sm btn-success btn-xs btn-block' data-toggle='modal' data-target='#modal_pkkmb' onClick=\"SetInput6('" . $row->id_seminar_ta . "','" . $row->nim . "','" . $row->nama . "','" . $row->judul . "','" . $row->st_pkkmb . "','" . $row->catatan_pkkmb . "','" . $row->tgl_pkkmb . "')\"> Lengkap</a>";
                              }
                              ?>
                          <?php if ($row->st_pkkmb == '0') {
                            echo " <h6>Belum diverifikasi</h6>";
                          } else {
                            echo "<h6>"  . $row->catatan_pkkmb . "</h6> ";
                          }
                          ?>
                          <h6><a href="<?php echo base_url('assets/berkas/sidang/' . $row->presentasi); ?>" download><i class="far fa-file-powerpoint"></i></a></h6>
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

  <div id="modal_berita_acara" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" style="width:55%;">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Verifikasi Persyaratan Berita Acara</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="<?= base_url('bks_sidang/verif_beritaacara') ?>" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
          <div class="card-body">
            <div class="form-group row">
              <input type="hidden" id="id_seminar_ta" name="id_seminar_ta">
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
                <input type="text" class="form-control" id="judul" name="judul" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label for="exampleInputjudul1" class="col-sm-3 col-form-label">Keterangan</label>
              <div class="col-sm-4">
                <select class="form-control" data-live-search="true" data-style="btn-white" id="st_berita_acara" name="st_berita_acara" required>
                  <option value="0">Belum</option>
                  <option value="1">Kurang</option>
                  <option value="2">Lengkap</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="persetujuan" class="col-sm-3 col-form-label">Catatan</label>
              <div class="col-sm-9">
                <textarea class="form-control" id="catatan_berita_acara" name="catatan_berita_acara"></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label for="persetujuan" class="col-sm-3 col-form-label">Tanggal Verifikasi</label>
              <div class="col-sm-9">
                <input type="date" name="tgl_berita_acara" id="tgl_berita_acara" class="form-control">
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" name="submit" class="btn btn-primary" style="float: right;">Simpan</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div id="modal_persetujuan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" style="width:55%;">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Verifikasi Persyaratan Persetujuan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="<?= base_url('bks_sidang/verif_persetujuan') ?>" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
          <div class="card-body">
            <div class="form-group row">
              <input type="hidden" id="id_seminar_ta" name="id_seminar_ta">
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
                <input type="text" class="form-control" id="judul2" name="judul" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label for="exampleInputjudul1" class="col-sm-3 col-form-label">Keterangan</label>
              <div class="col-sm-4">
                <select class="form-control" data-live-search="true" data-style="btn-white" id="st_persetujuan" name="st_persetujuan" required>
                  <option value="0">Belum</option>
                  <option value="1">Kurang</option>
                  <option value="2">Lengkap</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="persetujuan" class="col-sm-3 col-form-label">Catatan</label>
              <div class="col-sm-9">
                <textarea class="form-control" id="catatan_persetujuan" name="catatan_persetujuan"></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label for="persetujuan" class="col-sm-3 col-form-label">Tanggal Verifikasi</label>
              <div class="col-sm-9">
                <input type="date" name="tgl_persetujuan" id="tgl_persetujuan" class="form-control">
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" name="submit" class="btn btn-primary" style="float: right;">Simpan</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div id="modal_file_ta" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" style="width:55%;">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Verifikasi Persyaratan Persetujuan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="<?= base_url('bks_sidang/verif_fileta') ?>" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
          <div class="card-body">
            <div class="form-group row">
              <input type="hidden" id="id_seminar_ta" name="id_seminar_ta">
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
                <input type="text" class="form-control" id="judul3" name="judul" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label for="exampleInputjudul1" class="col-sm-3 col-form-label">Keterangan</label>
              <div class="col-sm-4">
                <select class="form-control" data-live-search="true" data-style="btn-white" id="st_file_ta" name="st_file_ta" required>
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
                <input type="date" name="tgl_file_ta" id="tgl_file_ta" class="form-control">
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" name="submit" class="btn btn-primary" style="float: right;">Simpan</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div id="modal_monitoring" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" style="width:55%;">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Verifikasi Persyaratan Monitoring</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="<?= base_url('bks_sidang/verif_monitoring') ?>" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
          <div class="card-body">
            <div class="form-group row">
              <input type="hidden" id="id_seminar_ta" name="id_seminar_ta">
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
                <input type="text" class="form-control" id="judul4" name="judul" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label for="exampleInputjudul1" class="col-sm-3 col-form-label">Keterangan</label>
              <div class="col-sm-4">
                <select class="form-control" data-live-search="true" data-style="btn-white" id="st_monitoring" name="st_monitoring" required>
                  <option value="0">Belum</option>
                  <option value="1">Kurang</option>
                  <option value="2">Lengkap</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="persetujuan" class="col-sm-3 col-form-label">Catatan</label>
              <div class="col-sm-9">
                <textarea class="form-control" id="catatan_monitoring" name="catatan_monitoring"></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label for="persetujuan" class="col-sm-3 col-form-label">Tanggal Verifikasi</label>
              <div class="col-sm-9">
                <input type="date" name="tgl_monitoring" id="tgl_monitoring" class="form-control">
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" name="submit" class="btn btn-primary" style="float: right;">Simpan</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div id="modal_presentasi" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" style="width:55%;">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Verifikasi Persyaratan Presentasi</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="<?= base_url('bks_sidang/verif_presentasi') ?>" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
          <div class="card-body">
            <div class="form-group row">
              <input type="hidden" id="id_seminar_ta" name="id_seminar_ta">
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
                <input type="text" class="form-control" id="judul5" name="judul" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label for="exampleInputjudul1" class="col-sm-3 col-form-label">Keterangan</label>
              <div class="col-sm-4">
                <select class="form-control" data-live-search="true" data-style="btn-white" onclick="choose()" id="st_presentasi" name="st_presentasi" required>
                  <option value="0">Belum</option>
                  <option value="1">kurang</option>
                  <option value="2">Lengkap</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="persetujuan" class="col-sm-3 col-form-label">Catatan</label>
              <div class="col-sm-9">
                <textarea class="form-control" id="catatan_presentasi" name="catatan_presentasi"></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label for="persetujuan" class="col-sm-3 col-form-label">Tanggal Verifikasi</label>
              <div class="col-sm-9">
                <input type="date" id="tgl_presentasi" nama="tgl_presentasi" class="form-control">
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" name="submit" class="btn btn-primary" style="float: right;">Simpan</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div id="modal_pkkmb" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" style="width:55%;">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Verifikasi Persyaratan Presentasi</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="<?= base_url('bks_sidang/verif_pkkmb') ?>" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
          <div class="card-body">
            <div class="form-group row">
              <input type="hidden" id="id_seminar_ta" name="id_seminar_ta">
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
                <input type="text" class="form-control" id="judul6" name="judul" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label for="exampleInputjudul1" class="col-sm-3 col-form-label">Keterangan</label>
              <div class="col-sm-4">
                <select class="form-control" data-live-search="true" data-style="btn-white" onclick="choose()" id="st_pkkmb" name="st_pkkmb" required>
                  <option value="0">Belum</option>
                  <option value="1">kurang</option>
                  <option value="2">Lengkap</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="persetujuan" class="col-sm-3 col-form-label">Catatan</label>
              <div class="col-sm-9">
                <textarea class="form-control" id="catatan_pkkmb" name="catatan_pkkmb"></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label for="persetujuan" class="col-sm-3 col-form-label">Tanggal Verifikasi</label>
              <div class="col-sm-9">
                <input type="date" id="tgl_pkkmb" nama="tgl_pkkmb" class="form-control">
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" name="submit" class="btn btn-primary" style="float: right;">Simpan</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>


  <script type="text/javascript">
    function SetInput(id_seminar_ta, nim, nama, judul, st_berita_acara, catatan_berita_acara, tgl_berita_acara) {
      document.getElementById('id_seminar_ta').value = id_seminar_ta;
      document.getElementById('nim').value = nim;
      document.getElementById('nama').value = nama;
      document.getElementById('judul').value = judul;
      document.getElementById('st_berita_acara').value = st_berita_acara;
      document.getElementById('catatan_berita_acara').value = catatan_berita_acara;
      document.getElementById('tgl_berita_acara').value = tgl_berita_acara;
    }

    function SetInput2(id_seminar_ta, nim, nama, judul, st_persetujuan, catatan_persetujuan, tgl_persetujuan) {
      document.getElementById('id_seminar_ta').value = id_seminar_ta;
      document.getElementById('nim2').value = nim;
      document.getElementById('nama2').value = nama;
      document.getElementById('judul2').value = judul;
      document.getElementById('st_persetujuan').value = st_persetujuan;
      document.getElementById('catatan_persetujuan').value = catatan_persetujuan;
      document.getElementById('tgl_persetujuan').value = tgl_persetujuan;
    }

    function SetInput3(id_seminar_ta, nim, nama, judul, st_proposal, catatan_proposal, tgl_proposal) {
      document.getElementById('id_seminar_ta').value = id_seminar_ta;
      document.getElementById('nim3').value = nim;
      document.getElementById('nama3').value = nama;
      document.getElementById('judul3').value = judul;
      document.getElementById('st_proposal').value = st_proposal;
      document.getElementById('catatan_proposal').value = catatan_proposal;
      document.getElementById('tgl_proposal').value = tgl_proposal;
    }

    function SetInput4(id_seminar_ta, nim, nama, judul, st_monitoring, catatan_monitoring, tgl_monitoring) {
      document.getElementById('id_seminar_ta').value = id_seminar_ta;
      document.getElementById('nim4').value = nim;
      document.getElementById('nama4').value = nama;
      document.getElementById('judul4').value = judul;
      document.getElementById('st_monitoring').value = st_monitoring;
      document.getElementById('catatan_monitoring').value = catatan_monitoring;
      document.getElementById('tgl_monitoring').value = tgl_monitoring;
    }

    function SetInput5(id_seminar_ta, nim, nama, judul, st_presentasi, catatan_presentasi, tgl_presentasi) {
      document.getElementById('id_seminar_ta').value = id_seminar_ta;
      document.getElementById('nim5').value = nim;
      document.getElementById('nama5').value = nama;
      document.getElementById('judul5').value = judul;
      document.getElementById('st_presentasi').value = st_presentasi;
      document.getElementById('catatan_presentasi').value = catatan_presentasi;
      document.getElementById('tgl_presentasi').value = tgl_presentasi;
    }

    function SetInput6(id_seminar_ta, nim, nama, judul, st_pkkmb, catatan_pkkmb, tgl_pkkmb) {
      document.getElementById('id_seminar_ta').value = id_seminar_ta;
      document.getElementById('nim6').value = nim;
      document.getElementById('nama6').value = nama;
      document.getElementById('judul6').value = judul;
      document.getElementById('st_pkkmb').value = st_pkkmb;
      document.getElementById('catatan_pkkmb').value = catatan_pkkmb;
      document.getElementById('tgl_pkkmb').value = tgl_pkkmb;
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
            <h1>Data Berkas Sidang Tugas Akhir</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('beranda'); ?>">Beranda</a></li>
              <li class="breadcrumb-item active">Data Berkas Sidang</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- <div style="text-align:right;margin-bottom: 10px ">
              <a href="#" class="on-default edit-row btn btn-success pull-right" data-toggle="modal" pull="right" data-target="#custom-width-modal" onclick="ResetInput()"><i class="fa fa-plus"></i> Tambah Berkas</a>
            </div> -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Berkas Sidang Tugas Akhir</h3>
              </div>
              <div class="card-body">
                <div id="flash" data-flash="<?= $this->session->flashdata('pesan'); ?>">
                  <!-- <table id="example1" class="table table-bordered table-striped">
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
                      foreach ($bks_sidang_user->result() as $row) { ?>
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
                            <a href="<?php echo base_url('bks_sidang/delete_berkas/' . $row->id_seminar_ta) ?>" id="btn-hapus" data-toggle="tooltip" data-placement="bottom" title="Hapus Mahasiswa" class="btn btn-sm btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>
                            <a href="<?= base_url('bks_sidang/detail_bks_sidang/' . $row->id_seminar_ta) ?>" class="on-default edit-row btn btn-info pull-right btn-xs"><i class="fa fa-search"></i> Detail </a>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table> -->
                  <form action="" method="post" class="form-horizontal" role="form">
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
                          <td>Berita Acara</td>
                          <td>
                            <a href="#" class="btn btn-info" data-toggle="modal" pull="right" data-target="#file_ba" onclick="ResetInput()"><i class="fa fa-file"></i> Unggah</a>
                          </td>
                          <td>
                            <?php
                            if ($bks_sidang == "") {
                              echo "";
                            } else {
                              echo "$bks_sidang->berita_acara";
                            }
                            ?>
                          </td>
                          <td align="center">
                            <?php
                            if ($bks_sidang == "") {
                              echo "";
                            } else {
                              if ($row->st_berita_acara == '0') {
                                echo '<span class="badge badge-warning">Belum Diverifikasi</span>';
                              } else if ($row->st_berita_acara == '1') {
                                echo '<span class="badge badge-info">Kurang Lengkap</span>';
                              } else if ($row->st_berita_acara == '2') {
                                echo '<span class="badge badge-success">Lengkap</span>';
                              }
                            }
                            ?>
                          </td>
                        </tr>
                        <tr>
                          <td>2.</td>
                          <td>Persetujuan</td>
                          <td>
                            <a href="#" class="btn btn-info" data-toggle="modal" pull="right" data-target="#file_persetujuan" onclick="ResetInput()"><i class="fa fa-file"></i> Unggah</a>
                          </td>
                          <td><?php
                              if ($bks_sidang == "") {
                                echo "";
                              } else {
                                echo "$bks_sidang->persetujuan";
                              }
                              ?></td>
                          <td align="center">
                            <?php
                            if ($bks_sidang == "") {
                              echo "";
                            } else {
                              if ($row->st_persetujuan == '0') {
                                echo '<span class="badge badge-warning">Belum Diverifikasi</span>';
                              } else if ($row->st_persetujuan == '1') {
                                echo '<span class="badge badge-info">Kurang Lengkap</span>';
                              } else if ($row->st_persetujuan == '2') {
                                echo '<span class="badge badge-success">Lengkap</span>';
                              }
                            }

                            ?>
                          </td>
                        </tr>

                        <tr>
                          <td>3.</td>
                          <td>File TA</td>
                          <td>
                            <a href="#" class="btn btn-info" data-toggle="modal" pull="right" data-target="#file_ta" onclick="ResetInput()"><i class="fa fa-file"></i> Unggah</a>
                          </td>
                          <td><?php
                              if ($bks_sidang == "") {
                                echo "";
                              } else {
                                echo "$bks_sidang->file_ta";
                              }
                              ?></td>
                          <td align="center">
                            <?php
                            if ($bks_sidang == "") {
                              echo "";
                            } else {
                              if ($row->st_file_ta == '0') {
                                echo '<span class="badge badge-warning">Belum Diverifikasi</span>';
                              } else if ($row->st_file_ta == '1') {
                                echo '<span class="badge badge-info">Kurang Lengkap</span>';
                              } else if ($row->st_file_ta == '2') {
                                echo '<span class="badge badge-success">Lengkap</span>';
                              }
                            }
                            ?>
                          </td>
                        </tr>
                        <tr>
                          <td>4.</td>
                          <td>Presentasi</td>
                          <td>
                            <a href="#" class="btn btn-info" data-toggle="modal" pull="right" data-target="#file_presentasi" onclick="ResetInput()"><i class="fa fa-file"></i> Unggah</a>
                          </td>
                          <td><?php
                              if ($bks_sidang == "") {
                                echo "";
                              } else {
                                echo "$bks_sidang->presentasi";
                              }
                              ?></td>
                          <td align="center">
                            <?php
                            if ($bks_sidang == "") {
                              echo "";
                            } else {
                              if ($row->st_presentasi == '0') {
                                echo '<span class="badge badge-warning">Belum Diverifikasi</span>';
                              } else if ($row->st_presentasi == '1') {
                                echo '<span class="badge badge-info">Kurang Lengkap</span>';
                              } else if ($row->st_presentasi == '2') {
                                echo '<span class="badge badge-success">Lengkap</span>';
                              }
                            }
                            ?>
                          </td>
                        </tr>
                        <tr>
                          <td>5.</td>
                          <td>Monitoring</td>
                          <td>
                            <a href="#" class="btn btn-info" data-toggle="modal" pull="right" data-target="#file_monitoring" onclick="ResetInput()"><i class="fa fa-file"></i> Unggah</a>
                          </td>
                          <td><?php
                              if ($bks_sidang == "") {
                                echo "";
                              } else {
                                echo "$bks_sidang->monitoring";
                              }
                              ?></td>
                          <td align="center">
                            <?php
                            if ($bks_sidang == "") {
                              echo "";
                            } else {
                              if ($row->st_monitoring == '0') {
                                echo '<span class="badge badge-warning">Belum Diverifikasi</span>';
                              } else if ($row->st_monitoring == '1') {
                                echo '<span class="badge badge-info">Kurang Lengkap</span>';
                              } else if ($row->st_monitoring == '2') {
                                echo '<span class="badge badge-success">Lengkap</span>';
                              }
                            }
                            ?>

                          </td>
                        </tr>
                        <tr>
                          <td>6.</td>
                          <td>PKKMB</td>
                          <td>
                            <a href="#" class="btn btn-info" data-toggle="modal" pull="right" data-target="#file_pkkmb" onclick="ResetInput()"><i class="fa fa-file"></i> Unggah</a>
                          </td>
                          <td><?php
                              if ($bks_sidang == "") {
                                echo "";
                              } else {
                                echo "$bks_sidang->pkkmb";
                              }
                              ?></td>
                          <td align="center">
                            <?php
                            if ($bks_sidang == "") {
                              echo "";
                            } else {
                              if ($row->st_pkkmb == '0') {
                                echo '<span class="badge badge-warning">Belum Diverifikasi</span>';
                              } else if ($row->st_pkkmb == '1') {
                                echo '<span class="badge badge-info">Kurang Lengkap</span>';
                              } else  if ($row->st_pkkmb == '2') {
                                echo '<span class="badge badge-success">Lengkap</span>';
                              }
                            }
                            ?>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </form>
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
          <h4 class="modal-title">Berkas Pendaftaran Sidang</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="<?= base_url('bks_sidang/upload_beritaacara') ?>" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
          <div class="card-body">
            <div class="form-group">
              <input type="hidden" id="id_seminar_ta" name="id_seminar_ta">
              <input type="hidden" value="<?php echo $this->session->userdata('email'); ?>" class="form-control" id="nim" name="nim" placeholder="NIM">
              <input type="hidden" value="<?php echo $this->session->userdata('email'); ?>" class="form-control" id="nim2" name="nim2" readonly placeholder="NIM">
            </div>
            <div class="form-group">
              <label for="berita_acara">File Berita Acara</label><br>
              <input type="file" name="berita_acara" required>
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" name="submit" class="btn btn-primary" style="float: right;">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div id="file_persetujuan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" style="width:55%;">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Berkas Pendaftaran Sidang</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="<?= base_url('bks_sidang/upload_persetujuan') ?>" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
          <div class="card-body">
            <div class="form-group">
              <input type="hidden" id="id_seminar_ta" name="id_seminar_ta">
              <input type="hidden" value="<?php echo $this->session->userdata('email'); ?>" class="form-control" id="nim" name="nim" placeholder="NIM">
              <input type="hidden" value="<?php echo $this->session->userdata('email'); ?>" class="form-control" id="nim2" name="nim2" readonly placeholder="NIM">
            </div>
            <div class="form-group">
              <label for="berita_acara">File Persetujuan</label><br>
              <input type="file" name="persetujuan" required>
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" name="submit" class="btn btn-primary" style="float: right;">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div id="file_ta" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" style="width:55%;">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Berkas Pendaftaran Sidang</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="<?= base_url('bks_sidang/upload_file_ta') ?>" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
          <div class="card-body">
            <div class="form-group">
              <input type="hidden" id="id_seminar_ta" name="id_seminar_ta">
              <input type="hidden" value="<?php echo $this->session->userdata('email'); ?>" class="form-control" id="nim" name="nim" placeholder="NIM">
              <input type="hidden" value="<?php echo $this->session->userdata('email'); ?>" class="form-control" id="nim2" name="nim2" readonly placeholder="NIM">
            </div>
            <div class="form-group">
              <label for="berita_acara">File TA</label><br>
              <input type="file" name="file_ta" required>
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" name="submit" class="btn btn-primary " style="float: right;">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div id="file_presentasi" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" style="width:55%;">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Berkas Pendaftaran Sidang</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="<?= base_url('bks_sidang/upload_presentasi') ?>" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
          <div class="card-body">
            <div class="form-group">
              <input type="hidden" id="id_seminar_ta" name="id_seminar_ta">
              <input type="hidden" value="<?php echo $this->session->userdata('email'); ?>" class="form-control" id="nim" name="nim" placeholder="NIM">
              <input type="hidden" value="<?php echo $this->session->userdata('email'); ?>" class="form-control" id="nim2" name="nim2" readonly placeholder="NIM">
            </div>
            <div class="form-group">
              <label for="berita_acara">File Presentasi</label><br>
              <input type="file" name="presentasi" required>
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" name="submit" class="btn btn-primary" style="float: right;">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div id="file_monitoring" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" style="width:55%;">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Berkas Pendaftaran Sidang</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="<?= base_url('bks_sidang/upload_monitoring') ?>" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
          <div class="card-body">
            <div class="form-group">
              <input type="hidden" id="id_seminar_ta" name="id_seminar_ta">
              <input type="hidden" value="<?php echo $this->session->userdata('email'); ?>" class="form-control" id="nim" name="nim" placeholder="NIM">
              <input type="hidden" value="<?php echo $this->session->userdata('email'); ?>" class="form-control" id="nim2" name="nim2" readonly placeholder="NIM">
            </div>
            <div class="form-group">
              <label for="berita_acara">File Monitoring</label><br>
              <input type="file" name="monitoring" required>
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" name="submit" class="btn btn-primary" style="float: right;">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div id="file_pkkmb" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" style="width:55%;">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Berkas Pendaftaran Sidang</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="<?= base_url('bks_sidang/upload_pkkmb') ?>" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
          <div class="card-body">
            <div class="form-group">
              <input type="hidden" id="id_seminar_ta" name="id_seminar_ta">
              <input type="hidden" value="<?php echo $this->session->userdata('email'); ?>" class="form-control" id="nim" name="nim" placeholder="NIM">
              <input type="hidden" value="<?php echo $this->session->userdata('email'); ?>" class="form-control" id="nim2" name="nim2" readonly placeholder="NIM">
            </div>
            <div class="form-group">
              <label for="berita_acara">File PKKMB</label><br>
              <input type="file" name="pkkmb" required>
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
          <h4 class="modal-title">Berkas Sidang Tugas Akhir</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="<?= base_url('bks_sidang/create') ?>" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
          <div class="card-body">
            <div class="form-group">
              <input type="hidden" id="id_seminar_ta" name="id_seminar_ta">

              <label for="exampleInputjudul1">NIM</label>
              <input type="hidden" class="form-control" id="nim" name="nim" placeholder="NIM">
              <input type="text" class="form-control" id="nim2" name="nim2" readonly placeholder="NIM">
            </div>
            <div class="form-group">
              <label for="proposal">Judul dan Link Video Demo</label><br>
              <input type="text" class="form-control" id="link" name="link" placeholder="Link Video">
            </div>
            <div class="form-group">
              <label for="proposal">Berita Acara</label>
              <span>
                <h6>Upload dalam format doc.</h6>
              </span>
              <input type="file" name="berita_acara" required>
            </div>
            <div class="form-group">
              <label for="exampleInputjudul1">Persetujuan</label>
              <span>
                <h6>Upload dalam format doc.</h6>
              </span>
              <input type="file" name="persetujuan" required>
            </div>
            <div class="form-group">
              <label for="pkkmb">Sertifikat PKKMB</label>
              <span>
                <h6>Upload dalam format pdf.</h6>
              </span>
              <input type="file" name="pkkmb" required>
            </div>
            <div class="form-group">
              <label for="proposal">Berkas Tugas Akhir</label>
              <span>
                <h6>Upload dalam format pdf.</h6>
              </span>
              <input type="file" name="file_ta" required>
            </div>
            <div class="form-group">
              <label for="proposal">Presentasi</label><br>
              <span>
                <h6>Upload dalam format ppt.</h6>
              </span>
              <input type="file" name="presentasi" required>
            </div>
            <div class="form-group">
              <label for="exampleInputjudul1">Monitoring</label><br>
              <input type="file" name="monitoring" required>
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    function ResetInput(id_seminar_ta, nim, proposal, pkkmb, pengesahan, monitoring) {
      document.getElementById('id_seminar_ta').value = "";
      document.getElementById('nim').value = <?php echo $this->session->userdata('email'); ?>;
      document.getElementById('nim2').value = <?php echo $this->session->userdata('email'); ?>;
      document.getElementById('link').value = "";
      document.getElementById('proposal').value = "";
      document.getElementById('pkkmb').value = "";
      document.getElementById('pengesahan').value = "";
      document.getElementById('monitoring').value = "";
      document.getElementById('persetujuan').value = "";

    }
  </script>
<?php } ?>