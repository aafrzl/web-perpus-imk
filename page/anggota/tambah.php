<?php
if (isset($_POST['tambah'])) {
  $nama = htmlspecialchars($_POST['nama_anggota']);
  $alamat = htmlspecialchars($_POST['alamat']);
  $no_hp = htmlspecialchars($_POST['no_hp']);
  $jk = htmlspecialchars($_POST['jk']);

  if (empty($nama && $alamat && $no_hp && $jk)) {
    echo "<script>swal('Pastikan anda sudah mengisi semua formulir', {
            icon: 'error',
        }).then((willUpdate) => {if(willUpdate) {window.location='?p=pelanggan';}} );</script>";
  }

  $sql = $conn->query("INSERT INTO tb_anggota VALUES (null, '$nama', '$jk', '$alamat', '$no_hp')") or die(mysqli_error($conn));
  if ($sql) {
    echo "<script>swal('Data berhasil disimpan', {
            icon: 'success',
        }).then((willUpdate) => {if(willUpdate) {window.location='?p=pelanggan';}} );</script>";
  } else {
    echo "<script>swal('Data gagal disimpan', {
            icon: 'error',
        });</script>";
  }
}

?>

<h1 class="mt-4">Tambah Data Anggota</h1>
<ol class="breadcrumb mb-4">
  <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
  <li class="breadcrumb-item"><a href="?p=anggota">Anggota</a></li>
  <li class="breadcrumb-item active">Tambah Data Anggota</li>
</ol>
<div class="card-header mb-5">

  <form action="" method="post">
    <div class="form-group">
      <label class="small mb-1" for="nama_anggota">Nama Anggota</label>
      <input class="form-control" id="nama_anggota" name="nama_anggota" type="text" placeholder="Masukkan nama anggota" required />
    </div>
    <div class="form-group">
      <label class="small mb-1" for="nama_anggota">Jenis Kelamin</label>
      <select name="jk" id="jk" class="form-control" aria-label="Default select example">
        <option selected>Pilih</option>
        <option value="L">Laki-Laki</option>
        <option value="P">Perempuan</option>
      </select>
    </div>
    <div class="form-group">
      <label class="small mb-1" for="alamat">Alamat</label>
      <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat pelanggan" required /></textarea>
    </div>
    <div class="form-group">
      <label class="small mb-1" for="no_hp">No HP</label>
      <input class="form-control" id="no_hp" name="no_hp" type="text" placeholder="Masukkan no hp" required />
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary" name="tambah">Tambah Data</button>
    </div>
  </form>
</div>