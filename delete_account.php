<?php

include "db/db_sekolah.php";
include "db/db_absensi.php";
$result =  mysqli_query($db_sekolah, "SELECT nis, nama FROM siswa ORDER BY nama ASC"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Akun</title>
    <style>
        <?php include "style/form_siswa.css";?>
        <?php include "style/style.css";?>
    </style>
</head>
<body>
  <main >
    <form action="crud.php" method="post" id="form">
      <!-- Form Absen Hadir -->
      <section>
        <h1 style="text-align: center;">Absen Siswa</h1>

        <label for="nama">
          Nama:
          <select name="nama" require>
              <option value="">-- Pilih Siswa --</option>
              <?php
              // Looping untuk membuat option
              while ($row = mysqli_fetch_assoc($result)) {
                  echo '<option value="' . $row['nama'] . '">' . $row['nama'] . '</option>';
              }
              ?>
          </select>
        </label>

        <label for="nis">
            NIS:
            <input type="number" name="nis" id="nis">
        </label>

        <!-- Input Kelas -->
        <label for="kelas">
          Kelas:
          <select name="kelas" id="kelas">
            <option value="11-RPL-1">11-RPL-1</option>
          </select>
        </label>
        <!-- button -->
        <input type="submit" class="btn" name="delete_akun" onclick="return confirm('Apakah Anda ingin menghapus akun siswa?')"  id="hadir" value="Hapus Akun" >
      </section>
    </form>
  </main>

</body>
</html>
