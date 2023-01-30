<?php
//query untuk menampilkan data peminjam
$sql = $conn->query("SELECT * FROM tb_peminjam INNER JOIN tb_anggota
										ON tb_peminjam.id_anggota = tb_anggota.id_anggota 
										INNER JOIN tb_buku ON tb_peminjam.id_buku = tb_buku.id_buku 
                                        WHERE status = 'pinjam'
										") or die(mysqli_error($conn));

if (isset($_POST['rusak'])) {
  $idpm = $_POST['idpm'];
  //ubah data status menjadi kembali
  $sql = $conn->query("UPDATE tb_peminjam SET status='kembali' WHERE id_pm='$idpm'");

  //masukkan kedalam tabel pengembalian
  $mysql = $conn->query("SELECT * FROM tb_peminjam WHERE id_pm='$idpm'");
  while ($data = mysqli_fetch_array($mysql)) {
    $idbuku = $data['id_buku'];
    $idanggota = $data['id_anggota'];
    $tglpinjam = $data['tgl_pinjam'];
    $tglkembali = $data['tgl_kembali'];
    $tglpengembalian = date('Y-m-d');

    //memasukkan data ke tabel pengembalian
    $conn->query("INSERT INTO tb_pengembalian VALUES (null, '$idpm','$idanggota', '$idbuku', '$tglpinjam', '$tglkembali', '$tglpengembalian', 'rusak')");
  }
  if ($sql) {
    echo "<script>swal('Proses, pengembalian barang berhasil', {
      icon: 'success',
  }).then((willDelete) => {if(willDelete) {window.location='?p=peminjaman';}} );</script>";
  } else {
    echo "<script>swal('Proses, pengembalian barang gagal', {
      icon: 'error',
  }).then((willDelete) => {if(willDelete) {window.location='?p=peminjaman';}} );</script>";
  }
} else if (isset($_POST['tidakRusak'])) {
  $idpm = $_POST['idpm'];
  //ubah data status menjadi kembali
  $sql = $conn->query("UPDATE tb_peminjam SET status='kembali' WHERE id_pm='$idpm'");

  //masukkan kedalam tabel pengembalian
  $mysql = $conn->query("SELECT * FROM tb_peminjam WHERE id_pm='$idpm'");
  while ($data = mysqli_fetch_array($mysql)) {
    $idbuku = $data['id_buku'];
    $idanggota = $data['id_anggota'];
    $tglpinjam = $data['tgl_pinjam'];
    $tglkembali = $data['tgl_kembali'];
    $tglpengembalian = date('Y-m-d');

    //memasukkan data ke tabel pengembalian
    $conn->query("INSERT INTO tb_pengembalian VALUES (null, '$idpm','$idanggota', '$idbuku', '$tglpinjam', '$tglkembali', '$tglpengembalian', 'tidak rusak')");

    //ubah data jumlah buku
    $conn->query("UPDATE tb_buku SET jumlah=jumlah+1 WHERE id_buku='$idbuku'");
  }
  if ($sql) {
    echo "<script>swal('Proses, pengembalian barang berhasil', {
      icon: 'success',
  }).then((willDelete) => {if(willDelete) {window.location='?p=peminjaman';}} );</script>";
  } else {
    echo "<script>swal('Proses, pengembalian barang gagal', {
      icon: 'error',
  }).then((willDelete) => {if(willDelete) {window.location='?p=peminjaman';}} );</script>";
  }
}

?>

<h1 class="mt-4">Data Peminjaman Buku</h1>
<ol class="breadcrumb mb-4">
  <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
  <li class="breadcrumb-item active">Data Peminjaman Buku</li>
</ol>
<div class="col-md-6">
  <a href="?p=peminjaman&aksi=tambah" class="btn btn-primary mb-3"><i class="fa fa-plus"></i> Tambah Peminjam</a>
</div>
<div class="card mb-4">
  <div class="card-header">
    <i class="fas fa-table mr-1"></i>
    Data Peminjaman Buku
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Anggota</th>
            <th>Buku</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Status</th>
            <th>Keterangan</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          while ($pecah = $sql->fetch_assoc()) {
            $idpm = $pecah['id_pm'];
          ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $pecah['nama_anggota']; ?></td>
              <td><?= $pecah['judul_buku']; ?></td>
              <td><?= date("d-m-Y", strtotime($pecah['tgl_pinjam'])); ?></td>
              <td><?= date("d-m-Y", strtotime($pecah['tgl_kembali'])); ?></td>
              <td><?php
                  if ($pecah['status'] == 'pinjam') {
                    echo "<span class='badge badge-warning'>Belum Dikembalikan</span>";
                  } else {
                    echo "<span class='badge badge-success'>Sudah Dikembalikan</span>";
                  }
                  ?></td>
              <td>
                <?php

                $denda = 1000;
                $tgl_dateline = $pecah['tgl_kembali'];
                $tgl_kembali = date('Y-m-d');

                //hitung selisih hari
                $lambat = terlambat($tgl_dateline, $tgl_kembali);
                $denda1 = $lambat * $denda;
                ?>
                <?php
                if ($lambat > 0) {
                ?>
                  <span class='badge badge-danger'>Terlambat <?= $lambat ?> hari<br> (Rp. <?= number_format($denda1) ?>)</span>
                <?php
                } else {
                  echo "<span class='badge badge-info'>Belum Terlambat</span>";
                }
                ?>
              </td>
              <td>
                <button data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-sm"><i class="fas fa-undo mr-2"></i>Kembalikan</button>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<div id="myModal" class="modal fade">
  <?php

  ?>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Apakah buku yang dikembalikan rusak atau tidak?</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
      <form action="" method="post">
        <!-- Input fields go here -->
        <input type="hidden" name="idpm" id="idpm" value="<?= $idpm; ?>">
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger" name="rusak">Rusak</button>
          <button type="submit" class="btn btn-success" name="tidakRusak">Tidak</button>
        </div>
      </form>
    </div>
  </div>
</div>