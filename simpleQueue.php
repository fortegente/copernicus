<?php
include "functions.php";

//Queue
$queue = array("Spain", "USA", "Italy", "Germany", "Argentina");
outputArray($queue, "Initial queue");

//attach some elements to the queue.
array_push($queue, "Russia", "Albania");

//output modified queue.
outputArray($queue, "Added some new elements to the queue");

//get the last element from the queue.
$elementFromQueue = array_pop($queue);

//output modified queue.
outputArray($queue, "The queue after 'pop' operation");