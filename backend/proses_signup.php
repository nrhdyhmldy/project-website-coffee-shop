<?php
    require_once 'koneksi.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = htmlspecialchars($_POST['email']);
        $username = htmlspecialchars($_POST['username']);
        $password = ($_POST['password']);
       
        if (empty($username) || empty($email) || empty($_POST['password'])) {
        echo "Error: Semua field harus diisi! <a href='../frontend/signup.php'>Kembali</a>";
    }  else {
        $query = "INSERT INTO users1 (email, username, password) VALUES (?, ?, ?)";
        $stmt = $koneksi->prepare($query);
        $stmt->bind_param("sss", $email, $username, $password);

        if ($stmt->execute()) {
            echo "<h1>Registrasi Berhasil!</h1>";
            echo "<p>Selamat, " . $username . "! Data Anda telah disimpan.</p>";
            echo '<a href="../frontend/signup.php">Kembali ke Form</a> | <a href="../frontend/tampil_data.php">Lihat Data</a>';
        }else {
            if ($koneksi->errno == 1062) {
                echo "Error: Email " . $email . " sudah terdaftar. <a href='../frontend/signup.php'>Kembali</a>";
            }
            else {
                echo "Error saat registrasi: " . $stmt->error . " <a href='../frontend/signup.php'>Kembali</a>";
            }
        }$stmt->close();
    }
} else {
    header('Location: ../frontend/signup.php');
    exit();
}
$koneksi->close();
?>