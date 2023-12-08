<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $npm = $_POST['npm'];
    $jurusan = $_POST['jurusan'];
    $semester = $_POST['semester'];

    $query = "INSERT INTO mahasiswa (nama, npm, jurusan, semester) VALUES ('$nama', '$npm', '$jurusan', '$semester')";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        header("Location: index.php");
        exit();
    } else {
        echo "Gagal menyimpan data mahasiswa.";
    }
}
?>



