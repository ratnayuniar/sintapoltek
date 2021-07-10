<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="<?php echo base_url(); ?>" class="brand-link">
        <i class="fas fa-graduation-cap mt-2 ml-3 pb-2"></i>
        <span class="brand-text font-weight-light">SINTA</span><B> PNM</B>

    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <!-- <img src="<?= base_url('admin/dist/img/') . $session['image']; ?>" class="img-circle elevation-2" alt="User Image"> -->
            </div>
            <div class="info">
                <!-- <a href="<?php echo base_url('profile'); ?>" class="d-block"><?= $this->session->nama; ?><?= $this->session->nama_mhs; ?></a> -->
                <a href="#" class="d-block"><?php echo $this->session->userdata('nama') ?></a>
            </div>
        </div>
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- SEMUA USER -->

                <!-- USER ADMIN -->
                <?php if ($this->session->userdata('level') == 1) { ?>
                    <li class="nav-item">
                        <a href="<?php echo base_url('beranda'); ?>" class="nav-link <?= activate_menu('beranda') ?>">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                Beranda
                            </p>
                        </a>
                    </li>
                    <li class="nav-item 
                    <?php if (
                        $this->uri->segment(1) == 'pembimbing' || $this->uri->segment(1) == 'bks_seminar'
                        || $this->uri->segment(1) == 'penguji' || $this->uri->segment(1) == 'jadwal_seminar'
                        || $this->uri->segment(1) == 'nilai_seminar'
                        || $this->uri->segment(1) == 'revisi_seminar'
                    ) {
                        echo "menu-open";
                    } ?>">
                        <a href="#" class="nav-link 
                        <?php if (
                            $this->uri->segment(1) == 'pembimbing' || $this->uri->segment(1) == 'bks_seminar'
                            || $this->uri->segment(1) == 'penguji' || $this->uri->segment(1) == 'jadwal_seminar'
                            || $this->uri->segment(1) == 'revisi_seminar' || $this->uri->segment(1) == 'nilai_seminar'
                        ) {
                            echo "active";
                        } ?>">
                            <i class="nav-icon fas fa-book-open"></i>
                            <p>
                                Proposal
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url('pembimbing'); ?>" class="nav-link <?php if ($this->uri->segment(1) == 'pembimbing') {
                                                                                                    echo "active";
                                                                                                } ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Dosen Pembimbing</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('bks_seminar'); ?>" class="nav-link <?= activate_menu('bks_seminar') ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Registrasi Seminar</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('penguji'); ?>" class="nav-link <?= activate_menu('penguji') ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Dosen Penguji Seminar</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('jadwal_seminar'); ?>" class="nav-link <?= activate_menu('jadwal_seminar') ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Jadwal Seminar</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('nilai_seminar'); ?>" class="nav-link <?= activate_menu('nilai_seminar') ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Nilai Seminar</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('revisi_seminar'); ?>" class="nav-link <?= activate_menu('revisi_seminar') ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Hasil Seminar</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item 
                    <?php if (
                        $this->uri->segment(1) == 'bks_sidang' || $this->uri->segment(1) == 'penguji_sidang'
                        || $this->uri->segment(1) == 'jadwal_sidang' || $this->uri->segment(1) == 'nilai_sidang'
                        || $this->uri->segment(1) == 'revisi_sidang'
                    ) {
                        echo "menu-open";
                    } ?>">
                        <a href="#" class="nav-link  
                        <?php if (
                            $this->uri->segment(1) == 'bks_sidang' || $this->uri->segment(1) == 'penguji_sidang'
                            || $this->uri->segment(1) == 'jadwal_sidang' || $this->uri->segment(1) == 'nilai_sidang'
                            || $this->uri->segment(1) == 'revisi_sidang'
                        ) {
                            echo "active";
                        } ?> ">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                Tugas Akhir
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url('bks_sidang'); ?>" class="nav-link <?= activate_menu('bks_sidang') ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Registrasi Sidang</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('penguji_sidang'); ?>" class="nav-link <?= activate_menu('penguji_sidang') ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Dosen Penguji Sidang</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('jadwal_sidang'); ?>" class="nav-link <?= activate_menu('jadwal_sidang') ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Jadwal Sidang</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('nilai_sidang'); ?>" class="nav-link <?= activate_menu('nilai_sidang') ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Nilai Sidang</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('revisi_sidang'); ?>" class="nav-link <?= activate_menu('revisi_sidang') ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Hasil Sidang</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item <?php if (
                                            $this->uri->segment(1) == 'bks_wisuda' || $this->uri->segment(1) == 'jadwal_wisuda'
                                        ) {
                                            echo "menu-open";
                                        } ?>">
                        <a href="#" class="nav-link <?php if (
                                                        $this->uri->segment(1) == 'bks_wisuda' || $this->uri->segment(1) == 'jadwal_wisuda'
                                                    ) {
                                                        echo "active";
                                                    } ?>">
                            <i class="nav-icon fas fa-file-archive"></i>
                            <p>
                                Wisuda
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url('bks_wisuda'); ?>" class="nav-link <?= activate_menu('bks_wisuda') ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Berkas Prodi</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('jadwal_wisuda'); ?>" class="nav-link <?= activate_menu('jadwal_wisuda') ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Jadwal Wisuda</p>
                                </a>
                            </li>
                            <!--                           
                            <li class="nav-item">
                                <a href="<?php echo base_url('bks_wisuda'); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Berkas Wisuda
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('bks_wisuda'); ?>" class="nav-link">
                                            <i class="far fa-dot-circle nav-icon"></i>
                                            <p>Daftar Wisuda</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('bks_pkl'); ?>" class="nav-link">
                                            <i class="far fa-dot-circle nav-icon"></i>
                                            <p>Magang / PKL</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('bks_keterampilan'); ?>" class="nav-link">
                                            <i class="far fa-dot-circle nav-icon"></i>
                                            <p>Keterampilan</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('bks_prestasi'); ?>" class="nav-link">
                                            <i class="far fa-dot-circle nav-icon"></i>
                                            <p>Prestasi</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('bks_organisasi'); ?>" class="nav-link">
                                            <i class="far fa-dot-circle nav-icon"></i>
                                            <p>Organisasi</p>
                                        </a>
                                    </li>
                                </ul>
                            </li> -->
                        </ul>
                    </li>
                <?php }  ?>
                <!-- USER MAHASISWA -->
                <?php if ($this->session->userdata('level') == 2) { ?>
                    <li class="nav-item">
                        <a href="<?php echo base_url('beranda'); ?>" class="nav-link <?= activate_menu('beranda') ?>">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                Beranda
                            </p>
                        </a>
                    </li>
                    <li class="nav-item 
                    <?php if (
                        $this->uri->segment(1) == 'topik' || $this->uri->segment(1) == 'pembimbing'
                        || $this->uri->segment(1) == 'proposal' || $this->uri->segment(1) == 'bimbingan1'
                        || $this->uri->segment(1) == 'bimbingan2' || $this->uri->segment(1) == 'bks_seminar'
                        || $this->uri->segment(1) == 'penguji' || $this->uri->segment(1) == 'revisi_seminar'
                    ) {
                        echo "menu-open";
                    } ?> ">
                        <a href="#" class="nav-link 
                        <?php if (
                            $this->uri->segment(1) == 'topik' || $this->uri->segment(1) == 'pembimbing'
                            || $this->uri->segment(1) == 'proposal' || $this->uri->segment(1) == 'bimbingan1'
                            || $this->uri->segment(1) == 'bimbingan2' || $this->uri->segment(1) == 'bks_seminar'
                            || $this->uri->segment(1) == 'penguji' || $this->uri->segment(1) == 'revisi_seminar'
                        ) {
                            echo "active";
                        } ?>">
                            <i class="nav-icon fas fa-book-open"></i>
                            <p>
                                Proposal
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url('topik'); ?>" class="nav-link <?= activate_menu('topik') ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Pengajuan Judul</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('pembimbing'); ?>" class="nav-link <?= activate_menu('pembimbing') ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Dosen Pembimbing</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('proposal'); ?>" class="nav-link <?= activate_menu('proposal') ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Buat Proposal</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(''); ?>" class="nav-link ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Bimbingan Proposal</p>
                                    <i class="fas fa-angle-left right"></i>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('bimbingan1'); ?>" class="nav-link ">
                                            <i class="far fa-dot-circle nav-icon"></i>
                                            <p>Dosen Pembimbing 1</p>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('bimbingan2'); ?>" class="nav-link ">
                                            <i class="far fa-dot-circle nav-icon"></i>
                                            <p>Dosen Pembimbing 2</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('bks_seminar'); ?>" class="nav-link <?= activate_menu('bks_seminar') ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Registrasi Seminar</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('penguji'); ?>" class="nav-link <?= activate_menu('penguji') ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Jadwal Seminar</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('revisi_seminar'); ?>" class="nav-link <?= activate_menu('revisi_seminar') ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Hasil Seminar</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item 
                    <?php if (
                        $this->uri->segment(1) == 'profil_ta' || $this->uri->segment(2) == 'bimbingan1_ta'
                        || $this->uri->segment(2) == 'bimbingan2_ta' || $this->uri->segment(1) == 'bks_sidang'
                        || $this->uri->segment(1) == 'penguji_sidang' || $this->uri->segment(1) == 'revisi_sidang'
                        || $this->uri->segment(1) == 'revisi_upload'
                    ) {
                        echo "menu-open";
                    } ?>">
                        <a href="#" class="nav-link 
                        <?php if (
                            $this->uri->segment(1) == 'profil_ta' || $this->uri->segment(2) == 'bimbingan1_ta'
                            || $this->uri->segment(2) == 'bimbingan2_ta' || $this->uri->segment(1) == 'bks_sidang'
                            || $this->uri->segment(1) == 'penguji_sidang' || $this->uri->segment(1) == 'revisi_sidang'
                            || $this->uri->segment(1) == 'revisi_upload'
                        ) {
                            echo "active";
                        } ?>">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                Tugas Akhir
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url('profil_ta'); ?>" class="nav-link <?= activate_menu('profil_ta') ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Profil TA</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(''); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Bimbingan TA</p>
                                    <i class="fas fa-angle-left right"></i>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('bimbingan1/bimbingan1_ta'); ?>" class="nav-link ">
                                            <i class="far fa-dot-circle nav-icon"></i>
                                            <p>Dosen Pembimbing 1</p>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('bimbingan2/bimbingan2_ta'); ?>" class="nav-link ">
                                            <i class="far fa-dot-circle nav-icon"></i>
                                            <p>Dosen Pembimbing 2</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('bks_sidang'); ?>" class="nav-link <?= activate_menu('bks_sidang') ?> ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Registrasi Sidang</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('penguji_sidang'); ?>" class="nav-link <?= activate_menu('penguji_sidang') ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Jadwal Sidang</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('revisi_sidang'); ?>" class="nav-link <?= activate_menu('revisi_sidang') ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Hasil Sidang</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('revisi_upload'); ?>" class="nav-link <?= activate_menu('revisi_upload') ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Revisi</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item 
                    <?php if (
                        $this->uri->segment(1) == 'bks_wisuda' || $this->uri->segment(1) == 'bks_bahasa'
                        || $this->uri->segment(1) == 'bks_pkl' || $this->uri->segment(1) == 'bks_keterampilan'
                        || $this->uri->segment(1) == 'bks_prestasi' || $this->uri->segment(2) == 'detaildata_mhs'
                        || $this->uri->segment(1) == 'veri_perpus/detaildata_mhs' || $this->uri->segment(1) == 'verif_keuangan/detaildata_mhs'
                        || $this->uri->segment(1) == 'veri_perpus/detaildata_mhs'
                    ) {
                        echo "menu-open";
                    } ?>">
                        <a href="#" class="nav-link  
                        <?php if (
                            $this->uri->segment(1) == 'bks_wisuda' || $this->uri->segment(1) == 'bks_bahasa'
                            || $this->uri->segment(1) == 'bks_pkl' || $this->uri->segment(1) == 'bks_keterampilan'
                            || $this->uri->segment(1) == 'bks_prestasi' || $this->uri->segment(2) == 'detaildata_mhs'
                            || $this->uri->segment(1) == 'veri_perpus/detaildata_mhs' || $this->uri->segment(1) == 'verif_keuangan/detaildata_mhs'
                            || $this->uri->segment(1) == 'veri_perpus/detaildata_mhs'
                        ) {
                            echo "active";
                        } ?> ">
                            <i class="nav-icon fas fa-file-archive"></i>
                            <p>
                                Wisuda
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url('bks_wisuda'); ?>" class="nav-link <?= activate_menu('bks_wisuda') ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Prodi</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('bks_bahasa'); ?>" class="nav-link <?= activate_menu('bks_bahasa') ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Bahasa</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('bks_pkl'); ?>" class="nav-link <?= activate_menu('bks_pkl') ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Magang</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('bks_keterampilan'); ?>" class="nav-link <?= activate_menu('bks_keterampilan') ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Keterampilan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('bks_prestasi'); ?>" class="nav-link <?= activate_menu('bks_prestasi') ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Prestasi</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('verif_baak/detaildata_mhs'); ?>" class="nav-link <?= activate_menu('verif_baak/detaildata_mhs') ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data BAAK</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('veri_perpus/detaildata_mhs'); ?>" class="nav-link <?= activate_menu('veri_perpus/detaildata_mhs') ?> ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Perpustakaan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('verif_keuangan/detaildata_mhs'); ?>" class="nav-link <?= activate_menu('verif_keuangan/detaildata_mhs') ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Keuangan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('verif_lab/detaildata_mhs'); ?>" class="nav-link <?= activate_menu('verif_lab/detaildata_mhs') ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data LAB</p>
                                </a>
                            </li>


                        </ul>
                    </li>
                <?php } ?>
                <!-- USER DOSEN -->
                <?php if ($this->session->userdata('level') == 3) { ?>
                    <li class="nav-item">
                        <a href="<?php echo base_url('beranda'); ?>" class="nav-link <?= activate_menu('beranda') ?>">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                Beranda
                            </p>
                        </a>
                    </li>
                    <li class="nav-item
                    <?php if (
                        $this->uri->segment(1) == 'nilai_seminar'
                        || $this->uri->segment(1) == 'revisi_seminar'
                    ) {
                        echo "menu-open";
                    } ?>">
                        <a href="#" class="nav-link 
                        <?php if (
                            $this->uri->segment(1) == 'revisi_seminar' || $this->uri->segment(1) == 'nilai_seminar'
                        ) {
                            echo "active";
                        } ?>">
                            <i class="nav-icon fas fa-book-open"></i>
                            <p>
                                Proposal
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url(''); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Bimbingan Proposal</p>
                                    <i class="fas fa-angle-left right"></i>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('bimbingan1'); ?>" class="nav-link">
                                            <i class="far fa-dot-circle nav-icon"></i>
                                            <p>Dosen Pembimbing 1</p>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('bimbingan2'); ?>" class="nav-link">
                                            <i class="far fa-dot-circle nav-icon"></i>
                                            <p>Dosen Pembimbing 2</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('nilai_seminar'); ?>" class="nav-link <?php if ($this->uri->segment(1) == 'nilai_seminar') {
                                                                                                        echo "active";
                                                                                                    } ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Nilai Seminar</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('revisi_seminar'); ?>" class="nav-link <?php if ($this->uri->segment(1) == 'revisi_seminar') {
                                                                                                        echo "active";
                                                                                                    } ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Hasil Seminar</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item 
                    <?php if (
                        $this->uri->segment(1) == 'nilai_sidang'
                        || $this->uri->segment(1) == 'revisi_sidang' || $this->uri->segment(1) == 'revisi_upload'
                    ) {
                        echo "menu-open";
                    } ?> ">
                        <a href="#" class="nav-link 
                        <?php if (
                            $this->uri->segment(1) == 'revisi_sidang' || $this->uri->segment(1) == 'nilai_sidang' || $this->uri->segment(1) == 'revisi_upload'
                        ) {
                            echo "active";
                        } ?>">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                Tugas Akhir
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url(''); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Bimbingan TA</p>
                                    <i class="fas fa-angle-left right"></i>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('bimbingan1/bimbingan1_ta'); ?>" class="nav-link">
                                            <i class="far fa-dot-circle nav-icon"></i>
                                            <p>Dosen Pembimbing 1</p>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('bimbingan2/bimbingan2_ta'); ?>" class="nav-link">
                                            <i class="far fa-dot-circle nav-icon"></i>
                                            <p>Dosen Pembimbing 2</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('nilai_sidang'); ?>" class="nav-link <?php if ($this->uri->segment(1) == 'nilai_sidang') {
                                                                                                        echo "active";
                                                                                                    } ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Nilai Sidang</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('revisi_sidang'); ?>" class="nav-link <?php if ($this->uri->segment(1) == 'revisi_sidang') {
                                                                                                        echo "active";
                                                                                                    } ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Hasil Sidang</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('revisi_upload'); ?>" class="nav-link <?php if ($this->uri->segment(1) == 'revisi_upload') {
                                                                                                        echo "active";
                                                                                                    } ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Revisi</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- <li class="nav-item">
                        <a href="#" class="nav-link ">
                            <i class="nav-icon fas fa-users-cog"></i>
                            <p>
                                Penguji & Pembimbing
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url('pembimbing'); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Dosen Pembimbing</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('penguji'); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Dosen Penguji Seminar</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('penguji_sidang'); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Dosen Penguji Sidang</p>
                                </a>
                            </li>
                        </ul>
                    </li> -->
                    <!-- <li class="nav-item">
                        <a href="#" class="nav-link ">
                            <i class="nav-icon fas fa-clipboard"></i>
                            <p>
                                Nilai
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url('nilai_seminar'); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Nilai Seminar</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('nilai_sidang'); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Nilai Sidang</p>
                                </a>
                            </li>
                        </ul>
                    </li> -->
                    <!-- <li class="nav-item">
                        <a href="#" class="nav-link ">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>
                                Lembar Bimbingan
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url('bimbingan1'); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Dosen Pembimbing 1</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('bimbingan2'); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Dosen Pembimbing 2</p>
                                </a>
                            </li>
                        </ul>
                    </li> -->
                <?php } ?>
                <!-- USER KAPRODI -->
                <?php if ($this->session->userdata('level') == 4) { ?>
                    <li class="nav-item">
                        <a href="<?php echo base_url('beranda'); ?>" class="nav-link <?= activate_menu('beranda') ?>">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                Beranda
                            </p>
                        </a>
                    </li>
                    <li class="nav-item
                    <?php if (
                        $this->uri->segment(1) == 'topik' || $this->uri->segment(1) == 'nilai_seminar'
                        || $this->uri->segment(1) == 'revisi_seminar'
                    ) {
                        echo "menu-open";
                    } ?>">
                        <a href="#" class="nav-link 
                        <?php if (
                            $this->uri->segment(1) == 'topik' ||
                            $this->uri->segment(1) == 'revisi_seminar' || $this->uri->segment(1) == 'nilai_seminar'
                        ) {
                            echo "active";
                        } ?> ">
                            <i class="nav-icon fas fa-book-open"></i>
                            <p>
                                Proposal
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url('topik'); ?>" class="nav-link 
                                <?php if ($this->uri->segment(1) == 'topik') {
                                    echo "active";
                                } ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Pengajuan Tugas Akhir</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(''); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Bimbingan Proposal</p>
                                    <i class="fas fa-angle-left right"></i>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('bimbingan1'); ?>" class="nav-link">
                                            <i class="far fa-dot-circle nav-icon"></i>
                                            <p>Dosen Pembimbing 1</p>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('bimbingan2'); ?>" class="nav-link">
                                            <i class="far fa-dot-circle nav-icon"></i>
                                            <p>Dosen Pembimbing 2</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('nilai_seminar'); ?>" class="nav-link
                                <?php if ($this->uri->segment(1) == 'nilai_seminar') {
                                    echo "active";
                                } ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Nilai Seminar</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('revisi_seminar'); ?>" class="nav-link
                                <?php if ($this->uri->segment(1) == 'revisi_seminar') {
                                    echo "active";
                                } ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Hasil Seminar</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item 
                    <?php if (
                        $this->uri->segment(1) == 'revisi_upload' || $this->uri->segment(1) == 'nilai_sidang'
                        || $this->uri->segment(1) == 'revisi_sidang'
                    ) {
                        echo "menu-open";
                    } ?>
                    ">
                        <a href="#" class="nav-link 
                        <?php if (
                            $this->uri->segment(1) == 'revisi_upload' || $this->uri->segment(1) == 'revisi_sidang'
                            || $this->uri->segment(1) == 'nilai_sidang'
                        ) {
                            echo "active";
                        } ?> ">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                Tugas Akhir
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url(''); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Bimbingan TA</p>
                                    <i class="fas fa-angle-left right"></i>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('bimbingan1'); ?>" class="nav-link">
                                            <i class="far fa-dot-circle nav-icon"></i>
                                            <p>Dosen Pembimbing 1</p>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('bimbingan2'); ?>" class="nav-link">
                                            <i class="far fa-dot-circle nav-icon"></i>
                                            <p>Dosen Pembimbing 2</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('nilai_sidang'); ?>" class="nav-link <?= activate_menu('nilai_sidang') ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Nilai Sidang</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('revisi_sidang'); ?>" class="nav-link <?= activate_menu('revisi_sidang') ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Hasil Sidang</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('revisi_upload'); ?>" class="nav-link <?= activate_menu('revisi_upload') ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Revisi</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- <li class="nav-item">
                        <a href="<?php echo base_url('topik'); ?>" class="nav-link">
                            <i class="nav-icon fas fa-book-open"></i>
                            <p>
                                Topik Tugas Akhir
                            </p>
                        </a>
                    </li> -->
                    <!-- <li class="nav-item">
                        <a href="<?php echo base_url('bimbingandosen'); ?>" class="nav-link">
                            <i class="nav-icon fas fa-chalkboard-teacher"></i>
                            <p>
                                Bimbingan
                            </p>
                        </a>
                    </li> -->
                    <!-- <li class="nav-item">
                        <a href="#" class="nav-link ">
                            <i class="nav-icon fas fa-users-cog"></i>
                            <p>
                                Penguji & Pembimbing
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url('pembimbing'); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Dosen Pembimbing</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('penguji'); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Dosen Penguji Seminar</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('penguji_sidang'); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Dosen Penguji Sidang</p>
                                </a>
                            </li>
                        </ul>
                    </li> -->
                    <!-- <li class="nav-item">
                        <a href="#" class="nav-link ">
                            <i class="nav-icon fas fa-calendar-alt"></i>
                            <p>
                                Jadwal
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url('jadwal_seminar'); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Jadwal Seminar</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('jadwal_sidang'); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Jadwal Sidang</p>
                                </a>
                            </li>
                        </ul>
                    </li> -->
                    <!-- <li class="nav-item">
                        <a href="#" class="nav-link ">
                            <i class="nav-icon fas fa-clipboard"></i>
                            <p>
                                Nilai
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url('nilai_seminar'); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Nilai Seminar</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('nilai_sidang'); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Nilai Sidang</p>
                                </a>
                            </li>
                        </ul>
                    </li> -->
                    <!-- <li class="nav-item">
                        <a href="#" class="nav-link ">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>
                                Lembar Bimbingan
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url('bimbingan1'); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Dosen Pembimbing 1</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('bimbingan2'); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Dosen Pembimbing 2</p>
                                </a>
                            </li>
                        </ul>
                    </li> -->
                <?php } ?>
                <!-- USER PERPUSTAKAAN -->
                <?php if ($this->session->userdata('level') == 6) { ?>
                    <li class="nav-item">
                        <a href="<?php echo base_url('beranda'); ?>" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                Beranda
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('veri_perpus'); ?>" class="nav-link">
                            <i class="nav-icon fas fa-user-check"></i>
                            <p>
                                Verifikasi
                            </p>
                        </a>
                    </li>
                <?php } ?>
                <!-- USER LAB -->
                <?php if ($this->session->userdata('level') == 8) { ?>
                    <li class="nav-item">
                        <a href="<?php echo base_url('beranda'); ?>" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                Beranda
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('verif_lab'); ?>" class="nav-link">
                            <i class="nav-icon fas fa-user-check"></i>
                            <p>
                                Verifikasi
                            </p>
                        </a>
                    </li>
                <?php } ?>
                <!-- USER BAHASA -->
                <?php if ($this->session->userdata('level') == 9) { ?>
                    <li class="nav-item">
                        <a href="<?php echo base_url('beranda'); ?>" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                Beranda
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('bks_bahasa/admin'); ?>" class="nav-link">
                            <i class="nav-icon fas fa-user-check"></i>
                            <p>
                                Verifikasi
                            </p>
                        </a>
                    </li>
                <?php } ?>
                <!-- USER BAAK -->
                <?php if ($this->session->userdata('level') == 7) { ?>
                    <li class="nav-item">
                        <a href="<?php echo base_url('beranda'); ?>" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                Beranda
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('verif_baak'); ?>" class="nav-link">
                            <i class="nav-icon fas fa-user-check"></i>
                            <p>
                                Verifikasi
                            </p>
                        </a>
                    </li>
                <?php } ?>
                <!-- USER KEUANGAN -->
                <?php if ($this->session->userdata('level') == 5) { ?>
                    <li class="nav-item">
                        <a href="<?php echo base_url('beranda'); ?>" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                Beranda
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('verif_keuangan'); ?>" class="nav-link">
                            <i class="nav-icon fas fa-user-check"></i>
                            <p>
                                Verifikasi
                            </p>
                        </a>
                    </li>
                <?php } ?>
                <!-- SEMUA USER -->
                <li class="nav-item">
                    <a href="<?php echo base_url('auth/logout'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
                </li>
            </ul>
        </nav>
    </div>
</aside>