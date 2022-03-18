<?php

require "function.php";


// cek apakah yang mengakses halaman ini sudah login



// if ($_SESSION['level'] == "") {
//     header("location:index.php");

// }



// tampilkan data absen
$query = mysqli_query($conn, "SELECT * FROM tamuundangan");




// jika tombol cari diklik
if (isset($_GET['submit'])) {

    if (tambah($_GET) > 0) {
        echo "<script>
            alert('Absensi berhasil ditambahkan !');
            document.location.href = 'home.php';
        </script>";
    } else {
        echo "<script>
            alert('Absensi gagal ditambahkan !');
            document.location.href = 'home.php';
        </script>";
    }
}



?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="dir/home.css">

    <title>Aplikasi Absensi PC IPM TAMPAN</title>
    <style type="text/css">
        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background-color: #fff;
        }

        .preloader .loading {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            font: 14px arial;
        }

       
    </style>

</head>

<body>

    <div class="preloader">
        <div class="loading">
            <img src="dir/images/logo.png" width="80">
            <p class="text-center fw-bold">Loading</p>
        </div>
    </div>
    
    <div class="container">

        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link active text-dark" aria-current="page" href="#">Hai, Selamat Datang di PC IPM TAMPAN !</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-muted" href="logout.php">logout</a>
            </li>
        </ul>

    </div>

    <div class="container mt-4">
        <div class="card">
            <div class="card-header fs-5 text-muted text-center">
                Selamat Datang di PC IPM TAMPAN, Silahkan Mengisi Absen Terlebih Dahulu <br>
                <img class="mt-4" src="dir/images/logo.png" alt="logoipm" width="70 px">
                <img class="mt-4" src="dir/images/logo tim media dan informasi ipm tampan.png" alt="logoipm" width="130 px">
                <p>PC IPM TAMPAN 2021-2023 & LEMBAGA MEDIA DAN INFORMASI IPM TAMPAN</p>
            </div>
            <div class="card-body">
                <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Silahkan isi absensi</button>
                <!-- modal -->
                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <!-- form -->
                            <form action="" method="GET">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Lakukan Absensi </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">


                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="nama" aria-describedby="nama" name="namalengkap" autocomplete="off" required autocomplete="off">
                                    </div>
                                    <div class="mb-3">
                                        <label for="nomortelp" class="form-label">Nomor hp/wa</label>
                                        <input type="number" class="form-control" id="nomortelp" name="nomortelp" required autocomplete="off">
                                    </div>

                                    <div class="mb-3">
                                        <label for="pimpinan" class="form-label">Asal Pimpinan / Utusan</label>
                                        <input type="text" class="form-control" id="pimpinan" name="asalpimpinan" required autocomplete="off">
                                    </div>



                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
                                </div>
                            </form>
                            <!-- akhir -->
                        </div>

                    </div>
                </div>
                <!-- akhir modal -->

                <table class="tg-table-paper mt-4">
                    <tr>
                        <?php date_default_timezone_set('Asia/Jakarta'); ?>
                        <th colspan="5" class="tg-center tg-bf text-end">Pekanbaru, <?= date('l d-m-Y H:i:s'); ?></th>
                    </tr>
                    <tr class="tg-even fw-bold">
                        <td>No</td>
                        <td>Nama Lengkap</td>
                        <td>Nomor HP / WA</td>
                        <td>Asal Pimpinan</td>
                        <td>Date</td>

                    </tr>

                    <?php $i = 1; ?>
                    <?php while ($data = mysqli_fetch_assoc($query)) : ?>
                        <tr class="tg-even">
                            <td><?= $i; ?></td>
                            <td><?= $data['namaLengkap']; ?></td>
                            <td><?= $data['noTelp']; ?></td>
                            <td><?= $data['asalPimpinan']; ?></td>
                            <td><?= $data['date']; ?></td>
                        </tr>
                        <?php $i++; ?>
                    <?php endwhile; ?>




                </table>

            </div>
        </div>


        <script>
            $(document).ready(function() {
                $("table").wrap("<div class='table-responsive'></div>");
                $("table").addClass("table");
            });
        </script>

        <script>
            $(document).ready(function() {
                $(".preloader").fadeOut();
            })
        </script>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>




</body>

</html>