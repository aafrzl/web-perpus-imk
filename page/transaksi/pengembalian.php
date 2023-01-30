<?php
//ambil data pengembalian dari database
$sql = $conn->query("SELECT * FROM tb_pengembalian INNER JOIN tb_anggota
										ON tb_pengembalian.id_anggota = tb_anggota.id_anggota 
										INNER JOIN tb_buku ON tb_pengembalian.id_buku = tb_buku.id_buku
										") or die(mysqli_error($conn));
?>

<h1 class="mt-4">Data Pengembalian Buku</h1>
<ol class="breadcrumb mb-4">
  <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
  <li class="breadcrumb-item active">Data Pengembalian Buku</li>
</ol>
<div class="card mb-4">
  <div class="card-header">
    <i class="fas fa-table mr-1"></i>
    Data Pengembalian Buku
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
            <th>Tanggal Pengembalian</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          while ($pecah = $sql->fetch_assoc()) {
          ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $pecah['nama_anggota']; ?></td>
              <td><?= $pecah['judul_buku']; ?></td>
              <td><?= date("d-m-Y", strtotime($pecah['tgl_pinjam'])); ?></td>
              <td><?= date("d-m-Y", strtotime($pecah['tgl_kembali'])); ?></td>
              <td><?= date("d-m-Y", strtotime($pecah['tgl_pengembalian'])); ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>