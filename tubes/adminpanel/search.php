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
                    <th scope="col">Aksi</th>
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
                            <img src="image/' . $data['gambar'] . '" style="width: 100px;">
                        </td>
                        <td>
                            <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editModal' . $data['id'] . '">Edit</a>
                            <a href="ekskul.php?aksi=delete&id=' . $data['id'] . '" class="btn btn-sm btn-danger" onclick="return confirm(\'Apakah Anda yakin ingin menghapus data ini?\')">Hapus</a>
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
