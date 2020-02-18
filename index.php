<?php
include 'init.php';
$tasklist = show();

require_once 'app/pages/template/header.php';
?>

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
    <a href="#"><button type="button" class="btn text-secondary" data-toggle="modal" data-target="#addModal" ><i class="fas fa-plus-circle"></button></i></a>
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

<?php require_once 'app/pages/template/footer.php';
