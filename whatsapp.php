<?php
$nama   = $_POST['nama'];
$barang = $_POST['barang'];
$userHP = $_POST['no_telepon'];

// =======================
// FUNGSI BERSIHKAN NOMOR
// =======================
function formatHP($no){
    $no = preg_replace('/[^0-9]/', '', $no);
    if(substr($no, 0, 1) === '0'){
        $no = '62' . substr($no, 1);
    }
    return $no;
}

// =======================
// NOMOR TUJUAN
// =======================
$adminHP = formatHP("6282125689760"); // nomor kamu sendiri
$userHP  = formatHP($userHP);

// =======================
// PESAN (SINGKAT)
// =======================
$pesanLogin = urlencode("Anda telah masuk login akun");
$pesanBarang = urlencode("Notifikasi barang: $barang");

// =======================
// LINK WHATSAPP
// =======================
$linkAdmin  = "https://web.whatsapp.com/send?phone=$adminHP&text=$pesanLogin";
$linkBarang = "https://web.whatsapp.com/send?phone=$adminHP&text=$pesanBarang";
$linkUser   = "https://web.whatsapp.com/send?phone=$userHP&text=$pesanLogin";
?>
<h3>Notifikasi WhatsApp</h3>

<a href="<?= $linkAdmin ?>" target="_blank">📩 Chat Admin (Login)</a><br><br>
<a href="<?= $linkBarang ?>" target="_blank">📦 Chat Admin (Barang)</a><br><br>
<a href="<?= $linkUser ?>" target="_blank">👤 Chat User</a>
