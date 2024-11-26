<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "car_rental";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kapcsolódási hiba: " . $conn->connect_error);
}

$sql = "SELECT * FROM bookings";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foglalt autók</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Foglalt autók</h1>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th>Név</th>
                    <th>Email</th>
                    <th>Autó</th>
                    <th>Foglalás kezdete</th>
                    <th>Foglalás vége</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo htmlspecialchars($row['car']); ?></td>
                    <td><?php echo htmlspecialchars($row['start_date']); ?></td>
                    <td><?php echo htmlspecialchars($row['end_date']); ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </main>
    <footer>
        <p>&copy; 2024 Autókölcsönző</p>
    </footer>
</body>
</html>
<?php $conn->close(); ?>
