<?php
$id_anggota = $_GET['id'];

$conn->query("DELETE FROM tb_anggota WHERE id_anggota = $id_anggota") or die(mysqli_error($conn));
echo "<script>swal('Data berhasil di hapus', {
    icon: 'success',
}).then((willDelete) => {
  if(willDelete){
    window.location='?p=anggota';
  }
});</script>";
