<?
session_start();
include 'db/db_sekolah.php'; 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        @font-face {
            font-family: "LilitaOne";
            src: url(fonts/LilitaOne.ttf);
        }

        :root {
            --input-font-family: 'LilitaOne';
        }

        body {
            font-family: 'LilitaOne';
            display: grid;
            grid-template-columns: 2fr 1fr;
            color: #fff;

        }

        header {
            background: url(image/bg-2.jpg) center / cover;
            display: flex;
            font-size: 30px;
            justify-content: center;
            align-items: center;
            color: #21b5ffff;

            h1 {
                text-shadow: 4px 4px 0 #fff;
            }
        }

        .container {
            font-size: 20px;
            height: 100vh;
            background: linear-gradient(45deg, #6ad6f7, #0787FF, #0787FF);
            padding: 0 2.5em;
            align-content: space-around;
        }

        .icon {
            color: #ffff01;
        }

        .grid {
            display: grid;
        }

        .flex {
            display: flex;
        }

        .text-center {
            text-align: center;
        }

        label {
            margin: 20px 0;

            p {
                font-size: 26px;
            }
        }

        .nama-siswa,
        .nis-siswa {
            display: flex;
            justify-content: center;
            align-items: center;
            background: #fff;
            padding: 14px;
            border-radius: 100px;

            input {
                border: none;
                background: none;
                width: 100%;
                height: 100%;
                font-family: var(--input-font-family);
                font-size: 1.3em;
                color: #000;

                &::placeholder {
                    color: #979797;
                }

                &:active {
                    border: none;
                }
            }

        }

        .info {
            align-items: center;

            .checkbox {
                width: 20px;
                height: 20px;
                margin: 0 1rem 0 0;
            }
        }

        button {
            border: none;
            color: #fff;
            background: #ffff01;
            padding: 14px;
            width: 100%;
            font-family: var(--input-font-family);
            font-size: 1.3em;
            border-radius: 100px;

            &:hover {
                background: #dbdb01;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>DATA ABSENSI SISWA</h1>
    </header>
    
    <div class="container grid">

        <!-- title -->
        <h1 class="text-center">MASUKAN AKUN</h1>
        
        <!-- Form Pemasukan -->
        <form action="crud.php" class="" method="post">

            <!-- label : Nama -->
                <label class="grid">
                <p>Nama Siswa</p>
                <div class="nama-siswa">
                    <input type="text" name="nama" placeholder="Masukan Nama kamu">
                </div>
                </label>

            <!-- label : passworld -->
                <label class="grid">
                <p>Password</p>
                <div class="nis-siswa">
                    <input type="text" name="password" placeholder="Masukan NIS Kamu">
                </div>
                </label>

                <label class="flex info">
                    <input type="checkbox" class="checkbox">
                    <p>Ingetkan Aku Ya >w<</p>
                </label>

                <button type="submit" class="login" name="login">MASUK</button>
        </form>

        <!-- Icon SMK -->
        <div class="icon text-center">
            <img src="image/ifsu.png" alt="" width="50px">
            <h2>SMK INFORMATIKA SUMEDANG</h2>
        </div>
    </div>
</body>
</html>