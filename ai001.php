<?php
// koneksi database
$conn = new mysqli("localhost", "root", "", "db_absensi");
if ($conn->connect_error) {
    die("Koneksi gagal");
}

// bulan & tahun sekarang
$bulan = date('m');
$tahun = date('Y');

// ambil semua data absensi bulan ini
$sql = "SELECT nis, nama, status, DAY(tanggal) AS hari 
        FROM siswa
        WHERE MONTH(tanggal) = '$bulan' AND YEAR(tanggal) = '$tahun'
        ORDER BY nama, tanggal";

$result = $conn->query($sql);

// susun data per siswa
$data = [];
while ($row = $result->fetch_assoc()) {
    $nis = $row['nis'];
    $data[$nis]['nama'] = $row['nama'];
    $data[$nis]['absen'][$row['hari']] = strtoupper(substr($row['status'], 0, 1));
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Rekap Absensi</title>
<style>
table {
  border-collapse: collapse;
  font-size: 12px;
}
th, td {
  border: 1px solid #000;
  padding: 4px;
  text-align: center;
}
th {
  background: #eee;
}
</style>
</head>
<body>

<h3>Rekap Absensi Bulan <?= date('F Y') ?></h3>

<table>
<tr>
  <th>No</th>
  <th>NIS</th>
  <th>Nama</th>
  <?php for ($i = 1; $i <= 31; $i++): ?>
    <th><?= $i ?></th>
  <?php endfor; ?>
</tr>

<?php
$no = 1;
foreach ($data as $nis => $siswa):
?>
<tr>
  <td><?= $no++ ?></td>
  <td><?= $nis ?></td>
  <td><?= $siswa['nama'] ?></td>

  <?php for ($i = 1; $i <= 31; $i++): ?>
    <td>
      <?= $siswa['absen'][$i] ?? '-' ?>
    </td>
  <?php endfor; ?>
</tr>
<?php endforeach; ?>

</table>


</body>
</html>
