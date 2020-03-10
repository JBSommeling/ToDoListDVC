<?php
$result = getTasklistsOrdered();

//sort arrays in descending order
rsort($result);

$filtered_array = createArrayWithListsAndTasks($result);
