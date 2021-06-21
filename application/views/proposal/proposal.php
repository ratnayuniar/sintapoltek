<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Laporan</title>
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

        .header1 {
            font-family: 'Times New Roman', Times, serif;
            font-size: 12pt;
            text-align: left;
            color: black;
        }

        .isi {
            position: fixed;
            font-family: 'Times New Roman', Times, serif;
            font-size: 12pt;
            text-align: justify;
            line-height: 35px;
            margin-left: 20px;
            color: black;
            white-space: pre-line;
        }

        .ukuran {
            margin-top: 30px;
            margin-bottom: 30px;
            margin-left: 40px;
            margin-right: 30px;
        }

        p {
            white-space: pre-line;
        }
    </style>
</head>
<div>
    <p class="p"> <?= $proposal_user->latar_belakang; ?></p>
</div>

<body class="ukuran">
    <table border="1">
        <tr>
            <td>
                <p class="header1">
                    <b>A. LATAR BELAKANG</b>
                <p class="isi"><?= $proposal_user->latar_belakang; ?></p>
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <p class="header1">
                    <b>B. RUMUSAN MASALAH</b>
                </p>
                <p class="isi"><?= $proposal_user->rumusan_masalah; ?></p>
            </td>
        </tr>
    </table>



    <p class="header1">
        <b>C. BATASAN MASALAH</b>
    </p>
    <p class="isi"><?= $proposal_user->batasan_masalah; ?></p>
    <p class="header1">
        <b>D. TUJUAN</b>
    </p>
    <p class="isi"><?= $proposal_user->tujuan; ?></p>
    <p class="header1">
        <b>E. TINJAUAN PUSTAKA / LANDASAN TEORI</b>
    </p>
    <p class="isi"><?= $proposal_user->teori; ?></p>
    <p class="header1">
        <b>F. METODELOGI PENELITIAN</b>
    </p>
    <p class="isi"><?= $proposal_user->metode; ?></p>
</body>

</html>