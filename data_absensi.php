<?php 
include "db/db_absensi.php";




  $query = mysqli_query($db_absensi, "SELECT status, COUNT(*) as total FROM siswa WHERE tanggal = '2026-03-04' GROUP BY status;");

  $dataStatus = [
    'hadir' => 0, 
    'sakit' => 0, 
    'izin' => 0, 
    'alpa' => 0 ]; 
  while ($row = mysqli_fetch_assoc($query)) { 
    $dataStatus[$row['status']] = $row['total']; 
  } 
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Data Absensi | Nexdy Absen</title>
  <link rel="stylesheet" href="style/data_absensi.css">
  <?php include "html/head.html";?>

  <style>
    <?php include "style/style.css"?>
        button  {
            font-size: 16px;
            font-family: "LilitaOne";
            border: none;
            padding: 10px 20px;
            border-radius: 10px;
            cursor: pointer;
            box-shadow: 0 4px 0 #ccc;
            margin: 10px 0;
            margin: 0 10px 0 0;
            color: #fff;
        }

        select {
            margin-top: 10px;
            padding: 10px ;
            margin: 0 10px;
            border: none;
            border-radius: 5px;
            font-family: "LilitaOne";
            font-size: 16px;
            background: #eee;
            box-shadow: 0 4px 0 #ccc;
        }
  </style>

</head>
<body>
  <!-- dashboard -->
  <main class="dashboard">

  <!-- dashboard-sidebar -->
    <?php include 'html/dashboard-sidebar.html';?>

    <!-- bagian inti content -->
    <div class="dashboard-content">
      <div class="data-section">
        <div class="absensi">
          <!-- baris 1 -->
            <div class="hadir">
              <div class="card blue">
                <h2>Hadir</h2>
                <h1 id="hadir"><?= $dataStatus['hadir']; ?></h1>
              </div>
            </div>
            <div class="sakit">
              <div class="card yellow ">
                <h2>Sakit</h2>
                <h1 id="sakit"><?= $dataStatus['sakit']; ?></h1>
              </div>
            </div>
            <div class="izin">
              <div class="card green">
                <h2>Izin</h2>
                <h1 id="izin"><?= $dataStatus['izin']; ?></h1>
              </div>
            </div>
            <div class="alpa">
              <div class="card merah">
                <h2>Alpa</h2>
                <h1 id="alpa"><?= $dataStatus['alpa']; ?></h1>
              </div>
            </div>
          <!-- baris 2 -->
        </div>
      </div>
      <div class="data-section">
        <div class="icon">
          <span class="material-symbols-outlined blue">data_table</span>
          <h2>Data Absensi Siswa</h2>
        </div>
          <!-- Bulan -->
          <label for="bulan">
              Bulan:
              <select name="bulan" id="bulan">
                  <option value="januari">Januari</option>
                  <option value="februari">Februari</option>
                  <option value="maret">Maret</option>
                  <option value="april">April</option>
                  <option value="mei">Mei</option>
                  <option value="juni">Juni</option>
                  <option value="juli">Juli</option>
                  <option value="agustus">Agustus</option>
                  <option value="september">September</option>
                  <option value="oktober">Oktober</option>
                  <option value="november">November</option>  
                  <option value="desember">Desember</option>
              </select>
          </label>

          <!-- tahun -->
          <label for="tahun">
              Tahun:
              <select name="tahun" id="tahun">
                  <option value="2024">2024</option>
                  <option value="2025">2025</option>
                  <option value="2026">2026</option>
                  <option value="2027">2027</option>
              </select>
          </label>    
          
        <!-- tabel by nexdy -->
        <table id="dataTable">
          <thead class="data">
            <tr class="baris">
              <th class="colom">No</th>
              <th class="colom">Nama</th>
              <th class="colom">Kelas</th>
              <th class="colom">Status</th>
              <th class="colom">tanggal</th>
              <th class="colom">waktu</th>
              <th class="colom">Alasan</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $no = 1;
            $tanggal = date('Y-m-d');
            $tampilkan = mysqli_query($db_absensi, "  SELECT 
                  a.nis,
                  a.kelas,
                  a.status,
                  a.tanggal,
                  a.waktu,
                  a.alasan,
                  s.nama
              FROM db_absensi.siswa AS a
              JOIN db_sekolah.siswa AS s 
                  ON a.nis = s.nis
                  where a.tanggal = '$tanggal'
            ");
              // ORDER BY a.tanggal, a.waktu DESC 
            ?>

            <tbody class="data">
            <?php while ($data = mysqli_fetch_assoc($tampilkan)) { ?>
            <tr class="baris">
              <td class="colom"><?= $no++; ?></td>
              <td class="colom"><?= $data['nama']; ?></td>
              <td class="colom"><?= $data['kelas']; ?></td>
              <td class="colom status"><?= $data['status']; ?></td>
              <td class="colom"><?= $data['tanggal']; ?></td>
              <td class="colom"><?= $data['waktu']; ?></td>
              <td class="colom"><?= $data['alasan']; ?></td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
      </div>
<!--  -->
    </div>

  </main>

  <script>
    function validasiStatus() {
      const statusList = document.querySelectorAll(".status");

      statusList.forEach((el) => {
        const text = el.textContent.trim().toLowerCase();

        switch (text) {
          case "hadir":
            el.style.color = "blue";
            break;
          case "izin":
            el.style.color = "green";
            break;
          case "sakit":
            el.style.color = "orange";
            break;
          case "alpa":
            el.style.color = "red";
            break;
          default:
            el.style.color = "black";
        }
      });
    }
    validasiStatus();
  </script>
</body>
</html>
