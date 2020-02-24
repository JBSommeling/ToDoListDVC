<?php
define('ROOTPATH', str_replace('\app\pages\view', '', __DIR__));
require_once ROOTPATH.'/init.php';
require_once ROOTPATH.'/app/pages/controller/tasks/show_tasks_data.php';

require_once ROOTPATH.'/app/pages/template/header.php';
?>
    <div class="row">
        <div class="col-12 col-md-8 col-lg-5 list">
            <div class="button-container">
                <a href="add_task.php?list_id=<?php echo $list_id; ?>"><button type="button" class="btn text-secondary"><i class="fas fa-plus-circle"></button></i></a>
            </div>
            <h3>Taken</h3>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Naam</th>
                    <th scope="col">Acties</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($tasks as $task) {?>
                    <tr>
                        <th scope="row"><?php echo $count; $count++; ?></th>
                        <td><a href="#" class="btn btn-transparent">
                                <?php if ($task['is_done'] == 1) { ?>
                                    <strike><?php echo $task['name'] ?></strike>
                                <?php } else {?>
                                    <?php echo $task['name'] ?>
                                <?php } ?>
                            </a></td>
                        <td>
                            <a href="show_task.php?task_id=<?php echo $task['id']; ?>"><button type="button" class="btn btn-warning"><i class="fas fa-eye text-white"></i></button></a>
                            <a href="app/pages/view/edit_tasklist.php?id=<?php echo $task['id']; ?>"><button type="button" class="btn btn-secondary d-inline-block" ><i class="fas fa-edit"></i></button></a>
                            <a href="app/pages/controller/tasklists/delete_tasklists_data.php?id=<?php echo $task['id']; ?>" onclick="return validation()" id="delete_tasklist_<?php echo $count ?>"><button type="button" class="btn btn-danger d-inline-block"><i class="fas fa-trash-alt"></i></button></a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <a href="../../../index.php"><button type="button" class="btn btn-secondary">Terug</button></a>
        </div>
    </div>
</div>
<?php
require_once ROOTPATH.'/app/pages/template/footer.php';
?>

