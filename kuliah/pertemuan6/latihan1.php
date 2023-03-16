<?php 
// Array Multidimensi
// Array di dalam Array

$mahasiswa = [
    ['Melinda', '🦒', '🍩'],
    ['Nita', '🐣', '🫔'],
    ['Maria', '🐳', '🍝'], 
    ['Eka', '🦞', '🍢' ], 
    ['Nova', '🦜', '🍔' ]
];

?>
<!-- Array multi dimensi / array di dalam array -->
<!-- ['Maria', '🍔', '🐵'] -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan1</title>
</head>
<body>
    
<h2>Daftar Mahasiswa</h2>
<?php foreach ($mahasiswa  as $m) { ?>

<ul>
    <li>Nama: <?=  $m [0]; ?></li>
    <li>Makanan Favorit : <?= $m [2]; ?>  </li>
    <li>Binatang Peliharaan : <?= $m [1]; ?> </li>
</ul>
<?php } ?>

</body>
</html>