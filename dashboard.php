<?php
  include "db/db_sekolah.php";
  include "db/db_absensi.php";

  $status = mysqli_query($db_sekolah, " SELECT gender, COUNT(*) as total
  FROM siswa
  GROUP BY gender");

  $dataStatus = [
    'laki-laki' => 0, 
    'perempuan' => 0, 
    'tidak_ingin_diketahui' => 0
  ]; 
  
  while ($row = mysqli_fetch_assoc($status)) { 
    $dataStatus[$row['gender']] = $row['total']; 
  }
  
  $jumlah_siswa = 0;
  $jumlah_guru  = 0;
  $siswa = mysqli_query($db_sekolah, "SELECT * FROM siswa");
  while ($data = mysqli_fetch_assoc($siswa)) {
    $jumlah_siswa  ++;
    $jumlah_guru  ++;
  }
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard | Nexdy Absen</title>
  <link rel="stylesheet" href="style/dashboard.css">
  <?php include "html/head.html";?>

  <style>
    <?php include "style/style.css"?>
  </style>
  </style>
</head>

<body>
  <main class="dashboard">

    <!-- dashboard-sidebar -->
    <?php include 'html/dashboard-sidebar.html';?>

    <!-- dashboard | content -->
    <div class="dashboard-content">

      <!-- jumlah akun siswa & guru -->
      <div class="data-section">
        <div class="flex">
          <!-- card : Hadir -->
          <div class="card blue">
            <h2>Siswa</h2>
            <h1 id="hadir"><?= $jumlah_siswa; ?></h1>
          </div>

          <!-- card : Alpha -->
          <div class="card mageta">
            <h2>Guru</h2>
            <h1 id="alpa"><?= $jumlah_guru; ?></h1>
          </div>
        </div>
      </div>

      <!-- Akun Siswa -->
      <div class="data-section">
        <div class="icon">
          <span class="material-symbols-outlined green">person</span>
          <h2>Siswa</h2>
        </div>

        <!-- tabel by nexdy -->
        <table>
          <thead class="data">
            <tr class="baris">
              <th class="colom">No</th>
              <th class="colom">Nama</th>
              <th class="colom">nis</th>
              <th class="colom">Kelas</th>
              <th class="colom">Kelamin</th>
              <th class="colom">Tanggal Lahir</th>
              <th class="colom">Email</th>
              <th class="colom">edit</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $no = 1;
            $tampilkan = mysqli_query($db_sekolah, "SELECT *
            FROM siswa ORDER BY nama ASC ");
            
            while ($data = mysqli_fetch_assoc($tampilkan)) { ?>
            <tr class="baris">
              <td class="colom"><?= $no++; ?></td>
              <td class="colom"><?= $data['nama']; ?></td>
              <td class="colom"><?= $data['nis']; ?></td>
              <td class="colom"><?= $data['kelas']; ?></td>
              <td class="colom gender">
                <span class="material-symbols-outlined ">
                  <?= $data['gender'] == 'laki-laki' ? 'male' : 
                      ($data['gender'] == 'perempuan' ? 'female' : 'agender');?>
                </span>
              </td>
              <td class="colom"><?= $data['hari']." - ".$data['bulan']." - ".$data['tahun']; ?></td>
              <td class="colom"><?= $data['email']; ?></td>
              <td class="colom">
                <a href="edit_akun.php?nis=<?= $data['nis'];?>">
                  <span class="material-symbols-outlined" style="color: #444">edit_square</span>
                </a>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>

        <a href="create_account.php" class="create account">Tambahkan Akun</a>
        <a href="delete_account.php" class="delete account ">Hapus Akun</a>
      </div>

      <!-- Akun Guru -->
      <div class="data-section">
        <div class="icon">
          <span class="material-symbols-outlined blue">person</span>
          <h2>Guru</h2>
        </div>

        <!-- tabel by nexdy -->
        <table>
          <thead class="data">
            <tr class="baris">
              <th class="colom">No</th>
              <th class="colom">Nama</th>
              <th class="colom">nis</th>
              <th class="colom">Mata Pelajaran</th>
              <!-- <th class="colom">Hobi</th> -->
              <th class="colom">Gender</th>
              <th class="colom">Tanggal Lahir</th>
              <th class="colom">Email</th>
              <th class="colom">No Telepon</th>
              <th class="colom">edit</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $no = 1;
            $tampilkan = mysqli_query($db_sekolah, "SELECT *
            FROM guru ORDER BY nama_guru ASC ");
            
            while ($data = mysqli_fetch_assoc($tampilkan)) { ?>
            <tr class="baris">
              <td class="colom"><?= $no++; ?></td>
              <td class="colom"><?= $data['nama_guru']; ?></td>
              <td class="colom"><?= $data['nis']; ?></td>
              <td class="colom"><?= $data['mata_pelajaran']; ?></td>
              <td class="colom gender">
                <span class="material-symbols-outlined ">
                  <?= $data['jenis_kelamin'] == 'laki-laki' ? 'male' : 
                      ($data['jenis_kelamin'] == 'perempuan' ? 'female' : 'agender');?>
                </span>
              </td>
              <td class="colom"><?= $data['tanggal_lahir'];?></td>
              <td class="colom"><?= $data['email']; ?></td>
              <td class="colom"><?= $data['no_telepon']; ?></td>
              <td class="colom">
                <a href="edit_akun.php?nis=<?= $data['nis'];?>">
                  <span class="material-symbols-outlined" style="color: #444">edit_square</span>
                </a>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>

        <a href="create_account.php" class="create account">Tambahkan Akun</a>
        <a href="delete_account.php" class="delete account ">Hapus Akun</a>
      </div>

      <!-- Pie Chart -->
      <div class="data-section container">
        <div class="card">

          <div class="icon">
            <span class="material-symbols-outlined yellow">pie_chart</span>
            <h2>Statis Gender Siswa</h2>
          </div>

          <canvas id="doughnutAbsensi" width="100" height="100"></canvas>
        </div>

        <div class="card">
          <div class="icon">
            <span class="material-symbols-outlined blue">bar_chart</span>
            <h2>Jumlah Siswa</h2>
          </div>
          <canvas id="barAbsensi" width="400" height="300"></canvas>
        </div>

      </div>
    </div>

  </main>

<script>
  // DATA ABSENSI (ubah sesuai kebutuhan)
  const dataGender = {
    laki_laki:  <?= $dataStatus['laki-laki']; ?>,
    perempaun:  <?= $dataStatus['perempuan']; ?>,
    netral:   <?= $dataStatus['tidak_ingin_diketahui']; ?>
  };

  function colorgender() {
    const statusList = document.querySelectorAll(".gender");

    statusList.forEach((el) => {
      const text = el.textContent.trim().toLowerCase();

      switch (text) {
        case "male":
          el.style.color = "#2193b0";
          break;
        case "female":
          el.style.color = "#e100ff ";
          break;
        case "agender":
          el.style.color = "#f9d423";
          break;
        default:
          el.style.color = "gray";
      }
    });
  }
  
  colorgender();

  // DOUGHNUT CHART
  new Chart(document.getElementById('doughnutAbsensi'), {
    type: 'doughnut',
    data: {
      labels: ['laki-laki', 'perempuan', 'netral'],
      datasets: [{
        label: 'Jumlah Siswa',
        data: [
          dataGender.laki_laki,
          dataGender.perempaun,
          dataGender.netral
        ],
        backgroundColor: [
          '#22d2ee',
          '#e100ff',
          '#fb903c'
        ],
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          position: 'top'
        },
      }
    }
  });

  // BAR CHART
  new Chart(document.getElementById('barAbsensi'), {
    type: 'bar',
    data: {
      labels: ['Hadir', 'Sakit', 'Izin', 'Alpa'],
      datasets: [{
        label: 'Jumlah Siswa',
        data: [
          dataGender.hadir,
          dataGender.sakit,
          dataGender.izin,
          dataGender.alpa
        ],
        backgroundColor: '#2196F3'
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>

</body>

</html>
