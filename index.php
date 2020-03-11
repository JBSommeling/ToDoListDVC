<?php

//feedback Danny van der Weijde 11/3/2020
//Bij de lijsten en taken zou het misschien fijn zijn dat je nummers in de naam kan gebruiken.
//Het zou fijn zijn als der een unfliter button is
//Code is voor de rest netjes goed overzichtelijk zoals je front-end applicatie en het is ook goed dat er veel comments bij om uit te leggen wat functions of zelf gelijken dingen doen.

include 'init.php';
include 'app/pages/controller/tasklists/show_tasklists_data.php';

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
    <div class="navbar-brand">
        <a href="app/pages/view/add_tasklist.php"><button type="button" class="btn btn-warning"><i class="fas fa-plus"></i></button></i></a>
        <a id="sortASC" href="#"><button type="button" class="btn btn-danger">Sorteer voltooid</button></a>
        <a id="sortDESC" href="#"><button type="button" class="btn btn-danger">Sorteer onvoltooid</button></a>
        <a id="filterCompl" href="#"><button type="button" class="btn btn-success">Filter voltooid</button></a>
        <a id="filterInCompl" href="#"><button type="button" class="btn btn-success">Filter onvoltooid</button></a>
        <a id="filterDur" href="#"><button type="button" class="btn btn-secondary">Filter duur</button></a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">


        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php" onclick="">Home</a>
            </li>
        </ul>
    </div>
</nav>
<div id="container" class="container col-12">
    <div class="row">
        <?php foreach ($filtered_array as $tasklist){ ?>
        <div class="col-4 mb-4 list">
            <h3><?php echo $tasklist['list_name'] ?></h3>
            <div class="button-container d-inline-block mb-1">
                <a href="app/pages/view/add_task.php?list_id=<?php echo $tasklist['list_id']; ?>"><button type="button" class="btn btn-dark"><i class="fas fa-plus"></i></button></a>
                <a href="app/pages/view/edit_tasklist.php?list_id=<?php echo $tasklist['list_id']; ?>"><button type="button" class="btn btn-secondary d-inline-block" ><i class="fas fa-edit"></i></button></a>
                <a href="app/pages/controller/tasklists/delete_tasklists_data.php?list_id=<?php echo $tasklist['list_id']; ?>" onclick="return validation()" id="delete_tasklist_<?php echo $count ?>"><button type="button" class="btn btn-danger d-inline-block"><i class="fas fa-trash-alt"></i></button></a>
            </div>
            <?php if ($tasklist['tasks'][0]['task_id'] != null){ ?>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Naam</th>
                        <th scope="col">Duur (min)</th>
                        <th scope="col">Status</th>
                        <th scope="col">Acties</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php for ($taskIndex = 0; $taskIndex < count($tasklist['tasks']); $taskIndex++){?>
                        <tr>
                            <td><?php
                                if ($tasklist['tasks'][$taskIndex]['is_done'] == 1){
                                    echo '<strike>'.$tasklist['tasks'][$taskIndex]['task_name'].'</strike>';
                                }
                                else{
                                    echo $tasklist['tasks'][$taskIndex]['task_name'];
                                } ?>
                            </td>
                            <td><?php echo $tasklist['tasks'][$taskIndex]['duration'] ?></td>
                            <td><?php
                                if($tasklist['tasks'][$taskIndex]['is_done'] == 1){
                                    echo 'Voltooid';
                                }
                                else {
                                    echo 'Onvoltooid';
                                }
                                ?>
                            </td>
                            <td>
                                <a href="app/pages/view/show_task.php?task_id=<?php echo $tasklist['tasks'][$taskIndex]['task_id']; ?>"><button type="button" class="btn btn-warning"><i class="fas fa-eye text-white"></i></button></a>
                                <a href="app/pages/view/edit_task.php?task_id=<?php echo $tasklist['tasks'][$taskIndex]['task_id']; ?>"><button type="button" class="btn btn-secondary d-inline-block" ><i class="fas fa-edit"></i></button></a>
                                <a href="app/pages/controller/tasks/delete_task_data.php?task_id=<?php echo $tasklist['tasks'][$taskIndex]['task_id']; ?>" onclick="return validation()" id="delete_tasklist_<?php echo $count ?>"><button type="button" class="btn btn-danger d-inline-block"><i class="fas fa-trash-alt"></i></button></a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            <?php } ?>
        </div>
        <?php } ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="app/assets/js/script.js"></script>
</body>
</html>