<?php
include "../db/db_sekolah.php";
include "../db/db_absensi.php";


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
<table>
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

<?php
$bulan = ['jan', 'feb', 'maret', 'aplir'];
$tanggal = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$nama = ['aditya', 'agustina', 'aldian', 'andika'];

// $query = mysqli_query($db_absensi, "SELECT nama FROM siswa where nama = ''");
// while ($row = mysqli_fetch_assoc($q)) 


// nama = loop(tanggal) bulan => masukan data 

$nama = [
    'januari' => [
        'aditya' => [1, 2, 3],
        'febri'  => [1, 2, 3]
    ],
    'februari' => [
        'aditya' => [4, 5, 6],
        'febri'  => [7, 8, 9]
    ]
];


$data_baru = [];

foreach ($nama as $bulan => $siswa) {
    foreach ($siswa as $nama_orang => $nilai) {
        $data_baru[$bulan][$nama_orang] = $nilai;
    }
}

echo $data_baru;
