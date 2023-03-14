<?php 
// Array 
// membuat array

$hari = array ('Senin', 'Selasa', 'Rabu');
$bulan = ['Januari', 'Februari', 'Maret'];
$mrArray = ["Melinda", 18, false];
$binatang = ['🦒', '🐣', '🐳', '🦞', '🦜'];

// mencetak Array
// mencetak 1 elemen di dalam array menggunakan echo

echo $hari[2];
echo "<hr>";

//mencetak semua isi array
//var_dump, print_r

var_dump ($hari);
echo "<br>";
print_r ($bulan);
var_dump($mrArray);
echo "<br>";
print_r ($binatang);
echo "<hr>";

//manipulasi array
//menambahkan elemen menggunakan index

$hari[3] = 'Kamis';
print_r($hari);
echo "<br>";

//menambahkan elemen diakhir array menggunakan []

$hari[] = "Jum'at";
$hari[] = "Sabtu";
print_r($hari);
echo "<br>";

// menambahkan elemen diakhir array menggunakan array_push
array_push($bulan, 'April', 'Mei', 'Juni');
print_r($bulan);

//menambahkan elemen diawal array menggunakan array_unshift
array_unshift ($binatang, '😒');
print_r ($binatang);
echo "<hr>";

//menghapus element dibelakang array_pop
array_pop ($hari);

//menghapus element di depan array dengan array_shiift
array_shift ($bulan);
print_r($bulan);
?>