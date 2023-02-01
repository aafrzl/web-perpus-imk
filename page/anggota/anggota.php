<?php
// menampilkan DB pelanggan
$sqlAnggota = $conn->query("SELECT * FROM tb_anggota ORDER BY nama_anggota ASC") or die(mysqli_error($conn));

?>
<h1 class="mt-4">Data anggota</h1>
<ol class="breadcrumb mb-4">
  <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
  <li class="breadcrumb-item active">Data Anggota</li>
</ol>
<div class="col-md-12">
  <a href="?p=anggota&aksi=tambah" class="btn btn-primary mb-3"><i class="fa fa-plus"></i> Tambah Data Anggota</a>
</div>
<div class="card mb-4">
  <div class="card-header">
    <i class="fas fa-table mr-1"></i>
    Data Anggota
  </div>
  <div class="card-body">
    <table class="table table-bordered" id="dataTable">
      <thead>
        <tr>
          <th>No</th>
          <th>Id Anggota</th>
          <th>Nama</th>
          <th>Jenis Kelamin</th>
          <th>Alamat</th>
          <th>No Hp</th>
          <!-- <th>Aksi</th> -->
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        while ($pecahAnggota = $sqlAnggota->fetch_assoc()) {
          $jk = ($pecahAnggota['jenis_kelamin'] == 'L') ? 'Laki-Laki' : 'Perempuan';
        ?>
          <tr>
            <td><?= $no++; ?></td>
            <td><?= $pecahAnggota['id_anggota'] ?></td>
            <td><?= $pecahAnggota['nama_anggota']; ?></td>
            <td><?= $jk ?></td>
            <td><?= $pecahAnggota['alamat']; ?></td>
            <td><?= $pecahAnggota['no_telp']; ?></td>
            <!-- <td>
              <a href="?p=anggota&aksi=ubah&id=<?= $pecahAnggota['id_anggota']; ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
              <a href="javascript:;" class="btn btn-danger btn-sm" onclick="confirmation('?p=anggota&aksi=hapus&id=<?= $pecahAnggota['id_anggota']; ?>')"><i class="fa fa-trash"></i> Hapus</a>
            </td> -->
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>