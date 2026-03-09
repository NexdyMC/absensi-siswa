/// semua codingan html dan css dipindahkan ke js ///

const youtubr = document.getElementById("Youtube");
const instagram = document.getElementById("instagram");
const Tiktok = document.getElementById("tiktok");
const github = document.getElementById("github"); 
const namebtn = document.getElementsByClassName("name-description")

const linkk = [('https://www.youtube.com/@Nexdy_MC'), ('https://www.instagram.com/nexdy_mc'),
    ('https://www.tiktok.com/@wincraftmc?'), ('https://www.github.com/nexdymc') ];
    
    // const linkkyoutube = ('https://www.youtube.com/@Nexdy_MC');
    // const linkkinstagraam = ('https://www.instagram.com/nexdy_mc');
    // const linkktiktok = ('https://www.tiktok.com/@wincraftmc?');
    // const linkkgithub = ('https://www.github.com/nexdymc');
    
const description = document.querySelector(".description");
description.innerHTML = [
    "<p>" + /// --------- DISINGKAT BIAR JELAS --------- ///
        "Hai Nama ku NexdyMC aku seorang conten creator minecraft dan pembuat texture pack mini" +
    "</p> "
];
    description.style.fontSize = '1.3em';

const copyright = document.getElementById("copyright");
copyright.innerHTML = [
    "<h3>" +  /// --------- DISINGKAT BIAR JELAS --------- ///
        "Versi 1.5 || By Web - NexdyMC || copyright &copyNexdyProjek 2024" +
    "</h3>"
];
var target = ['_blank']

/// --- link Media Sharing Network --- ///
youtubr.href = linkk[0] ;
instagram.href = linkk[1] ;
Tiktok.href = linkk[2] ;
github.href = linkk[3] ;

/// --- link Media target _blank --- /// 
youtubr.target = '_blank';
instagram.href.target = '_blank';
Tiktok.target = '_blank' ;
github.target = '_blank' ;

function tanggal() {
    const out = new Date();
    const tanggal = document.getElementById("tanggal");
    const haritext = ["Minggu ", "Senin ", "Selasa ", "Rabu ", "Kamis ", "Jumat ", "Sabtu "];
    const bulan = [" Januari ", " Februari ", " Maret ", " April ", " Mei ", " Juni ", " juli ",
                   " Agustus ", " September ", " Oktober ", " November ", " desember "];
    const month = bulan[out.getMonth()];
    const hari = haritext[out.getDay()];
    const harinomer = String(out.getDate()).padStart(2, "0");
    const tahun = String(out.getFullYear()).padStart(2, "0");
    tanggal.textContent =  (hari + harinomer + month + tahun);
    tanggal.style.fontSize = '1.5rem' ;
    // tanggal.style.cursor = 'default';
}
setInterval(tanggal, 1000);
tanggal();

function clock() {
    const out = new Date();
    const clock = document.getElementById("clock");
    const jam = String(out.getHours()).padStart(2, "0");
    const menit = String(out.getMinutes()).padStart(2, "0");
    const detik = String(out.getSeconds()).padStart(2, "0");
    clock.textContent = (jam + ':' + menit + ':' + detik);
    clock.style.fontSize = '1.5rem' ;
    // clock.style.cursor = 'default';
}
setInterval(clock, 1000);
clock();