<?php
$dsn = 'mysql:host=localhost;dbname=yok_main;charset=utf8mb4';
$dbUser = 'root';
$dbPass = '';
try {
    $pdo = new PDO($dsn, $dbUser, $dbPass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (Exception $e) {
    die('Database connection failed: ' . $e->getMessage());
}

$data = json_decode(file_get_contents('php://input'), true);
$latitude = $data['latitude'];
$longitude = $data['longitude'];

$query = "
    SELECT
        id, name, address,
        ( 6371 * acos( cos( radians(:latitude) ) * cos( radians(latitude) )
        * cos( radians(longitude) - radians(:longitude) ) + sin( radians(:latitude) )
        * sin( radians(latitude) ) ) ) AS distance
    FROM yok_main
    HAVING distance < 50
    ORDER BY distance ASC
    LIMIT 10
";
$stmt = $pdo->prepare($query);
$stmt->execute([
    ':latitude' => $latitude,
    ':longitude' => $longitude
]);
$partners = $stmt->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($partners);
?>
