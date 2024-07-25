<?php
include "database/connection.php";
?>
<div class="row">
    <div class="col">
        <h3 style="color:yellow;">Daftar Klien</h3>
    </div>
    <div class="col">
        <a href="?page=klientambah" class="btn btn-success float-end">
            <i class="fa fa-plus-circle"></i>
            Tambah Klien
        </a>
    </div>
</div>
<div class="row mt-3">
    <div class="col">
        <?php
        $selectSQL = "SELECT * FROM klien";
        $result = mysqli_query($connection, $selectSQL);
        if (!$result) {
        ?>
            <div class="alert alert-danger" role="alert">
                <?php echo mysqli_error($connection) ?>
            </div>
        <?php
            return;
        }
        if (mysqli_num_rows($result) == 0) {
        ?>
            <div class="alert alert-light" role="alert">
                Data kosong
            </div>
        <?php
            return;
        }
        ?>
        <table class="table bg-light rounded shadow-sm table-hover">
            <thead>
                <tr>
                    <th scope="col" width="50">#</th>
                    <th scope="col">Nama Klien</th>
                    <th scope="col">Alamat</th>
                    <th scope="col" width="200">Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr class="align-middle">
                        <td>
                            <?php echo $no++ ?>
                        </td>
                        <td>
                            <?php echo $row["nama_klien"] ?>
                        </td>
                        <td>
                            <?php echo $row["alamat"] ?>
                        </td>
                        <td>
                            <a href="?page=klienubah&id=<?php echo $row["id_klien"] ?>" class="btn btn-warning">
                                <i class="fa fa-edit"></i>
                                Ubah
                            </a>
                            <a href="?page=klienhapus&id=<?php echo $row["id_klien"] ?>" onclick="return confirm('Konfirmasi data akan dihapus?');" class="btn btn-danger">
                                <i class="fa fa-trash"></i>
                                Hapus
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