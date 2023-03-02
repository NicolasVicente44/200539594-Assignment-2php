<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <title>New Product</title>
    </head>

    <div class="container text-center"> 
    <body>
        <nav class="m-3">
            <ul class="list-group">
                <li class="list-group-item"><a class="btn btn-secondary text-white" href="./">Home</a></li>
                <li class="list-group-item"><a  class="btn btn-secondary text-white" href="./new.php">New Product</a></li>
            </ul>
        </nav>
</div>

        <div class="container text-center"  style="max-width:800px">
        <h1 class="m-3">New Product</h1>
        
        <form class="m-5" action="./create.php" method="post">
            <div>
                <label class="form-label m-3" for="name">Name</label><br>
                <input class="form-control" type="text" name="name" required>
            </div>

            <div>
                <label class="form-label m-3" for="description">Description</label><br>
                <input class="form-control" type="text" name="description">
            </div>

            <div>
                <label class="form-label m-3" for="value">Value</label><br>
                <input class="form-control form-control" type="text" name="value" required>
            </div>

            <div class="form-group text-center">
                <label class="form-label m-3" for="ordered">Ordered</label><br>
                <input class="form-control" type="date" name="ordered" required>
            </div>

            <div class="m-3">
                <button class="btn btn-secondary text-white" type="submit">Submit</button>
            </div>
        </form>
</div>
    </body>
</html>