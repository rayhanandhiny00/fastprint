<?php 

include("header.php");

$data_kategori = select("SELECT * FROM kategori");

//cek tombol tambah ditekan
if (isset($_POST["tambah"])) {
    if (create_kategori($_POST) > 0) {
        echo "<script>
                alert('Kategori Berhasil Ditambahkan');
                document.location.href = 'tambahkategori.php'
             </script>";
    }   else {
        echo "<script>
                alert('Kategori Gagal Ditambahkan');
                document.location.href = 'tambahkategori.php'
             </script>";
        }
}
    
?>

<div class="content-header">
    <h1 class="mt-2 mb-3">Tambah Kategori</h1>
</div>

<div class="row mb-3">
<form action="" method="post">
        <div class="mb-3">
            <input type="text" class="form-control" id="kategori" name="kategori" required>
        </div>
        <button type="submit" name="tambah" class="btn" style="background-color: #B3BDCA; float: right">Tambah</button>
</form>
</div>

<div>
    <table class="table table-bordered">
    <thead align="center">
        <tr>
            <th width="10%">No</th>
            <th>Kategori</th>
        </tr>
    </thead>
    <tbody>
    <?php $no = 1; ?>
    <?php foreach($data_kategori as $kategori): ?>
    <tr>
        <td align="center"><?= $no++; ?></td>
        <td><?= $kategori['nama_kategori']; ?></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
    </table>
</div>

<?php 

include("footer.php");
    
?>