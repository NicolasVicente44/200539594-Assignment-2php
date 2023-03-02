<?php


    $name = $_POST["name"];
    $description = $_POST["description"];
    $value = $_POST["value"];
    $ordered = $_POST["ordered"];

    //validates value to be only numbers, throws js error box if not 
    if (!is_numeric($value)) {
        echo "<script>alert('Error: Value field should contain only numeric characters')</script>";
        echo "<script>window.location.replace('new.php')</script>";

        exit;
    }

    //validates ordered field is not in the future throws js error box if not 
    $timestamp = strtotime($ordered);
    if ($timestamp > time()) {
        echo "<script>alert('Error: You can\'t order into the future')</script>";
        echo "<script>window.location.replace('new.php')</script>";


        exit;
    }

    require_once("./connect.php");

    $sql = "INSERT INTO product (
        name,
        description,
        value,
        ordered
    ) VALUES (
        :name,
        :description,
        :value,
        :ordered
    )";

try {
$stmt = $conn->prepare($sql);
$stmt->bindParam(":name", $_POST["name"], PDO::PARAM_STR);
$stmt->bindParam(":description", $_POST["description"], PDO::PARAM_STR);
$stmt->bindParam(":value", $_POST["value"], PDO::PARAM_STR);
$stmt->bindParam(":ordered", $_POST["ordered"], PDO::PARAM_STR);
$stmt->execute();
} catch (PDOException $e) {
    if ($e->getCode() == 23000) {
        echo "<script>alert('Error: A product with that name already exists')</script>";
        echo "<script>window.location.replace('new.php')</script>";

        exit;

    } else {
        echo "Error: " . $e->getMessage();
        exit;
    }
}

header("Location: ./index.php");



?> 