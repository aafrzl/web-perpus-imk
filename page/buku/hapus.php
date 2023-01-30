<?php
$id_buku = $_GET['id'];

$conn->query("DELETE FROM tb_buku WHERE id_buku = '$id_buku'") or die(mysqli_error($conn));
echo "<script>swal('Data berhasil di hapus', {
    icon: 'success',
}).then((willDelete) => {
  if(willDelete){
    window.location='?p=buku';
  }
});</script>";
