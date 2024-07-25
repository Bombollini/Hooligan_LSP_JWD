<div id="top" class="row mb-3">
    <div class="col">
        <h3 style="color:yellow;">Tambah Data Klien</h3>
    </div>
</div>
<div id="pesan" class="row mb-3">
    <div class="col">
        <a href="?page=klien" class="btn btn-primary float-end">
            <i class="fa fa-arrow-circle-left"></i>
            Kembali
        </a>

    </div>
    <?php
    include "database/connection.php";

    if (isset($_POST["simpan_button"])) {
        $id_klien = $_POST["id_klien"];
        $nama_klien = $_POST["nama_klien"];
        $alamat = $_POST["alamat"];

        $sudahAda = false;
        $checkSQL = "SELECT * FROM klien WHERE id_klien = '$id_klien'";
        $resultCheck = mysqli_query($connection, $checkSQL);
        if (mysqli_num_rows($resultCheck) > 0) {
            $sudahAda = true;
        }

        if ($sudahAda) {
    ?>
            <div class="alert alert-danger" role="alert">
                <i class="fa fa-exclamation-circle"></i>
                ID klien sudah ada
            </div>
            <?php
        } else {
            $insertSQL = "INSERT INTO klien (id_klien, nama_klien, alamat) 
                              VALUES ('$id_klien', '$nama_klien', '$alamat')";
            $result = mysqli_query($connection, $insertSQL);
            if (!$result) {
            ?>
                <div class="alert alert-danger" role="alert">
                    <i class="fa fa-exclamation-circle"></i>
                    <?php echo mysqli_error($connection) ?>
                </div>
            <?php
            } else {
            ?>
                <div class="alert alert-success" role="alert">
                    <i class="fa fa-check-circle"></i>
                    Data berhasil disimpan
                </div>

    <?php
            }
        }
    }
    ?>
</div>
<div id="inputan" class="row mb-3">
    <div class="col">
        <div class="card px-3">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="id_klien" class="form-label">ID Klien </label>
                    <input type="text" class="form-control" id="id_klien" name="id_klien" required>
                </div>
                <div class="mb-3">
                    <label for="nama_klien" class="form-label">Nama Klien</label>
                    <input type="text" class="form-control" id="nama_klien" name="nama_klien" required>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                </div>
                <div class="col mb-3">
                    <button class="btn btn-success" type="submit" name="simpan_button">
                        <i class="fas fa-save"></i>
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>