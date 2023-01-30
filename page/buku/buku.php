<?php
// menampilkan DB Barang
$ambilBuku = $conn->query("SELECT * FROM tb_buku ORDER BY jumlah DESC") or die(mysqli_error($conn));

?>
<h1 class="mt-4">Data Buku</h1>
<ol class="breadcrumb mb-4">
  <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
  <li class="breadcrumb-item active">Data Buku</li>
</ol>
<div class="col-md-6">
  <a href="?p=buku&aksi=tambah" class="btn btn-primary mb-3"><i class="fa fa-plus"></i> Tambah Buku</a>
</div>
<div class="card mb-4">
  <div class="card-header">
    <i class="fas fa-table mr-1"></i>
    Data Buku
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Id Buku</th>
            <th>Judul</th>
            <th>Pengarang</th>
            <th>Tahun Terbit</th>
            <th>Penerbit</th>
            <th>Jumlah</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          while ($pecahBuku = $ambilBuku->fetch_assoc()) {
          ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $pecahBuku['id_buku']; ?></td>
              <td><?= $pecahBuku['judul_buku']; ?></td>
              <td><?= $pecahBuku['pengarang']; ?></td>
              <td><?= $pecahBuku['penerbit']; ?></td>
              <td><?= $pecahBuku['tahun_terbit']; ?></td>
              <td><?= $pecahBuku['jumlah']; ?></td>
              <td>
                <a href="?p=buku&aksi=ubah&id=<?= $pecahBuku['id_buku']; ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
                <a href="javascript:;" class="btn btn-danger btn-sm" onclick="confirmation('?p=buku&aksi=hapus&id=<?= $pecahBuku['id_buku']; ?>')"><i class="fa fa-trash"></i> Hapus</a>
              <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>