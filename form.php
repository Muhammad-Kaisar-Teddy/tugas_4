<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran</title>
    <style>
        body { 
            font-family: times; 
            margin: 20px; 
            background-color:rgb(59, 140, 187);
            color: white;
        }
        form { 
            max-width: 400px; 
            margin: auto; 
        }
        label, input, textarea { 
            display: block; 
            width: 100%; 
            margin: 10px 0; 
        }
        button { 
            margin-top: 20px; 
            padding: 5px 10px;
            background-color: #4CAF50;
        }
        h1 { 
            text-align: center; 
        }
    </style>
</head>
<body>
    <h1>Form Pendaftaran UKM Stand Up Comedy</h1>
    <form action="process.php" method="POST" enctype="multipart/form-data" id="registrationForm">
        <label for="name">Nama Lengkap:</label>
        <input type="text" name="name" id="name" maxlength="50" required>
        
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>

        <label for="age">Umur:</label>
        <input type="number" name="age" id="age" min="1" max="120" required>

        <label for="file">Motivation Letter (Ekstensi File .txt):</label>
        <input type="file" name="file" id="file" accept=".txt" required>

        <label for="address">Alamat:</label>
        <textarea name="address" id="address" rows="3" required></textarea>

        <button type="submit" onclick="return validateForm()">Daftar</button>
    </form>

    <script>
        function validateForm() {
            let name = document.getElementById("name").value;
            let file = document.getElementById("file").files[0];

            // Validasi panjang teks
            if (name.length < 3) {
                alert("Nama minimal 3 karakter!");
                return false;
            }

            // Validasi file
            if (file) {
                const allowedTypes = ["text/plain"];
                const maxSize = 10 * 1024 * 1024; // 10 MB

                if (!allowedTypes.includes(file.type)) {
                    alert("File harus berupa teks (.txt)!");
                    return false;
                }
                if (file.size > maxSize) {
                    alert("Ukuran file tidak boleh melebihi 10 MB!");
                    return false;
                }
            } else {
                alert("File wajib diunggah!");
                return false;
            }

            return true; // Lolos validasi
        }
    </script>
</body>
</html>
