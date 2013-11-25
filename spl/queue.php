<?php
ini_set('display_errors', 1);
class Queue
{
    private $_splObject;

    private $_pointer;

    public function __construct()
    {
        session_start();
        $this->_init();
    }

    private function _init()
    {
        $this->_initSplObject();
        $this->setPointer();
        $this->_initAction();
    }

    private function _initSplObject()
    {
        $this->_splObject = new SplDoublyLinkedList();
        //$this->_splObject->setIteratorMode(SplDoublyLinkedList::IT_MODE_LIFO);
        if (isset($_SESSION['queue'])) {
            $this->getSplObject()->unserialize($_SESSION['queue']);
        }
    }

    public function getSplObject()
    {
        return $this->_splObject;
    }

    private function _initAction()
    {
        $action = key($_POST);
        $this->_chooseAction($action);
    }

    private function _chooseAction($method)
    {
        switch ($method) {
            case 'prepend' :
                $this->unshiftElement();
                break;
            case 'removeFirst' :
                $this->shiftElement();
                break;
        }
    }

    public function setPointer()
    {
        if (!$this->isObjectEmpty()) {
            $current = $this->getSplObject()->bottom();
            $this->_pointer = $current;
        }
    }

    public function getPointer()
    {
        return $this->_pointer;
    }

    public function shiftElement()
    {
        if (!$this->isObjectEmpty()) {
            $lastElement = $this->getSplObject()->shift();
            echo "<h1>getting Element:" . $lastElement . "</h1>";
        }

        $this->setPointer();
    }

    public function __destruct()
    {
        $_SESSION['queue'] = $this->getSplObject()->serialize();
    }

    public function isObjectEmpty()
    {
        return $this->getSplObject()->isEmpty();
    }

    public function unshiftElement()
    {
        $this->getSplObject()->unshift(rand(1, 500));
        $this->setPointer();
    }
}