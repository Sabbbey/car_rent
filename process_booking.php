<?php
// Adatbázis csatlakozás
$servername = "localhost";
$username = "root";
$password = ""; // Ha van jelszó, add meg itt
$dbname = "car_rental";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kapcsolódási hiba: " . $conn->connect_error);
}

// Adatok feldolgozása
$name = isset($_POST['name']) ? $_POST['name'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$car = isset($_POST['car']) ? $_POST['car'] : '';
$start_date = isset($_POST['start_date']) ? $_POST['start_date'] : '';
$end_date = isset($_POST['end_date']) ? $_POST['end_date'] : '';

// Ellenőrizd, hogy minden mező ki van-e töltve
if (empty($name) || empty($email) || empty($car) || empty($start_date) || empty($end_date)) {
    die("Hiba: Minden mezőt ki kell tölteni!");
}

// Adatok beszúrása az adatbázisba
$sql = "INSERT INTO bookings (name, email, car, start_date, end_date) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("sssss", $name, $email, $car, $start_date, $end_date);
    if ($stmt->execute()) {
        // Sikeres beszúrás -> átirányítás
        $booking_id = $stmt->insert_id; // Legutóbb beszúrt ID
        header("Location: index.html?success=1&booking_id=$booking_id");
        exit;
    } else {
        echo "Hiba az adatbázis beszúrás során: " . $stmt->error;
    }
} else {
    echo "Hiba az előkészített lekérdezés létrehozásakor: " . $conn->error;
}

$conn->close();
?>
