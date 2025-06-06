<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "yok_main";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_lat = isset($_GET['lat']) ? floatval($_GET['lat']) : null;
$user_lon = isset($_GET['lon']) ? floatval($_GET['lon']) : null;
$limit = isset($_GET['limit']) ? intval($_GET['limit']) : 5; // Default to 5 communities

if ($user_lat && $user_lon) {
    $sql = "SELECT nama_komunitas, jenis_aktivitas, jadwal_bermain, biaya, alamat_bermain, 
            deskripsi_komunitas, contact, latitude, longitude,
            (6371 * acos(cos(radians(?)) * cos(radians(latitude)) * 
            cos(radians(longitude) - radians(?)) + sin(radians(?)) * 
            sin(radians(latitude)))) AS distance
            FROM communities
            ORDER BY distance
            LIMIT ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("dddi", $user_lat, $user_lon, $user_lat, $limit);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $sql = "SELECT nama_komunitas, jenis_aktivitas, jadwal_bermain, biaya, 
            alamat_bermain, deskripsi_komunitas, contact FROM communities";
    $result = $conn->query($sql);
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mau Main Bareng</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 40px;
            background-color: #fff;
            border-bottom: 1px solid #ddd;
        }
        .logo img {
            height: 40px;
        }
        nav ul {
            list-style: none;
            display: flex;
            gap: 20px;
        }
        nav ul li a {
            text-decoration: none;
            color: #333;
            font-size: 16px;
        }
        nav ul li a:hover {
            color: #b40404;
        }
        footer {
            text-align: center;
            padding: 20px;
            background-color: #ffffff;
            border-top: 1px solid #ddd;
        }
        .banner {
            position: relative;
            background-color: #b40404;
            background: url('https://i.ibb.co.com/85Ns6rh/batik-background.jpg') no-repeat center center fixed;
            background-size: cover;
            color: white;
            text-align: center;
            padding: 40px 20px;
            overflow: hidden;
        }
        .banner::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }
        .banner h1 {
            position: relative;
            font-size: 36px;
            font-weight: bold;
            z-index: 2;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.8);
            margin: 0;
            line-height: 1.2;
        }
        .community-info-box {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 30px;
            width: 90%;
            margin: 20px auto;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .community-info-box h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #b40404;
        }
        .data-box-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        .data-box {
            background-color: #f1f1f1;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        .data-box:hover {
            transform: scale(1.05);
        }
        .community-name {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #333;
        }
        .data-box p {
            font-size: 16px;
            color: #555;
            margin: 8px 0;
        }
        .data-box p strong {
            color: #333;
            margin-right: 5px;
        }
        .data-box .description {
            font-size: 14px;
            color: #666;
            margin-top: 10px;
        }
        .data-box .contact {
            font-size: 14px;
            color: #888;
            margin-top: 10px;
        }
        #userPreferenceInfo {
            background-color: #e9ecef;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 8px;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .change-preference-btn {
            background-color: #b40404;
            color: white;
            border: none;
            padding: 10px 15px;
            margin-left: 15px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }
        .change-preference-btn:hover {
            background-color: #8a0303;
        }
        .show-all-btn {
            background-color: #b40404;
            color: white;
            border: none;
            padding: 10px 15px;
            margin-left: 15px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }
        .show-all-btn:hover {
            background-color: #8a0303;
        }
        .no-communities {
            text-align: center;
            color: #b40404;
            padding: 20px;
            grid-column: 1 / -1;
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
        }
        
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
            border-radius: 8px;
        }
        
        .distance-input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        
        .modal-buttons {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 20px;
        }
        
        .modal-button {
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        
        .confirm-button {
            background-color: #b40404;
            color: white;
        }
        
        .cancel-button {
            background-color: #6c757d;
            color: white;
        }
        .modal-content h2 {
            color: #333;
            margin-bottom: 15px;
        }
        
        .modal-content p {
            color: #666;
            margin-bottom: 20px;
        }
        
        .number-input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
    </style>
</head>
<body>
<header>
    <div class="logo">
        <a href="landingPage.html">
            <img src="https://i.ibb.co.com/xCQQJQW/logo-jadi.png" alt="Yok Main Logo">
        </a>
    </div>
    <nav>
        <ul>
            <li><a href="tentangKami.html">Tentang Kami</a></li>
            <li><a href="mau-main-bareng.php">Mau Main Bareng?</a></li>
            <li><a href="partner-with-us.php">Owner Komunitas?</a></li>
            <li><a href="kontak.html">Kontak</a></li>
        </ul>
    </nav>
    <div>
        <a href="halamanMasuk.html" style="text-decoration:none; color:#000000;">Masuk</a> | 
        <a href="halamanDaftar.html" style="text-decoration:none; color:#000000;">Daftar</a>
    </div>
</header>

<div class="banner">
    <h1>Mau Main Bareng</h1>
</div>

<div id="distanceModal" class="modal">
    <div class="modal-content">
        <h2>Jumlah Komunitas</h2>
        <p>Masukkan jumlah komunitas terdekat yang ingin ditampilkan:</p>
        <input type="number" id="limitNumber" class="number-input" min="1" step="1" placeholder="Contoh: 5">
        <div class="modal-buttons">
            <button class="modal-button cancel-button" onclick="closeModal()">Batal</button>
            <button class="modal-button confirm-button" onclick="confirmLimit()">Konfirmasi</button>
        </div>
    </div>
</div>

<div class="community-info-box">
    <div id="userPreferenceInfo">
        <?php if ($user_lat && $user_lon): ?>
            <span>Menampilkan <?php echo $limit; ?> komunitas terdekat berdasarkan lokasi Anda.</span>
        <?php else: ?>
            <span>Semua komunitas ditampilkan.</span>
        <?php endif; ?>
        <button class="change-preference-btn" onclick="getUserLocation()">Cari Komunitas Terdekat</button>
        <button class="show-all-btn" onclick="showAllCommunities()">Semua Komunitas</button>
    </div>
    <h2 id="communityTitle">Hasil Pencarian</h2>
    <div id="filteredCommunities" class="data-box-container">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='data-box'>";
                echo "<h3 class='community-name'>" . htmlspecialchars($row['nama_komunitas']) . "</h3>";
                echo "<p><strong>Jenis Aktivitas:</strong> " . htmlspecialchars($row['jenis_aktivitas']) . "</p>";
                echo "<p><strong>Jadwal Bermain:</strong> " . htmlspecialchars($row['jadwal_bermain']) . "</p>";
                echo "<p><strong>Biaya:</strong> " . htmlspecialchars($row['biaya']) . "</p>";
                echo "<p><strong>Lokasi:</strong> " . htmlspecialchars($row['alamat_bermain']) . "</p>";
                if ($user_lat && $user_lon) {
                    echo "<p><strong>Jarak:</strong> " . round($row['distance'], 2) . " km</p>";
                }
                echo "<p class='description'><strong>Deskripsi:</strong> " . htmlspecialchars($row['deskripsi_komunitas']) . "</p>";
                echo "<p class='contact'><strong>Kontak:</strong> " . htmlspecialchars($row['contact']) . "</p>";
                echo "</div>";
            }
        } else {
            echo "<div class='no-communities'>Tidak ada komunitas yang ditemukan.</div>";
        }
        ?>
    </div>
</div>

<footer>
    <p>&copy; 2024 Semua Hak Dilindungi</p>
</footer>

<script>
let userLat, userLon;

function getUserLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            userLat = position.coords.latitude;
            userLon = position.coords.longitude;
            showDistanceModal();
        }, function(error) {
            alert("Error getting location: " + error.message);
        });
    } else {
        alert("Geolocation tidak didukung oleh browser ini.");
    }
}

function showDistanceModal() {
    document.getElementById('distanceModal').style.display = 'block';
}

function closeModal() {
    document.getElementById('distanceModal').style.display = 'none';
}

function confirmLimit() {
    const limit = document.getElementById('limitNumber').value;
    if (!limit || limit < 1) {
        alert("Silakan masukkan jumlah komunitas yang valid.");
        return;
    }
    
    window.location.href = `mau-main-bareng.php?lat=${userLat}&lon=${userLon}&limit=${limit}`;
    closeModal();
}

function showAllCommunities() {
    window.location.href = "mau-main-bareng.php";
}

window.onclick = function(event) {
    const modal = document.getElementById('distanceModal');
    if (event.target == modal) {
        closeModal();
    }
}
</script>

</body>
</html>
