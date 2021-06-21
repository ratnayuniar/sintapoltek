<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Dosen</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url('beranda'); ?>">Beranda</a></li>
            <li class="breadcrumb-item active">Data Dosen</li>
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
              <h3 class="card-title">Data Dosen</h3>
            </div>
            <div class="card-body">
              <div id="flash" data-flash="<?= $this->session->flashdata('pesan'); ?>">
                <div style="text-align:right;margin-bottom: 10px ">
                  <a href="#" class="on-default edit-row btn btn-success pull-right" data-toggle="modal" pull="right" data-target="#custom-width-modal" onclick="ResetInput()"><i class="fa fa-plus"></i> Tambah Dosen</a>
                </div>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>NIP</th>
                      <th>Nama Dosen</th>
                      <th>No HP</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($dosen->result() as $row) {
                      echo "<tr>
											<td>" . $no . "</td>
											<td>" . $row->nip . "</td>
											<td>" . $row->nama . "</td>
											<td>" . $row->no_hp . "</td>
											<td><a href ='#' class='btn btn-sm btn-primary btn-xs' data-toggle='modal' data-target='#custom-width-modal' onClick=\"SetInput('" . $row->id_dosen . "','" . $row->nip . "','" . $row->nama . "','" . $row->no_hp . "')\"><i class ='fa fa-edit'></i> Edit</a>
													<a href='" . base_url('dosen/delete2/' . $row->id_dosen) . "' id='btn-hapus' class='btn btn-sm btn-danger btn-xs' ><i class='fa fa-trash'></i> Hapus</a>
                      </td>	
									</tr>";
                      $no++;
                    }
                    ?>
                    <!-- <a href ='#' id='btn-hapus' class='btn btn-sm btn-danger btn-xs' data-toggle='modal' data-target='#delete-modal'onClick=\"SetInputs('" . $row->id_dosen . "','" . $row->nip . "','" . $row->nama . "','" . $row->email . "','" . $row->no_hp . "')\"><i class ='fa fa-trash'></i> Hapus</a> -->
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
        <h4 class="modal-title">Data Dosen</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="<?php echo base_url() . 'dosen/add'; ?>" method="post" class="form-horizontal" role="form">
        <div class="modal-body">
          <div class="form-group">
            <input type="hidden" id="id_dosen" name="id_dosen">
            <label class="col-md-3 control-label">NIP</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="nip" name="nip" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-3 control-label">Nama Dosen</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">No HP</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="no_hp" name="no_hp" required>
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

<div id="delete-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content bg-danger">
      <div class="modal-header">
        <h4 class="modal-title">Konfirmasi Hapus</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="<?php echo base_url() . 'dosen/delete'; ?>" method="post" class="form-horizontal" role="form">
        <div class="modal-body">
          <p>Apakah anda yakin ingin menghapus?</p>
          <div>
            <input type="hidden" id="id_dosen2" name="id_dosen2">
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
  function SetInput(id_dosen, nip, nama, no_hp) {
    document.getElementById('id_dosen').value = id_dosen;
    document.getElementById('nip').value = nip;
    document.getElementById('nama').value = nama;
    document.getElementById('no_hp').value = no_hp;
  }

  function SetInputs(id_dosen, nip, nama, no_hp) {
    document.getElementById('id_dosen2').value = id_dosen;
    document.getElementById('nip2').value = nip;
    document.getElementById('nama2').value = nama;
    document.getElementById('no_hp2').value = no_hp;
  }

  function ResetInput(id_dosen, nip, nama, no_hp) {
    document.getElementById('id_dosen').value = "";
    document.getElementById('nip').value = "";
    document.getElementById('nama').value = "";
    document.getElementById('no_hp').value = "";
  }
</script>