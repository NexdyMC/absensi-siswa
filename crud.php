<?php
include 'db/db_sekolah.php'; // db_siswa
include 'db/db_absensi.php'; // db_absensi

// buat akun siswa
if (isset($_POST['buat_akun'])) {
    $nama                   = $_POST['nama'];
    $kelas                  = $_POST['kelas'];
    $tanggal                = $_POST['tanggal'];
    $bulan                  = $_POST['bulan'];
    $tahun                  = $_POST['tahun'];
    $gender                 = $_POST['gender'];
    $hobi                   = $_POST['hobi'];
    $alamat                 = $_POST['alamat'];
    $email                  = $_POST['email'];
    $password               = $_POST['password'];
    $konfirmasi_password    = $_POST['konfirmasi_password'];
    
    // if ($password == $konfirmasi_password) {
    // } 
        $simpan = mysqli_query($db_sekolah, 
        "INSERT INTO siswa (nama, kelas, hobi, hari, bulan, tahun, gender, alamat, email, password) VALUES 
            ('$nama', '$kelas', '$hobi', '$tanggal', '$bulan', '$tahun', '$gender', '$alamat', '$email', '$password')
        ");

    if($simpan){
        echo "<script>alert('Data Berhasil Disimpan');
            document.location='dashboard.php'</script>";
    } else {
        echo "<script>alert('Data Gagal Disimpan');
            document.location='dashboard.php'</script>";
    }
}

// daftar siswa
if (isset($_POST['daftar_siswa'])) {
    $nama_lengkap    = $_POST['nama_lengkap'];
    $kelas          = $_POST['kelas'];
    $hobi           = $_POST['hobi'];
    $hari           = $_POST['hari'];
    $bulan          = $_POST['bulan'];
    $tahun          = $_POST['tahun'];
    $gender         = $_POST['gender'];
    $alamat         = $_POST['alamat'];
    $email          = $_POST['email'];
    $password       = $_POST['password'];
    
    $simpan = mysqli_query($db_sekolah, 
    "INSERT INTO siswa (nama, kelas, hobi, hari, bulan, tahun, gender, alamat, email, password) VALUES 
        ('$nama_lengkap', '$kelas', '$hobi', '$hari', '$bulan', '$tahun', '$gender', '$alamat', '$email', '$password')
    ");

    if($simpan){
        echo "<script>alert('Data Berhasil Disimpan');
            document.location='dashboard.php'</script>";
    } else {
        echo "<script>alert('Data Gagal Disimpan');
            document.location='dashboard.php'</script>";
    }
}

// absen siswa
// if (isset($_POST['absen_siswa'])) {
//     date_default_timezone_set("Asia/Jakarta");

//     $nis  = $_POST['siswa_nis'];
//     $kelas      = $_POST['kelas'];
//     $tanggal    = $_POST['tanggal'];
//     $alasan    = $_POST['alasan'];
//     $waktu      = date("H:i:s");

//     if ($waktu >= "11:30:00") {
//         $status = "alpa";
//     } else {
//         $status = $_POST['status'];
//     }

//     $cek = mysqli_query($db_absensi,
//         "SELECT * FROM siswa 
//         WHERE nis='$nis' AND tanggal='$tanggal';"
//     );
//         if (mysqli_num_rows($cek) > 0) {
//         echo "<script>alert('Sudah absen hari ini');document.location='data_absensi.php'</script>";
//         exit;
//     }
        
//     $absensi = mysqli_query($db_absensi, "INSERT INTO siswa 
//         (nis, kelas, status, tanggal, waktu, alasan) 
//         VALUES 
//         ('$nis', '$kelas', '$status', '$tanggal', '$waktu', '$alasan')");

//     if($absensi){
//         echo "<script>alert('Absensi Berhasil Disimpan');
//             document.location='data_absensi.php'</script>";
//         } else {
//             echo "<script>alert('Absensi Gagal Disimpan');
//             document.location='data_absensi.php'</script>";
//     }
// }

// absen siswa 
if (isset($_POST['absen_siswa'])) {
    date_default_timezone_set("Asia/Jakarta");

    $nis  = $_POST['siswa_nis'];
    $kelas      = '11-RPL-1';
    $pass      = $_POST['password'];
    $tanggal    = $_POST['tanggal'];
    $alasan    = $_POST['alasan'];
    $waktu      = date("H:i:s");

    if ($waktu >= "12:30:00") {
        $status = "alpa";
    } else {
        $status = $_POST['status'];
    }

    $result = mysqli_query($db_sekolah, "SELECT * FROM siswa 
            WHERE nis = '$nis' AND password = '$pass'
            ");

    if (mysqli_num_rows($result) === 1) {
        
        $baris = mysqli_fetch_assoc($result);
        if ($pass == $baris['password']) {

            $cek = mysqli_query($db_absensi,
                "SELECT * FROM siswa 
                WHERE nis='$nis' AND tanggal='$tanggal';");
            
            if (mysqli_num_rows($cek) > 0) {
                echo "<script>alert('Sudah absen hari ini');document.location='data_absensi.php'</script>";
                exit;
            }   
                
            $absensi = mysqli_query($db_absensi, "INSERT INTO siswa 
                (nis, kelas, status, tanggal, waktu, alasan) 
                VALUES 
                ('$nis', '$kelas', '$status', '$tanggal', '$waktu', '$alasan')");

            if($absensi){
                echo "<script>alert('Absensi Berhasil Disimpan');
                    document.location='data_absensi.php'</script>";
                } else {
                    echo "<script>alert('Absensi Gagal Disimpan');
                    document.location='data_absensi.php'</script>";
            }
        } else {
            // echo "<script>alert('username atau password anda salah!')</script>";
        }
    } else {
        echo "<script>alert('Password dan Emailnya salah');
            document.location='form_absen.php'</script>";
    }
}

// tambahkan pelajaran
if (isset($_POST['tambah_pelajaran'])) {
    $hari           = $_POST['hari'];
    $pelajaran      = $_POST['mata_pelajaran'];
    $guru           = $_POST['guru'];
    $waktu_mulai    = $_POST['waktu_mulai'];
    $waktu_selesai  = $_POST['waktu_selesai'];
    // $waktu          = "";
    
    $pelajaran = mysqli_query($db_sekolah, "INSERT INTO pelajaran
    ( nama_pelajaran, hari, guru, waktu)
    VALUES
    ('$pelajaran', '$hari', '$guru', '$waktu_mulai-$waktu_selesai')");

    if ($pelajaran) {
    echo "<script>alert('pelajaran Berhasil Disimpan');
        document.location='pelajaran.php'</script>";
    } else {
        echo "<script>alert('Pelajaran Gagal Disimpan');
        document.location='pelajaran.php'</script>";
    }
}

// hapus akun siswa
if (isset($_POST['delete_akun'])) {
    $nama = $_POST['nama'];
    $nis   = $_POST['nis'];
    // $kelas = $_POST['kelas'];

    $hapus_akun = mysqli_query(
        $db_sekolah, 
        "DELETE FROM siswa WHERE nis = '$nis' AND nama = '$nama'"
    );
    $hapus_data = mysqli_query(
        $db_absensi,
        "DELETE FROM siswa WHERE nis = '$nis'"
    );
    if ($hapus_akun) {
        echo "<script>alert('Akun Telah DIhapus');
            document.location='dashboard.php'</script>";
        } else {
        echo "<script>alert('Absensi Gagal Disimpan');
            document.location='dashboard.php'</script>";
    }

}

// buat akun khusus guru
if (isset($_POST['buat_akun_guru'])) {

    $nama_guru = $_POST['nama'];
    $pelajaran = $_POST['pelajaran'];
    $hobi = $_POST['hobi'];
    $gender = $_POST['gender'];
    $tanggal_lahir = $_POST['tahun'].'-'.$_POST['bulan'].'-'.$_POST['tanggal'];
    $no_telepon = $_POST['telepon'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $buat_akun_guru = mysqli_query($db_sekolah, "
        INSERT INTO guru
        (nama_guru, mata_pelajaran, hobi, tanggal_lahir, jenis_kelamin, no_telepon, password)
        VALUES
        ('$nama_guru', '$pelajaran', '$hobi', '$tanggal_lahir', '$gender', '$no_telepon', '$password')
    ");

    if ($buat_akun_guru) {
        echo "<script>alert('Akun Telah DIhapus');
            document.location='dashboard.php'</script>";
        } else {
        echo "<script>alert('Absensi Gagal Disimpan');
            document.location='dashboard.php'</script>";
    }
}

// login
if (isset($_POST['login'])) {
    $nama = $_POST['nama'];
    $password = $_POST['password'];

    $query = "SELECT * FROM siswa 
              WHERE nama = '$nama' 
              AND password = '$password'";

    $result = mysqli_query($db_sekolah, $query);

    if (mysqli_num_rows($result) === 1) {
        
        $baris = mysqli_fetch_assoc($result);
        if ($password == $baris['password']) {
            echo "<script>alert('Berhasil login');
                document.location='dashboard.php'</script>";
            // header("Location: dashboard.php");
            $_SESSION['nama'] = $baris['nama'];
            $_SESSION['login'] = true;
            exit;
        } else {
            echo "<script>alert('username atau password anda salah!')</script>";
        }
    } else {
        echo "<script>alert('Password dan Emailnya salah');
            document.location='login.php'</script>";
    }
}


// buat akun guru

// Teks penuh
// nis
// nama_guru
// mata_pelajaran
// hobi
// tanggal_lahir
// jenis_kelamin
// email
// no_telepon
// 

// nurrohmah

// [validasi password] => [masukan ke dalam data ]