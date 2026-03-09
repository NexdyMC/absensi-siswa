<?php 
include "db/db_sekolah.php";

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pelajaran | Nexdy Absen</title>
    <link rel="stylesheet" href="style/pelajaran.css">
    <?php include "html/head.html"?>
    <style>
    <?php include "style/style.css";?>
        select, input {
            margin-top: 10px;
            padding: 10px ;
            margin: 0 10px;
            width: 130px;
            border: none;
            border-radius: 5px;
            font-family: "LilitaOne";
            font-size: 16px;
            background: #eee;
            color: #000;
            box-shadow: 0 4px 0 #ccc;
        }
        .tab-container {
            padding: 20px 0 ;
            width: 100%;
            max-width: 580px;
            /* margin: auto; */
            font-family: 'LilitaOne';
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
        form {
            padding: 10px ;
            margin-bottom: 20px;
            border: none;
            border-radius: 10px;
            font-family: "LilitaOne";
            font-size: 16px;
            color: #fff;
            background: linear-gradient(45deg, #2563eb, #153885);
            box-shadow: 0 4px 0 #ccc;
        }
    </style>
    

    <!-- Export to Excel -->
    <script src="https://cdn.jsdelivr.net/npm/xlsx/dist/xlsx.full.min.js"></script>
    <!-- Export to PNG -->
    <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js"></script>
</head>
<body>

    <!-- dashboard -->
    <main class="dashboard">

        <!-- dashboard-sidebar   -->
        <?php include 'html/dashboard-sidebar.html';?>

        <div class="dashboard-content">

            <form action="crud.php" method="post">
                <label for="hari">
                    Hari:
                    <select name="hari" id="hari" require>
                        <option value="senin">Senin</option>
                        <option value="selasa">Selasa</option>
                        <option value="rabu">Rabu</option>
                        <option value="kamis">Kamis</option>
                        <option value="jumat">Jumat</option>
                        <option value="sabtu">Sabtu</option>
                        <option value="minggu">Minggu</option>
                    </select>
                </label>

                <label for="mata_pelajaran">
                    Mata Pelajaran:
                    <input type="text" name="mata_pelajaran" id="mata_pelajaran" require>
                </label>

                <label for="guru">
                    Guru:
                    <!-- <select name="guru" id="guru">
                        <option value="Astri">Astri</option>
                        <option value="Cintia">Cintia</option>
                        <option value="Rita">Rita</option>
                        <option value="Hani">Hani</option>
                        <option value="Anjar">Anjar</option>
                        <option value="Anwar">Anwar</option>
                        <option value="Yusep">Yusep</option>
                    </select> -->
                    <input type="text" name="guru" id="guru" require>
                </label>

                <label for="waktu-mulai">
                    Awal:
                    <input type="time" name="waktu_mulai" id="waktu-mulai" require>
                </label>

                <label for="waktu-selesai">
                    Akhir:
                    <input type="time" name="waktu_selesai" id="waktu-selesai" require>
                </label>

                <button type="submit" name="tambah_pelajaran" class="create">Create</button>
            </form>

            <div class="data-section">
                <div class="icon">
                    <span class="material-symbols-outlined yellow">calendar_today</span>
                    <h2>Jadwal Pelajaran</h2>
                </div>

                <div class="tab-container exportPNG">
                    <div class="tab-header">
                        <div class="item active" data-tab="Senin">Senin</div>
                        <div class="item" data-tab="Selasa">Selasa</div>
                        <div class="item" data-tab="Rabu">Rabu</div>
                        <div class="item" data-tab="Kamis">Kamis</div>
                        <div class="item" data-tab="Jumat">Jumat</div>
                        <div class="item" data-tab="Sabtu">Sabtu</div>
                        <div class="item" data-tab="Minggu">Minggu</div>
                    </div>

                    <div class="tab-content">
                        <?php 
                            $noSenin = 1;
                            $noSelasa = 1;
                            $noRabu = 1;
                            $noKamis = 1;
                            $noJumat = 1;
                            $noSabru = 1;
                            $noMinggu = 1;

                            $senin  = mysqli_query($db_sekolah, " SELECT * FROM pelajaran WHERE hari = 'senin' ORDER BY waktu ASC");
                            $selasa = mysqli_query($db_sekolah, " SELECT * FROM pelajaran WHERE hari = 'selasa' ORDER BY waktu ASC");
                            $rabu   = mysqli_query($db_sekolah, " SELECT * FROM pelajaran WHERE hari = 'rabu' ORDER BY waktu ASC");
                            $kamis  = mysqli_query($db_sekolah, " SELECT * FROM pelajaran WHERE hari = 'kamis' ORDER BY waktu ASC");
                            $jumat  = mysqli_query($db_sekolah, " SELECT * FROM pelajaran WHERE hari = 'jumat' ORDER BY waktu ASC");
                            $sabtu  = mysqli_query($db_sekolah, " SELECT * FROM pelajaran WHERE hari = 'sabtu' ORDER BY waktu ASC");
                            $minggu = mysqli_query($db_sekolah, " SELECT * FROM pelajaran WHERE hari = 'minggu' ORDER BY waktu ASC");
                            
                            ?>
                        <!-- Hari : Senin -->
                        <div id="Senin" class="content active">
                            <table>
                                <thead>
                                    <tr>
                                        <th>no</th>
                                        <th>Pelajaran</th>
                                        <th>Guru</th>
                                        <th>Waktu</th>
                                        <th>control</th>
                                    </tr>
                                </thead>

                                <tbody class="data">
                                    <?php while ($data   = mysqli_fetch_assoc($senin)) { ?>
                                    <tr class="baris">
                                        <td class="colom"><?= $noSenin++; ?></td>
                                        <td class="colom"><?= $data['nama_pelajaran']; ?></td>
                                        <td class="colom"><?= $data['guru']; ?></td>
                                        <td class="colom"><?= $data['waktu']; ?></td>
                                        <td class="colom">
                                            <a href="pelajaran.php?id_pelajaran=<?= $data['id_pelajaran'];?>">
                                                <span class="material-symbols-outlined"
                                                    style="color: #444">edit_square</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- Hari : Selasa -->
                        <div id="Selasa" class="content">
                            <table>
                                <thead>
                                    <tr>
                                        <th>no</th>
                                        <th>Pelajaran</th>
                                        <th>Guru</th>
                                        <th>Waktu</th>
                                        <th>control</th>
                                    </tr>
                                </thead>

                                <tbody class="data">
                                    <?php while ($data   = mysqli_fetch_assoc($selasa)) { ?>
                                    <tr class="baris">
                                        <td class="colom"><?= $noSelasa++; ?></td>
                                        <td class="colom"><?= $data['nama_pelajaran']; ?></td>
                                        <td class="colom"><?= $data['guru']; ?></td>
                                        <td class="colom"><?= $data['waktu']; ?></td>
                                        <td class="colom">
                                            <a href="pelajaran.php?id_pelajaran=<?= $data['id_pelajaran'];?>">
                                                <span class="material-symbols-outlined"
                                                    style="color: #444">edit_square</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- Hari : Rabu -->
                        <div id="Rabu" class="content">
                            <table>
                                <thead>
                                    <tr>
                                        <th>no</th>
                                        <th>Pelajaran</th>
                                        <th>Guru</th>
                                        <th>Waktu</th>
                                        <th>control</th>
                                    </tr>
                                </thead>

                                <tbody class="data">
                                    <?php while ($data   = mysqli_fetch_assoc($rabu)) { ?>
                                    <tr class="baris">
                                        <td class="colom"><?= $noRabu++; ?></td>
                                        <td class="colom"><?= $data['nama_pelajaran']; ?></td>
                                        <td class="colom"><?= $data['guru']; ?></td>
                                        <td class="colom"><?= $data['waktu']; ?></td>
                                        <td class="colom">
                                            <a href="pelajaran.php?id_pelajaran=<?= $data['id_pelajaran'];?>">
                                                <span class="material-symbols-outlined"
                                                    style="color: #444">edit_square</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- Hari : Kamis -->
                        <div id="Kamis" class="content">
                            <table>
                                <thead>
                                    <tr>
                                        <th>no</th>
                                        <th>Pelajaran</th>
                                        <th>Guru</th>
                                        <th>Waktu</th>
                                        <th>control</th>
                                    </tr>
                                </thead>

                                <tbody class="data">

                                    <?php while ($data   = mysqli_fetch_assoc($kamis)) { ?>
                                    <tr class="baris">
                                        <td class="colom"><?= $noKamis++; ?></td>
                                        <td class="colom"><?= $data['nama_pelajaran']; ?></td>
                                        <td class="colom"><?= $data['guru']; ?></td>
                                        <td class="colom"><?= $data['waktu']; ?></td>
                                        <td class="colom">
                                            <a href="pelajaran.php?id_pelajaran=<?= $data['id_pelajaran'];?>">
                                                <span class="material-symbols-outlined"
                                                    style="color: #444">edit_square</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- Hari : Jumat -->
                        <div id="Jumat" class="content">
                            <table>
                                <thead>
                                    <tr>
                                        <th>no</th>
                                        <th>Pelajaran</th>
                                        <th>Guru</th>
                                        <th>Waktu</th>
                                        <th>control</th>
                                    </tr>
                                </thead>

                                <tbody class="data">
                                    <?php while ($data   = mysqli_fetch_assoc($jumat)) { ?>
                                    <tr class="baris">
                                        <td class="colom"><?= $noJumat++; ?></td>
                                        <td class="colom"><?= $data['nama_pelajaran']; ?></td>
                                        <td class="colom"><?= $data['guru']; ?></td>
                                        <td class="colom"><?= $data['waktu']; ?></td>
                                        <td class="colom">
                                            <a href="pelajaran.php?id_pelajaran=<?= $data['id_pelajaran'];?>">
                                                <span class="material-symbols-outlined"
                                                    style="color: #444">edit_square</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- Hari : Sabtu -->
                        <div id="Sabtu" class="content">
                            <table>
                                <thead>
                                    <tr>
                                        <th>no</th>
                                        <th>Pelajaran</th>
                                        <th>Guru</th>
                                        <th>Waktu</th>
                                        <th>control</th>
                                    </tr>
                                </thead>

                                <tbody class="data">
                                    <?php while ($data   = mysqli_fetch_assoc($sabtu)) { ?>
                                    <tr class="baris">
                                        <td class="colom"><?= $noSabtu++; ?></td>
                                        <td class="colom"><?= $data['nama_pelajaran']; ?></td>
                                        <td class="colom"><?= $data['guru']; ?></td>
                                        <td class="colom"><?= $data['waktu']; ?></td>
                                        <td class="colom">
                                            <a href="pelajaran.php?id_pelajaran=<?= $data['id_pelajaran'];?>">
                                                <span class="material-symbols-outlined"
                                                    style="color: #444">edit_square</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- Hari : Minggu -->
                        <div id="Minggu" class="content">
                            <table>
                                <thead>
                                    <tr>
                                        <th>no</th>
                                        <th>Pelajaran</th>
                                        <th>Guru</th>
                                        <th>Waktu</th>
                                        <th>control</th>
                                    </tr>
                                </thead>

                                <tbody class="data">
                                    <?php while ($data   = mysqli_fetch_assoc($minggu)) { ?>
                                    <tr class="baris">
                                        <td class="colom"><?= $noMinggu++; ?></td>
                                        <td class="colom"><?= $data['nama_pelajaran']; ?></td>
                                        <td class="colom"><?= $data['guru']; ?></td>
                                        <td class="colom"><?= $data['waktu']; ?></td>
                                        <td class="colom">
                                            <a href="pelajaran.php?id_pelajaran=<?= $data['id_pelajaran'];?>">
                                                <span class="material-symbols-outlined"
                                                    style="color: #444">edit_square</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- exportPNG -->
                <button id="exportBtn" class="btnPNG" onclick="exportPNG()">Export to PNG</button>
            </div>
        </div>

    </main>

    <script>
        function exportPNG() {
            html2canvas(document.getElementById("exportPNG"), {
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

        const tabs = document.querySelectorAll('.item');
        const contents = document.querySelectorAll('.content');

        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                // reset active
                tabs.forEach(t => t.classList.remove('active'));
                contents.forEach(c => c.classList.remove('active'));

                // set active
                tab.classList.add('active');
                document.getElementById(tab.dataset.tab).classList.add('active');
            });
        });
    </script>
</body>
</html>