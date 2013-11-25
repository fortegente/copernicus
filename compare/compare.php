<?php
include "../oop/stack.php";

function native($quantity)
{
    $startTime = microtime(true);
    $initMemory = memory_get_usage();

    $list = array();
    for($i = 1; $i < $quantity; $i++){
        array_push($list, $i);
    }

    $memoryResult = memory_get_usage() - $initMemory;
    $totalTime = microtime(true) - $startTime;

    return array("memory" => $memoryResult, "totalTime" => $totalTime);
}

function spl($quantity)
{
    $object = new SplStack();
    $startTime = microtime(true);
    $initMemory = memory_get_usage();

    for($i = 1; $i < $quantity; $i++){
        $object->push($i);
    }

    $memoryResult = memory_get_usage() - $initMemory;
    $totalTime = microtime(true) - $startTime;

    return array("memory" => $memoryResult, "totalTime" => $totalTime);
}

function oop($quantity)
{
    $object = new stack();
    $startTime = microtime(true);
    $initMemory = memory_get_usage();

    for($i = 1; $i < $quantity; $i++){
        $object->push($i);
    }

    $memoryResult = memory_get_usage() - $initMemory;
    $totalTime = microtime(true) - $startTime;

    return array("memory" => $memoryResult, "totalTime" => $totalTime);
}