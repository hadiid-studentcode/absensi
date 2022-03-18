<?php
// mengaktifkan session pada php
session_start();

// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "absensi");



function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $row = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function login($log)
{
    global $conn;

    //  menangkap data yang dikirim dari form login
    $username = $log['username'];
    $password = $log['password'];

    // menyeleksi data user dengan username dan password yang sesuai
    $login = mysqli_query($conn, "SELECT *FROM users WHERE username = '$username' AND password = '$password'");
    // menghitung jumlah data yang ditemukan pada database
    $cek = mysqli_num_rows($login);

    // cek apakah username dan password ditemukan pada database
    if ($cek > 0) {

        $data = mysqli_fetch_assoc($login);

        // cek jika user login sebagai ipmawan
        if ($data['level'] == 'ipmawan') {


            // buat session login dan username


            $_SESSION['username'] = $username;
            $_SESSION['level'] = 'ipmawan';




            // alihkan ke halaman dashboard admin
            header("Location:home.php");
        } else if (($data['level'] == 'ipmawati')) {

            $_SESSION['username'] = $username;
            $_SESSION['level'] = 'ipmawati';




            // alihkan ke halaman dashboard admin
            header("Location:home.php");


            // cek jika user login sebagai pegawai

        } else {
            // alihkan ke halaman login kembali
            header("Location:index.php?pesan=gagal");
        }
    } else {
        header("Location:index.php?pesan=gagal");
    }
}


function tambah($data)
{
    global $conn;
    $nama = strtolower(ucwords(htmlspecialchars(($data['namalengkap']))));
    $notelp = strtolower(ucwords(htmlspecialchars(($data['nomortelp']))));
    $asal = strtolower(ucwords(htmlspecialchars(($data['asalpimpinan']))));

    date_default_timezone_set('Asia/Jakarta');
    $date = date(' Y-m-d H:i:s');

   

    // query insert data
    $query = "INSERT INTO tamuundangan VALUES ('','$nama','$notelp','$asal','$date')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
