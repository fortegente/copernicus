<?php
$array = array(4, 3, 2, 5, 2, 25, 14, 78, 0, 5);

function arraySort(&$array, $minIndex = 0, $maxIndex = null) {
    $rightMaxIndex = $maxIndex;

    if (is_null($maxIndex)) {
        $maxIndex = $rightMaxIndex = count($array) - 1;
    }

    $middleIndex = ceil(($minIndex + $maxIndex) / 2);
    $middleVal = $array[$middleIndex];

    while ($minIndex < $maxIndex) {
        while ($array[$minIndex] < $middleVal) {
            $minIndex += 1;
        }

        while ($array[$maxIndex] > $middleVal) {
            $maxIndex -= 1;
        }

        if ($minIndex < $maxIndex) {
            $temp = $array[$maxIndex];
            $array[$maxIndex] = $array[$minIndex];
            $array[$minIndex] = $temp;
            $maxIndex--;
            $minIndex++;
        }
    }

    if ($minIndex < $rightMaxIndex) {
        $minIndex++;
        arraySort($array, $minIndex, $rightMaxIndex);
    }

    if ($maxIndex > 0) {
        $maxIndex--;
        arraySort($array, 0, $maxIndex);
    }
}
arraySort($array);
var_dump($array);