<?php 
include 'connect.php';

// Registrasi pengguna baru
if (isset($_POST['signUp'])) {
    $firstName = $_POST['fName'];
    $lastName = $_POST['lName'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $checkEmail = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($checkEmail);
    if ($result->num_rows > 0) {
        echo "Email Address Already Exists!";
    } else {
        $insertQuery = "INSERT INTO users(firstName, lastName, email, password) 
                        VALUES ('$firstName', '$lastName', '$email', '$password')";
        if ($conn->query($insertQuery) === TRUE) {
            header("location: index.php");
        } else {
            echo "Error: " . $conn->error;
        }
    }
}

// Proses login pengguna
if (isset($_POST['signIn'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        session_start();
        $row = $result->fetch_assoc();
        $_SESSION['email'] = $row['email'];
        header("Location: RESEP-KELA-main/main.html");
        exit();
    } else {
        session_start();
        // Set pesan kesalahan login yang jelas
        $_SESSION['login_error'] = "Salah password atau email tidak terdaftar!";
        header("Location: index.php"); // Redirect kembali ke halaman login
        exit();
    }
}
?>
