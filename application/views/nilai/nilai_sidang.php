<?php if ($this->session->userdata('level') == 1) { ?>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Nilai Sidang</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('Beranda'); ?>">Beranda</a></li>
              <li class="breadcrumb-item active">Data Nilai Sidang</li>
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
                <h3 class="card-title">Data Nilai Sidang</h3>
              </div>
              <div class="card-body">
                <div style="text-align:right;margin-bottom: 10px ">
                  <!-- <a href="#" class="on-default edit-row btn btn-success pull-right" data-toggle="modal" pull="right"data-target="#custom-width-modal" onclick="ResetInput()"><i class="fa fa-plus" ></i></a> -->
                </div>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Mahasiswa</th>
                      <th>Jumlah Nilai</th>
                      <th>Nilai Akhir (Rata-Rata)</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($query->result() as $row) {
                      $data['user'] = $this->m_penguji_sidang->getmahasiswabyid($row->nim);
                      $this->db->select('AVG(rata) as rata, sum(nilai_akhir) as nilaiakhir');
                      $this->db->where('nim', $row->nim);
                      $result = $this->db->get('nilai_sidang')->row();
                      $rata = number_format($result->rata, 1, '.', '');
                    ?>
                      <tr>
                        <td><?= $no++ ?>.</td>
                        <td><?= $data['user']->nama; ?></td>
                        <td><?= $rata ?></td>
                        <td><?= $result->nilaiakhir ?></td>
                        <td>
                          <!-- <a href="<?= base_url('nilai_seminar/detail_nilai_seminar/' . $row->id_mahasiswa) ?>" class="btn btn-primary btn-sm">
                            <i class="fa fa-search"></i></a>&nbsp; -->
                          <a href="<?= base_url('nilai_sidang/detail_nilai_sidang/' . $row->id_nilai_sidang) ?>" class="on-default edit-row btn btn-info pull-right btn-xs"><i class="fa fa-search"></i> Detail </a>
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
          <h4 class="modal-title">Tambah Data Mahasiswa</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="<?php echo base_url() . 'mahasiswa/add'; ?>" method="post" class="form-horizontal" role="form">
          <div class="modal-body">
            <div class="form-group">
              <input type="hidden" id="id_mhs" name="id_mhs">
              <label class="col-md-3 control-label">NIM</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="nim" name="nim" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-3 control-label">Nama Mahasiswa</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="nama" name="nama" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-3 control-label">Program Studi</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="prodi" name="prodi" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-3 control-label">Jurusan</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="jurusan" name="jurusan" required>
              </div>
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


  <div id="delete-modassl" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" style="width:55%;">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title" id="custom-width-modalLabel">Konfirmasi Hapus</h4>
        </div>
        <form action="<?php echo base_url() . 'mahasiswa/delete'; ?>" method="post" class="form-horizontal" role="form">
          <div class="modal-body">
            <p>Apakah anda yakin ingin menghapus?</p>
            <div>
              <input type="hidden" id="id_mhs2" name="id_mhs2">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Tidak</button>
            <button type="submit" class="btn btn-success waves-effect waves-light">Ya</button>
          </div>
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
        <div class="modal-body">
          <p>Apakah anda yakin ingin menghapus?</p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-outline-light" data-dismiss="modal">Tidak</button>
          <button type="submit" class="btn btn-outline-light">Ya</button>
        </div>
      </div>
    </div>
  </div>
<?php } else if (($this->session->userdata('level') == 3) || ($this->session->userdata('level') == 4)) { ?>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Nilai Sidang</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('Beranda'); ?>">Beranda</a></li>
              <li class="breadcrumb-item active">Data Nilai Sidang</li>
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
                <h3 class="card-title">Data Mahasiswa</h3>
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
                      <th>Rata-rata</th>
                      <th>Nilai Akhir</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <tbody>
                    <?php
                    $this->db->select('*');
                    $this->db->from('nilai_sidang');
                    $this->db->where(array('id_dosen' => $this->session->userdata('id_dosen')));
                    $result = $this->db->get()->row();
                    ?>
                    <?php
                    $no = 1;
                    foreach ($query3->result() as $row) {
                      $data['user'] = $this->m_penguji_sidang->getmahasiswabyid($row->nim);
                      $data['dosen1'] = $this->m_penguji_sidang->getdosen1($row->penguji1_sidang);
                      $data['dosen2'] = $this->m_penguji_sidang->getdosen2($row->penguji2_sidang);
                      $data['dosen3'] = $this->m_penguji_sidang->getdosen2($row->penguji3_sidang);
                    ?>
                      <tr>
                        <td><?= $no  ?></td>
                        <td><?= $data['user']->nama ?></td>
                        <td><?= $data['dosen1']->nama ?></td>
                        <td><?= $data['dosen2']->nama ?></td>
                        <td><?= $data['dosen3']->nama ?></td>
                        <td><?php if (empty($result->rata)) echo "";
                            else echo $result->rata ?></td>
                        <td><?php if (empty($result->nilai_akhir)) echo "";
                            else echo $result->nilai_akhir ?></td>
                        <td>

                          <a href="<?= base_url('nilai_sidang/detail_nilai_sidang2?id=' . $row->nim); ?>" class="on-default edit-row btn btn-primary btn-xs"> Input Nilai</a>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
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
          <h4 class="modal-title">Tambah Data Nilai Mahasiswa </h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="<?php echo base_url() . 'nilai_sidang/add'; ?>" method="post" class="form-horizontal" role="form">
          <div class="modal-body">
            <div class="form-group">
              <input type="hidden" id="id_nilai_seminar" name="id_nilai_seminar">
              <input type="hidden" id="id_penguji" name="id_penguji">
              <label class="col-md-5 control-label">Mahasiswa</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="id_mahasiswa" name="id_mahasiswa" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-10 control-label">Perumusan Masalah, Tujuan dan Manfaat TA</label>
              <div class="col-md-5">
                <input type="text" class="form-control" id="perumusan" name="perumusan" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-10 control-label">Kerangka Teori Penunjang</label>
              <div class="col-md-5">
                <input type="text" class="form-control" id="teori" name="teori" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-10 control-label">Pemecahan Masalah</label>
              <div class="col-md-5">
                <input type="text" class="form-control" id="pemecahan" name="pemecahan" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-10 control-label">Sistematika Penulisan dan Bahasa</label>
              <div class="col-md-5">
                <input type="text" class="form-control" id="penulisan" name="penulisan" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-10 control-label">Sumber Pustaka</label>
              <div class="col-md-5">
                <input type="text" class="form-control" id="pustaka" name="pustaka" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-10 control-label">Nilai Akhir</label>
              <div class="col-md-5">
                <input type="text" class="form-control" id="nilai_akhir" name="nilai_akhir" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-10 control-label">Penyajian / Presentasi</label>
              <div class="col-md-5">
                <input type="text" class="form-control" id="presentasi" name="presentasi" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-10 control-label">Penguasaan Materi</label>
              <div class="col-md-5">
                <input type="text" class="form-control" id="penguasaan" name="penguasaan" required>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <button type="submit" onclick="jumlahnilai()" class="btn btn-primary">Simpan</button>
            </div>

          </div>
        </form>
      </div>
    </div>
  </div>
<?php } ?>