<?php
$result = getTasklistsOrdered();

//sort array in ascending order
sort($result);

$filtered_array = createArrayWithListsAndTasks($result);