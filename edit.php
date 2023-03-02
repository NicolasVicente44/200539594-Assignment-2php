<?php

require_once("./connect.php");

    $sql = "SELECT
        id, name, description, value, ordered
    FROM
        product
    WHERE
        id = :id";
    
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":id", $_GET["id"], PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_OBJ);

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

        <title>Edit Product</title>
    </head>

    <div class="container text-center"  style="max-width:800px">
    <body>
    <nav class="m-3">
            <ul class="list-group">
                <li class="list-group-item"><a class="btn btn-secondary text-white" href="./">Home</a></li>
                <li class="list-group-item"><a  class="btn btn-secondary text-white" href="./new.php">New Product</a></li>
            </ul>
        </nav>

        <h1 class="m-3">Edit Product</h1>
        
        <form class="m-5" action="./update.php" method="post">
            <input type="hidden" name="id" value="<?= $row->id ?>">

            <div>
                <label class="form-label m-3" for="name">Name</label><br>
                <input class="form-control" required type="text" name="name" value="<?= $row->name ?>">
            </div>

            <div>
                <label class="form-label m-3" for="description">Description</label><br>
                <input class="form-control" type="text" name="description" value="<?= $row->description ?>">
            </div>

            <div>
                <label class="form-label m-3" for="value">Values</label><br>
                <input class="form-control" required type="text" name="value" value="<?= $row->value ?>">
            </div>

            <div>
                <label class="form-label m-3" for="ordered">Ordered</label><br>
                <input class="form-control" required type="date" name="ordered" value="<?= $row->ordered ?>">
            </div>

            <div>
                <button class=" m-3 btn btn-secondary text-white"  type="submit">Submit</button>
            </div>
        </form>
</div>
    </body>
</html>