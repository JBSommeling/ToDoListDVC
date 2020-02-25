<?php
define('ROOTPATH', str_replace('\app\pages\view', '', __DIR__));
require_once ROOTPATH.'/init.php';
include ROOTPATH.'/app/pages/controller/tasklists/edit_tasklists_data.php';

require_once ROOTPATH.'/app/pages/template/header.php';
?>

<div class="col-4 offset-4 centered-list">
    <h3>Lijst wijzigen</h3>
    <form method="post">
        <div class="form-group">
            <label for="tasklist_name">Naam van de lijst:<span class="text-danger">* <?php echo $result['errors']['tasklist_name']; ?></span></label>
            <input type="text" class="form-control" name="tasklist_name" id="tasklist_name" value="<?php echo $oldVal['list_name']; ?>">
        </div>
        <div class="form-group">
            <button class="btn btn-secondary">Opslaan</button>
        </div>
    </form>
</div>

<?php
require_once ROOTPATH.'/app/pages/template/footer.php';
?>
