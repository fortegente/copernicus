<?php
class doubleLinkedList
{
    private $_start = null;

    private $_end = null;

    private $_pointer = null;

    public function unshift($item)
    {
        if ($this->_start === null) {
            $this->_start = $item;
            $this->_end = $item;
            $this->_pointer = $item;

            return;
        }

        $this->_start->setPrev($item);
        $item->setNext($this->_start);
        $this->_start = $item;
        $this->_pointer = $item;
    }

    public function shift()
    {
        $item = $this->_start();
        $this->_start =  $this->_start->getNext();
        $this->_start->setPrevious(null);
        $this->_pointer = $this->_start;

        return $item;
    }

    public function push(Element $element)
    {
        if($this->_start === null) {
            $this->_start = $element;
            $this->_end = $element;
            $this->_pointer = $element;

            return;
        }

        $this->_end->setNext($element);
        $element->setPrevious($this->end);
        $this->_end = $element;
        $this->_pointer = $element;
    }

    public function pop()
    {
        $item = $this->_end();
        $this->_end =  $this->_end->getPrevious();
        $this->_end->setNext(null);
        $this->_pointer = $this->_start;

        return $item;
    }

    public function nextItem()
    {
        if ($pointer =  $this->_pointer->getNext()) {
            $this->_pointer = $pointer;
        }

        return $this->_pointer;
    }

    public function prevItem()
    {
        if ($pointer =  $this->_pointer->getPrevious()) {
            $this->_pointer =  $pointer;
        }

        return $pointer;
    }
}

class node
{
    private $_prev;

    private $_next;

    private $_data;

    public function __construct($data)
    {
        $this->setData($data);
    }

    public function setPrevious($item)
    {
        $this->_prev = $item;
    }

    public function getPrevious()
    {
        return $this->_prev;
    }

    public function setNext($item)
    {
        $this->_next = $item;
    }

    public function getNext()
    {
        return $this->_next;
    }

    public function setData($data)
    {
        $this->_data = $data;
    }

    public function getData()
    {
        return $this->_data;
    }
}