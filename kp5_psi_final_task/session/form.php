<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<style>
  body {
    height: 100vh;
  }

  form {
    height: 140px;
  }

  * {
    text-decoration: none !important;
  }
</style>

<body class="d-flex">
  <form class="d-flex flex-column mx-auto my-auto p-2 border border-primary border-3 rounded-3" method="post" action="login.php">
    <div class="mx-auto">
      Username : <input type="text" size="20" name="username">
    </div>
    <div class="mx-auto">
      Password : <input type="password" size="20" name="password">
    </div>
    <div class="d-flex flex-row justify-content-between my-auto">
      <a class="d-flex bg-warning text-white py-1 px-3 rounded-3 border-1 mx-auto" href="../index.php">Back to Home</a>
      <input class="d-flex bg-primary text-white py-1 px-3 rounded-3 border-1 mx-auto" type="submit" value="Log In">
    </div>
  </form>
</body>
</html>