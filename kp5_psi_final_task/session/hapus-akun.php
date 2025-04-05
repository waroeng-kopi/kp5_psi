<?php
session_start();

include '../model/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- jQuery library -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <link rel="stylesheet" href="../resource/style.css">
  <!-- CDN Roboto Fonts -->
  <link href="https://fonts.cdnfonts.com/css/roboto" rel="stylesheet">
  <!-- CDN  Caveat Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Caveat">

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- CDN Font Awesome -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"></script>

  <title>Tambah User</title>
</head>
<body>
  <?php
  if ( ($user == $username) && ($pass == $password) ) {
    $_SESSION["username"] = $username;
    $_SESSION["login"] = 1;
    
  ?>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
      <div class="container">
        <a class="navbar-brand fw-bold" style="font-family: Caveat; font-weight: 600; font-size: 36px;" href="#hero">Sistem Akuntansi</a>
        <div class=" justify-content-end" id="navbarNav">
          <a class="nav-link fw-medium" style="font-size: 18px;" href="./logout.php">Logout</a>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->

    <!-- Hero Section -->
    <section class="hero d-flex align-items-center justify-content-center text-center" id="hero" style="top: 80px;">
      <form method="post" class="d-flex mx-auto my-auto flex-column align-items-center justify-content-center text-center" style="width: 94vw; min-height: 100vh;">
        <div class="d-flex flex-column border border-dark p-5 pt-4 pb-4 rounded-4 gap-2">
          <div class="d-flex flex-row justify-content-start ">
            <a href="./index.php" class="d-flex flex-row justify-content-between align-items-center gap-1 px-2 py-1 text-dark text-decoration-underline">
              <svg xmlns="http://www.w3.org/2000/svg" height="16" width="10" viewBox="0 0 320 512">
                <path fill="#000000" d="M41.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 256 246.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/>
              </svg>
              Back
            </a>
          </div>
          <?php
            // get param of the page
            $getUserId = $_GET["userid"];
            // Retrieve data from the database
            $result = $connection->query("SELECT * FROM user WHERE userId=$getUserId");

            $row = $result->fetch_assoc();
          ?>
            <h3><b>Apakah anda yakin ingin menghapus akun :</b></h3>
            <div class="w-auto mx-auto my-auto d-flex justify-content-between" style="min-width: 300px">
              <label for="nama">User Id : </label>
              <input type="number" name="userid" value="<?php echo $row['userId'] ?>" disabled>
            </div>
            <div class="w-auto mx-auto my-auto d-flex justify-content-between" style="min-width: 300px">
              <label for="nama">Nama : </label>
              <input type="text" name="nama" value="<?php echo $row['nama'] ?>" disabled>
            </div>
            <div class="w-auto mx-auto my-auto d-flex justify-content-between" style="min-width: 300px">
              <label for="deskripsi">deskripsi : </label>
              <input type="text" name="deskripsi" value="<?php echo $row['deskripsi'] ?>" disabled>
            </div>
            <div class="w-auto mx-auto my-auto d-flex justify-content-between" style="min-width: 300px">
              <label for="tipeAkun">tipeAkun : </label>
              <input type="text" name="tipeAkun" value="<?php echo $row['tipeAkun'] ?>" disabled>
            </div>
            <div class="w-auto mx-auto my-auto d-flex justify-content-between" style="min-width: 300px">
              <label for="saldoAwal">saldoAwal : </label>
              <input type="text" name="saldoAwal" value="<?php echo $row['saldoAwal'] ?>" disabled>
            </div>
            <input type="submit" name="submit" value="delete" class="d-flex mx-3 my-auto mt-3 px-5 py-2 bg-danger text-white rounded-4 border-0">
          
        </div>
      </form>
      <?php 
        // check apakah data disubmit
        if (isset($_POST['submit'])) {
          mysqli_query( $connection,"DELETE FROM user WHERE userId='$getUserId'");

          echo "<script>alert('Akun telah terhapus'); </script>";
          echo "<script>location='index.php'; </script>";
      }
      ?>
    </section>
    <!-- End Hero Section -->

    <footer class="bg-dark text-white py-4" style="position: relative;top: 80px;">
      <div class="container text-center">
        <p>&copy; 2023 @adamrahmatilahi. All rights reserved.</p>
        <p>Website created with <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#d44646" class="bi bi-heart-fill" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
        </svg> using Bootstrap.</p>
      </div>
    </footer>

    <script src="../resource/script.js"></script>
  <?php  
    } else {
      // die("you cannot acces this one");
      ?> 
        <div class="d-flex" style="min-height: 100vh">
          <div class="d-flex mx-auto my-auto p-3 border border-danger border-3 rounded-3 flex-column">
            <h3><b>Username or Password is not correct</b></h3>
            <p>Make sure your input is correct!</p>
            <div class="d-flex flex-row justify-content-around">
              <a href="../" class="px-3 py-2 bg-primary mx-auto rounded-3 text-white text-decoration-none d-flex flex-row">
                <!-- SVG icon -->
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-house-fill me-1" viewBox="0 0 16 16">
                  <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z"/>
                  <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z"/>
                </svg>
                <span class="align-self-center ms-1 fw-semibold">Back to Home</span>
              </a>
              <a href="./form.php" class="px-3 py-2 bg-warning mx-auto rounded-3 text-white text-decoration-none d-flex flex-row">
                <!-- SVG icon -->
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"/>
                  <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"/>
                </svg>
                <span class="align-self-center ms-1 fw-semibold">Try Login again</span>
              </a>
            </div>
          </div>
        </div>
  <?php
    }
  ?>

</body>
</html>