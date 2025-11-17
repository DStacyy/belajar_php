<?php
    // cek apakah pakai method post
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
         // cek apakah data email sudah ada
        if (isset($_POST ['email'])) {
           $email = $_POST['email'];
           $password = $_POST['password'];

        // cek apakah email & pass sesuai
            if ($email== "fuajar@gmail.com" && $password=="fajarbasis121"){
                echo "<h2 Selamat Datang $email></h2>";
            }
    }
}