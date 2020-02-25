<?php
define('ROOTPATH', str_replace('\app\pages\view', '', __DIR__));
require_once ROOTPATH.'/init.php';
include ROOTPATH.'/app/pages/controller/tasks/add_task_data.php';

require_once ROOTPATH.'/app/pages/template/header.php';
?>

<div class="col-4 offset-4 centered-list">
    <h3>Taak toevoegen</h3>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form-group">
            <label for="task_name">Naam van de taak:<span class="text-danger">* <?php echo $result['errors']['task_name']; ?></span></label>
            <input type="text" class="form-control" name="task_name" id="task_name" value="<?php echo $result['fields']['task_name'] ?>">
        </div>
        <div class="form-group">
            <label for="task_name">Duratie van taak (min):<span class="text-danger">* <?php echo $result['errors']['task_duration']; ?></span></label>
            <input type="text" class="form-control" name="task_duration" id="task_duration" value="<?php if (isset($result['fields']['task_duration'])){echo $result['fields']['task_duration'];} ?>">
        </div>
        <div class="form-group mt-4">
            <label for="checkbox">Voltooid:</label>
            <input type="checkbox" class="form-control" name="task_check" id="task_check">
        </div>
        <div class="form-group">
            <input type="hidden" class="form-control" name="list_id" id="list_id" value="<?php echo $list_id; ?>">
        </div>
        <div class="form-group">
            <button class="btn btn-secondary">Opslaan</button>
        </div>
    </form>
</div>

<?php
require_once ROOTPATH.'/app/pages/template/footer.php';
?>
