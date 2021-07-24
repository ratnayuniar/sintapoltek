<!-- USER ADMIN -->
<?php if ($this->session->userdata('level') == 1) { ?>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Berkas Seminar Proposal</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('beranda'); ?>">Beranda</a></li>
              <li class="breadcrumb-item active"> Data Berkas Seminar Proposal</li>
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
                      <th>Proposal</th>
                      <th>Monitoring</th>
                      <th>Presentasi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    $id_prodi = $this->session->userdata('id_prodi');
                    foreach ($this->m_bks_seminar->bks_seminar_admin($id_prodi)->result() as $row) { ?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row->nim ?></td>
                        <td><?= $row->nama ?></td>
                        <td><?php if ($row->st_beritaacara == '0') {
                              echo " <a href ='#' class ='btn btn-sm btn-warning btn-xs btn-block' data-toggle='modal' data-target='#modal_berita_acara' onClick=\"SetInput('" . $row->id_seminar_proposal . "','" . $row->nim . "','" . $row->nama . "','" . $row->judul . "','" . $row->st_beritaacara . "','" . $row->catatan_beritaacara . "','" . $row->tgl_beritaacara . "')\"> Belum</a>";
                            } else if ($row->st_beritaacara == '1') {
                              echo " <a href ='#' class ='btn btn-sm btn-info btn-xs btn-block' data-toggle='modal' data-target='#modal_berita_acara' onClick=\"SetInput('" . $row->id_seminar_proposal . "','" . $row->nim . "','" . $row->nama . "','" . $row->judul . "','" . $row->st_beritaacara . "','" . $row->catatan_beritaacara . "','" . $row->tgl_beritaacara . "')\"> Kurang</a>";
                            } else  if ($row->st_beritaacara == '2') {
                              echo " <a href ='#' class ='btn btn-sm btn-success btn-xs btn-block' data-toggle='modal' data-target='#modal_berita_acara' onClick=\"SetInput('" . $row->id_seminar_proposal . "','" . $row->nim . "','" . $row->nama . "','" . $row->judul . "','" . $row->st_beritaacara . "','" . $row->catatan_beritaacara . "','" . $row->tgl_beritaacara . "')\"> Lengkap</a>";
                            } else {
                              echo "";
                            }
                            ?>
                          <?php if ($row->st_beritaacara == '0') {
                            echo " <h6>Belum diverifikasi</h6>";
                          } else {
                            echo "<h6>" . $row->catatan_beritaacara . "</h6> ";
                          }
                          ?>
                          <?php if ($row->berita_acara != NULL) {
                            echo "  <h6><a href='" . base_url('assets/berkas/seminar/' . $row->berita_acara) . "' download><i class='far fa-file-word'></i></i></a></h6>";
                          } else {
                            echo " ";
                          }
                          ?>
                        </td>
                        <td> <?php if ($row->st_persetujuan == '0') {
                                echo " <a href ='#' class ='btn btn-sm btn-warning btn-xs btn-block' data-toggle='modal' data-target='#modal_persetujuan' onClick=\"SetInput2('" . $row->id_seminar_proposal . "','" . $row->nim . "','" . $row->nama . "','" . $row->judul . "','" . $row->st_persetujuan . "','" . $row->catatan_persetujuan . "','" . $row->tgl_persetujuan . "')\"> Belum</a>";
                              } else if ($row->st_persetujuan == '1') {
                                echo " <a href ='#' class ='btn btn-sm btn-info btn-xs btn-block' data-toggle='modal' data-target='#modal_persetujuan' onClick=\"SetInput2('" . $row->id_seminar_proposal . "','" . $row->nim . "','" . $row->nama . "','" . $row->judul . "','" . $row->st_persetujuan . "','" . $row->catatan_persetujuan . "','" . $row->tgl_persetujuan . "')\"> Kurang</a>";
                              } else if ($row->st_persetujuan == '2') {
                                echo " <a href ='#' class ='btn btn-sm btn-success btn-xs btn-block' data-toggle='modal' data-target='#modal_persetujuan' onClick=\"SetInput2('" . $row->id_seminar_proposal . "','" . $row->nim . "','" . $row->nama . "','" . $row->judul . "','" . $row->st_persetujuan . "','" . $row->catatan_persetujuan . "','" . $row->tgl_persetujuan . "')\"> Lengkap</a>";
                              } else {
                                echo "";
                              }
                              ?>
                          <?php if ($row->st_persetujuan == '0') {
                            echo " <h6>Belum diverifikasi</h6>";
                          } else {
                            echo "<h6>"  . $row->catatan_persetujuan . "</h6> ";
                          }
                          ?>
                          <?php if ($row->persetujuan != NULL) {
                            echo "  <h6><a href='" . base_url('assets/berkas/seminar/' . $row->persetujuan) . "' download><i class='far fa-file-word'></i></i></a></h6>";
                          } else {
                            echo " ";
                          }
                          ?>
                        </td>
                        <td> <?php if ($row->st_proposal == '0') {
                                echo " <a href ='#' class ='btn btn-sm btn-warning btn-xs btn-block' data-toggle='modal' data-target='#modal_proposal' onClick=\"SetInput3('" . $row->id_seminar_proposal . "','" . $row->nim . "','" . $row->nama . "','" . $row->judul . "','" . $row->st_proposal . "','" . $row->catatan_proposal . "','" . $row->tgl_proposal . "')\"> Belum</a>";
                              } else if ($row->st_proposal == '1') {
                                echo " <a href ='#' class ='btn btn-sm btn-info btn-xs btn-block' data-toggle='modal' data-target='#modal_proposal' onClick=\"SetInput3('" . $row->id_seminar_proposal . "','" . $row->nim . "','" . $row->nama . "','" . $row->judul . "','" . $row->st_proposal . "','" . $row->catatan_proposal . "','" . $row->tgl_proposal . "')\"> Kurang</a>";
                              } else if ($row->st_proposal == '2') {
                                echo " <a href ='#' class ='btn btn-sm btn-success btn-xs btn-block' data-toggle='modal' data-target='#modal_proposal' onClick=\"SetInput3('" . $row->id_seminar_proposal . "','" . $row->nim . "','" . $row->nama . "','" . $row->judul . "','" . $row->st_proposal . "','" . $row->catatan_proposal . "','" . $row->tgl_proposal . "')\"> Lengkap</a>";
                              } else {
                                echo "";
                              }
                              ?>
                          <?php if ($row->st_proposal == '0') {
                            echo " <h6>Belum diverifikasi</h6>";
                          } else {
                            echo "<h6>"  . $row->catatan_proposal . "</h6> ";
                          }
                          ?>
                          <?php if ($row->proposal != NULL) {
                            echo "  <h6><a href='" . base_url('assets/berkas/seminar/' . $row->proposal) . "' download><i class='far fa-file-pdf'></i></i></a></h6>";
                          } else {
                            echo " ";
                          }
                          ?>
                        </td>
                        <td> <?php if ($row->st_monitoring == '0') {
                                echo " <a href ='#' class ='btn btn-sm btn-warning btn-xs btn-block' data-toggle='modal' data-target='#modal_monitoring' onClick=\"SetInput4('" . $row->id_seminar_proposal . "','" . $row->nim . "','" . $row->nama . "','" . $row->judul . "','" . $row->st_monitoring . "','" . $row->catatan_monitoring . "','" . $row->tgl_monitoring . "')\"> Belum</a>";
                              } else if ($row->st_monitoring == '1') {
                                echo " <a href ='#' class ='btn btn-sm btn-info btn-xs btn-block' data-toggle='modal' data-target='#modal_monitoring' onClick=\"SetInput4('" . $row->id_seminar_proposal . "','" . $row->nim . "','" . $row->nama . "','" . $row->judul . "','" . $row->st_monitoring . "','" . $row->catatan_monitoring . "','" . $row->tgl_monitoring . "')\"> Kurang</a>";
                              } else if ($row->st_monitoring == '2') {
                                echo " <a href ='#' class ='btn btn-sm btn-success btn-xs btn-block' data-toggle='modal' data-target='#modal_monitoring' onClick=\"SetInput4('" . $row->id_seminar_proposal . "','" . $row->nim . "','" . $row->nama . "','" . $row->judul . "','" . $row->st_monitoring . "','" . $row->catatan_monitoring . "','" . $row->tgl_monitoring . "')\"> Lengkap</a>";
                              }
                              ?>
                          <?php if ($row->st_monitoring == '0') {
                            echo " <h6>Belum diverifikasi</h6>";
                          } else {
                            echo "<h6>"  . $row->catatan_monitoring . "</h6> ";
                          }
                          ?>
                          <?php if ($row->monitoring != NULL) {
                            echo "  <h6><a href='" . base_url('assets/berkas/seminar/' . $row->monitoring) . "' download><i class='far fa-file-pdf'></i></i></a></h6>";
                          } else {
                            echo " ";
                          }
                          ?>
                        </td>
                        <td> <?php if ($row->st_presentasi == '0') {
                                echo " <a href ='#' class ='btn btn-sm btn-warning btn-xs btn-block' data-toggle='modal' data-target='#modal_presentasi' onClick=\"SetInput5('" . $row->id_seminar_proposal . "','" . $row->nim . "','" . $row->nama . "','" . $row->judul . "','" . $row->st_presentasi . "','" . $row->catatan_presentasi . "','" . $row->tgl_presentasi . "')\"> Belum</a>";
                              } else if ($row->st_presentasi == '1') {
                                echo " <a href ='#' class ='btn btn-sm btn-info btn-xs btn-block' data-toggle='modal' data-target='#modal_presentasi' onClick=\"SetInput5('" . $row->id_seminar_proposal . "','" . $row->nim . "','" . $row->nama . "','" . $row->judul . "','" . $row->st_presentasi . "','" . $row->catatan_presentasi . "','" . $row->tgl_presentasi . "')\"> Kurang</a>";
                              } else if ($row->st_presentasi == '2') {
                                echo " <a href ='#' class ='btn btn-sm btn-success btn-xs btn-block' data-toggle='modal' data-target='#modal_presentasi' onClick=\"SetInput5('" . $row->id_seminar_proposal . "','" . $row->nim . "','" . $row->nama . "','" . $row->judul . "','" . $row->st_presentasi . "','" . $row->catatan_presentasi . "','" . $row->tgl_presentasi . "')\"> Lengkap</a>";
                              } else {
                                echo "";
                              }
                              ?>
                          <?php if ($row->st_presentasi == '0') {
                            echo " <h6>Belum diverifikasi</h6>";
                          } else {
                            echo "<h6>"  . $row->catatan_presentasi . "</h6> ";
                          }
                          ?>
                          <?php if ($row->presentasi != NULL) {
                            echo "  <h6><a href='" . base_url('assets/berkas/seminar/' . $row->presentasi) . "' download><i class='far fa-file-powerpoint'></i></i></a></h6>";
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

  <div id="modal_berita_acara" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" style="width:55%;">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Verifikasi Persyaratan Berita Acara</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="<?= base_url('bks_seminar/verif_fileta') ?>" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
          <div class="card-body">
            <div class="form-group row">
              <input type="hidden" id="id_seminar_proposal" name="id_seminar_proposal">
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
                <select class="form-control" data-live-search="true" data-style="btn-white" id="st_beritaacara" name="st_beritaacara" required>
                  <option value="0">Belum</option>
                  <option value="1">Kurang</option>
                  <option value="2">Lengkap</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="persetujuan" class="col-sm-3 col-form-label">Catatan</label>
              <div class="col-sm-9">
                <textarea class="form-control" id="catatan_beritaacara" name="catatan_beritaacara"></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label for="persetujuan" class="col-sm-3 col-form-label">Tanggal Verifikasi</label>
              <div class="col-sm-9">
                <input class="form-control" type="date" name="tgl_beritaacara" placeholder="Tanggal" id="tgl_beritaacara" value="<?= date('d - m - Y') ?>" class="form-control" />
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
        <form action="<?= base_url('bks_seminar/verif_persetujuan') ?>" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
          <div class="card-body">
            <div class="form-group row">
              <input type="hidden" id="id_seminar_proposal" name="id_seminar_proposal">
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
  <div id="modal_proposal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" style="width:55%;">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Verifikasi Persyaratan Persetujuan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="<?= base_url('bks_seminar/verif_proposal') ?>" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
          <div class="card-body">
            <div class="form-group row">
              <input type="hidden" id="id_seminar_proposal" name="id_seminar_proposal">
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
                <select class="form-control" data-live-search="true" data-style="btn-white" id="st_proposal" name="st_proposal" required>
                  <option value="0">Belum</option>
                  <option value="1">Kurang</option>
                  <option value="2">Lengkap</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="persetujuan" class="col-sm-3 col-form-label">Catatan</label>
              <div class="col-sm-9">
                <textarea class="form-control" id="catatan_proposal" name="catatan_proposal"></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label for="persetujuan" class="col-sm-3 col-form-label">Tanggal Verifikasi</label>
              <div class="col-sm-9">
                <input type="date" name="tgl_proposal" id="tgl_proposal" class="form-control">
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
        <form action="<?= base_url('bks_seminar/verif_monitoring') ?>" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
          <div class="card-body">
            <div class="form-group row">
              <input type="hidden" id="id_seminar_proposal" name="id_seminar_proposal">
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
        <form action="<?= base_url('bks_seminar/verif_presentasi') ?>" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
          <div class="card-body">
            <div class="form-group row">
              <input type="hidden" id="id_seminar_proposal" name="id_seminar_proposal">
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

  <script type="text/javascript">
    var date = new Date();
    var day = date.getDate();
    var month = date.getMonth() + 1;
    var year = date.getFullYear();
    if (month < 10) month = "0" + month;
    if (day < 10) day = "0" + day;
    var today = year + "-" + month + "-" + day;


    function SetInput(id_seminar_proposal, nim, nama, judul, st_beritaacara, catatan_beritaacara, tgl_beritaacara) {
      document.getElementById('id_seminar_proposal').value = id_seminar_proposal;
      document.getElementById('nim').value = nim;
      document.getElementById('nama').value = nama;
      document.getElementById('judul').value = judul;
      document.getElementById('st_beritaacara').value = st_beritaacara;
      document.getElementById('catatan_beritaacara').value = catatan_beritaacara;
      document.getElementById('tgl_beritaacara').value = today;
    }

    function SetInput2(id_seminar_proposal, nim, nama, judul, st_persetujuan, catatan_persetujuan, tgl_persetujuan) {
      document.getElementById('id_seminar_proposal').value = id_seminar_proposal;
      document.getElementById('nim2').value = nim;
      document.getElementById('nama2').value = nama;
      document.getElementById('judul2').value = judul;
      document.getElementById('st_persetujuan').value = st_persetujuan;
      document.getElementById('catatan_persetujuan').value = catatan_persetujuan;
      document.getElementById('tgl_persetujuan').value = today;
    }

    function SetInput3(id_seminar_proposal, nim, nama, judul, st_proposal, catatan_proposal, tgl_proposal) {
      document.getElementById('id_seminar_proposal').value = id_seminar_proposal;
      document.getElementById('nim3').value = nim;
      document.getElementById('nama3').value = nama;
      document.getElementById('judul3').value = judul;
      document.getElementById('st_proposal').value = st_proposal;
      document.getElementById('catatan_proposal').value = catatan_proposal;
      document.getElementById('tgl_proposal').value = today;
    }

    function SetInput4(id_seminar_proposal, nim, nama, judul, st_monitoring, catatan_monitoring, tgl_monitoring) {
      document.getElementById('id_seminar_proposal').value = id_seminar_proposal;
      document.getElementById('nim4').value = nim;
      document.getElementById('nama4').value = nama;
      document.getElementById('judul4').value = judul;
      document.getElementById('st_monitoring').value = st_monitoring;
      document.getElementById('catatan_monitoring').value = catatan_monitoring;
      document.getElementById('tgl_monitoring').value = today;
    }

    function SetInput5(id_seminar_proposal, nim, nama, judul, st_presentasi, catatan_presentasi, tgl_presentasi) {
      document.getElementById('id_seminar_proposal').value = id_seminar_proposal;
      document.getElementById('nim5').value = nim;
      document.getElementById('nama5').value = nama;
      document.getElementById('judul5').value = judul;
      document.getElementById('st_presentasi').value = st_presentasi;
      document.getElementById('catatan_presentasi').value = catatan_presentasi;
      document.getElementById('tgl_presentasi').value = today;
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
            <h1>Data Berkas Seminar Proposal</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('beranda'); ?>">Beranda</a></li>
              <li class="breadcrumb-item active">Data Berkas Seminar Proposal</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <?php $cek = $this->db->get_where('persetujuan', array('nim' => $this->session->userdata('email'), 'jenis' => 'proposal')) ?>
            <?php if ($cek->num_rows() < 2) { ?>
              <div class="row">
                <div class="col-12">
                  <div class="card card-danger">
                    <div class="card-header">
                      <h3 class="card-title"><i class="fas fa-exclamation-triangle"></i> Pemberitahuan</h3>
                    </div>
                    <div class="card-body">
                      Anda belum berhak melakukan registrasi seminar proposal
                    </div>
                  </div>
                </div>
              </div>
            <?php } else { ?>
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Data Berkas Seminar Proposal</h3>
                </div>
                <div class="card-body">
                  <div id="flash" data-flash="<?= $this->session->flashdata('pesan'); ?>">
                    <div id="gagal" data-flash="<?= $this->session->flashdata('gagal'); ?>">
                    </div>
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
                              if ($bks_seminar == "") {
                                echo "";
                              } else {
                                echo "$bks_seminar->berita_acara";
                              }
                              ?>
                            </td>
                            <td align="center">
                              <?php
                              if ($bks_seminar == "") {
                                echo "";
                              } else {
                                if ($bks_seminar->st_beritaacara == '0') {
                                  echo '<span class="badge badge-warning">Belum Diverifikasi</span>';
                                } else if ($bks_seminar->st_beritaacara == '1') {
                                  echo '<span class="badge badge-info">Kurang Lengkap</span>';
                                } else if ($bks_seminar->st_beritaacara == '2') {
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
                                if ($bks_seminar == "") {
                                  echo "";
                                } else {
                                  echo "$bks_seminar->persetujuan";
                                }
                                ?></td>
                            <td align="center">
                              <?php
                              if ($bks_seminar == "") {
                                echo "";
                              } else {
                                if ($bks_seminar->st_persetujuan == '0') {
                                  echo '<span class="badge badge-warning">Belum Diverifikasi</span>';
                                } else if ($bks_seminar->st_persetujuan == '1') {
                                  echo '<span class="badge badge-info">Kurang Lengkap</span>';
                                } else if ($bks_seminar->st_persetujuan == '2') {
                                  echo '<span class="badge badge-success">Lengkap</span>';
                                }
                              }

                              ?>
                            </td>
                          </tr>

                          <tr>
                            <td>3.</td>
                            <td>Proposal</td>
                            <td>
                              <a href="#" class="btn btn-info" data-toggle="modal" pull="right" data-target="#file_proposal" onclick="ResetInput()"><i class="fa fa-file"></i> Unggah</a>
                            </td>
                            <td><?php
                                if ($bks_seminar == "") {
                                  echo "";
                                } else {
                                  echo "$bks_seminar->proposal";
                                }
                                ?></td>
                            <td align="center">
                              <?php
                              if ($bks_seminar == "") {
                                echo "";
                              } else {
                                if ($bks_seminar->st_proposal == '0') {
                                  echo '<span class="badge badge-warning">Belum Diverifikasi</span>';
                                } else if ($bks_seminar->st_proposal == '1') {
                                  echo '<span class="badge badge-info">Kurang Lengkap</span>';
                                } else if ($bks_seminar->st_proposal == '2') {
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
                                if ($bks_seminar == "") {
                                  echo "";
                                } else {
                                  echo "$bks_seminar->presentasi";
                                }
                                ?></td>
                            <td align="center">
                              <?php
                              if ($bks_seminar == "") {
                                echo "";
                              } else {
                                if ($bks_seminar->st_presentasi == '0') {
                                  echo '<span class="badge badge-warning">Belum Diverifikasi</span>';
                                } else if ($bks_seminar->st_presentasi == '1') {
                                  echo '<span class="badge badge-info">Kurang Lengkap</span>';
                                } else if ($bks_seminar->st_presentasi == '2') {
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
                                if ($bks_seminar == "") {
                                  echo "";
                                } else {
                                  echo "$bks_seminar->monitoring";
                                }
                                ?></td>
                            <td align="center">
                              <?php
                              if ($bks_seminar == "") {
                                echo "";
                              } else {
                                if ($bks_seminar->st_monitoring == '0') {
                                  echo '<span class="badge badge-warning">Belum Diverifikasi</span>';
                                } else if ($bks_seminar->st_monitoring == '1') {
                                  echo '<span class="badge badge-info">Kurang Lengkap</span>';
                                } else if ($bks_seminar->st_monitoring == '2') {
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

  <div id="file_ba" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" style="width:55%;">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Berkas Pendaftaran Seminar</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="<?= base_url('bks_seminar/upload_beritaacara') ?>" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
          <div class="card-body">
            <div class="form-group">
              <input type="hidden" id="id_seminar_proposal" name="id_seminar_proposal">
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
          <h4 class="modal-title">Berkas Pendaftaran Seminar</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="<?= base_url('bks_seminar/upload_persetujuan') ?>" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
          <div class="card-body">
            <div class="form-group">
              <input type="hidden" id="id_seminar_proposal" name="id_seminar_proposal">
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

  <div id="file_proposal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" style="width:55%;">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Berkas Pendaftaran Seminar</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="<?= base_url('bks_seminar/upload_proposal') ?>" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
          <div class="card-body">
            <div class="form-group">
              <input type="hidden" id="id_seminar_proposal" name="id_seminar_proposal">
              <input type="hidden" value="<?php echo $this->session->userdata('email'); ?>" class="form-control" id="nim" name="nim" placeholder="NIM">
              <input type="hidden" value="<?php echo $this->session->userdata('email'); ?>" class="form-control" id="nim2" name="nim2" readonly placeholder="NIM">
            </div>
            <div class="form-group">
              <label for="berita_acara">File Proposal</label><br>
              <input type="file" name="proposal" required>
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
          <h4 class="modal-title">Berkas Pendaftaran Seminar</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="<?= base_url('bks_seminar/upload_presentasi') ?>" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
          <div class="card-body">
            <div class="form-group">
              <input type="hidden" id="id_seminar_proposal" name="id_seminar_proposal">
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
          <h4 class="modal-title">Berkas Pendaftaran Seminar</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="<?= base_url('bks_seminar/upload_monitoring') ?>" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
          <div class="card-body">
            <div class="form-group">
              <input type="hidden" id="id_seminar_proposal" name="id_seminar_proposal">
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

  <div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" style="width:55%;">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Berkas Pendaftaran Seminar Proposal</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="<?= base_url('bks_seminar/create') ?>" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
          <div class="card-body">
            <div class="form-group">
              <input type="hidden" id="id_seminar_proposal" name="id_seminar_proposal">

              <label for="exampleInputjudul1">NIM</label>
              <input type="hidden" class="form-control" id="nim" name="nim" placeholder="NIM">
              <input type="text" class="form-control" id="nim2" name="nim2" readonly placeholder="NIM">
            </div>
            <div class="form-group">
              <label for="berita_acara">Berita Acara</label>
              <span>
                <h6>Upload dalam format doc.</h6>
              </span>
              <input type="file" name="berita_acara" required>
            </div>
            <div class="form-group">
              <label for="persetujuan">Persetujuan</label>
              <span>
                <h6>Upload dalam format doc.</h6>
              </span>
              <input type="file" name="persetujuan" required>
            </div>
            <div class="form-group">
              <label for="exampleInputjudul1">Proposal</label>
              <span>
                <h6>Upload dalam format pdf.</h6>
              </span>
              <input type="file" name="proposal" required>
            </div>
            <div class="form-group">
              <label for="exampleInputjudul1">Presentasi</label>
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
  <script type="text/javascript">
    function ResetInput(id_seminar_proposal, nim, berita_acara, persetujuan, proposal, presentasi, monitoring) {
      document.getElementById('id_seminar_proposal').value = "";
      document.getElementById('nim').value = <?php echo $this->session->userdata('email'); ?>;
      document.getElementById('nim2').value = <?php echo $this->session->userdata('email'); ?>;
      document.getElementById('berita_acara').value = "";
      document.getElementById('persetujuan').value = "";
      document.getElementById('proposal').value = "";
      document.getElementById('presentasi').value = "";
      document.getElementById('monitoring').value = "";
    }
  </script>
<?php } ?>