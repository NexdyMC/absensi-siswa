<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard | Nexdy Absen</title>
  <link rel="stylesheet" href="style/style.css" >
  <link rel="stylesheet" href="style/dashboard.css" >
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    


</head>
<body>
  <style>

.parent {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    grid-template-rows: repeat(2, 1fr);
    gap: 8px;
}
    


.div3 {
    grid-row-start: 2;
}

.div4 {
    grid-row-start: 2;
}
        
  </style>
  <main class="dashboard">
    
    <?php include 'html/dashboard-sidebar.php';?>
    <?php include 'html/dashboard-header.php';?>
    
    <div class="dashboard-content">
      <div class="data-section">
        <div class="parent">
            <div class="div1">
              <h2>Grafik Absensi Siswa</h2>
        
              <!-- Pie Chart -->
              <canvas id="pieAbsensi" width="300" height="300"></canvas>
              <canvas id="barAbsensi" width="400" height="300"></canvas>
            </div>
            <div class="div2">
              
            </div>
            <div class="div3">3</div>
            <div class="div4">4</div>
        </div>
      </div>
    </div>
  </main>


  </main>
  
<script>
    // DATA ABSENSI (ubah sesuai kebutuhan)
    const dataAbsensi = {
        hadir: 20,
        sakit: 5,
        izin: 3,
        alpa: 2
    };

    // PIE CHART
    new Chart(document.getElementById('pieAbsensi'), {
        type: 'pie',
        data: {
            labels: ['Hadir', 'Sakit', 'Izin', 'Alpa'],
            datasets: [{
                data: [
                    dataAbsensi.hadir,
                    dataAbsensi.sakit,
                    dataAbsensi.izin,
                    dataAbsensi.alpa
                ],
                backgroundColor: [
                    '#4CAF50',
                    '#FFC107',
                    '#03A9F4',
                    '#F44336'
                ]
            }]
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
                    dataAbsensi.hadir,
                    dataAbsensi.sakit,
                    dataAbsensi.izin,
                    dataAbsensi.alpa
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
