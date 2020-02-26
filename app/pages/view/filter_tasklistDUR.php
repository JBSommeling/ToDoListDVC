<?php
define('ROOTPATH', str_replace('\app\pages\view', '', __DIR__));
require_once ROOTPATH.'/init.php';
require_once ROOTPATH.'/app/pages/controller/tasklists/filter_tasklistDUR_data.php'; ?>

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
                                <a href="#" onclick="return validation()" id="delete_tasklist_<?php echo $count ?>"><button type="button" class="btn btn-danger d-inline-block"><i class="fas fa-trash-alt"></i></button></a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            <?php } ?>
        </div>
    <?php } ?>
</div>