<?php
$car = $_GET['car'];
$carDetails = [
    "Toyota" => [
        "name" => "Toyota Corolla",
        "description" => "Megbízható és gazdaságos autó, ideális városi használatra.",
        "image" => "images/toyota.jpg"
    ],
    "BMW" => [
        "name" => "BMW 320i",
        "description" => "Sportos és elegáns prémium autó.",
        "image" => "images/bmw.jpg"
    ],
    "Ford" => [
        "name" => "Ford Focus",
        "description" => "Családbarát és kényelmes autó hosszabb utakra.",
        "image" => "images/ford.jpg"
    ]
];

if (!isset($carDetails[$car])) {
    echo "Nincs ilyen autó.";
    exit;
}

$carInfo = $carDetails[$car];
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $carInfo['name']; ?> - Részletek</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1><?php echo $carInfo['name']; ?></h1>
    </header>
    <main>
        <img src="<?php echo $carInfo['image']; ?>" alt="<?php echo $carInfo['name']; ?>">
        <p><?php echo $carInfo['description']; ?></p>
        <a href="booking_form.php?car=<?php echo $car; ?>">Foglalás</a>
    </main>
    <footer>
        <p>&copy; 2024 Autókölcsönző</p>
    </footer>
</body>
</html>
