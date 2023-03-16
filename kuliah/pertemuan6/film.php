<?php 
$film = [
    [
        'img' => 'Mencuri Raden Shaleh.png',
        'judul' => ' Mencuri Raden Saleh',
        'tahun' =>  '2022',
        'genre' => ['Action'],
        'pemeran utama' => ['Iqbaal Dhiafakhri Ramadhan,  ', 'Angga Yunanda'],
        'sutradara' => 'Angga Dwimas Sasongko '
    ],

    [
        'img' => 'The Big 4.png',
        'judul' => 'The Big 4',
        'tahun' =>  '2022',
        'genre' => ['Action, ', 'Komedi'],
        'pemeran utama' => ['Abimana Aryasatya, ', 'Putri Marino'],
        'sutradara' => 'Timo Tjahjanto'
    ],

    [
        'img' => 'Business Proposal.png',
        'judul' => 'Business Proposal',
        'tahun' =>  '2022',
        'genre' => ['Komedi, ', 'Romance'],
        'pemeran utama' => ['Ahn Hyo-Seop, ', 'Se-Jung Kim'],
        'sutradara' => 'Park Seon Ho'
    ], 

    [
        'img' => 'Sayap-Sayap Patah.png',
        'judul' => 'Sayap-Sayap Patah',
        'tahun' =>  '2022',
        'genre' =>  ['Action, ', 'Romance'],
        'pemeran utama' => ['Nicholas Saputra, ', 'Ariel Tatum'],
        'sutradara' => 'Rudy Soedjarwo
        '
    ], 

    [
        'img' => 'Sweet Girl.jpg',
        'judul' => 'Sweet Girl',
        'tahun' =>  '2021',
        'genre' =>  ['Action, ', 'Drama, ', 'Thriller'],
        'pemeran utama' => ['Jason Momoa, ', 'Isabela Merced, ', 'Manuel Gracia-Rulfo'],
        'sutradara' => 'Brian Andrew'
    ]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Latihan3 Film</title>
</head>
<body>
    <h2>Daftar Film</h2>
    <?php foreach ($film as $f) : ?>
     <ul>
        <li> <img src="img/<?=$f["img"]; ?>" alt="poster" width=100></li>
        <li>Judul : <?= $f ['judul'] ?> </li>
        <li>Tahun : <?= $f ['tahun'] ?> </li>
        <li>Genre : 
            <?php 
            foreach ($f['genre'] as $genre) {
                echo $genre;
            }
            ?> 
            </li>
        <li>Pemeran Utama : 
            <?php 
            foreach ($f['pemeran utama'] as $karakter){
                echo $karakter;
            } 
            ?> 
            </li>
        <li>Sutradara : <?= $f ['sutradara'] ?> </li>
     </ul>
     <?php endforeach ?>
</body>
</html>
