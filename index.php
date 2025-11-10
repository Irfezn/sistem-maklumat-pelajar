<?php
session_start();
include("config.php"); // sambung ke database kamu

if (isset($_POST['login'])) {
    $name = $_POST['name'];
    $ic = $_POST['ic'];
    $password = $_POST['password'];

    // semak data pengguna dalam jadual users
    $sql = "SELECT * FROM users WHERE name=? AND ic=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $name, $ic);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc(); // <-- ubah dari $name ke $user

        // sebab password dalam DB bukan hash, guna semakan biasa
        if ($password == $user['password']) {
            $_SESSION['name'] = $user['name'];
            $_SESSION['role'] = $user['role'];

            header("Location: home.php");
            exit();
        } else {
            $error = "Kata laluan salah!";
        }
    } else {
        $error = "Nama atau IC tidak dijumpai!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Login Sistem</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
    }
    .container {
      width: 350px;
      margin: 100px auto;
      background: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    input[type=text], input[type=password] {
      width: 100%;
      padding: 8px;
      margin: 5px 0;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    button {
      width: 100%;
      background: #007bff;
      color: white;
      border: none;
      padding: 10px;
      border-radius: 5px;
      cursor: pointer;
    }
    button:hover {
      background: #0056b3;
    }
    .error {
      color: red;
      text-align: center;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2 style="text-align:center;">Login Sistem</h2>

    <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>

    <form method="POST" action="">
      <label>Nama:</label><br>
      <input type="text" name="name" required><br>

      <label>No. IC:</label><br>
      <input type="text" name="ic" required><br>

      <label>Kata Laluan:</label><br>
      <input type="password" name="password" required><br><br>

      <button type="submit" name="login">Log Masuk</button>
    </form>
  </div>
</body>
</html>
