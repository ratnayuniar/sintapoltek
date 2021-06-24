<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <!-- <h3 class="m-2">Selamat Datang, <?php echo $user["nama"]; ?></h3>
              <h5 class="m-2">Terdaftar <?= date('d F Y', $user['tanggal_buat']); ?></h5> -->
            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="card-header">
                    <i class="fa fa-comments" aria-hidden="true"></i> Bimbingan
                </div>

                <div class="card-body">

                    <div class="card md-3">
                        <div class="card-body">
                            <div class="well" style="width:100%; height: 300px; max-height: 300px; overflow-y: auto;">
                                <?php
                                $id = $this->session->userdata('email');
                                ?>
                                <?php foreach ($pesans as $pesan) : ?>
                                    <strong><?php //echo $pesan->isi_pesan; 
                                            ?></strong><br>

                                    <?php if ($pesan->id_pengirim == $id) : ?>

                                        <p class="text-right"></p>
                                        <p class="alert alert-primary" style="border-radius: 20px 20px 0px 20px; width: 50%; left: 50%;">
                                            <?php $data['user'] = $this->m_pembimbing->getmahasiswabyid2($pesan->id_pengirim); ?>
                                            <i style="text-align: right;"><?php echo $data['user']->nama; ?></i>
                                            <br>
                                            <strong><?php echo $pesan->isi_pesan; ?></strong>
                                            <?php if (!empty($pesan->file)) { ?>
                                                <br>
                                                <a href="<?php echo base_url('assets/berkas/bimbingan/' . $pesan->file) ?>"><?php echo $pesan->file; ?></a>
                                                <br>
                                            <?php } ?>
                                            <span class="text-default small">
                                                <?php
                                                echo $pesan->tanggal;
                                                ?>
                                            </span>
                                        </p>
                                    <?php elseif ($pesan->id_pengirim != $id) : ?>
                                        <p class="alert alert-info" style="border-radius: 20px 20px 20px 0px; background-color: #23A127; border-color: #1f8422; width: 50%;right: 0%;">
                                            <!-- <?php $data['user'] = $this->m_pembimbing->getmahasiswabyid2($pesan->id_pengirim); ?>
                                            <i style="text-align: right;"><?php echo $data['user']->nama; ?></i> -->
                                            <?php $data['user'] = $this->m_pembimbing->getdosenbyid($pesan->id_pengirim); ?>
                                            <i style="text-align: right;"><?php echo $data['user']->nama; ?></i>
                                            <br>
                                            <strong><?php echo $pesan->isi_pesan; ?></strong>
                                            <?php if (!empty($pesan->file)) { ?>
                                                <br>
                                                <a href="<?php echo base_url('assets/berkas/bimbingan/' . $pesan->file) ?>"><?php echo $pesan->file; ?></a>
                                                <br>
                                            <?php } ?>
                                            <a href="<?php echo base_url('assets/berkas/bimbingan/' . $pesan->file) ?>"></a>
                                            <span class="text-default small">
                                                <?php
                                                echo $pesan->tanggal;
                                                ?>
                                            </span>
                                        </p>
                                    <?php endif ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                    <form class="" method="post" action="<?php base_url('chat/index'); ?>" enctype="multipart/form-data" style="margin-top: 2%;">
                        <div class="form-group">
                            <textarea required="" name="isi_pesan" id="isi_pesan" class="form-control" placeholder="Tuliskan pesan anda disini"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="file" class="form-control" name="file" placeholder="file">
                            <span style="color: red">
                                <?php echo form_error('file');
                                ?>
                            </span>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success" style="float: right;"><i class="fa fa-paper-plane"></i> Kirim</button>
                        </div>
                    </form>
                </div>


            </div>
    </section>
</div>