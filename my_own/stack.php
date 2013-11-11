<?php
class stack {
    static private $_stack = array();

    public function setNewItemToStack($item)
    {
        if ($item)
        {
            array_unshift(self::$_stack, $item);
            echo json_encode(self::$_stack);
        }
    }

    public function getItemFromStack()
    {
        $item = array_shift(self::$_stack);
        echo $item;
    }

    public function countStack()
    {
        return 777 . count(self::$_stack);
    }
}