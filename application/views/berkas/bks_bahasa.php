<?php if ($this->session->userdata('level') == 9) { ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Bahasa Internasional</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('beranda'); ?>">Beranda</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo base_url('bks_bahasa/admin'); ?>">List Verifikasi Bahasa </a></li>
                            <li class="breadcrumb-item active"> Data Bahasa Internasional</li>
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
                                <h3 class="card-title">Data Bahasa Internasional</h3>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIM</th>
                                            <th>Nama</th>
                                            <th>Jumlah</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($bks_bahasa_admin->result() as $row) { ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $row->nim ?></td>
                                                <td><?= $row->nama ?></td>
                                                <td><?= $row->jumlah ?></td>
                                                <td><a href="<?= base_url('bks_bahasa/detail_bks_bahasa/' . $row->nim) ?>" class="btn btn-primary btn-sm">
                                                        <i class="fa fa-search"></i></td>
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
    <!-- PUNYA MAHASISWA -->
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Bahasa Internasional</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('beranda'); ?>">Beranda</a></li>
                            <li class="breadcrumb-item active">Data Berkas Bahasa Internasional</li>
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
                                <h3 class="card-title">Data Bahasa Internasional</h3>
                            </div>
                            <div class="card-body">
                                <div style="text-align:right;margin-bottom: 10px ">
                                    <a href="#" class="on-default edit-row btn btn-success pull-right" data-toggle="modal" pull="right" data-target="#custom-width-modal" onclick="ResetInput()"><i class="fa fa-plus"></i> Tambah Berkas</a>
                                </div>
                                <div id="flash" data-flash="<?= $this->session->flashdata('pesan'); ?>">
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
                                            foreach ($bks_bahasa_user->result() as $row) { ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $row->nim ?></td>
                                                    <td><?= $row->nama ?></td>
                                                    <td class="text-center" width="160px">
                                                        <?php if ($row->status == '0') {
                                                            echo '<span class="badge badge-warning">Menunggu</span>';
                                                        } else if ($row->status == '1') {
                                                            echo '<span class="badge badge-info">Valid</span>';
                                                        } else {
                                                            echo '<span class="badge badge-danger">Tidak Valid</span>';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-center" width="160px">
                                                        <a href="<?php echo base_url('bks_bahasa/delete_users/' . $row->id_bks_bhs) ?>" id="btn-hapus" data-toggle="tooltip" data-placement="bottom" title="Hapus Mahasiswa" class="btn btn-sm btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>
                                                        <a href="<?= base_url('bks_bahasa/detail_bks_bahasa/' . $row->nim) ?>" class="btn btn-sm btn-primary btn-xs">
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

    <div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:55%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Data Bahasa</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?= base_url('bks_bahasa/create') ?>" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <input type="hidden" id="id_bks_bhs" name="id_bks_bhs">

                            <label for="exampleInputjudul1">NIM</label>
                            <input type="hidden" class="form-control" id="nim" name="nim" placeholder="NIM">
                            <input type="text" class="form-control" id="nim2" name="nim2" readonly placeholder="NIM">
                        </div>
                        <div class="form-group">
                            <label for="judul">Periode</label><br>
                            <input type="text" class="form-control" id="periode" name="periode" value="2020/2021 Genap" readonly>
                        </div>
                        <div class="form-group">
                            <label for="judul">Tahun</label><br>
                            <input type="text" class="form-control" id="tahun" name="tahun" value="2021" readonly>
                        </div>
                        <div class="form-group">
                            <label for="judul">Nama Bahasa Internasional</label><br>
                            <input type="text" class="form-control" id="nama_bhs" name="nama_bhs" placeholder="Contoh : Bahasa Inggris">
                        </div>
                        <div class="form-group">
                            <label for="judul">Skor</label><br>
                            <input type="text" class="form-control" id="skor" name="skor" placeholder="Contoh : 550">
                        </div>
                        <div class="form-group">
                            <label for="Tanggal">Tanggal Tes</label><br>
                            <input type="date" name="tanggal" class="form-control" id="tanggal">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputjudul1">Surat Keterangan</label><br>
                            <input type="file" name="sk_bahasa">
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
        function ResetInput(id_bks_bhs, nim, periode, tahun, nama_bhs, skor, sk_bahasa) {
            document.getElementById('id_bks_bhs').value = "";
            document.getElementById('nim').value = <?php echo $this->session->userdata('email'); ?>;
            document.getElementById('nim2').value = <?php echo $this->session->userdata('email'); ?>;
            document.getElementById('periode').value = "2020/2021 Genap";
            document.getElementById('tahun').value = "2021";
            document.getElementById('nama_bhs').value = "";
            document.getElementById('skor').value = "";
            document.getElementById('tanggal').value = "";
            document.getElementById('sk_bahasa').value = "";
        }
    </script>
<?php } ?>