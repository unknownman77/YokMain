<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "yok_main";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: (" . $conn->connect_errno . ") " . $conn->connect_error);
}

$required_fields = [
    'nama_komunitas', 'jenis_aktivitas', 'jadwal_bermain', 'biaya', 
    'alamat_bermain', 'deskripsi_komunitas', 'contact', 'latitude', 'longitude'
];

foreach ($required_fields as $field) {
    if (!isset($_POST[$field]) || empty(trim($_POST[$field]))) {
        die("Error: Field '$field' is required.");
    }
}

$nama_komunitas = trim($_POST['nama_komunitas']);
$jenis_aktivitas = trim($_POST['jenis_aktivitas']);
$jadwal_bermain = trim($_POST['jadwal_bermain']);
$biaya = trim($_POST['biaya']);
$alamat_bermain = trim($_POST['alamat_bermain']);
$deskripsi_komunitas = trim($_POST['deskripsi_komunitas']);
$contact = trim($_POST['contact']);
$latitude = filter_var($_POST['latitude'], FILTER_VALIDATE_FLOAT);
$longitude = filter_var($_POST['longitude'], FILTER_VALIDATE_FLOAT);

error_log("Received Data: " . var_export($_POST, true));
error_log("Sanitized Contact: $contact");

if ($latitude === false || $longitude === false) {
    die('Invalid latitude or longitude value.');
}

if ($latitude < -90 || $latitude > 90) {
    die('Latitude is out of range. Must be between -90 and 90.');
}

if ($longitude < -180 || $longitude > 180) {
    die('Longitude is out of range. Must be between -180 and 180.');
}

if (empty($contact)) {
    die('Contact is required.');
}

$stmt = $conn->prepare("
    INSERT INTO communities (
        nama_komunitas,
        jenis_aktivitas,
        jadwal_bermain,
        biaya,
        alamat_bermain,
        deskripsi_komunitas,
        contact,
        latitude,
        longitude,
        created_at
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())
");

if (!$stmt) {
    die("Failed to prepare the statement: " . $conn->error);
}

$stmt->bind_param(
    "sssssssdd",
    $nama_komunitas,
    $jenis_aktivitas,
    $jadwal_bermain,
    $biaya,
    $alamat_bermain,
    $deskripsi_komunitas,
    $contact,
    $latitude,
    $longitude
);

$success = false;
try {
    if ($stmt->execute()) {
        $success = true;
    } else {
        error_log("SQL Error: " . $stmt->error);
        die("Gagal menyimpan data: " . $stmt->error);
    }
} catch (Exception $e) {
    error_log("Exception: " . $e->getMessage());
    die("Gagal menyimpan data: " . $e->getMessage());
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terima Kasih - Yok Main</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            text-align: center;
            padding: 50px;
        }
        .thank-you-message {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #fff;
            border-radius: 8px;
        }
        .thank-you-message h2 {
            color: #b40404;
        }
        .thank-you-message p {
            margin: 20px 0;
        }
        .thank-you-message a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #b40404;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
        }
        .thank-you-message a:hover {
            background-color: #8a0303;
        }
    </style>
</head>
<body>
    <div class="thank-you-message">
        <h2>Terima Kasih Sobat Sportyku!</h2>
        <p>
            <?php if ($success): ?>
                Terima kasih sudah ingin berpartisipasi meningkatkan kegiatan olahraga di Indonesia, Sobat Sportyku. 
                Silakan balik ke Main Page untuk melanjutkan aktivitas anda.
            <?php else: ?>
                Mohon maaf, terjadi kesalahan saat menyimpan data. Silakan coba lagi nanti.
            <?php endif; ?>
        </p>
        <a href="landingPage.html">Kembali ke Main Page</a>
    </div>
</body>
</html>
