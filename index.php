<?php 
    include("header.php");

    $status_id = isset($_GET['status_id']) ? (int) $_GET['status_id'] : 0;

    if ($status_id > 0) {
        $data_produk = select("SELECT p.*, k.nama_kategori, s.nama_status FROM produk p
                  JOIN kategori k ON p.kategori_id = k.id_kategori
                  JOIN statuss s ON p.status_id = s.id_status
                  WHERE p.status_id = $status_id
                  ORDER BY id_produk");
    } else {
        $data_produk = select("SELECT p.*, k.nama_kategori, s.nama_status FROM produk p
                  JOIN kategori k ON p.kategori_id = k.id_kategori
                  JOIN statuss s ON p.status_id = s.id_status
                  ORDER BY id_produk");
    }

?>

<div class="content-header">
    <h1 class="mt-2 mb-3">Produk</h1>
</div>

<div class="mb-3">
    <a href="tambahproduk.php" type="button" class="btn btn-light">Tambah <i class="fas fa-plus-circle"></i></a>
</div>

<div class="mb-3">
    <form method="get" action="index.php">
        <label for="statusFilter">Status: </label>
        <select name="status_id" id="statusFilter" class="form-select" onchange="this.form.submit()">
            <option value="0" <?= $status_id == 0 ? 'selected' : ''; ?>>Semua</option>
            <option value="1" <?= $status_id == 1 ? 'selected' : ''; ?>>Bisa Dijual</option>
            <option value="2" <?= $status_id == 2 ? 'selected' : ''; ?>>Tidak Bisa Dijual</option>
        </select>
    </form>
</div>

<div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th>Nama Produk</th>
                <th width="15%">Kategori</th>
                <th>Harga</th>
                <th width="12%">Status</th>
                <th width="5%">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach($data_produk as $produk): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $produk['nama_produk'];?></td>
                    <td><?= $produk['nama_kategori'];?></td>
                    <td><?= number_format($produk['harga'], 0, ',', '.'); ?></td>
                    <td><?= $produk['nama_status'];?></td>
                    <td width="21%" class="text-center">
                        <a href="editproduk.php?id_produk=<?= $produk['id_produk'];?>" class="btn btn-secondary btn-sm">Edit <i class="far fa-edit"></i></a>
                        <a href="hapusproduk.php?id_produk=<?= $produk['id_produk'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Produk Dihapus?')">Hapus <i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?> 
        </tbody>
    </table>
</di
