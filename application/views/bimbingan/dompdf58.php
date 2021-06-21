<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bimbingan</title>
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .line-title {
            border: 0;
            border-style: inset;
            border-top: 3px solid #000;

        }

        .enter {
            font-size: 14pt;
            line-height: 20px;
            font-family: 'Times New Roman', Times, serif;
            color: black;

        }

        .alamat {
            font-size: 12pt;
            line-height: 20px;
            font-family: 'Times New Roman', Times, serif;
            color: black;

        }

        .spasi {
            line-height: 20px;
            font-family: 'Times New Roman', Times, serif;
            color: black;
            font-size: 12pt;
            margin-bottom: 1px;
        }

        .tabel {
            line-height: 20px;
            font-family: 'Times New Roman', Times, serif;
            color: black;
            font-size: 12pt;
            text-align: center;
            margin-bottom: 4px;
            text-align-last: left;
        }

        .tabel2 {
            line-height: 20px;
            font-family: 'Times New Roman', Times, serif;
            color: black;
            font-size: 12pt;
            text-align: left;
            margin-top: 1px;
            margin-bottom: 10px;
            margin-left: 3px;
            margin-right: 3px;
        }

        .tabel3 {
            line-height: 20px;
            font-family: 'Times New Roman', Times, serif;
            color: black;
            font-size: 12pt;
            text-align: justify;
            text-align-last: right;
            margin-top: 1px;
            margin-bottom: 10px;
            margin-left: 3px;
            margin-right: 3px;
        }

        .tabel4 {
            line-height: 20px;
            font-family: 'Times New Roman', Times, serif;
            color: black;
            font-size: 12pt;
            text-align: left;
            margin-top: 1px;
            margin-bottom: 100px;

        }

        .ganti_halaman {
            page-break-before: always;

        }
    </style>
</head>

<body>
    <!-- <img src="assets/img/pnm2.png" style="position: absolute; width: 60px; height:auto;">
    <table style="width: 100%;">
        <tr>
            <td align="center">
                <span style="line-height: 1.6; font-weight: bold; font-face:Times New Roman;">
                    POLITEKNIK NEGERI MADIUN
                    <br>Madiun Jawa Timur Indonesia
                </span>
            </td>
        </tr>
    </table>

    <hr class="line-title"> -->
    <center>
        <table border="0" width="700 px" style="margin-top: 0pt;margin-bottom:0px;">
            <tr>
                <td width="100 px">
                    <center><img src="http://localhost/sinta4/assets/img/PNM2.png" width="90" height="90"></center>
                </td>
                <td width="600 px">
                    <center>
                        <font size="4,5" face="Times New Roman" color="black">KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN</font>
                        <p class="spasi">
                            <font size="4"><b>POLITEKNIK NEGERI MADIUN</b><br></font>
                            <font size="4"><b>JURUSAN TEKNIK</b><br></font>
                            Jalan Serayu Nomor 84 Madiun Kode Pos 63133<br>
                            Telepon +62 351 452970 Faksimile +62 351 492960<br>
                            www.pnm.ac.id
                        </p>
                    </center>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <p>
                        <hr class="line-title">
                    </p>
                </td>
            </tr>
            <table width="700px" align="center">
                <tr>
                    <td colspan="2">
                        <center>
                            <p class="spasi" style="margin-bottom: 10px;">
                                <font size="4"><b>KARTU KONSULTASI / BIMBINGAN<br>
                                        PENYUSUNAN PROPOSAL TUGAS AKHIR MAHASISWA<br>
                                        TAHUN AKADEMIK 2020 / 2021<br></b></font>
                            </p>
                        </center>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="spasi">
                            Nama
                        </p>
                    </td>
                    <td>
                        <p class="spasi">
                            : <?= $get_mahasiswa->nama; ?>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="spasi">
                            NPM
                        </p>
                    </td>
                    <td>
                        <p class="spasi">
                            : <?= $get_mahasiswa->nim; ?>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td width="180 px">
                        <p class="spasi">
                            Program Studi / Angkatan
                        </p>
                    </td>
                    <td>
                        <p class="spasi">
                            : <?= $get_mahasiswa->nama_prodi; ?> / <?= $get_mahasiswa->angkatan; ?>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="spasi">
                            Alamat
                        </p>
                    </td>
                    <td>
                        <p class="spasi">
                            : <?= $get_mahasiswa->alamat; ?>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="spasi">
                            TTL
                        </p>
                    </td>
                    <td>
                        <p class="spasi">
                            : <?= $get_mahasiswa->ttl; ?>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="spasi">
                            No. HP
                        </p>
                    </td>
                    <td>
                        <p class="spasi">
                            : <?= $get_mahasiswa->hp; ?>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="spasi">
                            Judul TA
                        </p>
                    </td>
                    <td>
                        <p class="spasi"><b>
                                : <?= $topik_user->judul; ?>
                            </b></p>
                    </td>
                </tr>

            </table>
        </table>
        <br>
        <table border="1" width="700 px">

            <tr>
                <th>
                    <p class="tabel" width="40px">
                        <b>No.</b>
                    </p>
                </th>
                <th width="100px">
                    <p class="tabel">
                        <b>Tgl</b>
                    </p>
                </th>
                <th width="230px">
                    <p class="tabel">
                        <b>Masalah Yang Dikonsultasikan</b>
                    </p>
                </th>
                <th width="230px">
                    <p class="tabel">
                        <b>Hasil Bimbingan</b>
                    </p>
                </th>
                <th width="100px">
                    <p class="tabel">
                        <b>Paraf</b>
                    </p>
                </th>
            </tr>
            <?php
            $no = 1;
            foreach ($bimbingan_user58->result() as $row) { ?>
                <tr class="tabel2">
                    <td>
                        <p class="tabel2">
                            <?= $no++ ?>.
                        </p>
                    </td>
                    <td>
                        <p class="tabel2">
                            <?= $row->tanggal ?>
                        </p>
                    </td>
                    <td>
                        <p class="tabel2">
                            <?= $row->masalah ?>
                        </p>
                    </td>
                    <td>
                        <p class="tabel2">
                            <?= $row->solusi ?>
                        </p>
                    </td>
                    <td>
                        <b></b>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <br><br><br><br>
        <table border="0" width="750 px">
            <tr class="tabel3">
                <td></td>
                <td>
                    <p>
                        Madiun,
                        <?php
                        $waktu = explode(" ", $get_tanggal->tanggal);
                        echo
                        ""  . mediumdate_indo($waktu[0]) . " ";
                        ?>
                    </p>
                </td>
            </tr>
            <tr class="tabel3">
                <td>Mengetahui,</td>
                <td>Menyetujui,</td>
            </tr>
            <tr>
                <td>
                    <p class="tabel4">
                        Ketua Jurusan Teknik
                    </p>
                </td>
                <td>
                    <p class="tabel4">
                        Pembimbing <?= $get_dosen->status_dosen; ?>,
                    </p>
                </td>
            </tr>

            <tr class="tabel3">
                <td><b> Akbar Yanuar, S.ST., M.T.</b> </td>
                <td><b> <?= $get_dosen->dosen; ?></b></td>
            </tr>
            <tr class="tabel3">
                <td>NIP 199601182014041111 </td>
                <td>NIP. <?= $get_dosen->nip; ?></td>
            </tr>
        </table>

    </center>
</body>

</html>