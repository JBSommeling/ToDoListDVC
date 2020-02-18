<?php
use app\pages\Pages;
include 'init.php';

$result = new Pages('localhost','root','','todolist_dvc');
$tasklist = $result->index();
?>
<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--STYLESHEETS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="app/assets/css/stylesheet.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">


    <!--FONT AWESOME-->
    <script src="https://kit.fontawesome.com/7e31d4959b.js" crossorigin="anonymous"></script>
    <script src="app/assets/js/jquery.js"></script>

    <title>To-Do list DVC</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item">
                <a class="nav-link" href="#" onclick="topFunction()">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">link</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container col-12">
    <div class="col-12 col-md-8 col-lg-4 list">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Naam</th>
                <th scope="col">Acties</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($tasklist as $task) {?>
            <tr>
                <th scope="row"><?php echo $task['list_id'] ?></th>
                <td><?php echo $task['list_name'] ?></td>
                <td>
                    <a href=""><button type="button" class="btn btn-secondary d-inline-block" ><i class="fas fa-edit"></i></button></a>
                    <a href=""><button type="button" class="btn btn-danger d-inline-block"><i class="fas fa-trash-alt"></i></button></a>
                </td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>


<div class="button-container">
    <a href="#"><button type="button" class="btn" data-toggle="modal" data-target="#addModal" ><i class="fas fa-plus-circle"></button></i></a>
</div>

<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo htmlspecialchars('app/pages/Pages.php')?>" method="POST">
                    <div class="form-group">
                        <label for="list_name">Naam van lijst:</label>
                        <input type="text" id="list_name" name="list_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" id="create_button" value="Maken">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
