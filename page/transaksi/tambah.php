<?php
//ambil data anggota dari database
$tampilkanNamaAnggota = $conn->query("SELECT * FROM tb_anggota ORDER BY nama_anggota") or die(mysqli_error($conn));

//ambil data buku dari database
$tampilkanBuku = $conn->query("SELECT * FROM tb_buku ORDER BY judul_buku") or die(mysqli_error($conn));

if (isset($_POST['simpan'])) {
  $idAnggota = $_POST['id_anggota'];
  $idBuku = $_POST['id_buku'];
  $tgl_pinjam = $_POST['tgl_pinjam'];
  $tgl_kembali = $_POST['tgl_kembali'];

  $sql = $conn->query("INSERT INTO tb_peminjam VALUES (null, '$idAnggota', '$idBuku', '$tgl_pinjam', '$tgl_kembali', 'pinjam')") or die(mysqli_error($conn));
  $sql2 = $conn->query("UPDATE tb_buku SET jumlah = jumlah - 1 WHERE id_buku = '$idBuku'") or die(mysqli_error($conn));
  if ($sql && $sql2) {
    echo "<script>swal('Data berhasil disimpan', {
            icon: 'success',
        }).then((willUpdate) => {if(willUpdate) {window.location='?p=peminjaman';}} );</script>";
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
  <li class="breadcrumb-item"><a href="?p=peminjaman">Data Peminjaman Buku</a></li>
  <li class="breadcrumb-item active">Tambah Data Anggota</li>
</ol>
<div class="card-header mb-5">
  <form action="" method="post">
    <div class="form-group">
      <label class="small mb-1" for="id_anggota">Peminjam</label>
      <select name="id_anggota" id="id_anggota" class="form-control" aria-label="Default select example" data-live-search="true">
        <option selected>Pilih</option>
        <?php
        while ($dataAnggota = $tampilkanNamaAnggota->fetch_array()) {
          echo "<option value='$dataAnggota[id_anggota]'>$dataAnggota[nama_anggota]</option>";
        }
        ?>
      </select>
    </div>
    <div class="form-group">
      <label class="small mb-1" for="id_buku">Buku</label>
      <select name="id_buku" id="id_buku" class="form-control" aria-label="Default select example" data-live-search="true">
        <option selected>Pilih</option>
        <?php
        while ($dataBuku = $tampilkanBuku->fetch_array()) {
          echo "<option value='$dataBuku[id_buku]'>$dataBuku[judul_buku]</option>";
        }
        ?>
      </select>
    </div>
    <div class="form-group">
      <label for="tgl_pinjam">Tanggal Pinjam</label>
      <input type="date" name="tgl_pinjam" id="tgl_pinjam" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
    </div>
    <div class="form-group">
      <label for="tgl_kembali">Tanggal Kembali</label>
      <input type="date" name="tgl_kembali" id="tgl_kembali" class="form-control" required>
    </div>
    <div class="form-group">
      <a href="?p=peminjaman" class="btn btn-danger btn-sm">Batal</a>
      <button type="submit" name="simpan" class="btn btn-success btn-sm">Simpan</button>
    </div>
  </form>
</div>