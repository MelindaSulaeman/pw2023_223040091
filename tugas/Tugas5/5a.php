<?php 
$student = [
    [
        'nama' => 'Melinda Sulaeman',
        'nrp' => '223040091',
        'prodi' => 'Teknik Informatika',
        'email' => 'melinda@gmail.com',
        'img' => 'mel.jpeg'
    ],
    [
        'nama' => 'Nita Febriany',
        'nrp' => '223040096',
        'prodi' => 'Teknik Informatika',
        'email' => 'nita76@gmail.com',
        'img' => 'nit.jpeg'
    ],
    [
        'nama' => 'Maria Oa Paulina Memen Loly',
        'nrp' => '223040099',
        'prodi' => 'Teknik Informatika',
        'email' => 'lolyn@gmail.com',
        'img' => 'lyn.jpeg'
    ],
    [
        'nama' => 'Syahbrina dinova',
        'nrp' => '223040074',
        'prodi' => 'Teknik Informatika',
        'email' => 'dinova0@gmail.com',
        'img' => 'bina.jpeg'
    ],
    [
        'nama' => 'Syerli Aryanti Nurafifa',
        'nrp' => '223040100',
        'prodi' => 'Teknik Informatika',
        'email' => 'syerly65@gmail.com',
        'img' => 'syer.jpeg'
    ],
    [
        'nama' => 'Fadhilla Nur Islami',
        'nrp' => '223040082',
        'prodi' => 'Teknik Informatika',
        'email' => 'fadhilla@gmail.com',
        'img' => 'dila.jpeg'
    ],
    [
        'nama' => 'Andiana Eka Riyanto',
        'nrp' => '223040115',
        'prodi' => 'Teknik Informatika',
        'email' => 'eka009@gmail.com',
        'img' => 'eka.jpeg'
    ],
    [
        'nama' => 'Nova asyifa',
        'nrp' => '223040112',
        'prodi' => 'Teknik Informatika',
        'email' => 'nova67@gmail.com',
        'img' => 'nova.jpeg'
    ],
    [
        'nama' => 'Dena Astia Wiati Gusti',
        'nrp' => '223040116',
        'prodi' => 'Teknik Informatika',
        'email' => 'denastia@gmail.com',
        'img' => 'dena.jpeg'
    ],
    [
        'nama' => 'Feby Alia Rahman',
        'nrp' => '223040059',
        'prodi' => 'Teknik Informatika',
        'email' =>  'febialia@gmail.com',
        'img' => 'feby.jpeg'
    ],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas 5</title>
</head>
<body>
<h2>Daftar Mahasiswa</h2>
    <?php foreach ($student as $s) : ?>
     <ul>
     <li> <img src="img/<?=$s["img"]; ?>" alt="pict" width=100></li>
        <li>Nama : <?= $s ['nama'] ?> </li>
        <li>NRP : <?= $s ['nrp'] ?> </li>
        <li>Jurusan : <?= $s ['prodi'] ?> </li>
        <li>E-mail : <?= $s ['email'] ?> </li>
     </ul>
    <?php endforeach ?>
</body>
</html>