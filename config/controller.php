<?php

//fungsi menampilkan data (create, update, delete)
function select($query)
{
    //panggil koneksi database
    global $db;

    $result = mysqli_query($db, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result))
    {
        $rows[] = $row;
    }

    return $rows;
}

function execute($query) {
    
    global $db;
    if ($db->query($query) === TRUE) {
        return true;
    } else {
        error_log("Error: " . $db->error);
        return false;
    }
}

//fungsi menambahkan data barang
function create_status($post)
{
    global $db;

    $status = strip_tags($post["status"]);

    //query tambah produk
    $query = "INSERT INTO statuss VALUES(null, '$status')";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function create_kategori($post)
{
    global $db;

    $kategori = strip_tags($post["kategori"]);

    //query tambah produk
    $query = "INSERT INTO kategori VALUES(null, '$kategori')";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

//fungsi menambahkan data barang
function create_produk($post)
{
    global $db;

    $nama_produk = strip_tags($post["nama_produk"]);
    $harga = strip_tags($post["harga"]);
    $kategori = strip_tags($post["kategori"]);
    $status = strip_tags($post["status"]);

    //query tambah produk
    $query = "INSERT INTO produk VALUES(null, '$nama_produk', '$harga', '$kategori', '$status')";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

//fungsi edit/update data datang
function update_produk($post)
{
    global $db;

    $id_produk = $post["id_produk"];
    $nama_produk = strip_tags($post["nama_produk"]);
    $kategori = strip_tags($post["kategori"]);
    $harga = strip_tags($post["harga"]);
    $status = strip_tags($post["statuss"]);

    // Query untuk edit data
    $query = "UPDATE produk SET nama_produk = '$nama_produk', kategori_id = '$kategori', harga = '$harga', status_id = '$status' WHERE id_produk = $id_produk";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

//fungsi mengahapus barang
function delete_produk($id_produk) {
    global $db;

    //query hapus data barang
    $query = "DELETE FROM produk WHERE id_produk = $id_produk";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);

}

?>