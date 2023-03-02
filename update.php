<?php

    $name = $_POST["name"];
    $description = $_POST["description"];
    $value = $_POST["value"];
    $ordered = $_POST["ordered"];

    // validate value
    if (!is_numeric($value)) {
        echo "<script>alert('Error: Value field should contain only numeric characters')</script>";
        echo "<script>window.history.back()</script>";
        exit;
    }

    // validate ordered date
    if (strtotime($ordered) > time()) {
        echo "<script>alert('Error: You can\'t order into the future')</script>";
        echo "<script>window.history.back()</script>";
        exit;
    }

    // check if a record with the same name already exists
    require_once("./connect.php");
    $sql = "SELECT name FROM product WHERE name = :name";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":name", $name, PDO::PARAM_STR);
    $stmt->execute();
    $existing_name = $stmt->fetchColumn();

    if ($existing_name) {
        echo "<script>alert('Error: A product with that name already exists')</script>";
        echo "<script>window.history.back()</script>";
        exit;
    }

    // update the existing record
    $sql = "UPDATE product SET name = :name, description = :description, value = :value, ordered = :ordered WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":name", $name, PDO::PARAM_STR);
    $stmt->bindParam(":description", $description, PDO::PARAM_STR);
    $stmt->bindParam(":value", $value, PDO::PARAM_STR);
    $stmt->bindParam(":ordered", $ordered, PDO::PARAM_STR);
    $stmt->bindParam(":id", $_POST["id"], PDO::PARAM_INT);
    $stmt->execute();

    header("Location: ./index.php");
    exit;

?>