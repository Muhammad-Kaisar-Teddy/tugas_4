<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $file = $_FILES['file'];
    
    // Validasi server-side
    if (empty($name) || empty($email) || empty($age) || empty($address)) {
        die("Semua input harus diisi!");
    }
    
    // Validasi file
    $fileType = $file['type'];
    $fileSize = $file['size'];
    $fileTmp = $file['tmp_name'];
    
    if ($fileType !== "text/plain") {
        die("File harus berupa pdf (.txt)!");
    }
    if ($fileSize > 10 * 1024 * 1024) {
        die("Ukuran file tidak boleh lebih dari 10MB!");
    }

    // Baca isi file
    $fileContent = file($fileTmp); // Mengambil isi file sebagai array

    // Menangkap info browser/sistem operasi
    $userAgent = $_SERVER['HTTP_USER_AGENT'];

    // Simpan semua data dalam session
    session_start();
    $_SESSION['data'] = compact("name", "email", "age", "address", "fileContent", "userAgent");

    // Redirect ke result.php
    header("Location: result.php");
    exit;
} else {
    echo "Invalid Request!";
}
?>
