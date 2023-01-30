<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Halaman Login</title>

  <link href="css/styles.css" rel="stylesheet" />
  <link href="css/profile.css" rel="stylesheet" />
  <script src="js/fontawesomeall.min.js" crossorigin="anonymous"></script>
  <script src="js/sweetalert.min.js"></script>
</head>

<body class="bg-white">
  <div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
      <main>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5">
              <div class="text-center font-weight-bold my-4">
                <h3>E-Perpustakaan</h3>
              </div>
              <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                  <p class="text-center font-weight-bold my-4">Login</h3>
                </div>
                <div class="card-body">
                  <form action="" method="post">
                    <div class="form-group">
                      <label class="small mb-1" for="username">Username</label>
                      <input class="form-control py-4" name="username" id="username" type="text" placeholder="Masukan username anda" />
                    </div>
                    <div class="form-group">
                      <label class="small mb-1" for="password">Password</label>
                      <input class="form-control py-4" id="password" name="password" type="password" placeholder="Masukan password" />
                    </div>
                    <div class="text-right">
                      <button type="submit" name="login" class="btn btn-primary">Login</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
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

<?php
session_start();
require_once 'config/koneksi.php';

if (isset($_SESSION['login'])) {
  header("Location: index.php");
  exit;
}

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  if ($username == '') {
    echo "<script>swal('Silahkan isi username terlebih dahulu', {
            icon: 'error',
        })</script>";
  } else if ($password == '') {
    echo "<script>swal('Silahkan isi password terlebih dahulu', {
            icon: 'error',
        })</script>";
  } else if ($username == '' && $password == '') {
    echo "<script>swal('Silahkan isi username dan password terlebih dahulu', {
            icon: 'error',
        })</script>";
  } else {
    $result = $conn->query("SELECT * FROM tb_user WHERE username = '$username'") or die(mysqli_error($conn));
    if ($result->num_rows === 1) {
      $row = $result->fetch_assoc();
      if (password_verify($password, $row['password'])) {
        // pasang session
        $_SESSION['login'] = $row;
        echo "<script>swal('Selamat anda berhasil login', {
            icon: 'success',
        }).then((willUpdate) => {if(willUpdate) {window.location='index.php';}} );</script>";
        exit;
      } else {
        echo "<script>swal('Login gagal silahkan periksa username dan password!', {
            icon: 'error',
        }).then((willUpdate) => {if(willUpdate) {window.location='login.php';}} );</script>";
      }
    } else {
      echo "<script>swal('Login gagal silahkan periksa username dan password!', {
            icon: 'error',
        }).then((willUpdate) => {if(willUpdate) {window.location='login.php';}} );</script>";
    }
  }
}

?>