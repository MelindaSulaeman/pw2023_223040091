<?php
$koneksi = mysqli_connect("localhost", "root", "", "tubespw");

// Cek apakah ada keyword pencarian
if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];

    // Query data ekstrakulikuler berdasarkan keyword
    $queryEkstrakulikuler = mysqli_query($koneksi, "SELECT * FROM ekstrakulikuler WHERE judul LIKE '%$keyword%'");

    // Periksa apakah hasil pencarian kosong
    if (mysqli_num_rows($queryEkstrakulikuler) > 0) {
        // Jika ada hasil pencarian, tampilkan tabel
        echo '<thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Gambar</th>
                </tr>
            </thead>
            <tbody>';
        $jumlah = 1;
        while ($data = mysqli_fetch_array($queryEkstrakulikuler)) {
            echo '<tr>
                        <th scope="row">' . $jumlah++ . '</th>
                        <td>' . $data['judul'] . '</td>
                        <td>' . $data['deskripsi'] . '</td>
                        <td>
                            <img src="../image/' . $data['gambar'] . '" style="width: 100px;">
                        </td>
                    </tr>';
        }
        echo '</tbody>';
    } else {
        // Jika tidak ada hasil pencarian, tampilkan alert
        echo '<div class="alert alert-info" role="alert">
                Tidak ada hasil pencarian.
              </div>';
    }
}
