<?php
if (empty($this->session->set_userdata('email'))) {
?>
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <img src="<?= base_url('admin/dist/img/logosinta2.png') ?>" width="200px" class="brand-image img-square " alt="User Image"><br>
            </div>
            <div class="card-body">
                <?= $this->session->flashdata('message'); ?>
                <form action="<?= base_url('auth/proses_login'); ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="email" id="email" class="form-control" placeholder="Email" value="<?= set_value('email'); ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                    <div class="input-group mb-3">
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                    <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                </form>
            </div>
        </div>
    </div>
<?php
} else redirect(base_url('beranda'));
?>