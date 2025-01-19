<?php 

include("header.php");

$data_status = select("SELECT * FROM statuss");
$data_kategori = select("SELECT * FROM kategori");

//cek tombol tambah ditekan
if (isset($_POST["tambah"])) {
    if (create_produk($_POST) > 0) {
        echo "<script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Data Barang Berhasil Ditambahkan',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    window.location.href = 'index.php';
                });
            </script>";
    }   else {
        echo "script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Data Barang Gagal Ditambahkan',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    window.location.href = 'index.php';
                });
            </script>";
        }
}
    
?>

<div class="content-header">
    <h1 class="mt-2 mb-3">Tambah Produk</h1>
</div>

<div>
<form action="" method="post">
        <div class="mb-2">
            <label for="nama_produk" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" id="nama_produk" name="nama_produk" required>
        </div>
        <div class="mb-2">
            <label for="kategori" class="form-label">Jenis Kategori</label>
            <select class="form-control" name="kategori" id="kategori" required>
            <?php foreach ($data_kategori as $kategori) : ?>
                <option value="<?= $kategori['id_kategori']; ?>"><?= $kategori['nama_kategori']; ?></option>
            <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-2">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" placeholder="Harga" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-control" name="status" id="status" required>
            <?php foreach ($data_status as $status) : ?>
                <option value="<?= $status['id_status']; ?>"><?= $status['nama_status']; ?></option>
            <?php endforeach; ?>
            </select>
        </div>
        <div class="mt-2">
        <button type="submit" name="tambah" class="btn" style="background-color: #B3BDCA; float: right">Tambah</button>
        <a href="index.php" class="btn" style="background-color: #B3BDCA; float: left">Kembali</a>
        </div>
</form>
</div>

<?php 

    include("footer.php");
    
?>