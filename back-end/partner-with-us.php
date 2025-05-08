<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "yok_main";

$conn = new mysqli($servername, $username, $password, $dbname);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partner With Us</title>
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
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            position: relative;
            z-index: 10;
        }
        .logo {
            font-size: 24px;
            font-weight: bold;
        }
        .logo img {
            height: 40px;
            vertical-align: middle;
        }
        nav ul {
            list-style: none;
            display: flex;
            gap: 30px;
            margin: 0;
            padding: 0;
        }
        nav ul li a {
            text-decoration: none;
            color: #333;
            font-size: 15px;
            transition: color 0.3s ease;
        }
        nav ul li a:hover {
            color: #b40404;
        }
        .auth-links a {
            text-decoration: none;
            color: #333;
            font-size: 15px;
            transition: color 0.3s ease;
            padding: 0 5px;
        }

        .auth-links a:hover {
            color: #b40404;
        }
        .hero {
            position: relative;
            background-color: #b40404;
            background: url('https://i.ibb.co.com/85Ns6rh/batik-background.jpg') no-repeat center center fixed;
            background-size: cover;
            color: white;
            text-align: center;
            padding: 40px 20px;
            overflow: hidden;
        }
        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }
        .hero h1 {
            position: relative;
            font-size: 36px;
            font-weight: bold;
            z-index: 2;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.8);
            margin: 0;
            line-height: 1.2;
        }
        .form-container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #b40404;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            font-size: 16px;
            margin-bottom: 5px;
            color: #333;
        }
        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
            transition: border-color 0.3s ease;
        }
        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            outline: none;
            border-color: #b40404;
        }
        .form-group textarea {
            resize: vertical;
            height: 100px;
        }
        .form-group button {
            display: block;
            width: 100%;
            padding: 12px;
            font-size: 16px;
            color: #fff;
            background-color: #b40404;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .form-group button:hover {
            background-color: #8c0303;
        }
        .location-help {
            color: #666;
            font-size: 12px;
            margin-top: 5px;
        }
        #map {
            height: 400px;
            width: 100%;
            margin-top: 20px;
            border-radius: 5px;
            overflow: hidden;
        }
        footer {
            text-align: center;
            padding: 20px;
            background-color: #ffffff;
            border-top: 1px solid #ddd;
            position: relative;
            z-index: 1;
        }
    </style>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder@2.0.0/dist/Control.Geocoder.css" />
    <script src="https://unpkg.com/leaflet-control-geocoder@2.0.0/dist/Control.Geocoder.js"></script>
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
        <div class="auth-links">
            <a href="halamanMasuk.html">Masuk</a> | <a href="halamanDaftar.html">Daftar</a>
        </div>
    </header>

    <div class="hero">
        <h1>Isi Informasi Komunitas Anda</h1>
    </div>
    
    <section class="form-container">
        <form action="save_community.php" method="POST">
            <div class="form-group">
                <label for="nama-komunitas">*Nama Komunitas:</label>
                <input type="text" id="nama-komunitas" name="nama_komunitas" placeholder="Masukkan nama komunitas Anda" required>
            </div>
            <div class="form-group">
                <label for="jenis-aktivitas">*Jenis Aktivitas:</label>
                <input type="text" id="jenis-aktivitas" name="jenis_aktivitas" placeholder="Contoh: Futsal, Basket" required>
            </div>
            <div class="form-group">
                <label for="jadwal-bermain">*Jadwal Bermain:</label>
                <input type="text" id="jadwal-bermain" name="jadwal_bermain" placeholder="Contoh: Rabu, 18.00 - 20.00 WIB" required>
            </div>
            <div class="form-group">
                <label for="biaya">*Biaya:</label>
                <input type="text" id="biaya" name="biaya" placeholder="Contoh: Rp 50.000/sesi" required>
            </div>
            <div class="form-group">
                <label for="alamat-bermain">*Alamat Bermain:</label>
                <textarea id="alamat-bermain" name="alamat_bermain" placeholder="Masukkan alamat lapangan" required></textarea>
            </div>
            <div class="form-group">
                <label for="deskripsi-komunitas">*Deskripsi Komunitas:</label>
                <textarea id="deskripsi-komunitas" name="deskripsi_komunitas" placeholder="Apakah ada fotografer? Atau mungkin minum? Bagaimana dengan wasit dan lapangan yang dipakai?" required></textarea>
            </div>
            <div class="form-group">
                <label for="contact">*Nama dan Nomor Telepon:</label>
                <input type="text" id="contact" name="contact" placeholder="Contoh: John Cena, 08123456789" required pattern="^[a-zA-Z\s]+,\s\d+$" title="Format: Nama, Nomor Telepon. Contoh: John Doe, 08123456789">
            </div>
            <div class="form-group">
                <label for="latitude">*Latitude:</label>
                <input type="text" id="latitude" name="latitude" placeholder="Contoh: -10.12345678" required pattern="^-?\d+(\.\d+)?$">
                <p class="location-help">Gunakan Google Maps atau OpenStreetMap untuk mendapatkan koordinat. Gunakan maksimal 10 digit (8 digit dibelakang titik).</p>
            </div>
            <div class="form-group">
                <label for="longitude">*Longitude:</label>
                <input type="text" id="longitude" name="longitude" placeholder="Contoh: 10.12345678" required pattern="^-?\d+(\.\d+)?$">
                <p class="location-help">Gunakan Google Maps atau OpenStreetMap untuk mendapatkan koordinat. Gunakan maksimal 10 digit (8 digit dibelakang titik).</p>
            </div>

            <div class="form-group">
                <button type="button" id="get-location-btn">Dapatkan Lokasi Anda Saat Ini</button>
            </div>

            <div class="form-group">
                <button type="submit">Kirim</button>
            </div>
        </form>

        <div id="map"></div>
    </section>

    <script>
        let map, marker;

        function initMap() {
            const initialPosition = [-6.2088, 106.8456];
            map = L.map('map').setView(initialPosition, 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);

            L.Control.geocoder().addTo(map);

            marker = L.marker(initialPosition, { draggable: true }).addTo(map);

            marker.on('moveend', function (e) {
                const position = e.target.getLatLng();
                document.getElementById('latitude').value = position.lat.toFixed(8);
                document.getElementById('longitude').value = position.lng.toFixed(8);
            });

            map.on('click', function (e) {
                const clickedLocation = e.latlng;
                marker.setLatLng(clickedLocation);
                document.getElementById('latitude').value = clickedLocation.lat.toFixed(8);
                document.getElementById('longitude').value = clickedLocation.lng.toFixed(8);
            });
        }

        document.getElementById('get-location-btn').addEventListener('click', function () {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    const userLocation = [position.coords.latitude, position.coords.longitude];

                    map.setView(userLocation, 13);
                    marker.setLatLng(userLocation);
                    document.getElementById('latitude').value = userLocation[0].toFixed(8);
                    document.getElementById('longitude').value = userLocation[1].toFixed(8);
                }, function (error) {
                    alert('Gagal mendapatkan lokasi: ' + error.message);
                });
            } else {
                alert('Geolokasi tidak didukung oleh browser Anda.');
            }
        });

        window.onload = initMap;
    </script>

    <footer>
        <p>&copy; 2024 Yok Main!</p>
    </footer>
</body>
</html>
