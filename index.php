<?php
include "function.php";

setcookie("absen", "kader ", time() + (86400 * 30), "/");



if (isset($_POST["submit"])) {


    if (login($_POST) > 0) {
        echo "<script>
            alert('sukses login !');
        </script>";
    } else {
        echo mysqli_error($conn);
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

    <link rel="stylesheet" href="dir/style.css">

    <title>Login</title>
</head>

<body class="container">




    <div class=" form-signin card login text-center">
        <div class="card-header text-light fs-5">Selamat Datang</div>
        <div class="card-body">
            <form action="" method="POST">

                <?php
                if (isset($_GET['pesan'])) {

                    if ($_GET['pesan'] == "gagal") {
                        echo "<div class = 'alert'>Username dan password tidak sesuai !</div>";
                    }
                }
                ?>

                <img class="mb-4" src="dir/images/logo.png" alt="" width="50">
                <h1 class="h3 mb-3 fw-normal text-light">Login</h1>

                <div class="form-floating">
                    <input type="text" class="form-control" id="username" placeholder="username" name="username" required>
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" required>
                    <label for="floatingPassword">Password</label>
                </div>

                <button class="w-100 btn btn-success btn-lg" type="submit" name="submit">Sign in</button>
                <p class="mt-5 mb-3 footer">&copy; 2022-2023</p>
            </form>
        </div>








        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>



</body>

</html>