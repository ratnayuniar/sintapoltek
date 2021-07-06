<?php if ($this->session->userdata('level') == 2) { ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Upload Revisi</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('Beranda'); ?>">Beranda</a></li>
                            <li class="breadcrumb-item active">Upload Revisi</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <?php if ($cekRevisi->num_rows() < 3) { ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-danger">
                                <div class="card-header">
                                    <h3 class="card-title"><i class="fas fa-exclamation-triangle"></i> Pemberitahuan</h3>
                                </div>
                                <div class="card-body">
                                    Revisi Anda belum selesai, segera hubungi dosen penguji, selesaikan revisian Anda dan minta persetujuan ke dosen penguji Anda.
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="row">
                        <div class="col-4">

                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Upload Revisi</h3>
                                </div>
                                <!-- <form action="<?php echo base_url() . 'revisi_upload/add'; ?>" method="post" class="form-horizontal" role="form"> -->

                                <?php echo form_open_multipart('revisi_upload/upload_berkas'); ?>


                                <div class="card-body">
                                    <!-- <iframe id="iframe" title="prayerWidget" class="widget-m-top" style=" height: 358px; border: 1px solid #ddd;" scrolling="no" src="https://www.islamicfinder.org/prayer-widget/1631761/shafi/11/0/20.0/18.0"> </iframe> -->

                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-4 col-form-label">Upload Revisi</label>
                                        <div class="col-sm-4">
                                            <input type="file" name="file_revisi" id="file_revisi" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info">Simpan</button>
                                </div>


                                </form>
                            </div>
                        </div>


                        <?php if ($ambilBerkas['file_revisi']  != "") { ?>

                            <div class="col-8">
                                <div class="card card-success">
                                    <div class="card-header">
                                        <h3 class="card-title"><i class="fas fa-check-double"></i> Preview Berkas</h3>
                                    </div>
                                    <div class="card-body">
                                        <!-- <a href="<?= base_url('') ?>assets/berkas/sidang/<?= $ambilBerkas['file_revisi']; ?>" class="btn btn-sm btn-info"><i class="fas fa-download"></i> Download</a> -->
                                        <iframe type="application/pdf" src="<?= base_url('') ?>assets/berkas/sidang/<?= $ambilBerkas['file_revisi']; ?>" width="100%" height="600"></iframe><br>
                                    </div>
                                </div>
                            </div>

                        <?php } else { ?>

                            <div class="col-8">
                                <div class="card card-success">
                                    <div class="card-header">
                                        <h3 class="card-title"><i class="fas fa-check-double"></i> Preview Berkas</h3>
                                    </div>
                                    <div class="card-body">
                                        Belum ada file yang di upload
                                    </div>
                                </div>
                            </div>
                    </div>
                <?php } ?>
            <?php } ?>
            </div>
        </section>
    </div>
<?php } else { ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Revisi</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('Beranda'); ?>">Beranda</a></li>
                            <li class="breadcrumb-item active">Revisi</li>
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
                                <h3 class="card-title">Data Penguji Mahasiswa</h3>
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
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($getAllMahasiswaRevisiBydIdDosen as $row) : ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $row['nama']; ?></td>
                                                <td><?= $row['dospen1']; ?></td>
                                                <td><?= $row['dospen2']; ?></td>
                                                <td><?= $row['dospen3']; ?></td>
                                                <td><?php if ($row['status'] == 0) {
                                                        echo "Belum Disetujui";
                                                    } else {
                                                        echo "Disetujui";
                                                    } ?></td>
                                                <td>
                                                    <div class="form-check form-check-inline">

                                                        <input type="checkbox" class="form-check-input" name="status" id="inlinecheckbox1" <?= approve_revisi($row['id_revisi']); ?> data-revisi="<?= $row['id_revisi']; ?>">

                                                        <?php if (approve_revisi($row['id_revisi']) == "checked") { ?>
                                                            <label class="form-check-label" for="inlinecheckbox1"> Batalkan</label>
                                                        <?php } else { ?>
                                                            <label class="form-check-label" for="inlinecheckbox1"> Setujui</label>
                                                        <?php } ?>
                                                    </div>
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
        </section>
    </div>
<?php } ?>