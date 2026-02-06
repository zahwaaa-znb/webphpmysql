<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link href="bootstrap-5.3.8-dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <div class="card shadow col-md-4 mx-auto">
    <div class="card-body">
      <h4 class="text-center text-danger mb-3">Login</h4>

      <form method="POST" action="proses_login.php">
        <input type="text" name="username" class="form-control mb-3" placeholder="Username" required>
        <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
        <button class="btn btn-danger w-100">Login</button>
      </form>

    </div>
  </div>
</div>

</body>
</html>
