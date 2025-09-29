<?php
    require_once '../backend/koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Pengguna Terdaftar</title>
</head>
<body>

    <h1>Data Pengguna Terdaftar</h1>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Username</th>
                <th>Tanggal Registrasi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT id, email, username, tanggal_registrasi FROM users1 ORDER BY id ASC";
            $result = $koneksi->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . htmlspecialchars($row["email"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["username"]) . "</td>";
                    echo "<td>" . $row["tanggal_registrasi"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4' style='text-align:center;'>Belum ada data yang terdaftar</td></tr>";
            }
            $koneksi->close();
            ?>
        </tbody>
    </table>
    <br>
    <a href="../frontend/nyoba.php">Kembali ke Form Registrasi</a>

</body>
</html>