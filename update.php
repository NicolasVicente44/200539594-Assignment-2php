<?php

    require_once("./connect.php");

    $sql = "UPDATE product SET
        name = :name,
        description = :description,
        value = :value,
        ordered = :ordered
    WHERE id = :id";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":name", $_POST["name"], PDO::PARAM_STR);
    $stmt->bindParam(":description", $_POST["description"], PDO::PARAM_STR);
    $stmt->bindParam(":value", $_POST["value"], PDO::PARAM_STR);
    $stmt->bindParam(":ordered", $_POST["ordered"], PDO::PARAM_STR);
    $stmt->bindParam(":id", $_POST["id"], PDO::PARAM_INT);
    $stmt->execute();

    header("Location: ./index.php");

?>