<?php

class queue {
    private $_firstElement = null;

    public function shift()
    {
        $firstElement = $this->_firstElement->getFirstItem();
        $this->_firstElement = $this->_firstElement->getNextItem();

        return $firstElement;
    }

    public function unshift($item)
    {
        $newItem = new node();
        $newItem->setFirstItem($item);
        $newItem->setNextItem($this->_firstElement);
        $this->_firstElement = $newItem;
    }
}

class node
{
    private $_firstItem;

    private $_nextItem;

    public function setFirstItem($item)
    {
        $this->_firstItem = $item;
    }

    public function getFirstItem()
    {
        return $this->_firstItem;
    }

    public function setNextItem($item)
    {
        $this->_nextItem = $item;
    }

    public function getNextItem()
    {
        return $this->_nextItem;
    }
}
