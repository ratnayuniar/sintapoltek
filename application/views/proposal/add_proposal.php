<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ajukan Proposal</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('beranda'); ?>">Beranda</a></li>
                        <li class="breadcrumb-item active">Ajukan Proposal</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div id="flash" data-flash="<?= $this->session->flashdata('pesan'); ?>">
                <?php $cek = $this->db->get_where('master_ta', array('nim' => $this->session->userdata('email')))->row_array(); ?>
                <?php if (isset($cek['pembimbing1']) != NULL && $cek['pembimbing2'] != NULL) { ?>
                    <div class="row">
                        <div class="col-4">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Upload Berkas Proposal</h3>
                                </div>
                                <?php echo form_open_multipart('proposal/upload_berkas'); ?>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-4 col-form-label">Upload Proposal</label>
                                        <div class="col-sm-4">
                                            <input type="hidden" name="id_proposal" id="id_proposal" required>
                                            <input type="hidden" value="<?php echo $this->session->userdata('email'); ?>" class="form-control" id="nim" name="nim" placeholder="NIM">
                                            <input type="file" name="file_proposal" id="file_proposal" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info">Simpan</button>
                                </div>
                            </div>
                            </form>
                        </div>
                        <?php if ($ambilBerkas['file_proposal']  != "") { ?>
                            <div class="col-8">
                                <div class="card card-success">
                                    <div class="card-header">
                                        <h3 class="card-title"><i class="fas fa-check-double"></i> Preview Berkas</h3>
                                    </div>
                                    <div class="card-body">
                                        <iframe type="application/pdf" src="<?= base_url('') ?>assets/berkas/seminar/<?= $ambilBerkas['file_proposal']; ?>" width="100%" height="600"></iframe><br>
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
            </div>
        </div>

    <?php } else { ?>
        <div class="row">
            <div class="col-12">
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-exclamation-triangle"></i> Pemberitahuan</h3>
                    </div>
                    <div class="card-body">
                        Pembimbing anda belum ditetapkan, silahkan hubungi admin
                    </div>
                </div>
            </div>
        </div>



    <?php } ?>
</div>
</section>
</div>