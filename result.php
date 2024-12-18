<?php
session_start();
if (!isset($_SESSION['data'])) {
    die("Data tidak tersedia!");
}
$data = $_SESSION['data'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pendaftaran</title>
    <style>
        body {
            font-family: times;
            background-color:rgb(59, 140, 187);
            color: white;
        }
        table { 
            width: 80%; 
            margin: 20px auto; 
            border-collapse: collapse; 
        }
        th, td { 
            border: 1px solid #ddd; 
            padding: 8px; 
            text-align: left; 
        }
        th { 
            background-color: #333; 
            color: white; 
        }
        a { 
            display: block; 
            text-align: center; 
            margin-top: 20px; 
        }
        a:hover {
            color: white;
        }
        
    </style>
</head>
<body>
    <h1 style="text-align:center;">Hasil Pendaftaran</h1>
    <a href="form.php">Isi Form</a>
    <table>
        <tr><th>Nama</th><td><?= htmlspecialchars($data['name']) ?></td></tr>
        <tr><th>Email</th><td><?= htmlspecialchars($data['email']) ?></td></tr>
        <tr><th>Umur</th><td><?= htmlspecialchars($data['age']) ?></td></tr>
        <tr><th>Alamat</th><td><?= htmlspecialchars($data['address']) ?></td></tr>
        <tr><th>Informasi Browser</th><td><?= htmlspecialchars($data['userAgent']) ?></td></tr>
        <tr>
            <th>Isi File</th>
            <td>
                <table>
                    <?php foreach ($data['fileContent'] as $line): ?>
                        <tr><td><?= htmlspecialchars($line) ?></td></tr>
                    <?php endforeach; ?>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
<?php session_destroy(); ?>
