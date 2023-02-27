<?php


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


$stmt = $conn->prepare($sql);
$stmt->bindParam(":name", $_POST["name"], PDO::PARAM_STR);
$stmt->bindParam(":description", $_POST["description"], PDO::PARAM_STR);
$stmt->bindParam(":value", $_POST["value"], PDO::PARAM_STR);
$stmt->bindParam(":ordered", $_POST["ordered"], PDO::PARAM_STR);
$stmt->execute();

header("Location: ./index.php");



?> 