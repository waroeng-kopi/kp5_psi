<?php
session_start();

$user ="admin";
$pass = "123456";

$username = trim($_POST["username"]);
$password = trim($_POST["password"]);

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

  <?php
    if (($user == $username) && ($pass == $password)) {
      echo "<title>Login Success</title>";
    }
    else {
      echo "<title>Login Not Success</title>";
    }
  ?>
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
      <div class="d-flex mx-auto my-auto flex-column position-relative top-0" style="width: 94vw; min-height: 100vh;">
        
        <div class="d-flex flex-row justify-content-between h-auto my-5" style="width: 94vw;">
          <a class="d-flex flex-row justify-content-between align-items-center gap-1 px-2 py-1 rounded-2 text-bg-primary border-0" href="./tambah-akun.php">
            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">
              <path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" fill="#ffffff"/>
            </svg>            
            Tambah
          </a>
        </div>

        <div class="d-flex flex-column">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Akun</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Tipe Akun</th>
                <th scope="col">Saldo awal</th>
                <th scope="col">Pengaturan</th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
              <?php
                // Retrieve data from the database
                $result = $connection->query("SELECT * FROM user");

                while ($row = $result->fetch_assoc()){
                  ?>
                  <tr>
                    <th scope="row"><?php echo $row['userId'] ?></th>
                    <td><?php echo $row['nama'] ?></td>
                    <td><?php echo $row['deskripsi'] ?></td>
                    <td><?php echo $row['tipeAkun'] ?></td>
                    <td><?php echo $row['saldoAwal'] ?></td>
                    <th scope="col" class="d-flex flex-row">
                      <a class="d-flex bg-warning text-white py-1 px-3 rounded-3 border-1 mx-auto flex-row justify-content-between align-items-center gap-1" href="./edit-akun.php?userid=<?php echo $row['userId'] ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><path fill="#ffffff" d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/></svg>
                        Edit
                      </a>
                      <a class="d-flex bg-danger text-white py-1 px-3 rounded-3 border-1 mx-auto flex-row justify-content-between align-items-center gap-1" href="./hapus-akun.php?userid=<?php echo $row['userId'] ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512"><path fill="#ffffff" d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
                        Delete
                      </a>
                    </th>
                  </tr>
                  <?php
                }
              ?>
            </tbody>
          </table>
          </div>
        </div>
      </div>
    </section>
    <!-- End Hero Section -->

    <footer class="bg-dark text-white py-4">
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