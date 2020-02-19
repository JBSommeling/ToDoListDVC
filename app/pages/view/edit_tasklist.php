<?php
require_once '../../../init.php';
include '../controller/edit_tasklists_data.php';

require_once '../template/header.php';
?>

<div class="col-12 col-md-8 col-lg-4 wrapper">
    <h3>Lijst wijzigen</h3>
    <form method="post">
        <div class="form-group">
            <label for="tasklist_name">Naam van de lijst:<span class="text-danger">* <?php echo $nameErr; ?></span></label>
            <input type="text" class="form-control" name="tasklist_name" id="tasklist_name" value="<?php echo $name ?>">
        </div>
        <div class="form-group">
            <button class="btn btn-secondary">Opslaan</button>
        </div>
    </form>
</div>

<?php
require_once '../template/buttons_tasklist.php';
require_once '../template/footer.php';
?>
