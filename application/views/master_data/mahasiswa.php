<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Mahasiswa</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url('beranda'); ?>">Beranda</a></li>
            <li class="breadcrumb-item active">Data Mahasiswa</li>
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
              <div style="text-align:right;margin-bottom: 10px ">
                <a href="#" class="on-default edit-row btn btn-success pull-right" data-toggle="modal" pull="right" data-target="#custom-width-modal" onclick="ResetInput()"><i class="fa fa-plus"></i> Tambah Mahasiswa</a>
              </div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama Mahasiswa</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($mahasiswa->result() as $row) {
                    echo
                    "<tr>
											<td>" . $no . "</td>
											<td>" . $row->nim . "</td>
											<td>" . $row->nama . "</td>
											<td>
                      <a href ='#' class ='btn btn-sm btn-primary btn-xs' data-toggle='modal' data-target='#custom-width-modal' onClick=\"SetInput('" . $row->nim . "','" . $row->nama . "','" . $row->alamat . "','" . $row->hp . "','" . $row->ttl . "','" . $row->id_prodi . "')\"><i class ='fa fa-edit'></i>  Edit</a>
                      <a href='" . base_url('mahasiswa/delete2/' . $row->nim) . "' id='btn-hapus' class='btn btn-sm btn-danger btn-xs' ><i class='fa fa-trash'></i> Hapus</a>
											</td>
									  </tr>";
                    $no++;
                  }
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
        <h4 class="modal-title">Data Mahasiswa</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="<?php echo base_url() . 'mahasiswa/add'; ?>" method="post" class="form-horizontal" role="form">
        <div class="modal-body">

          <div class="form-group">
            <label class="col-md-3 control-label">NIM</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="nim" name="nim" required>
              <input type="hidden" class="form-control" id="angkatan" name="angkatan" value="2019-2020" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-5 control-label">Nama Mahasiswa</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-5 control-label">Alamat</label>
            <div class="col-md-9">
              <textarea type="text" class="form-control" rows="3" id="alamat" name="alamat" required></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-5 control-label">No HP</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="hp" name="hp" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-5 control-label">Tempat Tanggal Lahir</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="ttl" name="ttl" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-5 control-label">Program Studi</label>
            <div class="col-md-9">
              <select class="form-control" data-live-search="true" data-style="btn-white" id="id_prodi" name="id_prodi" required>
                <option value="">-- Pilih Program Studi --</option>
                <?php
                $query = $this->m_prodi2->tampil_data();
                foreach ($query->result() as $row) {
                  echo "<option value='" . $row->id_prodi . "'>" . $row->nama_prodi . "</option>";
                }
                ?>
              </select>
            </div>
          </div>
          <!-- <div class="form-group">
            <label class="col-md-3 control-label">Jurusan</label>
            <div class="col-md-9">
              <select class="form-control" data-live-search="true" data-style="btn-white" id="id_jurusan" name="id_jurusan" required>
                <option value="">-- Pilih Jurusan --</option>
                <?php
                $query = $this->m_jurusan->tampil_data();
                foreach ($query->result() as $row) {
                  echo "<option value='" . $row->id_jurusan . "'>" . $row->nama_jurusan . "</option>";
                }
                ?>
              </select>
            </div>
          </div> -->
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>

        </div>
      </form>
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
      <form action="<?php echo base_url() . 'mahasiswa/delete'; ?>" method="post" class="form-horizontal" role="form">
        <div class="modal-body">
          <p>Apakah anda yakin ingin menghapus?</p>
          <div>
            <input type="hidden" id="id_nim2" name="id_nim2">
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-outline-light" data-dismiss="modal">Tidak</button>
          <button type="submit" class="btn btn-outline-light">Ya</button>
        </div>
    </div>
  </div>
</div>


<script type="text/javascript">
  function SetInput(nim, nama, alamat, hp, ttl, id_prodi) {
    document.getElementById('nim').value = nim;
    document.getElementById('nama').value = nama;
    document.getElementById('alamat').value = alamat;
    document.getElementById('hp').value = hp;
    document.getElementById('ttl').value = ttl;
    document.getElementById('id_prodi').value = id_prodi;
  }

  function SetInputs(id_nim, nim, alamat, hp, ttl, nama, id_prodi, id_jurusan) {

    document.getElementById('id_nim2').value = id_nim;
    document.getElementById('nim2').value = nim;
    document.getElementById('nama2').value = nama;
    document.getElementById('alamat2').value = alamat;
    document.getElementById('hp2').value = hp;
    document.getElementById('ttl2').value = ttl;
    document.getElementById('id_prodi').value = id_prodi;
    document.getElementById('id_jurusan').value = id_jurusan;
  }

  function ResetInput(id_nim, nim, nama, id_prodi, id_jurusan) {
    document.getElementById('id_nim').value = "";
    document.getElementById('nim').value = "";
    document.getElementById('nama').value = "";
    document.getElementById('id_prodi').value = "";
    document.getElementById('id_jurusan').value = "";
  }
</script>