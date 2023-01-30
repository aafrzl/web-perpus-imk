<?php
//query laporan pengembalian buku, jumlah anggota, jumlah buku, jumlah peminjam, jumlah pengembalian, buku rusak buat laporannya dalam pertahun dalam database

$query = "SELECT YEAR(tb_pengembalian.tgl_pengembalian) AS tahun, COUNT(DISTINCT tb_anggota.id_anggota) as total_anggota, COUNT(DISTINCT tb_buku.id_buku) as total_buku, COUNT(DISTINCT tb_peminjam.id_pm) as total_peminjam, COUNT(DISTINCT tb_pengembalian.id_pengembalian) as total_pengembalian, SUM(CASE WHEN tb_pengembalian.status_buku = 'rusak' THEN 1 ELSE 0 END) as total_buku_rusak FROM tb_anggota LEFT JOIN tb_peminjam ON tb_anggota.id_anggota = tb_peminjam.id_anggota LEFT JOIN tb_buku ON tb_peminjam.id_buku = tb_buku.id_buku LEFT JOIN tb_pengembalian ON tb_peminjam.id_pm = tb_pengembalian.id_pm;";

$sql = $conn->query($query)
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
            <th>Jumlah Anggota</th>
            <th>Jumlah Buku</th>
            <th>Jumlah Buku Rusak</th>
            <th>Jumlah Peminjam</th>
            <th>Jumlah Pengembalian</th>
            <th>Tahun</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          while ($pecah = mysqli_fetch_assoc($sql)) {
          ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $pecah['total_anggota']; ?></td>
              <td><?= $pecah['total_buku']; ?></td>
              <td><?= $pecah['total_buku_rusak']; ?></td>
              <td><?= $pecah['total_peminjam']; ?></td>
              <td><?= $pecah['total_pengembalian']; ?></td>
              <td><?= $pecah['tahun']; ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>