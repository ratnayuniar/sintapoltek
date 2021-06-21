<div class="content-wrapper" style="min-height: 1624.75px;">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">User Profile</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="<?= base_url('admin/dist/img/') . $user['image']; ?>" alt="User profile picture">
                            </div>
                            <h3 class="profile-username text-center"><?php echo $user["nama"]; ?></h3>
                            <p class="text-muted text-center"><?php echo $user["email"]; ?></p>
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Jurusan</b> <a class="float-right">Teknik</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Program Studi</b> <a class="float-right">Teknologi Informasi</a>
                                </li>
                            </ul>
                            <a href="#" class="btn btn-primary btn-block"><b>Kembali</b></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"> <i class="fas fa-info-circle"></i> Informasi</h3>
                        </div>
                        <div class="card-body">

                            <strong><i class="fas fa-book mr-1"></i> Judul TA</strong>
                            <p class="text-muted">
                                <?= $topik_user->judul; ?>
                            </p>

                            <hr>

                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>
                            <p class="text-muted"> <?= $get_mahasiswa->alamat; ?>
                            </p>

                            <hr>

                            <strong><i class="fas fa-phone-alt mr-1"></i> No.HP</strong>


                            <p class="text-muted">
                                <?= $get_mahasiswa->hp; ?>
                            </p>

                            <hr>

                            <strong><i class="fas fa-house-user mr-1"></i> Tempat Tanggal Lahir</strong>


                            <p class="text-muted"> <?= $get_mahasiswa->ttl; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>