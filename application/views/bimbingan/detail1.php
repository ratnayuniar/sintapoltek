<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Detail Bimbingan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url('beranda'); ?>">Beranda</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url('bimbingan1'); ?>">Data Bimbingan</a></li>
            <li class="breadcrumb-item active">Detail Bimbingan</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <h5 class="m-0">Detail Bimbingan Mahasiswa</h5>
            </div>
            <div class="card-body">
              <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="nama" value="<?= $info_judul['nama']; ?>" readonly>
                </div>
              </div>
              <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">NIM</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="nama" value="<?= $info_judul['nim']; ?>" readonly>
                </div>
              </div>
              <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Judul</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="nama" value="<?= $info_judul['judul']; ?>" readonly>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.col-md-6 -->
      </div>

      <!-- Section Persetujuan -->

      <!-- // dibuat pada tanggal 16-07-2021, 01:07 WIB -->
      <?php $cek = $this->db->get_where('persetujuan', array(
        'id_dosen' => $this->session->userdata('id_dosen'), 'jenis' => 'proposal', 'nim' => $this->uri->segment(3)
      ))->row_array(); ?>
      <?php if (isset($cek['nim']) == "") { ?>
        <?php if ($cekJumlahBimbingan >= 8) { ?>
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <h5 class="m-0">Persetujuan Seminar</h5>
                </div>
                <div class="card-body">
                  <p class="card-text">Jumlah bimbingan sudah memenuhi syarat untuk pendaftaran seminar. Klik tombol dibawah ini untuk menyetujui <br>
                    <a href="<?= base_url('bimbingan_proposal/persetujuan/' . $info_judul['nim'] . '/' . $info_judul['judul'] . '/' . $this->session->userdata('id_dosen') . '/' . '1' . '/' . date('Y-m-d')); ?>" onclick="return confirm('Apakah Anda sudah yakin dengan mahasiswa ini?')" btn="btn-konfirmasi" class="btn btn-sm btn-success mt-2">Setujui</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      <?php } else { ?>
      <?php } ?>
      <!-- End section persetujuan -->

      <!-- Sudah disetujui -->

      <!-- // dibuat pada tanggal 16-07-2021, 01:07 WIB -->
      <?php if ($cekPersetujuanBimbingan == 1) { ?>
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <h5 class="m-0">Bimbingan Sudah Disetujui</h5>
              </div>
              <div class="card-body">
                <p class="card-text">Bimbingan dengan mahasiswa ini sudah disetujui, mahasiswa sudah berhak untuk lanjut seminar</p>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>

      <!-- End sudah disetujui -->

      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <h5 class="m-0">Daftar Bimbingan Mahasiswa</h5>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Tanggal</th>
                      <th>Masalah</th>
                      <th>File Mahasiswa</th>
                      <th>Solusi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1;
                    foreach ($table_bimbingan as $row) : ?>
                      <tr>
                        <td><?= $i++; ?></td>
                        <td><?= date('d-m-Y', strtotime($row['tanggal'])); ?></td>
                        <td><?= $row['masalah']; ?></td>
                        <td>
                          <?php if ($row['file'] == "") {
                            echo " ";
                          } else {
                            echo '<a href="' . base_url('assets/berkas/bimbingan/' . $row['file']) . '" target="_blank"><i class="far fa-file-pdf"></i></a> ';
                          }
                          ?>
                        </td>
                        <td>
                          <?php if ($row['solusi'] == "") {
                            echo " <a href ='#' class ='btn btn-sm btn-info' data-toggle='modal' data-target='#modal_solusi' onClick=\"SetInput('" . $row['id_bimbingan'] . "','" . $row['nim'] . "')\"> Berikan Solusi</a>";
                          ?>
                          <?php } else {
                            echo $row['solusi'];
                          } ?>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
  function SetInput(id_bimbingan, nim) {
    document.getElementById('id_bimbingan').value = id_bimbingan;
    document.getElementById('nim').value = nim;
  }
</script>


<!-- Modal Solusi -->
<div class="modal fade" id="modal_solusi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Berikan Solusi</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Dibuat pada 17-7-2021, 09:19 WIB -->
        <?php echo form_open_multipart('bimbingan_proposal/mabim1_simpansolusi'); ?>
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <label for="solusi">Solusi</label>
              <input type="hidden" id="id_bimbingan" name="id_bimbingan">
              <input type="hidden" id="nim" name="nim">
              <textarea name="solusi" id="solusi" class="form-control" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
              <label for="upload_file">Upload File</label>
              <input type="file" class="form-control-file" id="upload_file" name="file_dosen">
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" style="float: right;">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>