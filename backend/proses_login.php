<?php
    require_once 'koneksi.php';
    require_once 'koneksiadmin.php';
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        session_start(); // Panggil session_start di awal
        
        $username = htmlspecialchars($_POST['username']);
        $password = $_POST['password'];
        
        $loginSuccess = false;
        
        // Cek di tabel admin terlebih dahulu
        $query1 = "SELECT * FROM admin WHERE username = ?";
        $stmt1 = $koneksiadmin->prepare($query1);
        $stmt1->bind_param("s", $username);
        $stmt1->execute();
        $result1 = $stmt1->get_result();
        
        if ($result1->num_rows === 1) {
            $admin = $result1->fetch_assoc();
            if (password_verify($password, $admin['password'])) {
                $_SESSION['username'] = $admin['username'];
                $_SESSION['role'] = 'admin'; // Tambahkan role
                header("Location: ../index.php");
                exit();
            }
        }
        $stmt1->close();
        
        // Jika tidak berhasil login sebagai admin, cek tabel users1
        $query = "SELECT * FROM users1 WHERE username = ?";
        $stmt = $koneksi->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = 'user'; // Tambahkan role
                header("Location: ../frontend/tampil_data.php");
                exit();
            }
        }
        $stmt->close();
        
        // Jika sampai sini berarti login gagal
        echo "Username atau password salah! <a href='../frontend/nyoba.php'>Kembali</a>";
        
    } else {
        header("Location: ../index.php");
        exit();
    }
    
    $koneksi->close();
    $koneksiadmin->close();
?>