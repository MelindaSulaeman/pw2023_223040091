<?php 
// Array Asociative
// Array yang indexny adalah string
// jika indexnya lebih dari 1 maka menggunakan Array ([]) maka kebawahnya menggunakan Array juga
$mahasiswa = [
    [
        'nama' => 'Melinda', 
        'binatang' => '🦒', 
        'makanan' => ['🍩', '🍿', '🥖']
    ],

    [
        'nama' => 'Nita',
        'binatang' => '🐣',  
        'makanan' => ['🫔', '🥐']
    ],

    [
        'nama' => 'Maria', 
        'binatang' => '🐳',
        'makanan' => []
    ], 

    [
        'nama' => 'Eka',
        'binatang' => '🦞',  
        'makanan' => ['🍢', '🥗'] 
    ], 

    [
        'nama' => 'Nova', 
        'binatang' => '🦜',  
        'makanan' => ['🍔','🧁' ]
    ]
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
    <li>Nama: <?=  $m ['nama']; ?></li>
    <li>Makanan Favorit :
        <?php foreach ($m ['makanan'] as $i ){
            echo $i;

        } ?>
    </li>
    <li>Binatang Peliharaan : <?= $m ['binatang']; ?> </li>
</ul>
<?php } ?>

</body>
</html>