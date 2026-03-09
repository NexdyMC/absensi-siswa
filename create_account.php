<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard | Nexdy Absen</title>
    <link rel="stylesheet" href="style/create.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=visibility_off" /> -->
</head>
<body>
<!-- https://accounts.google.com/signup?utm_source=help -->
    
    <div class="container">
        <form class="form" action="crud.php" method="post" class="step">
            
            <!-- Buat Akun Siswa-->
            <div class="parent">

                <div class="logo">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/Google_%22G%22_logo.svg/40px-Google_%22G%22_logo.svg.png" alt="google" width="60px">
                    <span>1 / 5</span>
                </div>
                
                <div class="nama-anda">
                    <h1>Buat Akun Siswa</h1>
                    <p>Masukkan nama anda</p>
                </div>
                
                <div class="inputData">
                    <label for="nama">
                        <input type="text" name="nama" id="nama" placeholder="Masukan Nama Kamu " required>
                    </label>
                    
                    <label for="kelas">
                        <select name="kelas" id="kelas">
                            <option value="11-RPL-1">11-RPL-1</option>
                        </select>
                        <!-- <input type="text" name="kelas" placeholder="asukan Kelas"> -->
                    </label>
                </div>

                <div class="controls">
                    <button class="next" onclick="scrollItem(this)">Berikutnya</button>
                </div>
            </div>

            <!-- Informasi Data -->
            <div class="parent">

                <div class="logo">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/Google_%22G%22_logo.svg/40px-Google_%22G%22_logo.svg.png" alt="google" width="60px">
                    <span>2 / 5</span>
                </div>
                
                <div class="nama-anda">
                    <h1>Informasi Dasar</h1>
                    <p>Masukan tanggal lahir dan hobi</p>
                </div>
    
                <div class="inputData">
                    <label for="nama-depan">

                        <!-- Hari: -->
                         <input type="number" name="tanggal" placeholder="tanggal" oninput="this.value = this.value.slice(0,2)"  required>
                        
                         <!-- Bulan: -->
                        <select name="bulan" id="bulan" >
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
                        <!-- Tahun: -->
                        <select name="tahun" id="tahun">
                            <option value="2006">2006</option>
                            <option value="2007">2007</option>
                            <option value="2008">2008</option>
                            <option value="2009">2009</option>
                            <option value="2010">2010</option>
                         </select>
                        <!-- <input type="text" name="nama_depan" placeholder="Nama Depan"> -->
                    </label>

                    <label for="gender">
                        <select name="gender" id="gender">
                            <option value="laki-laki">Laki - laki</option>
                            <option value="perempuan">Perempuan</option>
                            <option value="tidak_ingin_diketahui">Tidak ingin diketahui</option>
                        </select>
                    </label>

                </div>

                <div class="controls">
                    <a href="#" class="next" onclick="scrollItem(this)">Berikutnya</a>
                    <button class="back" onclick="scrollItem(this)">Kembali</button>
                </div>
            </div>

            <!-- Informasi Pribadi -->
            <div class="parent">

                <div class="logo">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/Google_%22G%22_logo.svg/40px-Google_%22G%22_logo.svg.png" alt="google" width="60px">
                    <span>3 / 5</span>
                </div>
                
                <div class="nama-anda">
                    <h1>Informasi Pribadi</h1>
                    <p>Masukan alamat dan hobi</p>
                </div>
    
                <div class="inputData">

                    <label for="hobi">
                        <input type="text" name="hobi" id="hobi" placeholder="Masukan hobi kamu (formal)">
                    </label>
                    
                    <label for="alamat">
                        <textarea name="alamat" id="alamat" placeholder="masukan alamat rumahmu" required></textarea>
                    </label>
                </div>

                <div class="controls">
                    <a href="#" class="next" onclick="scrollItem(this)">Berikutnya</a>
                    <button href="#" class="back" onclick="scrollItem(this)">Kembali</button>
                </div>
            </div>

            <!-- Buat alamat email -->
            <div class="parent">

                <div class="logo">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/Google_%22G%22_logo.svg/40px-Google_%22G%22_logo.svg.png" alt="google" width="60px">
                    <span>4 / 5</span>
                </div>
                
                <div class="nama-anda">
                    <h1>Buat Alamat Email</h1>
                    <!-- <p>Masukkan nama anda</p> -->
                </div>
    
                <div class="inputData">
                    <label for="nama-belakang">
                        <input type="email" name="email" id="email" placeholder="buat email" required>
                    </label>
                </div>

                <div class="controls">
                    <a href="#" class="next" onclick="scrollItem(this)">Berikutnya</a>
                    <button href="#" class="back" onclick="scrollItem(this)">Kembali</button>
                </div>
            </div>

            <!-- Buat sandi Kuat -->
            <div class="parent">

                <div class="logo">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/Google_%22G%22_logo.svg/40px-Google_%22G%22_logo.svg.png" alt="google" width="60px">
                    <span>5 / 5</span>
                </div>
                
                <div class="nama-anda">
                    <h1>Buat Sandi Kuat</h1>
                    <!-- <p>Masukkan nama anda</p> -->
                </div>
    
                <div class="inputData">
                    <label for="password">
                        <input type="password" id="password-1" name="password" placeholder="masukan password" required>
                        <a href="#" id="toggleEye1" ><span class="material-symbols-outlined" id="icon-1">visibility</span></a>
                    </label>
                    
                    <label for="konfirmasi_password">
                        <input type="password" id="password-2" name="konfirmasi_password" placeholder="konfirmasi password">
                        <a href="#" id="toggleEye2" ><span class="material-symbols-outlined" id="icon-2">visibility</span></a>
                    </label>
                </div>

                <div class="controls">      
                    <button type="submit" name="buat_akun" class="next" >Buat Akun</button>
                    <a href="#" class="back" onclick="scrollItem(this)">Kembali</a>
                </div>
            </div>
        </form>
    </div>
<script>
// Ambil semua parent
const parents = document.querySelectorAll('.parent');

const password_1 = document.getElementById('password-1');
const password_2 = document.getElementById('password-2');

const toggleEye_1 = document.getElementById('toggleEye1');
const toggleEye_2 = document.getElementById('toggleEye2');

const icon_1 = document.getElementById('icon-1');
const icon_2 = document.getElementById('icon-2');

toggleEye_1.addEventListener('click', () => {
    if (password_1.type === 'password') {
        password_1.type  = "text"
        icon_1.innerHTML = 'visibility_off'
    } else {
        
        password_1.type  = "password"
        icon_1.innerHTML = 'visibility'
    }

})
toggleEye_2.addEventListener('click', () => {
    if (password_2.type === 'password') {
        password_2.type  = "text"
        icon_2.innerHTML = 'visibility_off'
    } else {
        
        password_2.type  = "password"
        icon_2.innerHTML = 'visibility'
    }

})



// Fungsi scroll ke parent tertentu
function scrollToParent(index) {
    if (index < 0 || index >= parents.length) return; // aman
    const container = document.querySelector('.form'); // form container
    const target = parents[index];
    const containerWidth = container.offsetWidth;
    const targetLeft = target.offsetLeft;

    const scrollPos = targetLeft - (containerWidth / 2) + (target.offsetWidth / 2);

    container.scrollTo({
        left: scrollPos,
        behavior: 'smooth'
    });
}

// Fungsi main untuk next/back
function scrollItem(el) {
    el.preventDefault?.();
    const parent = el.closest('.parent');
    const index = Array.from(parents).indexOf(parent);

    if (el.classList.contains('next')) {
        scrollToParent(index + 1);
    } else if (el.classList.contains('back')) {
        scrollToParent(index - 1);
    }
}



</script>

</body>
</html>
