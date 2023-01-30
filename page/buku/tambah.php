<?php
if (isset($_POST['tambah'])) {
  $id_buku = htmlspecialchars($_POST['id_buku']);
  $judulBuku = htmlspecialchars($_POST['judul_buku']);
  $pengarang = htmlspecialchars($_POST['pengarang']);
  $penerbit = htmlspecialchars($_POST['penerbit']);
  $tahun_terbit = htmlspecialchars($_POST['tahun_terbit']);
  $jumlah = htmlspecialchars($_POST['jumlah']);

  if (empty($judulBuku && $pengarang && $penerbit && $tahun_terbit && $jumlah)) {
    echo "<script>swal('Pastikan anda sudah mengisi semua formulir', {
            icon: 'error',
        }).then((willUpdate) => {if(willUpdate) {window.location='?p=buku';}} );</script>";
  }

  $sql = $conn->query("INSERT INTO tb_buku VALUES ('$id_buku', '$judulBuku', '$pengarang', '$penerbit', '$tahun_terbit', $jumlah)") or die(mysqli_error($conn));
  if ($sql) {
    echo "<script>swal('Data berhasil disimpan', {
            icon: 'success',
        }).then((willUpdate) => {if(willUpdate) {window.location='?p=buku';}} );</script>";
  } else {
    echo "<script>swal('Data gagal disimpan', {
            icon: 'error',
        });</script>";
  }
}

?>

<h1 class="mt-4">Tambah Data Buku</h1>
<ol class="breadcrumb mb-4">
  <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
  <li class="breadcrumb-item"><a href="?p=buku">Buku</a></li>
  <li class="breadcrumb-item active">Tambah Data Buku</li>
</ol>
<div class="card-header mb-5">

  <form action="" method="post">
    <div class="form-group">
      <?php 
      //fungsi untuk membuat id otomatis
      $query_id = $conn->query("SELECT RIGHT(id_buku,4) as kode FROM tb_buku ORDER BY id_buku DESC LIMIT 1") or die(mysqli_error($conn));
      $count = mysqli_num_rows($query_id);
      if($count <> 0){
        //jika kode ternyata sudah ada.
        $data_id = mysqli_fetch_assoc($query_id);
        $kode = $data_id['kode']+1;
      }else{
        //jika kode belum ada
        $kode = 1;
      }

      //buat kode buku
      $buat_id = str_pad($kode, 4, "0", STR_PAD_LEFT);
      $id_buku = "BK".$buat_id;
      ?>
    <div class="form-group">
      <label class="small mb-1" for="id_buku">ID Buku</label>
      <input class="form-control" id="id_buku" name="id_buku" type="text" value="<?php echo $id_buku ?>" required readonly />
    </div>
    <div class="form-group">
      <label class="small mb-1" for="judul_buku">Judul Buku</label>
      <input class="form-control" id="judul_buku" name="judul_buku" type="text" placeholder="Masukkan judul buku" required />
    </div>
    <div class="form-group">
      <label class="small mb-1" for="pengarang">Pengarang</label>
      <input class="form-control" id="pengarang" name="pengarang" type="text" placeholder="Masukkan pengarang" required />
    </div>
    <div class="form-group">
      <label class="small mb-1" for="penerbit">Penerbit</label>
      <input class="form-control" id="penerbit" name="penerbit" type="text" placeholder="Masukkan penerbit" required />
    </div>
    <div class="form-group">
      <label class="small mb-1" for="tahun_terbit">Tahun Terbit</label>
      <input class="form-control" type="number" name="tahun_terbit" id="tahun_terbit" min="1900" max="2099" pattern="[0-9]{4}" placeholder="Masukkan tahun terbit buku" required>
    </div>
    <div class="form-group">
      <label class="small mb-1" for="jumlah">Jumlah</label>
      <input class="form-control" id="jumlah" name="jumlah" type="number" placeholder="Masukkan jumlah buku" required />
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary" name="tambah">Tambah Data</button>
    </div>
  </form>
</div>