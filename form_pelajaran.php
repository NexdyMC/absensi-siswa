<?php
$host = 'localhost';
$usernmae = 'root';
$password = '';
$db = 'db_sekolah';
// $koneksi = mysqli_connect ($host, $usernmae,$password,$db)
$db_siswa = mysqli_connect ($host, $usernmae, $password,$db)
or die (mysqli_error($koneks));
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Absensi Siswa</title>
  <link rel="stylesheet" href="style/form_siswa.css">
</head>
<body>
  
  <main >
    <form action="crud.php" method="post" id="form">
      <!-- Form Absen Hadir -->
      <section>
        <h1 style="text-align: center;">Form Pelajaran</h1>

        <label for="mata_pelajaran">
            Mata Pelajaran:
            <input type="text" name="mata_pelajaran" id="mata_pelajaran">
        </label>

        <!-- Input Kelas -->
        <label for="kelas">
          Guru Pembingbing:
          <input type="text" name="guru_pelajaran">
        </label>

        <label for="tanggal">
          Tanggal:
          <input type="date" name="tanggal" id="tanggal" value="<?php echo date('Y-m-d'); ?>" >
        </label>
<style>
.container {  display: grid;
  grid-template-columns: 1fr 1fr;
  grid-template-rows: 1fr 1fr;
  
  /* gap: 0px 0px; */
  grid-auto-flow: row;
  grid-template-areas:
    "name name ."
    "start gool ."
    ". . .";
}

.name { grid-area: name; }

.start { grid-area: start; }

.gool { grid-area: gool; }

</style>
        <label for="tanggal" class="flex">
        <div class="container">
          <div class="name">
            Waktu:
          </div>
          <div class="start">
            Awal
            <input type="time" name="tanggal" id="tanggal">
          </div>
          <div class="gool">
            Akhir
            <input type="time" name="tanggal" id="tanggal">
          </div>
        </div>
        </label>

        <!-- button -->
        <input type="submit" class="btn" name="jadwal_pelajaran"   id="jadwal_pelajaran" value="Simpan Pelajaran" >
      </section>
      
    </form>
  </main>
  <script>
  </script>
</body>
</html>

