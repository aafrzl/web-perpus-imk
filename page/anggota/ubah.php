<?php
//mengambil id dari url
$id = $_GET['id'];

//query data anggota berdasarkan id
$sql = $conn->query("SELECT * FROM tb_anggota WHERE id_anggota = '$id'") or die(mysqli_error($conn));
$data = $sql->fetch_assoc();

if (isset($_POST['edit'])) {
  $nama = htmlspecialchars($_POST['nama_anggota']);
  $alamat = htmlspecialchars($_POST['alamat']);
  $no_telp = htmlspecialchars($_POST['no_telp']);
  $jk = htmlspecialchars($_POST['jk']);

  if (empty($nama && $alamat && $no_telp && $jk)) {
    echo "<script>swal('Pastikan anda sudah mengisi semua formulir', {
            icon: 'error',
        }).then((willUpdate) => {if(willUpdate) {window.location='?p=anggota';}} );</script>";
  }

  $sql = $conn->query("UPDATE tb_anggota SET nama_anggota = '$nama', jenis_kelamin='$jk', alamat='$alamat', no_telp = '$no_telp' WHERE id_anggota = $id") or die(mysqli_error($conn));
  if ($sql) {
    echo "<script>swal('Data berhasil di Edit', {
            icon: 'success',
        }).then((willUpdate) => {if(willUpdate) {window.location='?p=anggota';}} );</script>";
  } else {
    echo "<script>swal('Data gagal di Edit', {
            icon: 'error',
        }).then((willUpdate) => {if(willUpdate) {window.location='?p=anggota';}} );</script>";
  }
}

?>

<h1 class="mt-4">Edit Data Anggota</h1>
<ol class="breadcrumb mb-4">
  <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
  <li class="breadcrumb-item"><a href="?p=anggota">Anggota</a></li>
  <li class="breadcrumb-item active">Edit Data Anggota</li>
</ol>
<div class="card-header mb-5">

  <form action="" method="post">
    <div class="form-group">
      <label class="small mb-1" for="nama_anggota">Nama Anggota</label>
      <input class="form-control" id="nama_anggota" name="nama_anggota" type="text" placeholder="Masukkan nama anggota" value="<?= $data['nama_anggota']; ?>" />
    </div>
    <div class="form-group">
      <label class="small mb-1" for="nama_anggota">Jenis Kelamin</label>
      <select name="jk" id="jk" class="form-control" aria-label="Default select example">
        <?php
        $option = array('L', 'P');
        $selected = $data['jenis_kelamin'];
        foreach ($option as $key => $value) {
          if ($value == $selected) {
            echo "<option value='$value' selected>$value</option>";
          } else {
            echo "<option value='$value'>$value</option>";
          }
        }
        ?>
      </select>
    </div>
    <div class="form-group">
      <label class="small mb-1" for="alamat">Alamat</label>
      <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat pelanggan" /><?php echo $data['alamat']; ?></textarea>
    </div>
    <div class="form-group">
      <label class="small mb-1" for="no_telp">No HP</label>
      <input class="form-control" id="no_telp" name="no_telp" type="text" placeholder="Masukkan no hp" value="<?= $data['no_telp']; ?>" />
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary" name="edit">Edit Data</button>
    </div>
  </form>
</div>