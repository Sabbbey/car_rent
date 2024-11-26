<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "car_rental";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kapcsolódási hiba: " . $conn->connect_error);
}

$booking_id = $_GET['id'];

$sql = "SELECT * FROM bookings WHERE id = $booking_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $booking = $result->fetch_assoc();
} else {
    echo "Nem található foglalás.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foglalás részletei</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Foglalás részletei</h1>
    </header>
    <main>
        <p><strong>Név:</strong> <?php echo htmlspecialchars($booking['name']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($booking['email']); ?></p>
        <p><strong>Autó:</strong> <?php echo htmlspecialchars($booking['car']); ?></p>
        <p><strong>Foglalás kezdete:</strong> <?php echo htmlspecialchars($booking['start_date']); ?></p>
        <p><strong>Foglalás vége:</strong> <?php echo htmlspecialchars($booking['end_date']); ?></p>
        <a href="index.html" class="button">Vissza a főoldalra</a>
    </main>
    <footer>
        <p>&copy; 2024 Autókölcsönző</p>
    </footer>
</body>
</html>
<?php $conn->close(); ?>
