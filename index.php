<?php 

    $sql = "SELECT id, name, description, value, ordered FROM product";

    require_once("./connect.php");

    $rows = [];
    if ($conn) {
        $result = $conn->query($sql);
        $rows = $result->fetchAll(PDO::FETCH_OBJ);
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Products</title>
</head>

<body>
    <div class="container text-center">

    <nav class="m-3">
            <ul class="list-group">
                <li class="list-group-item"><a class="btn btn-secondary text-white" href="./">Home</a></li>
                <li class="list-group-item"><a  class="btn btn-secondary text-white" href="./new.php">New Product</a></li>
            </ul>
        </nav>

        <div class="row">
            <div class="col-lg-12">
                <h1 class="display-1 m-3">Product Summary</h1>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Value</th>
                            <th>Ordered</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach($rows as $row): ?>
                            <tr>
                                <td style="font-size: 24px"><?= $row->id ?></td>
                                <td style="font-size: 24px"><?= $row->name ?></td>
                                <td style="font-size: 24px"><?= $row->description ?></td>
                                <td style="font-size: 24px"><?= $row->value ?></td>
                                <td style="font-size: 24px"><?= $row->ordered ?></td>
                                <td style="font-size: 24px">
                                    <a href="./edit.php?id=<?= $row->id ?>" class="btn btn-secondary btn-sm mr-2">Edit</a>
                                    <a href="./delete.php?id=<?= $row->id ?>" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


