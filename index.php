<?php
session_start();
require_once 'config/koneksi.php';
require_once 'config/functions.php';

if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}

$page = @$_GET['p'];
$aksi = @$_GET['aksi'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>
    <?php
    if ($page == 'buku') {
      if ($aksi == 'tambah') {
        echo "Tambah Buku";
      } else if ($aksi == 'ubah') {
        echo "Ubah Buku";
      } else {
        echo "Halaman Buku";
      }
    } else if ($page == 'anggota') {
      if ($aksi == 'tambah') {
        echo "Tambah Anggota";
      } else if ($aksi == 'ubah') {
        echo "Ubah Anggota";
      } else {
        echo "Halaman Anggota ";
      }
    } else if ($page == 'peminjaman') {
      if ($aksi == 'tambah') {
        echo "Tambah Peminjaman Buku";
      } else {
        echo "Halaman Peminjaman Buku";
      }
    } else if ($page == 'pengembalian') {
      echo 'Halaman Pengembalian Buku';
    } else if ($page == 'laporan') {
      echo 'Halaman Laporan';
    } else {
      echo "Dashboard";
    }
    ?>
  </title>
  <link href="css/styles.css" rel="stylesheet" />
  <link href="css/profile.css" rel="stylesheet" />
  <script src="js/fontawesomeall.min.js" crossorigin="anonymous"></script>
  <script src="js/sweetalert.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
</head>


<body class="sb-nav-fixed">
  <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand ps-3" href="index.php">E-Perpustakaan</a>
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar-->
    <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0 pb-2">
      <li class="nav-item dropdown no-arrow">
        <!-- Logout Button -->
        <div>
          <a class="btn btn-danger" href="logout.php" role="button"><i class="fas fa-door-open" aria-hidden="true"></i> Logout</a>
        </div>
      </li>
  </nav>
  <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
      <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
          <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link" href="index.php">
              <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
              Dashboard
            </a>
            <a class="nav-link" href="?p=anggota">
              <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
              Anggota
            </a>
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
              <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
              Data Buku
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="?p=buku">Buku</a>
                <a class="nav-link" href="?p=peminjaman">Peminjaman</a>
                <a class="nav-link" href="?p=pengembalian">Pengembalian</a>
              </nav>
            </div>
            <a class="nav-link" href="?p=laporan">
              <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
              Laporan
            </a>
      </nav>
    </div>
    <div id="layoutSidenav_content">
      <main>
        <div class="container-fluid">
          <!-- <h1 class="mt-4">Static Navigation</h1> -->
          <?php
          if ($page == 'buku') {
            if ($aksi == '') {
              require_once 'page/buku/buku.php';
            } else if ($aksi == 'tambah') {
              require_once 'page/buku/tambah.php';
            } else if ($aksi == 'ubah') {
              require_once 'page/buku/ubah.php';
            } else if ($aksi == 'hapus') {
              require_once 'page/buku/hapus.php';
            }
          } else if ($page == 'anggota') {
            if ($aksi == '') {
              require_once 'page/anggota/anggota.php';
            } else if ($aksi == 'tambah') {
              require_once 'page/anggota/tambah.php';
            } else if ($aksi == 'ubah') {
              require_once 'page/anggota/ubah.php';
            } else if ($aksi == 'hapus') {
              require_once 'page/anggota/hapus.php';
            }
          } else if ($page == 'peminjaman') {
            if ($aksi == '') {
              require_once 'page/transaksi/peminjam.php';
            } else if ($aksi == 'tambah') {
              require_once 'page/transaksi/tambah.php';
            } else if ($aksi == 'kembali') {
              require_once 'page/transaksi/kembali.php';
            }
          } else if ($page == 'pengembalian') {
            require_once 'page/transaksi/pengembalian.php';
          } else if ($page == 'laporan') {
            require_once 'page/transaksi/laporan.php';
          } else { ?>
            <ol class="breadcrumb mb-4 mt-4">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            </ol>
            <div class="text-center text-bold mb-4 py-2">
              <h3>Selamat Datang Di E-Perpustakaan Silahkan Pilih</h3>
            </div>
            <div class="row">
              <div class="col-xl-3 col-md-6">
                <div class="card bg-info text-white mb-4">
                  <div class="card-body">Daftar Anggota</div>
                  <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="?p=anggota">Lihat Detail</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-md-6">
                <div class="card bg-info text-white mb-4">
                  <div class="card-body">Peminjaman Buku</div>
                  <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="?p=peminjaman">Lihat Detail</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-md-6">
                <div class="card bg-info text-white mb-4">
                  <div class="card-body">Pengembalian Buku</div>
                  <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="?p=pengembalian">Lihat Detail</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-md-6">
                <div class="card bg-info text-white mb-4">
                  <div class="card-body">Pendataan Buku</div>
                  <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="?p=buku">Lihat Detail</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                  </div>
                </div>
              </div>
            </div>
          <?php
          }
          ?>
        </div>
      </main>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="js/scripts.js"></script>
  <script src="js/deleteDialog.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
  <script src="assets/demo/datatables-demo.js"></script>
  <script src="js/datepicker.js"></script>
</body>

</html>