<script>
    function jumlahnilai() {
        var perumusan = document.getElementById("perumusan").value;
        var teori = document.getElementById("teori").value;
        var pemecahan = document.getElementById("pemecahan").value;
        var penulisan = document.getElementById("penulisan").value;
        var pustaka = document.getElementById("pustaka").value;
        var presentasi = document.getElementById("presentasi").value;
        var penguasaan = document.getElementById("penguasaan").value;
        // var rata = (parseInt(perumusan) + parseInt(teori) + parseInt(pemecahan) + parseInt(penulisan) + parseInt(pustaka)) / 5;
        // var nilai_akhir = ((parseInt(rata) * 3) + (parseInt(presentasi) * 2) + (parseInt(penguasaan) * 2)) / 7;
        var nilai_akhir = document.getElementById("nilai_akhir").value;
        var rata = document.getElementById("rata").value;
        var id_dosen = document.getElementById("id_dosen").value;
        document.getElementById("rata").value = rata.toFixed(1);
        document.getElementById("nilai_akhir").value = nilai_akhir.toFixed(1);
    }
</script>
<?php if (($this->session->userdata('level') == 3) || ($this->session->userdata('level') == 4)) { ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Input Nilai Mahasiswa</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('Beranda'); ?>">Beranda</a></li>
                            <li class="breadcrumb-item active">Data Penguji</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Data Nilai Seminar Proposal</h3>
                            </div>
                            <form action="<?php echo base_url() . 'nilai_seminar/add'; ?>" method="post" class="form-horizontal" role="form">
                                <div class="card-body">
                                    <!-- <input type="hidden" id="id_dosen" name="id_dosen" value="<?php echo $this->session->userdata('id_dosen'); ?>"> -->
                                    <input type="hidden" id="id_mahasiswa" name="id_mahasiswa" value="<?php echo $id_mahasiswa; ?>">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-5 col-form-label">Perumusan</label>
                                        <div class="col-sm-5">
                                            <input type="number" class="form-control hitung" id="perumusan" name="perumusan">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-5 col-form-label">Teori</label>
                                        <div class="col-sm-5">
                                            <input type="number" class="form-control hitung" id="teori" name="teori">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-5 col-form-label">Pemecahan</label>
                                        <div class="col-sm-5">
                                            <input type="number" class="form-control hitung" id="pemecahan" name="pemecahan">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-5 col-form-label">Penulisan</label>
                                        <div class="col-sm-5">
                                            <input type="number" class="form-control hitung" id="penulisan" name="penulisan">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-5 col-form-label">Daftar Pustaka</label>
                                        <div class="col-sm-5">
                                            <input type="number" class="form-control hitung" id="pustaka" name="pustaka">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-5 col-form-label">Presentasi</label>
                                        <div class="col-sm-5">
                                            <input type="number" class="form-control hitung" id="presentasi" name="presentasi">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-5 col-form-label">Penguasaan</label>
                                        <div class="col-sm-5">
                                            <input type="number" class="form-control hitung" id="penguasaan" name="penguasaan">
                                        </div>
                                    </div>
                                    <!-- <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-5 col-form-label ">Nilai Akhir Laporan</label>
                                        <div class="col-sm-5">
                                            <input type="number" class="form-control " id="nilai_akhir" name="nilai_akhir" readonly>
                                        </div>
                                    </div> -->
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-5 col-form-label ">Nilai Akhir Laporan</label>
                                        <div class="col-sm-5">
                                            <input type="number" class="form-control " id="nilai_akhir" name="nilai_akhir" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-5 col-form-label">Nilai Rata - Rata</label>
                                        <div class="col-sm-5">
                                            <input readonly type="text" class="form-control" id="rata" name="rata" placeholder="Nilai rata rata ">
                                        </div>
                                    </div>
                                    <!-- <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-5 col-form-label">Rata - Rata</label>
                                        <div class="col-sm-5">
                                            <input type="number" class="form-control" id="rata" name="rata" readonly>
                                        </div>
                                    </div> -->
                                </div>
                                <div class="card-footer">
                                    <button type="submit" onclick="jumlahnilai()" class="btn btn-info">Simpan</button>
                                    <button type="submit" class="btn btn-default float-right">Batal</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        function nilai_rata_rata() {
            var rata_rata = 0;
            $(".hitung").each(function() {
                var get_textbox_value = $(this).val();

                if ($.isNumeric(get_textbox_value)) {
                    rata_rata += parseFloat(get_textbox_value);
                }
            });
            var n = rata_rata / $(".hitung").length;
            var pembulatan_nilai_rata_rata = n.toFixed(2);
            var n = rata_rata;
            var nilaiakhir = n.toFixed(2);
            $("#rata").val(pembulatan_nilai_rata_rata)
            $("#nilai_akhir").val(nilaiakhir)
        }

        $(document).ready(function() {
            $(".hitung").keyup(function() {
                nilai_rata_rata();
            });
        });
        nilai_rata_rata();
    </script>
<?php } else { ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <?php
                        $this->db->select('*');
                        $this->db->from('user');
                        $this->db->join('mahasiswa', 'mahasiswa.nim=user.nim');
                        $this->db->where("user.id_user", $nilai_seminar->id_mahasiswa);
                        $result = $this->db->get()->row();
                        ?>
                        <h1>Nilai Mahasiswa <?php echo $result->nama ?></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('Beranda'); ?>">Beranda</a></li>
                            <li class="breadcrumb-item active">Data Penguji</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <?php
        $this->db->select('*');
        $this->db->from('nilai_seminar');
        $this->db->where('id_mahasiswa', $nilai_seminar->id_mahasiswa);
        $result = $this->db->get();
        foreach ($result->result() as $row) {
            $data['namadosen'] = $this->m_pembimbing->getdosen1($row->id_dosen);
        ?>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Data Nilai Penguji <?php echo $data['namadosen']->nama ?> Seminar Proposal</h3>
                                </div>

                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-5 col-form-label">Perumusan Masalah, Tujuan dan Manfaat TA</label>
                                        <div class="col-sm-1">
                                            <input type="number" class="form-control" id="perumusan" name="perumusan" value="<?= $row->perumusan; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-5 col-form-label">Kerangka Teori Penunjang</label>
                                        <div class="col-sm-1">
                                            <input type="number" class="form-control" id="teori" name="teori" value="<?= $row->teori; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-5 col-form-label">Pemecahan Masalah</label>
                                        <div class="col-sm-1">
                                            <input type="number" class="form-control" id="pemecahan" name="pemecahan" value="<?= $row->pemecahan; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-5 col-form-label">Sistematika Penulisan dan Bahasa</label>
                                        <div class="col-sm-1">
                                            <input type="number" class="form-control" id="penulisan" name="penulisan" value="<?= $row->penulisan; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-5 col-form-label">Sumber Pustaka</label>
                                        <div class="col-sm-1">
                                            <input type="number" class="form-control" id="pustaka" name="pustaka" value="<?= $row->pustaka; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-5 col-form-label">Penyajian / Presentasi</label>
                                        <div class="col-sm-1">
                                            <input type="number" class="form-control" id="presentasi" name="presentasi" value="<?= $row->presentasi; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-5 col-form-label">Penguasaan Materi dalam Menjawab Pertanyaan</label>
                                        <div class="col-sm-1">
                                            <input type="number" class="form-control" id="penguasaan" name="penguasaan" value="<?= $row->penguasaan; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-5 col-form-label">Rata - Rata Nilai Isi</label>
                                        <div class="col-sm-2">
                                            <input type="number" class="form-control" id="rata" name="rata" value="<?= $row->rata; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-5 col-form-label">Nilai Akhir Proposal TA</label>
                                        <div class="col-sm-2">
                                            <input type="number" class="form-control" id="nilai_akhir" name="nilai_akhir" value="<?= $row->nilai_akhir; ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php
        }
        ?>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <?php
                                $this->db->select('*');
                                $this->db->from('user');
                                $this->db->join('mahasiswa', 'mahasiswa.nim=user.nim');
                                $this->db->where("user.id_user", $nilai_seminar->id_mahasiswa);
                                $result = $this->db->get()->row();
                                ?>
                                <h3 class="card-title">Total Hasil Nilai Akhir Mahasiswa <?php echo $result->nama ?></h3>
                            </div>
                            <div class="card-body">
                                <?php
                                $this->db->select('AVG(rata) as rata, sum(nilai_akhir) as nilaiakhir');
                                $this->db->where('id_mahasiswa', $row->id_mahasiswa);
                                $result = $this->db->get('nilai_seminar')->row();
                                ?>
                                <?= $result->nilaiakhir ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <?php
                                $this->db->select('*');
                                $this->db->from('user');
                                $this->db->join('mahasiswa', 'mahasiswa.nim=user.nim');
                                $this->db->where("user.id_user", $nilai_seminar->id_mahasiswa);
                                $result = $this->db->get()->row();
                                ?>
                                <h3 class="card-title">Rata - Rata Nilai Akhir Mahasiswa <?php echo $result->nama ?></h3>
                            </div>
                            <div class="card-body">
                                <?php
                                $this->db->select('AVG(rata) as rata, sum(nilai_akhir) as nilaiakhir');
                                $this->db->where('id_mahasiswa', $row->id_mahasiswa);
                                $result = $this->db->get('nilai_seminar')->row();
                                $rata = number_format($result->rata, 1, '.', '');
                                ?>
                                <?= $rata ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php } ?>