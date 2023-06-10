<?php
// kutip ' tidak bisa membaca variable
// jika mencari nilai genap maka variable ganti jadi variable genap dan loncatan diganti genap (+=)
// jika ingin menampilkan semua dan variable 1 maka loncatan menggunakan ++
 echo 'Mulai <br>'; 
 $a = 10;
 while ($a > 1 ) { //kondisi // jika ingin dibawa angka yg di kondisi pakai = 
 echo "Hello World $a x! <br>"; 

 $a--; // untuk loncatan (incremen/decrement)
 }
 echo 'Selesai <br>';
 
 echo "<hr>";
 echo 'Mulai <br>'; 
for ($a = "1"; $a <= 10; $a++) {
    echo "Hello world $a kali <br>";
}
echo 'Selesai <br>';
 ?>