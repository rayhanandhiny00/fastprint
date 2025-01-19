<?php 

include("header.php");

$data_status = select("SELECT * FROM statuss");
$data_kategori = select("SELECT * FROM kategori");

$id_produk = (int)$_GET['id_produk'];

$produk = select("SELECT * FROM produk WHERE id_produk = $id_produk")[0];

//cek tombol edit ditekan
if (isset($_POST["edit"])) {
    if (update_produk($_POST) > 0) {
        echo "<script>
                alert('Data Barang Berhasil Diedit');
                document.location.href = 'index.php'
             </script>";
    }   else {
        echo "<script>
                alert('Data Barang Gagal Diedit');
                document.location.href = 'editproduk.php'
             </script>";
        }
}
    
?>

<div class="content-header">
    <h1 class="mt-2 mb-3">Edit Produk</h1>
</div>

<div>
<form action="" method="post">
    <input type="hidden" name="id_produk" value="<?= $produk['id_produk']; ?>">
        <div class="mb-2">
            <label for="nama_produk" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="<?= $produk['nama_produk']?>" required>
        </div>
        <div class="mb-2">
            <label for="kategori" class="form-label">Jenis Kategori</label>
            <select class="form-control" name="kategori" id="kategori" required>
            <?php foreach ($data_kategori as $kategori) : ?>
            <option value="<?= $kategori['id_kategori']; ?>" 
                <?= ($kategori['id_kategori'] == $produk['kategori_id']) ? 'selected' : ''; ?>>
                <?= $kategori['nama_kategori']; ?>
            </option>
        <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-2">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" value="<?= $produk['harga']?>" required>
        </div>
        <div class="mb-3">
            <label for="statuss" class="form-label">Status</label>
            <select class="form-control" name="statuss" id="statuss" required>
            <?php foreach ($data_status as $status) : ?>
            <option value="<?= $status['id_status']; ?>" 
                <?= ($status['id_status'] == $produk['status_id']) ? 'selected' : ''; ?>>
                <?= $status['nama_status']; ?>
            </option>
        <?php endforeach; ?>
            </select>
        </div>
        <div class="mt-2">
            <!-- <button type="submit" name="tambah" class="btn" style="background-color: #B3BDCA; float: right">Tambah</button> -->
            <button type="submit" name="edit" class="btn btn-secondary" style="background-color: #B3BDCA; float: right">Simpan Perubahan</button>
            <a href="index.php" class="btn" style="background-color: #B3BDCA; float: left">Kembali</a>
        </div>
</form>
</div>

<?php 

    include("footer.php");
    
?>