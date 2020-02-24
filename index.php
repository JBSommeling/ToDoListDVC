<?php
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
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php" onclick="">Home</a>
                </li>
            </ul>
        </div>
    </nav>
<div class="container col-12">
    <div class="row">
        <div class="col-12 col-md-8 col-lg-5 list">
            <div class="button-container">
                <a href="app/pages/view/add_tasklist.php"><button type="button" class="btn text-secondary"><i class="fas fa-plus-circle"></button></i></a>
            </div>
            <h3>Takenlijsten</h3>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Naam</th>
                    <th scope="col">Acties</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($tasklist as $tasklist) {?>
                <tr>
                    <th scope="row"><?php echo $count; $count++; ?></th>
                    <td><a href="#" class="btn btn-transparent"><?php echo $tasklist['list_name']; ?></a></td>
                    <td>
                        <a href="app/pages/view/show_tasks.php?list_id=<?php echo $tasklist['list_id']; ?>"><button type="button" class="btn btn-warning"><i class="fas fa-eye text-white"></i></button></a>
                        <a href="app/pages/view/edit_tasklist.php?list_id=<?php echo $tasklist['list_id']; ?>"><button type="button" class="btn btn-secondary d-inline-block" ><i class="fas fa-edit"></i></button></a>
                        <a href="app/pages/controller/tasklists/delete_tasklists_data.php?list_id=<?php echo $tasklist['list_id']; ?>" onclick="return validation()" id="delete_tasklist_<?php echo $count ?>"><button type="button" class="btn btn-danger d-inline-block"><i class="fas fa-trash-alt"></i></button></a>
                    </td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
    <script src="app/assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>