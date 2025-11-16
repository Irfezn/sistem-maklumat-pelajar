<?php
session_start();
include('../config.php');

if (!isset($_SESSION['role'])) {
    header("Location: ../index.php");
    exit;
}

$ic = $_GET['id'] ?? null;
$kohort = $_GET['kohort'] ?? null;

if (!$ic || !$kohort) die("Parameter tidak lengkap.");

$sql = "SELECT * FROM students WHERE ic='$ic' AND kohort='$kohort'";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);

if (!$data) die("Data tidak dijumpai.");

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $class = $_POST['class'];
    $kelayakan = $_POST['kelayakan'];

    $update = "UPDATE students SET 
                name='$name',
                class='$class',
                kelayakan_skm='$kelayakan'
               WHERE ic='$ic' AND kohort='$kohort'";

    if (mysqli_query($conn, $update)) {
        header("Location: $kohort.php?updated=1");
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
<title>Edit Pelajar K<?=$kohort?></title>
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
    background-color: #28a745;
    color: white;
    padding: 12px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}
button:hover {
    background-color: #1e7e34;
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
    <h2>Edit Pelajar Kohort <?=$kohort?></h2>

    <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>

    <form method="POST">
        <label>Nama:</label>
        <input type="text" name="name" value="<?=$data['name']?>" required>

        <label>Kelas:</label>
        <input type="text" name="class" value="<?=$data['class']?>" required>

        <label>Kelayakan SKM:</label>
        <select name="kelayakan">
            <option value="1" <?=$data['kelayakan_skm']==1?'selected':''?>>Layak</option>
            <option value="0" <?=$data['kelayakan_skm']==0?'selected':''?>>Tidak Layak</option>
        </select>

        <button type="submit" name="update">Simpan Perubahan</button>
    </form>

    <a href="<?=$kohort?>.php" class="back-btn">Back</a>
</div>
</body>
</html>
