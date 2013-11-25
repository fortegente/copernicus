<?php
ini_set('display_errors', 1);
class Stack
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
        $this->_splObject->setIteratorMode(SplDoublyLinkedList::IT_MODE_LIFO);
        if (isset($_SESSION['stack'])) {
            $this->getSplObject()->unserialize($_SESSION['stack']);
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
            case 'append' :
                $this->pushElement();
                break;
            case 'removeLast' :
                $this->popElement();
                break;
        }
    }

    public function setPointer()
    {
        if (!$this->isObjectEmpty()) {
            $current = $this->getSplObject()->top();
            $this->_pointer = $current;
        }
    }

    public function getPointer()
    {
        return $this->_pointer;
    }

    public function popElement()
    {
        if (!$this->isObjectEmpty()) {
            $lastElement = $this->getSplObject()->pop();
            echo "<h1>getting Element:" . $lastElement . "</h1>";
        }

        $this->setPointer();
    }

    public function __destruct()
    {
        $_SESSION['stack'] = $this->getSplObject()->serialize();
    }

    public function isObjectEmpty()
    {
        return $this->getSplObject()->isEmpty();
    }

    public function pushElement()
    {
        $this->getSplObject()->push(rand(1, 500));
        $this->setPointer();
    }
}