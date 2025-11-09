<?php
    session_start();
    include('config.php');

    $error = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $ic = mysqli_real_escape_string($conn, $_POST['ic']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        $sql = "SELECT * FROM users WHERE ic = '$ic' AND password = '$password'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['user_name'] = $row['name'];
            $_SESSION['role'] = $row['role'];

            header("Location: home.php");
            exit;
        } else {
            $error = "IC atau kata laluan salah!";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | E-Pelajar</title>
    <link rel="stylesheet" href="styles/index.css">
</head>
<body>
    <div class="login-container">
        <h2>Log Masuk Sistem E-Pelajar</h2>

        <?php if ($error): ?>
            <div class="error-msg"><?= $error ?></div>
        <?php endif; ?>

        <form method="POST" action="">
            <label for="ic">No. Kad Pengenalan</label>
            <input type="text" name="ic" id="ic" placeholder="Masukkan IC anda" required>

            <label for="password">Kata Laluan</label>
            <input type="password" name="password" id="password" placeholder="Masukkan kata laluan" required>

            <button type="submit">Log Masuk</button>
        </form>
    </div>
</body>
</html>
