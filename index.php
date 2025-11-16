<?php
include('koneksi.php');

// Query untuk mengambil semua tugas beserta nama user
$query_tugas = "SELECT tugas.*, user.nama_user FROM tugas 
                JOIN user ON tugas.id_user = user.id_user";
$result_tugas = mysqli_query($connection, $query_tugas);

// Query untuk mengambil semua user
$query_users = "SELECT * FROM user";
$result_users = mysqli_query($connection, $query_users);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Tugas dan User</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #fceff9, #e7f6f9);
            min-height: 100vh;
        }
        .container {
            margin-top: 50px;
            max-width: 1200px;
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }
        .header-title {
            color: #4a4e69;
            font-size: 2rem;
            font-weight: bold;
            text-align: center;
            text-transform: uppercase;
        }
        .btn-primary-custom {
            background-color: #7b2cbf;
            color: white;
            border-radius: 10px;
            border: none;
        }
        .btn-primary-custom:hover {
            background-color: #6932a8;
        }
        .btn-danger-custom {
            background-color: #ff6f61;
            color: white;
            border-radius: 10px;
            border: none;
        }
        .btn-danger-custom:hover {
            background-color: #e64a3f;
        }
        .nav-tabs .nav-link.active {
            background-color: #7b2cbf;
            color: #fff;
            border-color: #7b2cbf;
        }
        /* Menambahkan properti untuk memastikan teks dalam tabel berada di tengah */
        table th, table td {
            text-align: center; /* Menyusun teks di dalam th dan td ke tengah */
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header-title">Manajemen Tugas</div>

        <!-- Tabs Navigation -->
        <ul class="nav nav-tabs mt-4" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="tugas-tab" data-bs-toggle="tab" data-bs-target="#tugas" type="button" role="tab" aria-controls="tugas" aria-selected="true">Daftar Tugas</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="user-tab" data-bs-toggle="tab" data-bs-target="#user" type="button" role="tab" aria-controls="user" aria-selected="false">Daftar User</button>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content mt-3" id="myTabContent">
            <!-- Tab Tugas -->
            <div class="tab-pane fade show active" id="tugas" role="tabpanel" aria-labelledby="tugas-tab">
                <a href="tugas/tambah_tugas.php" class="btn btn-primary-custom mb-3">Tambah Tugas</a>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Tugas</th>
                            <th>Deskripsi</th>
                            <th>Status</th>
                            <th>Tenggat Waktu</th>
                            <th>Nama User</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($result_tugas)) {
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $row['nama_tugas']; ?></td>
                                <td><?php echo $row['deskripsi']; ?></td>
                                <td>
                                    <?php
                                    if ($row['status_tugas'] == 'pending') {
                                        echo '<span class="badge bg-warning text-dark">Pending</span>';
                                    } elseif ($row['status_tugas'] == 'in_progress') {
                                        echo '<span class="badge bg-primary">In Progress</span>';
                                    } else {
                                        echo '<span class="badge bg-success">Selesai</span>';
                                    }
                                    ?>
                                </td>
                                <td><?php echo $row['tenggat_tugas']; ?></td>
                                <td><?php echo $row['nama_user']; ?></td>
                                <td>
                                    <a href="tugas/edit_tugas.php?kode_tugas=<?php echo $row['kode_tugas']; ?>" class="btn btn-primary-custom btn-sm">Edit</a>
                                    <a href="tugas/hapus_tugas.php?kode_tugas=<?php echo $row['kode_tugas']; ?>" class="btn btn-danger-custom btn-sm" onclick="return confirm('Yakin ingin menghapus tugas ini?')">Hapus</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <!-- Tab User -->
            <div class="tab-pane fade" id="user" role="tabpanel" aria-labelledby="user-tab">
                <a href="user/tambah_user.php" class="btn btn-primary-custom mb-3">Tambah User</a>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Nomor Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($result_users)) {
                        ?>
                            <tr>
                                <td><?php echo $row['id_user']; ?></td>
                                <td><?php echo $row['nama_user']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['no_telp']; ?></td>
                                <td>
                                    <a href="user/edit_user.php?id_user=<?php echo $row['id_user']; ?>" class="btn btn-primary-custom btn-sm">Edit</a>
                                    <a href="user/hapus_user.php?id_user=<?php echo $row['id_user']; ?>" class="btn btn-danger-custom btn-sm" onclick="return confirm('Yakin ingin menghapus user ini?')">Hapus</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
