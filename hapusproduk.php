<?php

include("config/app.php");

$id_produk = isset($_GET['id_produk']) ? (int)$_GET['id_produk'] : 0;

if ($id_produk > 0) {
    if (delete_produk($id_produk) > 0) {
        echo "<script>
            alert('Produk Berhasil Dihapus');
            document.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
            alert('Produk Gagal Dihapus');
            document.location.href = 'index.php';
        </script>";
    }
} else {
    echo "<script>
        alert('ID Barang tidak valid');
        document.location.href = 'index.php';
    </script>";
}

?>
