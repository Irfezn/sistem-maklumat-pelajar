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

$sql = "DELETE FROM students WHERE ic='$ic' AND kohort='$kohort'";

if (mysqli_query($conn, $sql)) {
    header("Location: $kohort.php?deleted=1");
    exit;
} else {
    echo "Ralat: " . mysqli_error($conn);
}
?>
