<?php

class stack {
    private $_lastElement = null;

    public function pop()
    {
        $lastElement = $this->_lastElement->getLastItem();
        $this->_lastElement = $this->_lastElement->getPrevItem();

        return $lastElement;
    }

    public function push($item)
    {
        $newItem = new node();
        $newItem->setLastItem($item);
        $newItem->setPrevItem($this->_lastElement);
        $this->_lastElement = $newItem;
    }
}

class node
{
    private $_lastItem;

    private $_prevItem;

    public function setLastItem($item)
    {
        $this->_lastItem = $item;
    }

    public function getLastItem()
    {
        return $this->_lastItem;
    }

    public function setPrevItem($item)
    {
        $this->_prevItem = $item;
    }

    public function getPrevItem()
    {
        return $this->_prevItem;
    }
}
