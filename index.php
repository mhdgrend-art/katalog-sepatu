<?php
include 'koneksi.php';

if(isset($_POST['tambah'])){

    $brand = $_POST['brand'];
    $ukuran = $_POST['ukuran'];
    $stok = $_POST['stok'];

    mysqli_query($conn,"INSERT INTO sepatu VALUES(
        '',
        '$brand',
        '$ukuran',
        '$stok'
    )");
}

if(isset($_GET['hapus'])){

    $id = $_GET['hapus'];

    mysqli_query($conn,"DELETE FROM sepatu WHERE id='$id'");
}

$data = mysqli_query($conn,"SELECT * FROM sepatu");
?>

<!DOCTYPE html>
<html>
<head>

    <title>Katalog Toko Sepatu</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="style.css">

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-black shadow">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">
            👟 GRNDL SHOES
        </a>
    </div>
</nav>

<div class="hero">

    <div class="overlay"></div>

    <div class="hero-content text-center">

        <h1>STYLE YOUR STEP</h1>

        <p>Katalog Sneakers </p>

    </div>

</div>

<div class="container mt-5 mb-5">

    <div class="card custom-card p-4 shadow-lg">

        <h3 class="mb-4 text-center">
            Tambah Model Sepatu
        </h3>

        <form method="POST" onsubmit="return validasi()">

            <div class="mb-3">

                <label>Brand Sepatu</label>

                <input
                    type="text"
                    name="brand"
                    id="brand"
                    class="form-control"
                >

            </div>

            <div class="mb-3">

                <label>Ukuran</label>

                <input
                    type="number"
                    name="ukuran"
                    class="form-control"
                >

            </div>

            <div class="mb-3">

                <label>Stok</label>

                <input
                    type="number"
                    name="stok"
                    class="form-control"
                >

            </div>

            <button
                type="submit"
                name="tambah"
                class="btn btn-dark w-100"
            >
                Tambah Data
            </button>

        </form>

    </div>

    <div class="table-container mt-5 shadow-lg">

        <table class="table table-dark table-hover align-middle mb-0">

            <tr>

                <th>No</th>
                <th>Brand</th>
                <th>Ukuran</th>
                <th>Stok</th>
                <th>Aksi</th>

            </tr>

            <?php
            $no = 1;

            while($d = mysqli_fetch_array($data)){
            ?>

            <tr>

                <td><?= $no++; ?></td>
                <td><?= $d['brand']; ?></td>
                <td><?= $d['ukuran']; ?></td>
                <td><?= $d['stok']; ?></td>

                <td>

                    <a
                    href="?hapus=<?= $d['id']; ?>"
                    onclick="return confirm('Yakin hapus data?')"
                    class="btn btn-danger btn-sm"
                    >
                    Hapus
                    </a>

                </td>

            </tr>

            <?php } ?>

        </table>

    </div>

</div>

<script src="script.js"></script>

</body>
</html>