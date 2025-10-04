<?php
require_once 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    
    // Ambil dan bersihkan input
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    
    // Validasi input tidak kosong
    if (empty($username) || empty($password)) {
        die("Username dan password harus diisi! <a href='../frontend/signup.php'>Kembali</a>");
    }
    
    // LANGKAH 1: Cek login sebagai ADMIN
    $queryAdmin = "SELECT * FROM admin1 WHERE USERNAME = ?";
    $stmtAdmin = $koneksi->prepare($queryAdmin);
    
    if ($stmtAdmin) {
        $stmtAdmin->bind_param("s", $username);
        $stmtAdmin->execute();
        $resultAdmin = $stmtAdmin->get_result();
        
        if ($resultAdmin->num_rows > 0) {
            $dataAdmin = $resultAdmin->fetch_assoc();
            
            // Cek password admin (plain text)
            if ($password === $dataAdmin['PASSWORD']) {
                // Login berhasil sebagai admin
                $_SESSION['user_id'] = $dataAdmin['ID'];
                $_SESSION['username'] = $dataAdmin['USERNAME'];
                $_SESSION['nama'] = $dataAdmin['NAMA'];
                $_SESSION['email'] = $dataAdmin['EMAIL'];
                $_SESSION['role'] = 'admin';
                $_SESSION['login_time'] = time();
                
                $stmtAdmin->close();
                $koneksi->close();
                
                header("Location: ../frontend/index.php");
                exit();
            } else {
                // Password admin salah
                $stmtAdmin->close();
                $koneksi->close();
                die("Password salah! <a href='../frontend/signup.php'>Kembali</a>");
            }
        }
        $stmtAdmin->close();
    }
    
    // LANGKAH 2: Jika bukan admin, cek login sebagai USER
    $queryUser = "SELECT * FROM users1 WHERE USERNAME = ?";
    $stmtUser = $koneksi->prepare($queryUser);
    
    if ($stmtUser) {
        $stmtUser->bind_param("s", $username);
        $stmtUser->execute();
        $resultUser = $stmtUser->get_result();
        
        if ($resultUser->num_rows > 0) {
            $dataUser = $resultUser->fetch_assoc();
            
            // Cek password user (plain text)
            if ($password === $dataUser['PASSWORD']) {
                // Login berhasil sebagai user
                $_SESSION['user_id'] = $dataUser['ID'];
                $_SESSION['username'] = $dataUser['USERNAME'];
                $_SESSION['nama'] = $dataUser['NAMA'];
                $_SESSION['email'] = $dataUser['EMAIL'];
                $_SESSION['role'] = 'user';
                $_SESSION['login_time'] = time();
                
                $stmtUser->close();
                $koneksi->close();
                
                header("Location: ../frontend/Coffe_Shop_2.php");
                exit();
            } else {
                // Password user salah
                $stmtUser->close();
                $koneksi->close();
                die("Password salah! <a href='../frontend/signup.php'>Kembali</a>");
            }
        }
        $stmtUser->close();
    }
    
    // LANGKAH 3: Username tidak ditemukan
    $koneksi->close();
    die("Username tidak ditemukan! <a href='../frontend/signup.php'>Kembali</a>");
    
} else {
    // Jika bukan POST request, redirect ke halaman login
    header("Location: ../frontend/signup.php");
    exit();
}
?>