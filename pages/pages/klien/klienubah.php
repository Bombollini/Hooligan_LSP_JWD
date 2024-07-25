<div id="top" class="row mb-3">
    <div class="col">
        <h3 style="color:yellow;">Ubah Data Klien</h3>
    </div>
    <div class="col">
        <a href="?page=klien" class="btn btn-primary float-end">
            <i class="fa fa-arrow-circle-left"></i>
            Kembali
        </a>
    </div>
</div>
<div id="pesan" class="row mb-3">
    <div class="col">
        <?php
        include "database/connection.php";

        if (isset($_POST["simpan_button"])) {

            $id_klien = $_POST['id_klien'];
            $nama_klien = $_POST['nama_klien'];
            $alamat = $_POST['alamat'];

            // Validasi nama jika sama sudah ada
            $checkSQL = "SELECT * FROM klien WHERE nama_klien = '$nama_klien' AND id_klien != '$id_klien'";
            $result = mysqli_query($connection, $checkSQL);
            if (mysqli_num_rows($result) > 0) {
        ?>
                <div class="alert alert-danger" role="alert">
                    <i class="fa fa-exclamation-circle"></i>
                    Nama klien sudah ada
                </div>
                <?php
            } else {
                // Update data klien
                $sql = "UPDATE klien SET nama_klien='$nama_klien', alamat='$alamat' WHERE id_klien = '$id_klien'";
                $result = mysqli_query($connection, $sql);
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
                        Ubah data berhasil disimpan
                    </div>
        <?php
                }
            }
        }

        // Ambil data klien berdasarkan id
        $id_klien = $_GET['id'];
        $selectSQL = "SELECT * FROM klien WHERE id_klien = '$id_klien'";
        $result = mysqli_query($connection, $selectSQL);
        if (!$result || mysqli_num_rows($result) == 0) {
            echo '<meta http-equiv="refresh" content="0;url=?page=klien">';
        }
        $row = mysqli_fetch_assoc($result);
        ?>
    </div>
</div>
<div id="inputan" class="row mb-3">
    <div class="col">
        <div class="card px-3">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="id_klien" class="form-label">ID Klien</label>
                    <input type="text" class="form-control" id="id_klien" name="id_klien" value="<?php echo $id_klien ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="nama_klien" class="form-label">Nama Klien</label>
                    <input type="text" class="form-control" id="nama_klien" name="nama_klien" placeholder="Nama Klien" value="<?php echo $row['nama_klien'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" rows="3" required><?php echo $row['alamat'] ?></textarea>
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