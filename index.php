<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD Data Mahasiswa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-size: cover;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding-top: 20px;
            background-color: rgba(0, 0, 0, 0.1); 
        }
        .container {
            padding-bottom: 20px;
        }
        .btn-action {
            margin-right: 5px;
            transition: transform 0.3s ease;
        }
        .table {
            border-radius: 8px;
            overflow: hidden;
        }
        th, td {
            vertical-align: middle !important;
        }
        .btn {
            border-radius: 5px;
        }
        .btn-primary {
            background-color: #FFA07A;
            border-color: #FFA07A;
            transition: transform 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #FFD700;
            border-color: #FFD700;
            transform: scale(1.1);
        }
        .btn-danger {
            background-color: #CD5C5C;
            border-color: #CD5C5C;
            transition: transform 0.3s ease;
        } 
        .btn-danger:hover {
            background-color: #bb2d3b;
            border-color: #bb2d3b;
            transform: scale(1.1);
        }
        .form-control {
            border-radius: 5px;
            border-color: #ced4da;
        }
        .btn-submit {
            background-color: #CD5C5C;
            border-color: #CD5C5C;
            color: white;
            width: 100%;
            transition: transform 0.3s ease, opacity 0.3s ease;
        }
        .btn-submit:hover {
            background-color: #FFD700;
            border-color: #FFD700;
            transform: scale(1);
            opacity: 0.9;
        }
        .table th, .table td {
            border-top: none;
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f2f2f2;
        }
        .table-striped tbody tr:hover {
            background-color: #e5e5e5;
        }
        .jumbotron {
            background-color: #f8f9fa;
            padding: 2rem 1rem;
            border-radius: 15px;
            margin-bottom: 30px;
        }
        .jumbotron h2 {
            color: #495057;
            text-align: center;
        }
        .form-label {
            color: #495057;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container py-4">
        <div class="jumbotron">
            <h2 class="text-center mb-4">CRUD Data Mahasiswa</h2>
            <form action="create.php" method="POST">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required autocomplete="off">
                    </div>
                    <div class="col-md-6">
                        <label for="npm" class="form-label">NPM</label>
                        <input type="text" class="form-control" id="npm" name="npm" placeholder="NPM" required autocomplete="off">
                    </div>
                    <div class="col-md-6">
                        <label for="jurusan" class="form-label">Jurusan</label>
                        <input type="text" class="form-control" id="jurusan" name="jurusan" placeholder="Jurusan" required autocomplete="off">
                    </div>
                    <div class="col-md-6">
                        <label for="semester" class="form-label">Semester</label>
                        <input type="number" class="form-control" id="semester" name="semester" placeholder="Semester" required min="1" max="8" autocomplete="off">
                    </div>
                    <div class="col-12 mt-3">
                        <button type="submit" class="btn btn-submit btn-block" name="simpan">Simpan Data Mahasiswa</button>
                    </div>
                </div>
            </form>
        </div>
        
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">NPM</th>
                        <th scope="col">Jurusan</th>
                        <th scope="col">Semester</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include('koneksi.php');

                    $sql = "SELECT * FROM mahasiswa";
                    $query = mysqli_query($koneksi, $sql);
                    $urut = 1;

                    while ($row = mysqli_fetch_array($query)) {
                        $id = $row['id'];
                        $nama = $row['nama'];
                        $npm = $row['npm'];
                        $jurusan = $row['jurusan'];
                        $semester = $row['semester'];
                    ?>
                    <tr>
                        <th scope="row"><?php echo $urut++ ?></th>
                        <td><?php echo $nama ?></td>
                        <td><?php echo $npm ?></td>
                        <td><?php echo $jurusan ?></td>
                        <td><?php echo $semester ?></td>
                        <td>
                            <a href="update.php?id=<?php echo $id ?>" class="btn btn-primary btn-action">
                                <img src="https://cdn.jsdelivr.net/npm/bootstrap-icons/icons/pencil-square.svg" alt="Edit" height="20">
                            </a>
                            <a href="delete.php?id=<?php echo $id ?>" class="btn btn-danger btn-action" onclick="return confirm('Yakin mau delete data?')">
                                <img src="https://cdn.jsdelivr.net/npm/bootstrap-icons/icons/trash.svg" alt="Delete" height="20">
                            </a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
