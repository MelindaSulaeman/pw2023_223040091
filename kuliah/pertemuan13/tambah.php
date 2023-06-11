<?php 
require('functions.php');

$title = 'From Tambah Data';

//insert data ke tabel mahasiswa jika tombol diklik
if (isset($_POST ['tambah'])){
    if (tambah($_POST) > 0);{
        echo "<script>
                alert ('Data berhasil ditambahkan');
                document.location.href = 'index.php';
                </script>";
    }
}

require('views/tambah.view.php');
?>
