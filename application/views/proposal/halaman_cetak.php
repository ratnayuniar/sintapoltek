<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ajukan Proposal</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/#">Home</a></li>
                        <li class="breadcrumb-item active">Ajukan Proposal</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Form Pengajuan Proposal</h3>
                        </div>
                        <form class="form-horizontal" action="<?php echo base_url() . 'proposal/add'; ?>" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <input type="hidden" id="id_proposal" name="id_proposal">
                                    <label for="exampleInputjudul1">Latar Belakang</label>
                                    <textarea class="form-control" rows="5" id="latar_belakang" name="latar_belakang" value="<?= $topik->judul ?>"></textarea>
                                    <input type="text" value="<?= $topik->judul ?>" readonly class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputjudul1">Rumusan Masalah</label>
                                    <textarea class="form-control" rows="5" id="rumusan_masalah" name="rumusan_masalah" placeholder="Masukkan Rumusan Masalah"></textarea>
                                </div>
                                <div class=" form-group">
                                    <label for="exampleInputjudul1">Batasan Masalah</label>
                                    <textarea class="form-control" rows="5" id="batasan_masalah" name="batasan_masalah" placeholder="Masukkan Batasan Masalah"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputjudul1">Tujuan</label>
                                    <textarea class="form-control" rows="5" id="tujuan" name="tujuan" placeholder="Masukkan Tujuan"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputjudul1">Tinjauan Pustaka / Landasan Teori</label>
                                    <textarea class="form-control" rows="5" id="teori" name="teori" placeholder="Masukkan Tinjauan Pustaka"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputjudul1">Metodelogi Penelitian</label>
                                    <textarea class="form-control" rows="5" id="metode" name="metode" placeholder="Masukkan Metodelogi Penelitian"></textarea>
                                </div>

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-default ">Batal</button>
                                <button type="submit" class="btn btn-info float-right">Simpan</button>
                                <a href="<?= site_url('proposal/halaman_cetak') ?>" type="button" class="btn btn-primary">Cetak Proposal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>