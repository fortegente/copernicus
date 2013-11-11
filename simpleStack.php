<?php
include "functions.php";

//Stack
$stack = array("Spain", "USA", "Italy", "Germany", "Argentina");
outputArray($stack, "Initial stack");

//prepend some elements to the stack.
array_unshift($stack, "Russia", "Albania");

//output modified stack.
outputArray($stack, "Added some new elements to the stack");

//get the first element from the stack.
$elementFromStack = array_shift($stack);

//output modified stack.
outputArray($stack, "The stack after shifting");




