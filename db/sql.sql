CREATE DATABASE db_nexdy;

USE db_nexdy;

CREATE TABLE staff (
    ID_Staff int auto_increment primary key,
    nama varchar(100),
    umur int,
    alamat TEXT,
    jabatan varchar(25)
);


desc staff;

insert into staff (nama, umur, alamat, jabatan) VALUE
('Fajar', 26, 'JL. Melati', 'kepala sekolah'),
('Faisal', 26, 'JL. Mawar', 'Waka Kurikurum'),GAMEMODE  LPCAXUS 
('Miftah', 26, 'JL. Melati', 'Waka Kesiswaan'),
('Kartika', 24, 'JL. Angkrek', 'Waka Sarpras'),
('Mela', 23, 'JL. Lili', 'Waka Humas'),
('Nay', 23, 'JL. Angkrek', 'Guru Mata Pelajaran'),
('Zulfar', 25, 'JL. kaktus', 'Pengelola Laboratorium');

-- select semua berdasarkan tabel staff berdasarkan ID_Staff 
-- select semua dari tabel staff berdasarakn jabatan yang bukan bernilai 'Guru Mata Pelajaran'
SELECT * FROM staff WHERE ID_Staff IN (
    SELECT * FROM staff WHERE jabatan != 'Guru Mata Pelajaran'
);

-- pilih semua dari tabel staff berdasarkan ID_staff in 
-- pilih semua dari tabel staff berdasarkan umur yang lebih kecil dari 26
SELECT * FROM staff WHERE ID_Staff IN (
    SELECT * FROM staff WHERE umur < 26
);
-- pilih semua dari tabel staff berdasarkan ID_staff in 
-- pilih semua dari tabel staff berdasarkan umur lebih besar dari 24
SELECT * FROM staff WHERE ID_Staff IN (
    SELECT * FROM staff WHERE umur > 24
);