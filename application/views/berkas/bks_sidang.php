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
                      <th>File TA</th>
                      <th>Persetujuan</th>
                      <th>PKKMB</th>
                      <th>Monitoring</th>
                      <th>Presentasi</th>
                      <th>Berita Acara</th>
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
                        <td> <?php if ($row->st_file_ta == '0') {
                                echo " <a href ='#' class ='btn btn-sm btn-danger btn-xs btn-block' data-toggle='modal' data-target='#modal_file_ta' onClick=\"SetInput('" . $row->id_seminar_ta . "','" . $row->nim . "','" . $row->nama . "')\"> Belum</a>";
                              } else if ($row->st_file_ta == '1') {
                                echo " <a href='" . base_url(' bks_sidang/save_bks_kurang/' . $row->id_seminar_ta) . "' class='btn btn-xs btn-primary'>Kurang</a>";
                              } else {
                                echo " <a href='" . base_url(' bks_sidang/save_bks_lengkap/' . $row->id_seminar_ta) . "' class='btn btn-xs btn-success'>Lengkap</a>";
                              }
                              ?>
                          <?php if ($row->st_file_ta == '0') {
                            echo " <h6>Belum diverifikasi File ta</h6>";
                          } else {
                            echo " ";
                          }
                          ?>
                          <h6><a href="<?php echo base_url('assets/berkas/sidang/' . $row->file_ta); ?>" download><i class="far fa-file-pdf"></i></a></h6>
                        </td>
                        <td> <?php if ($row->st_persetujuan == '0') {
                                echo " <a href ='#' class ='btn btn-sm btn-danger btn-xs btn-block' data-toggle='modal' data-target='#modal_jurnal' onClick=\"SetInput('" . $row->id_seminar_ta . "','" . $row->nim . "','" . $row->nama . "')\"> Belum</a>";
                              } else if ($row->st_persetujuan == '1') {
                                echo " <a href='" . base_url(' bks_seminar/save_bks_kurang/' . $row->id_seminar_ta) . "' class='btn btn-xs btn-primary'>Kurang</a>";
                              } else {
                                echo " <a href='" . base_url(' bks_seminar/save_bks_lengkap/' . $row->id_seminar_ta) . "' class='btn btn-xs btn-success'>Lengkap</a>";
                              }
                              ?>
                          <?php if ($row->st_persetujuan == '0') {
                            echo " <h6>Belum diverifikasi perst</h6>";
                          } else {
                            echo " ";
                          }
                          ?>
                          <h6><a href="<?php echo base_url('assets/berkas/sidang/' . $row->persetujuan); ?>" download><i class="far fa-file-pdf"></i></a></h6>
                        </td>
                        <td> <?php if ($row->st_pkkmb == '0') {
                                echo " <a href ='#' class ='btn btn-sm btn-danger btn-xs btn-block' data-toggle='modal' data-target='#modal_lapta' onClick=\"SetInput('" . $row->id_seminar_ta . "','" . $row->nim . "','" . $row->nama . "')\"> Belum</a>";
                              } else if ($row->st_pkkmb == '1') {
                                echo " <a href='" . base_url(' bks_seminar/save_bks_kurang/' . $row->id_seminar_ta) . "' class='btn btn-xs btn-primary'>Kurang</a>";
                              } else {
                                echo " <a href='" . base_url(' bks_seminar/save_bks_lengkap/' . $row->id_seminar_ta) . "' class='btn btn-xs btn-success'>Lengkap</a>";
                              }
                              ?>
                          <?php if ($row->st_pkkmb == '0') {
                            echo " <h6>Belum diverifikasi pkkmb</h6>";
                          } else {
                            echo " ";
                          }
                          ?>
                          <h6><a href="<?php echo base_url('assets/berkas/sidang/' . $row->pkkmb); ?>" download><i class="far fa-file-pdf"></i></a></h6>
                        </td>
                        <td> <?php if ($row->st_monitoring == '0') {
                                echo " <a href ='#' class ='btn btn-sm btn-danger btn-xs btn-block' data-toggle='modal' data-target='#modal_aplikasi' onClick=\"SetInput('" . $row->id_seminar_ta . "','" . $row->nim . "','" . $row->nama . "')\"> Belum</a>";
                              } else if ($row->st_monitoring == '1') {
                                echo " <a href='" . base_url(' bks_seminar/save_bks_kurang/' . $row->id_seminar_ta) . "' class='btn btn-xs btn-primary'>Kurang</a>";
                              } else {
                                echo " <a href='" . base_url(' bks_seminar/save_bks_lengkap/' . $row->id_seminar_ta) . "' class='btn btn-xs btn-success'>Lengkap</a>";
                              }
                              ?>
                          <?php if ($row->st_monitoring == '0') {
                            echo " <h6>Belum diverifikasi monito</h6>";
                          } else {
                            echo " ";
                          }
                          ?>
                          <h6><a href="<?php echo base_url('assets/berkas/sidang/' . $row->monitoring); ?>" download><i class="far fa-file-pdf"></i></i></a></h6>
                        </td>
                        <td> <?php if ($row->st_presentasi == '0') {
                                echo " <a href ='#' class ='btn btn-sm btn-danger btn-xs btn-block' data-toggle='modal' data-target='#modal_ppt' onClick=\"SetInput('" . $row->id_seminar_ta . "','" . $row->nim . "','" . $row->nama . "')\"> Belum</a>";
                              } else if ($row->st_presentasi == '1') {
                                echo " <a href='" . base_url(' bks_seminar/save_bks_kurang/' . $row->id_seminar_ta) . "' class='btn btn-xs btn-primary'>Kurang</a>";
                              } else {
                                echo " <a href='" . base_url(' bks_seminar/save_bks_lengkap/' . $row->id_seminar_ta) . "' class='btn btn-xs btn-success'>Lengkap</a>";
                              }
                              ?>
                          <?php if ($row->st_presentasi == '0') {
                            echo " <h6>Belum diverifikasi</h6>";
                          } else {
                            echo " ";
                          }
                          ?>
                          <h6><a href="<?php echo base_url('assets/berkas/sidang/' . $row->presentasi); ?>" download><i class="far fa-file-powerpoint"></i></a></h6>
                        </td>
                        <td> <?php if ($row->st_berita_acara == '0') {
                                echo " <a href ='#' class ='btn btn-sm btn-danger btn-xs btn-block' data-toggle='modal' data-target='#modal_ppt' onClick=\"SetInput('" . $row->id_seminar_ta . "','" . $row->nim . "','" . $row->nama . "')\"> Belum</a>";
                              } else if ($row->st_berita_acara == '1') {
                                echo " <a href='" . base_url(' bks_seminar/save_bks_kurang/' . $row->id_seminar_ta) . "' class='btn btn-xs btn-primary'>Kurang</a>";
                              } else {
                                echo " <a href='" . base_url(' bks_seminar/save_bks_lengkap/' . $row->id_seminar_ta) . "' class='btn btn-xs btn-success'>Lengkap</a>";
                              }
                              ?>
                          <?php if ($row->st_berita_acara == '0') {
                            echo " <h6>Belum diverifikasi</h6>";
                          } else {
                            echo " ";
                          }
                          ?>
                          <h6><a href="<?php echo base_url('assets/berkas/sidang/' . $row->berita_acara); ?>" download><i class="far fa-file-powerpoint"></i></a></h6>
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
          <h4 class="modal-title">Berkas Pendaftaran Seminar</h4>
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
          <h4 class="modal-title">Berkas Pendaftaran Seminar</h4>
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
          <h4 class="modal-title">Berkas Pendaftaran Seminar</h4>
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
          <h4 class="modal-title">Berkas Pendaftaran Seminar</h4>
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
          <h4 class="modal-title">Berkas Pendaftaran Seminar</h4>
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
          <h4 class="modal-title">Berkas Pendaftaran Seminar</h4>
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