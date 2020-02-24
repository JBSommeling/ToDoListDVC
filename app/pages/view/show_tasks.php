<?php
define('ROOTPATH', str_replace('\app\pages\view', '', __DIR__));
require_once ROOTPATH.'/init.php';
require_once ROOTPATH.'/app/pages/controller/tasks/show_tasks_data.php';

require_once ROOTPATH.'/app/pages/template/header.php';
?>
    <div class="row">
        <div class="col-6 list">
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
                        <th scope="row"><?php echo $count_lists; $count_lists++; ?></th>
                        <td><a href="#" class="btn btn-transparent"><?php echo $tasklist['list_name']; ?></a></td>
                        <td>
                            <a href="show_tasks.php?list_id=<?php echo $tasklist['list_id']; ?>"><button type="button" class="btn btn-warning"><i class="fas fa-eye text-white"></i></button></a>
                            <a href="edit_tasklist.php?list_id=<?php echo $tasklist['list_id']; ?>"><button type="button" class="btn btn-secondary d-inline-block" ><i class="fas fa-edit"></i></button></a>
                            <a href="../controller/tasklists/delete_tasklists_data.php?list_id=<?php echo $tasklist['list_id']; ?>" onclick="return validation()" id="delete_tasklist_<?php echo $count ?>"><button type="button" class="btn btn-danger d-inline-block"><i class="fas fa-trash-alt"></i></button></a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="col-6 list">
            <div class="button-container">
                <a href="add_task.php?list_id=<?php echo $list_id; ?>"><button type="button" class="btn text-secondary"><i class="fas fa-plus-circle"></button></i></a>
            </div>
            <h3>Taken</h3>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Beschrijving</th>
                    <th scope="col">Status</th>
                    <th scope="col">Duur (min)</th>
                    <th scope="col">Acties</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($tasks as $task) {?>
                    <tr>
                        <th scope="row"><?php echo $count_tasks; $count_tasks++; ?></th>
                        <td><a href="#" class="btn btn-transparent">
                                <?php if ($task['is_done'] == 1) { ?>
                                    <strike><?php echo $task['name'] ?></strike>
                                <?php } else {?>
                                    <?php echo $task['name'] ?>
                                <?php } ?>
                            </a></td>
                        <td>
                            <?php if ($task['is_done'] == 1) { ?>
                                <p>Voltooid</p>
                            <?php } else {?>
                                <p>Onvoltooid</p>
                            <?php } ?>
                        </td>
                        <td><?php echo $task['duration']; ?></td>
                        <td>
                            <a href="show_task.php?task_id=<?php echo $task['id']; ?>"><button type="button" class="btn btn-warning"><i class="fas fa-eye text-white"></i></button></a>
                            <a href="app/pages/view/edit_tasklist.php?id=<?php echo $task['id']; ?>"><button type="button" class="btn btn-secondary d-inline-block" ><i class="fas fa-edit"></i></button></a>
                            <a href="app/pages/controller/tasklists/delete_tasklists_data.php?id=<?php echo $task['id']; ?>" onclick="return validation()" id="delete_tasklist_<?php echo $count ?>"><button type="button" class="btn btn-danger d-inline-block"><i class="fas fa-trash-alt"></i></button></a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
require_once ROOTPATH.'/app/pages/template/footer.php';
?>

