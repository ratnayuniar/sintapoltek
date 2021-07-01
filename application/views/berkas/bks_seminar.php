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
                <h3 class="card-title">Data Berkas Seminar Proposal</h3>
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
                    $id_prodi = $this->session->userdata('id_prodi');
                    foreach ($this->m_bks_seminar->bks_seminar_admin($id_prodi)->result() as $row) { ?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row->nim ?></td>
                        <td><?= $row->nama ?></td>
                        <td> <?php if ($row->status == '0') {
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
                        <td>
                          <a href="<?php echo site_url('bks_seminar/save_bks_belum/' . $row->id_seminar_proposal); ?>" id="btn-konfirmasi" class="btn btn-xs btn-danger">Belum</a>
                          <a href="<?php echo site_url('bks_seminar/save_bks_kurang/' . $row->id_seminar_proposal); ?>" id="btn-konfirmasi" class="btn btn-xs btn-success">Kurang</a>
                          <a href="<?php echo site_url('bks_seminar/save_bks_lengkap/' . $row->id_seminar_proposal); ?>" id="btn-konfirmasi" class="btn btn-xs btn-primary">Lengkap</a>
                        </td>
                        <td>
                          <a href="<?= base_url('bks_seminar/detail_bks_seminar/' . $row->id_seminar_proposal) ?>" class="btn btn-primary btn-xs"><i class="fa fa-search"></i> Detail</a>
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
            <div style="text-align:right;margin-bottom: 10px ">
              <a href="#" class="on-default edit-row btn btn-success pull-right" data-toggle="modal" pull="right" data-target="#custom-width-modal" onclick="ResetInput()"><i class="fa fa-plus"></i> Tambah Berkas</a>
            </div>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Berkas Seminar Proposal</h3>
              </div>
              <div class="card-body">
                <div id="flash" data-flash="<?= $this->session->flashdata('pesan'); ?>">
                </div>
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
                    foreach ($bks_seminar_user->result() as $row) { ?>
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
                          <a href="<?php echo base_url('bks_seminar/delete_users/' . $row->id_seminar_proposal) ?>" id="btn-hapus" data-toggle="tooltip" data-placement="bottom" title="Hapus Mahasiswa" class="btn btn-sm btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>
                          <a href="<?= base_url('bks_seminar/detail_bks_seminar/' . $row->id_seminar_proposal) ?>" class="on-default edit-row btn btn-info pull-right btn-xs"><i class="fa fa-search"></i> Detail </a>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table> -->
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
                    foreach ($bks_seminar_user->result() as $row) { ?>
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
                          <a href="<?php echo base_url('bks_seminar/delete_users/' . $row->id_seminar_proposal) ?>" id="btn-hapus" data-toggle="tooltip" data-placement="bottom" title="Hapus Mahasiswa" class="btn btn-sm btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>
                          <a href="<?= base_url('bks_seminar/detail_bks_seminar/' . $row->id_seminar_proposal) ?>" class="on-default edit-row btn btn-info pull-right btn-xs"><i class="fa fa-search"></i> Detail </a>
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