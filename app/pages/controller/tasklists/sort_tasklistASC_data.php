<?php
$result = getTasklistsOrdered();

sort($result);

$filtered_array = createArrayWithListsAndTasks($result);
