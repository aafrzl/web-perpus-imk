<?php
//ambil id
$id = $_GET['id'];

//ambil data buku berdasarkan id
$sql = $conn->query("SELECT * FROM tb_buku WHERE id_buku = '$id'") or die(mysqli_error($conn));
$data = mysqli_fetch_assoc($sql);

//simpan ubah data buku
if (isset($_POST['ubah'])) {
  $id_buku = $_POST['id_buku'];
  $judulBuku = $_POST['judul_buku'];
  $pengarang = $_POST['pengarang'];
  $penerbit = $_POST['penerbit'];
  $tahun_terbit = $_POST['tahun_terbit'];
  $jumlah = $_POST['jumlah'];

  $sql = $conn->query("UPDATE tb_buku SET judul_buku = '$judulBuku', pengarang = '$pengarang', penerbit = '$penerbit', tahun_terbit = '$tahun_terbit', jumlah = '$jumlah' WHERE id_buku = '$id_buku'") or die(mysqli_error($conn));
  if ($sql) {
    echo "<script>swal('Data berhasil di edit', {
            icon: 'success',
        }).then((willUpdate) => {if(willUpdate) {window.location='?p=buku';}} );</script>";
  } else {
    echo "<script>swal('Data gagal di edit', {
            icon: 'error',
        });</script>";
  }
}

?>

<h1 class="mt-4">Edit Data Buku</h1>
<ol class="breadcrumb mb-4">
  <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
  <li class="breadcrumb-item"><a href="?p=buku">Buku</a></li>
  <li class="breadcrumb-item active">Edit Data Buku</li>
</ol>
<div class="card-header mb-5">

  <form action="" method="post">
    <div class="form-group">
      <div class="form-group">
        <label class="small mb-1" for="id_buku">ID Buku</label>
        <input class="form-control" id="id_buku" name="id_buku" type="text" value="<?= $data['id_buku']; ?>" readonly />
      </div>
      <div class="form-group">
        <label class="small mb-1" for="judul_buku">Judul Buku</label>
        <input class="form-control" id="judul_buku" name="judul_buku" type="text" placeholder="Masukkan judul buku" value="<?= $data['judul_buku']; ?>" />
      </div>
      <div class="form-group">
        <label class="small mb-1" for="pengarang">Pengarang</label>
        <input class="form-control" id="pengarang" name="pengarang" type="text" placeholder="Masukkan pengarang" value="<?= $data['pengarang']; ?>" />
      </div>
      <div class="form-group">
        <label class="small mb-1" for="penerbit">Penerbit</label>
        <input class="form-control" id="penerbit" name="penerbit" type="text" placeholder="Masukkan penerbit" value="<?= $data['penerbit']; ?>" />
      </div>
      <div class="form-group">
        <label class="small mb-1" for="tahun_terbit">Tahun Terbit</label>
        <input class="form-control" type="number" name="tahun_terbit" id="tahun_terbit" min="1900" max="2099" pattern="[0-9]{4}" placeholder="Masukkan tahun terbit buku" value="<?= $data['tahun_terbit']; ?>">
      </div>
      <div class="form-group">
        <label class="small mb-1" for="jumlah">Jumlah</label>
        <input class="form-control" id="jumlah" name="jumlah" type="number" placeholder="Masukkan jumlah buku" value="<?= $data['jumlah']; ?>" />
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary" name="ubah">Ubah Data</button>
      </div>
  </form>
</div>