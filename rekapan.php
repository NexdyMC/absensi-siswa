<?php
    include 'db/db_absensi.php';
    include 'db/db_sekolah.php';


    $siswa = mysqli_query($db_sekolah, "SELECT * FROM siswa ORDER BY nama ASC");

    $query = mysqli_query($db_absensi, "SELECT status, COUNT(*) AS total
    FROM siswa
    GROUP BY status
    ");

    $dataStatus = [
    'hadir' => 0,
    'sakit' => 0,
    'izin' => 0,
    'alpa' => 0
    ];

    while ($row = mysqli_fetch_assoc($query)) {
    $dataStatus[$row['status']] = $row['total'];
    }

  
    // Ambil semua absensi
    $absen = [];
    $q = mysqli_query($db_absensi, "SELECT * FROM siswa"); 

    while ($row = mysqli_fetch_assoc($q)) {
        $tgl = date('j', strtotime($row['tanggal']));
        switch ($row['status']) {
            case 'hadir': $absen[$row['nis']][$tgl] = "H"; break;
            case 'sakit': $absen[$row['nis']][$tgl] = "S"; break;
            case 'izin':  $absen[$row['nis']][$tgl] = "I"; break;
            case 'alpa':  $absen[$row['nis']][$tgl] = "A"; break;
            default:      $absen[$row['nis']][$tgl] = "-";
        }
    }

    $jumlahHari = date('t');
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Rekapan | Nexdy Absen</title>
    <?php include "html/head.html";?>
    
    <!-- Export to Excel -->
    <script src="https://cdn.jsdelivr.net/npm/xlsx/dist/xlsx.full.min.js"></script>
    <!-- Export to PNG -->
    <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js"></script>
    <!-- export to PDF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
        
    <style>
        <?php include "style/style.css";?>
        label {
            font-family: "LilitaOne";
            font-size: 16px;
            margin-right: 10px;
        }
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
        input {
            margin-top: 10px;
            padding: 10px;
            margin: 0 10px 0 0;
            border: none;
            border-radius: 10px;
            font-family: "LilitaOne";
            font-size: 16px;
            background: #eee;
            box-shadow: 0 4px 0 #ccc;
        }
        input:focus{
        background: #aaa;
        box-shadow: 0 4px 0 #ccc;
        }
    </style>
</head>
<body>

    <!-- dashboard -->
    <main class="dashboard">

        <!-- dashboard-sidebar   -->
        <?php include 'html/dashboard-sidebar.html';?>

        <!-- dashboard-content -->
        <div class="dashboard-content">

            <div class="data-section" style="overflow-x:auto;" id="layout">
                <h2>Data Absensi Siswa</h2>

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
                
                <table id="tabel_absen">
                    <thead class="data">
                        <tr class="baris">
                            <th class="colom">Nama</th>
                            <?php for ($t=1; $t<=$jumlahHari; $t++): ?>
                            <th class="colom"><?= $t ?></th>
                            <?php endfor; ?>
                        </tr>
                    </thead>
                    <tbody class="data">
                        <?php while ($s = mysqli_fetch_assoc($siswa)): ?>
                        <tr class="baris">
                            <td class="colom"><?= $s['nama'] ?></td>
                            <?php for ($t=1; $t<=$jumlahHari; $t++): ?>
                            <td class="colom status"><?= $absen[$s['nis']][$t] ?? '-' ?></td>
                            <?php endfor; ?>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            
            </div>

            <div class="data-section">
                <h2>Download File</h2>
                <input type="text" name="nama_file" id="nama_file" value="Absensi_siswa">
                <button id="exportBtn" class="btnExcel" onclick="exportExcel()">Export to Excel</button>
                <button id="exportBtn" class="btnPNG" onclick="exportPNG()">Export to PNG</button>
                <button id="exportBtn" class="btnPDF" onclick="exportPDF()">Export to PDF</button>
            </div>

            <div class="data-section container">
                <div class="card">
                
                <div class="icon">
                    <span class="material-symbols-outlined yellow">pie_chart</span>
                    <h2>Statis Absensi Siswa</h2>
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

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var nama_file = document.getElementById("nama_file").value;
        var bulan = document.getElementById("bulan");
        var tahun = document.getElementById("tahun");

        const dataAbsensi = {
            hadir: <?= $dataStatus['hadir'] ?>,
            sakit: <?= $dataStatus['sakit'] ?>,
            izin : <?= $dataStatus['izin'] ?>,
            alpa : <?= $dataStatus['alpa'] ?>
        };

        // loadAbsensi() {
        //     fetch("crud.php", {
        //         method  : "POST",
        //         headers : {
        //             "Content-Type": "application/x-www-form-urlencoded"
        //         },
        //         body  : `bulan=${bulan.value}&tahun=${tahun.value}`
        //     })
        //     .then(res => .res.text())
        //     .then(html => document.getElementById(''))
        // }
        
        // warna text pada status
        function validasiStatus() {
            const statusList = document.querySelectorAll(".status");

            statusList.forEach(el => {
                const text = el.textContent.trim();

                switch (text) {
                    case "H":
                        el.style.color = "blue";
                        break;
                        case "I":
                        el.style.color = "green";
                        break;
                    case "S":
                        el.style.color = "orange";
                        break;
                    case "A":
                        el.style.color = "red";
                        break;
                    default:
                        el.style.color = "black";
                }
            });
        }
        validasiStatus(); 

        function exportPNG() {
            html2canvas(document.getElementById("layout"), {
            useCORS: true,
            scale: 2,
            backgroundColor: "#ffffff"
            }).then(canvas => {
            const a = document.createElement("a");
            a.href = canvas.toDataURL("image/png");
            a.download = `${nama_file}.png`;
            a.click();
            });

        }

        // function exportPDf() {
        //     html2canvas(document.getElementById("layout"), {
        //     useCORS: true,
        //     scale: 2,
        //     backgroundColor: "#ffffff"
        //     }).then(canvas => {
        //     const a = document.createElement("a");
        //     a.href = canvas.toDataURL("document/pdf");
        //     a.download = `${nama_file}.pdf`;
        //     a.click();
        //     });

        // }

        function exportExcel() {
            const barisList = document.querySelectorAll(".data .baris"); 
            const tableData = [];

            barisList.forEach(baris => {
                const kolomList = baris.querySelectorAll(".colom");
                const row = [];

                kolomList.forEach(kolom => {
                    row.push(kolom.textContent.trim());
                });

                tableData.push(row);
            });
            console.log(tableData);

            const ws = XLSX.utils.aoa_to_sheet(tableData);
            const range = XLSX.utils.decode_range(ws["!ref"]);

            for (let c = range.s.c; c <= range.e.c; c++) {
                const cellAddress = XLSX.utils.encode_cell({ r: 0, c });
                const cell = ws[cellAddress];

                if (cell) {
                    cell.s = {
                        font: { bold: true, color: { rgb: "FFFFFF" } },
                        fill: { fgColor: { rgb: "4F81BD" } },
                        alignment: { horizontal: "center" }
                    };
                }
            }

            for (let r = 1; r <= range.e.r; r++) {
                const cellAddress = XLSX.utils.encode_cell({ r, c: 2 });
                const cell = ws[cellAddress];

                if (!cell) continue;

                const v = String(cell.v).toLowerCase();

                if (v === "hadir") {
                    cell.s = { font: { color: { rgb: "008000" } } };
                } else if (v === "izin") {
                    cell.s = { font: { color: { rgb: "0000FF" } } };
                } else if (v === "sakit") {
                    cell.s = { font: { color: { rgb: "FFA500" } } };
                } else if (v === "alpha") {
                    cell.s = { font: { color: { rgb: "FF0000" } } };
                }
            }


            // Buat worksheet & workbook
            const worksheet = XLSX.utils.aoa_to_sheet(tableData);
            const workbook = XLSX.utils.book_new();

            XLSX.utils.book_append_sheet(workbook, worksheet, "Data Siswa");

            // Download file Excel
            XLSX.writeFile(workbook, `${nama_file}.xlsx`);
        }
       
        function exportPDF() {

            const element = document.getElementById("tabel_absen");
            html2pdf()
            .set({
                margin: 10,
                filename: "data_absensi.pdf",
                html2canvas: { scale: 2 },
                jsPDF: { unit: "mm", format: "a4", orientation: "landscape" }
            })
            .from(element)
            .save();

        }
        function mejicom(beras, air) {
            var kg = beras * air
            return `${kg}kg`;
        }
        console.log(mejicom(12, 3));

        // DOUGHNUT CHART
        new Chart(document.getElementById('doughnutAbsensi'), {
            type: 'doughnut',
            data: {
                labels: ['hadir', 'sakit', 'izin', 'alpa'],
                datasets: [{
                    label: 'Jumlah Siswa',
                    data: [
                        dataAbsensi.hadir,
                        dataAbsensi.sakit,
                        dataAbsensi.izin,
                        dataAbsensi.alpa
                    ],
                    backgroundColor: [
                    "#6dd5ed",
                    "#f9d423",
                    "#38ef7d",
                    "#e100ff"
                    ],
                    borderWidth: 0
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
                    dataAbsensi.hadir,
                    dataAbsensi.sakit,
                    dataAbsensi.izin,
                    dataAbsensi.alpa
                ],
                backgroundColor: [
                    "#6dd5ed",
                    "#f9d423",
                    "#38ef7d",
                    "#e100ff"
                ]
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