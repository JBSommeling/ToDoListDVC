<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/todolistdvc/init.php';
include ROOTPATH.'/app/pages/controller/tasklists/add_tasklists_data.php';

require_once ROOTPATH.'/app/pages/template/header.php';
?>

<div class="col-12 col-md-8 col-lg-4 list">
    <h3>Lijst toevoegen</h3>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form-group">
            <label for="tasklist_name">Naam van de lijst:<span class="text-danger">* <?php echo $result['errors']['tasklist_name']; ?></span></label>
            <input type="text" class="form-control" name="tasklist_name" id="tasklist_name">
        </div>
        <div class="form-group">
            <button class="btn btn-secondary">Opslaan</button>
        </div>
    </form>
</div>

<?php
require_once ROOTPATH.'app/pages/template/footer.php';
?>
