<?php
session_start();
include('../config.php');

if (!isset($_SESSION['role'])) {
    header("Location: ../index.php");
    exit;
}

$kohort = $_GET['kohort'] ?? null;
if (!$kohort) die("Kohort tidak sah.");

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $ic = $_POST['ic'];
    $class = $_POST['class'];
    $kelayakan = $_POST['kelayakan'];

    $sql = "INSERT INTO students (name, ic, class, kohort, kelayakan_skm)
            VALUES ('$name', '$ic', '$class', '$kohort', '$kelayakan')";

    if (mysqli_query($conn, $sql)) {
        header("Location: $kohort.php?success=1");
        exit;
    } else {
        $error = "Ralat: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Tambah Pelajar K<?=$kohort?></title>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
}
.container {
    width: 400px;
    margin: 80px auto;
    background: #fff;
    padding: 25px 30px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}
h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
}
input[type=text], select {
    width: 100%;
    padding: 10px;
    margin: 8px 0 15px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
}
button {
    width: 100%;
    background-color: #007bff;
    color: white;
    padding: 12px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}
button:hover {
    background-color: #0056b3;
}
.error {
    color: red;
    text-align: center;
    margin-bottom: 15px;
}
a.back-btn {
    display: block;
    text-align: center;
    margin-top: 15px;
    color: #007bff;
    text-decoration: none;
}
a.back-btn:hover {
    text-decoration: underline;
}
</style>
</head>
<body>
<div class="container">
    <h2>Tambah Pelajar Kohort <?=$kohort?></h2>

    <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>

    <form method="POST">
        <label>Nama:</label>
        <input type="text" name="name" required>

        <label>No. IC:</label>
        <input type="text" name="ic" required>

        <label>Kelas:</label>
        <input type="text" name="class" required>

        <label>Kelayakan SKM:</label>
        <select name="kelayakan">
            <option value="1">Layak</option>
            <option value="0">Tidak Layak</option>
        </select>

        <button type="submit" name="submit">Tambah</button>
    </form>

    <a href="<?=$kohort?>.php" class="back-btn">Back</a>
</div>
</body>
</html>
