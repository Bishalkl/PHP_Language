<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require_once 'Oops/car.php';
    $Car01 = new Car("Volvo", "Green");
    echo $Car01->getCarInfo();
    echo "<br>";
    echo $Car01->vehicleType;
    ?>
</body>
</html>