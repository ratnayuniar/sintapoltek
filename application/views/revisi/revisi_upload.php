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
            <div class="row">
                <div class="col-6">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Upload Revisi</h3>
                        </div>
                        <form action="<?php echo base_url() . 'revisi_upload/add'; ?>" method="post" class="form-horizontal" role="form">
                            <div class="card-body">
                                <input type="hidden" id="id_master_ta" name="id_master_ta">

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-5 col-form-label">Upload Revisi</label>
                                    <div class="col-sm-5">
                                        <input type="file" name="file_revisi" id="file_revisi">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">Simpan</button>
                                <button type="submit" class="btn btn-default float-right">Batal</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>