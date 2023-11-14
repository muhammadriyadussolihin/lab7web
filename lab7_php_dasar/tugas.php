<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program PHP</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        .form-container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        h2 {
            color: #007bff;
        }

        label {
            color: #495057;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .alert {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 form-container">
            <h2 class="text-center mb-4">PROGRAM FORM INPUT PHP</h2>

            <?php
            // Fungsi untuk menghitung umur berdasarkan tanggal lahir
            function hitungUmur($tanggal_lahir) {
                $tanggal_lahir = new DateTime($tanggal_lahir);
                $sekarang = new DateTime('today');
                $umur = $sekarang->diff($tanggal_lahir);
                return $umur->y;
            }

            // Fungsi untuk menentukan gaji berdasarkan pekerjaan
            function hitungGaji($pekerjaan) {
                switch ($pekerjaan) {
                    case 'Programmer':
                        return 15000000;
                    case 'Desainer':
                        return 6500000;
                    case 'Marketing':
                        return 4000000;
                    case 'Operator Produksi':
                        return 5200000;
                    case 'Welding':
                        return 5400000;
                    case 'Sales':
                        return 4000000;
                    case 'Admin':
                        return 4500000;
                    default:
                        return 0;
                }
            }

            // Menangani form submission
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Mengambil nilai dari form
                $nama = htmlspecialchars($_POST['nama']);
                $tanggal_lahir = htmlspecialchars($_POST['tanggal_lahir']);
                $pekerjaan = htmlspecialchars($_POST['pekerjaan']);

                // Menghitung umur
                $umur = hitungUmur($tanggal_lahir);

                // Menghitung gaji berdasarkan pekerjaan
                $gaji = hitungGaji($pekerjaan);

                // Menampilkan output
                echo "<div class='alert alert-success'>";
                echo "<p><strong>Nama:</strong> $nama</p>";
                echo "<p><strong>Tanggal Lahir:</strong> $tanggal_lahir</p>";
                echo "<p><strong>Umur:</strong> $umur tahun</p>";
                echo "<p><strong>Pekerjaan:</strong> $pekerjaan</p>";
                echo "<p><strong>Gaji:</strong> Rp " . number_format($gaji, 0, ',', '.') . "</p>";
                echo "</div>";
            }
            ?>

            <!-- Form Input -->
            <form method="post" action="">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" placeholder="Masukkan nama Anda" required>
                </div>

                <div class="form-group">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" class="form-control" name="tanggal_lahir" required>
                </div>

                <div class="form-group">
                    <label for="pekerjaan">Pekerjaan</label>
                    <select class="form-control" name="pekerjaan" required>
                        <option value="" disabled selected>Pilih Pekerjaan Anda</option>
                        <option value="Programmer">Programmer</option>
                        <option value="Desainer">Desainer</option>
                        <option value="Marketing">Marketing</option>
                        <option value="Operator Produksi">Operator Produksi</option>
                        <option value="Welding">Welding</option>
                        <option value="Sales">Sales</option>
                        <option value="Admin">Admin</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary mx-auto d-block">Submit</button>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>