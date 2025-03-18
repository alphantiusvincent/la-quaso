<?php
$warna = [
    "judul" => "color: rgb(255, 235, 87)",
    "footer" => "color: rgb(36, 255, 145)"
];

$parkir = [
    ["jenis" => "Motor", "lama_parkir" => 4, "hari" => "Selasa"],
    ["jenis" => "Mobil", "lama_parkir" => 12, "hari" => "Rabu"],
    ["jenis" => "Motor", "lama_parkir" => 11, "hari" => "Kamis"],
    ["jenis" => "Mobil", "lama_parkir" => 2, "hari" => "Sabtu"],
    ["jenis" => "Motor", "lama_parkir" => 14, "hari" => "Minggu"],
    ["jenis" => "Sepatu", "lama_parkir" => 5, "hari" => "Jumat"]
];


?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Biaya Parkir</title>
    <style>
        h2, h3 {
            color: rgb(237, 237, 237);
        }
        body {
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            flex-direction: column;
            background: linear-gradient(100deg, rgb(110, 116, 127), rgb(54, 61, 74)); 
        }
        table {
            width: 70%;
            border-collapse: collapse;
            margin: 20px auto;
            text-align: center;
            color: rgb(227, 227, 227);
        }
        th, td {
            border: 3px solid rgb(193, 193, 193);
            padding: 8px;
            text-align: center;
            vertical-align: middle;
            background-color: rgb(108, 105, 105);
        }
        th {
            background-color:rgb(53, 53, 53);
        }
    </style>
</head>
<body>

<img src="image2.png" alt="Logo" height="20%">

<?php
    // Kode untuk menampilkan judul (style warna harus diakses dengan pengaksesan array dari array php)
    echo "<h2 style='{$warna['judul']}'><u>Laporan Biaya Parkir</u></h2>";
?>

<table>
    <tr>
        <th>No</th>
        <th>Jenis Kendaraan</th>
        <th>Lama Parkir (Jam)</th>
        <th>Hari</th>
        <th>Biaya Asli</th>
        <th>Diskon</th>
        <th>Total Biaya</th>
    </tr>





    <?php
        $total_semua_biaya = 0;
        $no = 1;
        foreach ($parkir as $data) {
            $hasil = hitungBiayaParkir($data["jenis"], $data["lama_parkir"], $data["hari"]);

            echo "<tr>";
            echo "<td>{$no}</td>";
            echo "<td>{$data['jenis']}</td>";
            echo "<td>{$data['lama_parkir']}</td>";
            echo "<td>{$data['hari']}</td>";
            echo "<td>Rp " . number_format($hasil["biaya_asli"], 0, ',', '.') . "</td>";
            echo "<td>Rp " . number_format($hasil["diskon"], 0, ',', '.') . "</td>";
            echo "<td>Rp " . number_format($hasil["total_biaya"], 0, ',', '.') . "</td>";
            echo "</tr>";

            $total_semua_biaya += $hasil["total_biaya"];
            $no++;
        }
    ?>
</table>

<?php
    // Kode untuk menampilkan footer (Total semua biaya parkir ditampilkan, warnanya harus diakses dengan pengaksesan array dari array php)
    echo "<h3 style='{$warna['footer']}'>Total Semua Biaya Parkir: Rp " . number_format($total_semua_biaya, 0, ',', '.') . "</h3>";



    //isi tbl
function hitungBiayaParkir($jenis, $lama_parkir, $hari) {
    
    if ($jenis == "Motor") {
        $biaya_per_jam = 3000;
    } elseif ($jenis == "Mobil") {
        $biaya_per_jam = 5000;
    } else {
        return ["biaya_asli" => 0, "diskon" => 0, "total_biaya" => 0];
    }

   $biaya_asli = $biaya_per_jam * $lama_parkir;

 

    if ($lama_parkir > 5) {
        $biaya_asli += 2000;
    }

    $diskon = 0;
    if ($lama_parkir > 10) {
        $diskon += $biaya_asli * 0.10; 
    }
    if ($hari == "Sabtu" || $hari == "Minggu") {
        $diskon += ($biaya_asli - $diskon) * 0.15; 
    }


    // Total abis disc
    $total_biaya = $biaya_asli - $diskon;

    return [
        "biaya_asli" => $biaya_asli,
        "diskon" => $diskon,
        "total_biaya" => $total_biaya
    ];
}
?>

</body>
 
</html>
