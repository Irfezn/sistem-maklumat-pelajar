<?php
    include('../config.php');

    $sql = "SELECT * FROM students WHERE kohort = 2023";
    $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Senarai | K2023</title>
    <link rel="stylesheet" href="../styles/lists.css">
</head>
<body>
    <div class="nav">
        <h2>Senarai Kohort 2023</h2>
        <button class="add-btn">Add +</button>
    </div>

    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>IC</th>
                <th>Kelas</th>
                <th>Kohort</th>
                <th>Kelayakan SKM</th>
                <th>Aksi</th>
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
                    echo "<td>
                            <a href='edit.php?id={$row['ic']}' class='btn edit'>Edit</a>
                            <a href='delete.php?id={$row['ic']}' class='btn delete' onclick='return confirm(\"Padam data ini?\")'>Delete</a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6' style='text-align:center;'>Tiada data dijumpai.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
