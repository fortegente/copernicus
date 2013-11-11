<?php
function outputArray($array, $message)
{
    if ($message)
    {
        echo "<strong>" . (string) $message . "</strong>:<br>";
    }

    foreach ($array as $arrayItem)
    {
        echo $arrayItem . "<br>";
    }

    echo "<br>";
}