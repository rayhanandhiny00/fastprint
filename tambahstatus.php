<?php 

include("header.php");

$data_status = select("SELECT * FROM statuss");

//cek tombol tambah ditekan
if (isset($_POST["tambah"])) {
    if (create_status($_POST) > 0) {
        echo "<script>
                alert('Status Berhasil Ditambahkan');
                document.location.href = 'tambahstatus.php'
             </script>";
    }   else {
        echo "<script>
                alert('Status Gagal Ditambahkan');
                document.location.href = 'tambahstatus.php'
             </script>";
        }
}
    
?>

<div class="content-header">
    <h1 class="mt-2 mb-3">Tambah Status</h1>
</div>

<div class="row mb-3">
<form action="" method="post">
        <div class="mb-3">
            <input type="text" class="form-control" id="status" name="status" required>
        </div>
        <button type="submit" name="tambah" class="btn" style="background-color: #B3BDCA; float: right">Tambah</button>
</form>
</div>

<div>
    <table class="table table-bordered">
    <thead align="center">
        <tr>
            <th width="10%">No</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
    <?php $no = 1; ?>
    <?php foreach($data_status as $status): ?>
    <tr>
        <td align="center"><?= $no++; ?></td>
        <td><?= $status['nama_status']; ?></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
    </table>
</div>

<?php 

include("footer.php");
    
?>