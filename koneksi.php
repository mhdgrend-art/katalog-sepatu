<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "db_sepatu"
);

if($conn){
    echo "KONEKSI BERHASIL";
}else{
    echo "KONEKSI GAGAL";
}

?>