<?php
require_once 'koneksi.php';
require_once 'koneksiadmin.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST['username']);
    $password = $_POST['password'];

    // Cek dulu di tabel admin
    $query1 = "SELECT * FROM admin WHERE username = ?";
    $stmt1 = $koneksiadmin->prepare($query1);
    $stmt1->bind_param("s", $username);
    $stmt1->execute();
    $result1 = $stmt1->get_result();

    if ($result1->num_rows === 1) {
        $admin = $result1->fetch_assoc();
        if (password_verify($password, $admin['password'])) {
            session_start();
            $_SESSION['username'] = $admin['username'];
            $_SESSION['role'] = 'admin';
            header("Location: ../index.php");
            exit();
        } else {
            echo "Password salah! <a href='../frontend/nyoba.php'>Kembali</a>";
            exit();
        }
    } else {
        // Kalau bukan admin, cek di tabel users1
        $query = "SELECT * FROM users1 WHERE username = ?";
        $stmt = $koneksi->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = 'user';
                header("Location: ../frontend/tampil_data.php");
                exit();
            } else {
                echo "Password salah! <a href='../frontend/nyoba.php'>Kembali</a>";
                exit();
            }
        } else {
            echo "Username tidak ditemukan! <a href='../frontend/nyoba.php'>Kembali</a>";
            exit();
        }
    }
} else {
    header("Location: ../index.php");
    exit();
}
?>