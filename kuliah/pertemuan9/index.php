<?php 
require('functions.php');
$title = 'Home';
$students = [
    [
        "nama" => "Melinda",
        "npm" => "223040091",
        "email" => "amelinda@gmail.com"
    ],
    [
        "nama" => "Nadine",
        "npm" => "223040000",
        "email" => "nadine@gmail.com"
    ],
  ];

//   dd($_SERVER["REQUEST_URI"]);
// /pw2023_223040091/kuliah/pertemuan9/
require('views/index.view.php');
?>
