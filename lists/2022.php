<?php
    session_start();
    include('../config.php');

    if (!isset($_SESSION['role'])) {
        header("Location: ../index.php");
        exit;
    }

    $sql = "SELECT * FROM students WHERE kohort = 2022";
    $result = mysqli_query($conn, $sql);

    $isAdmin = ((int)$_SESSION['role'] === 1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Senarai | K2022</title>
    <link rel="stylesheet" href="../styles/list.css">
</head>
<body>
    <div class="nav">
        <h2>Senarai Kohort 2022</h2>

        <div class="">
            <?php if ($isAdmin): ?>
                <button class="add-btn">Add +</button>
            <?php endif; ?>
            <a href="../home.php" class="add-btn">Back</a>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>IC</th>
                <th>Kelas</th>
                <th>Kohort</th>
                <th>Kelayakan SKM</th>
                <?php if ($isAdmin): ?>
                    <th>Aksi</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $rowClass = ($row['kelayakan_skm'] == 0) ? 'not-eligible' : '';
                    echo "<tr class='{$rowClass}'>";
                    echo "<td class='nama'>{$row['name']}</td>";
                    echo "<td>{$row['ic']}</td>";
                    echo "<td>{$row['class']}</td>";
                    echo "<td>{$row['kohort']}</td>";
                    echo "<td>" . ($row['kelayakan_skm'] == 1 ? 'Layak' : 'Tidak Layak') . "</td>";
                    
                    if ($isAdmin) {
                        echo "<td>
                                <a href='edit.php?id={$row['ic']}' class='btn edit'>Edit</a>
                                <a href='delete.php?id={$row['ic']}' class='btn delete' onclick='return confirm(\"Padam data ini?\")'>Delete</a>
                              </td>";
                    }

                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='" . ($isAdmin ? 6 : 5) . "' style='text-align:center;'>Tiada data dijumpai.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
