<?php
$car = $_GET['car'];
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foglalás</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Foglalás - <?php echo htmlspecialchars($car); ?></h1>
    </header>
    <main>
        <form action="process_booking.php" method="POST">
            <label for="name">Név:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="car">Autó:</label>
            <input type="text" id="car" name="car" value="<?php echo htmlspecialchars($car); ?>" readonly>

            <label for="start_date">Foglalás kezdete:</label>
            <input type="date" id="start_date" name="start_date" required>

            <label for="end_date">Foglalás vége:</label>
            <input type="date" id="end_date" name="end_date" required>

            <button type="submit">Foglalás</button>
        </form>
    </main>
    <footer>
        <p>&copy; 2024 Autókölcsönző</p>
    </footer>
</body>
</html>
