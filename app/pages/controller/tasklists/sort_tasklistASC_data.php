<?php
$result = getTasklistsOrdered();

rsort($result);

$filtered_array = createArrayWithListsAndTasks($result);
