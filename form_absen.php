<?php
$host = 'localhost';
$usernmae = 'root';
$password = '';
$db = 'db_sekolah';
// $koneksi = mysqli_connect ($host, $usernmae,$password,$db)
$db_sekolah = mysqli_connect ($host, $usernmae, $password,$db)
or die (mysqli_error($koneks));
$result =  mysqli_query($db_sekolah, "SELECT nis, nama FROM siswa ORDER BY nama ASC"); 
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
    <form action="crud.php" method="post" id="form" enctype="multipart/form-data">
      <!-- Form Absen Hadir -->
      <section>
        <h1 style="text-align: center;">Absen Siswa</h1>

        <label for="nama">
          Nama:
          <select name="siswa_nis" require>
              <option value="">-- Pilih Siswa --</option>
              <?php
              // Looping untuk membuat option
              while ($row = mysqli_fetch_assoc($result)) {
                  echo '<option value="' . $row['nis'] . '">' . $row['nama'] . '</option>';
              }
              ?>
          </select>
        </label>

        <!-- Input Kelas -->
        <label for="kelas">
          Password:
          <input type="password" name="password" id="password">
          <!-- <select name="kelas" id="kelas">
            <option value="11-RPL-1">11-RPL-1</option>
          </select> -->
        </label>

        <label for="tanggal">
          Tanggal:
          <input type="date" name="tanggal" id="tanggal" value="<?php echo date('Y-m-d'); ?>" >
        </label>
        <!-- button -->
        <input type="submit" class="btn" name="absen_siswa"   id="hadir" value="Hadir" >
        <a id="sakit" class="btn">Sakit</a>
        <a id="izin" class="btn">Izin</a>
      </section>
      
      <!-- Form Absen Sakit, Izin-->
      <section>
        
        <!-- Input : Alasan -->
        <label for="alasan"> 
          <span id="alasan"></span> 
          <textarea name="alasan" id="alasan" placeholder="Masukan Alasan tidak Sekolah" value="Hadir"  require>-</textarea>
        </label>
        <input type="hidden" id="status" name="status" value="hadir">
        
        <!-- <label for="gambar">
          <input type="file" >
        </label> -->

        <div class="btn">
          <a id="Kembali" class="btn mageta">Kembali</a>
          <input type="submit" class="btn" name="absen_siswa" id="hadir"  value="Simpan" >
        </div>

      </section>
      
    </form> 

  </main>
  
  <script>
    const sakitBtn = document.getElementById('sakit');
    const izinBtn = document.getElementById('izin');
    const form = document.getElementById('form');
    const Kembali = document.getElementById('Kembali');
    const status = document.getElementById('status');
    const description = document.getElementById('description');
    const alasan = document.getElementById('alasan');

    sakitBtn.addEventListener('click', () => {
      status.value = "sakit";
      alasan.textContent = "Alasan Kenapa Sakit ?"
      // description.textContent = ""
      form.style.transform = 'translateY(-520px)';
    });
    izinBtn.addEventListener('click', () => {
      status.value = "izin";
      alasan.textContent = "Alasan Kenapa Izin ?"
      // description.textContent = ""
      form.style.transform = 'translateY(-520px)';
    });
    
    Kembali.addEventListener('click', (e) => {
      status.value = "hadir";
      // description.textContent = "-"
      form.style.transform = 'translateY(0)';
    });

  </script>
</body>
</html>

