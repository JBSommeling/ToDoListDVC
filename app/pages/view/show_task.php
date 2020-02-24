<?php
define('ROOTPATH', str_replace('\app\pages\view', '', __DIR__));
require_once ROOTPATH.'/init.php';
include ROOTPATH.'/app/pages/controller/tasks/show_task_data.php';

require_once ROOTPATH.'/app/pages/template/header.php';
?>

<div class="col-12 col-md-8 col-lg-4 list">
    <h3>Taak bekijken</h3>
    <div class="jumbotron bg-transparent">
        <h5>Lijst id: <?php echo $task['list_id']; ?></h5>
        <h5>Naam: <?php echo $task['name'];?></h5>
        <h5>Status:
            <?php
                if ($task['is_done'] == 1){
                    echo 'Voltooid';
                }
                else {
                    echo 'Onvoltooid';
                }
            ?>
        </h5>
    </div>
    <a href="show_tasks.php?list_id=<?php echo $task['list_id']; ?>"><button type="button" class="btn btn-secondary">Terug</button></a>
</div>

<?php
require_once ROOTPATH.'/app/pages/template/footer.php';
?>

