<?php
//masukkan kode kalian disini
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $namaMakanan = $_POST["namaMakanan"];
    $asalMakanan = $_POST["asalMakanan"];

    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["gambarMakanan"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));


    if($fileType != "pdf" && $fileType != "jpg" && $fileType != "png") {
        echo "Error: File harus berupa PDF atau JPG."; 
    }

  
    if ($_FILES["gambarMakanan"]["size"] > 4 * 1024 * 1024) {
        echo "Error: Ukuran file maksimal 4MB.";  
        $uploadOk = 0;
    }

   
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["gambarMakanan"]["tmp_name"], $targetFile)) {
            $sql = "INSERT INTO makanan (namaMakanan, asalMakanan, gambarMakanan) VALUES ('$namaMakanan', '$asalMakanan', '" . basename($targetFile) . "')";
            if ($conn->query($sql) === TRUE) {
                echo "File PDF berhasil diupload dan data tersimpan."; 
                echo "<br><a href='input.php'>Kembali ke Form Input</a>";
                echo "<br><a href='index.php'>Lihat Data Makanan</a>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Error: Terjadi kesalahan saat upload file.";
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    padding: 20px;
}

h3 {
    color: #333;
}

p {
    margin: 10px 0;
}

a {
    color: #007bff;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}
    </style>
</head>
<body>
    
</body>
</html>