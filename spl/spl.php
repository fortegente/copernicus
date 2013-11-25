<?php
ini_set('display_errors', 1);
class SplLinkedList
{
    private $_splObject;

    public function __construct()
    {
        session_start();
        $this->_init();
    }

    private function _init()
    {
        $this->_initSplObject();
        if (isset($_SESSION['current_element'])) {
            $this->initCurrentElement($_SESSION['current_element']);
        }

        $this->_initAction();
    }

    private function _initSplObject()
    {
        $this->_splObject = new SplDoublyLinkedList();
        $this->_splObject->setIteratorMode(SplDoublyLinkedList::IT_MODE_FIFO);
        $this->rewindList();
        if (isset($_SESSION['spl'])) {
            $this->getSplObject()->unserialize($_SESSION['spl']);
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
            case 'append' :
                $this->pushElement();
                break;
            case 'prev':
                $this->previousElement();
                $this->setCurrent($this->getCurrentElement());
                break;
            case 'next' :
                $this->nextElement();
                $this->setCurrent($this->getCurrentElement());
                break;
            case 'removeFirst':
                $this->shiftElement();
                break;
            case 'removeLast' :
                $this->popElement();
                break;
        }
    }

    public function initCurrentElement($currentElValue)
    {
        $found = false;
        $this->getSplObject()->setIteratorMode(SplDoublyLinkedList::IT_MODE_KEEP);
        $this->rewindList();

        while ($value = $this->getCurrentElement()) {
            if ($value == $currentElValue) {
                $found = true;
                break;
            }

            $this->nextElement();
        }

        $this->setCurrent($found ? $currentElValue : null);
    }

    public function setCurrent($current = null)
    {
        if (!is_null($current)) {
            $current = $current;
        } else {
            $this->rewindList();
            $current = $this->getCurrentElement();
            echo "<h1>Pointer have been reset!</h1>";
        }

        $_SESSION['current_element'] = $current;
    }

    public function shiftElement()
    {
        if (!$this->isObjectEmpty()) {
            $this->getSplObject()->shift();
        }

        $this->resetList();
    }

    public function popElement()
    {
        if (!$this->isObjectEmpty()) {
            $this->getSplObject()->pop();
        }

        $this->resetList();
    }

    public function __destruct()
    {
        $_SESSION['spl'] = $this->getSplObject()->serialize();
    }

    public function isObjectEmpty()
    {
        return $this->getSplObject()->isEmpty();
    }

    public function nextElement()
    {
        $this->getSplObject()->next();
    }

    public function previousElement()
    {
        $this->getSplObject()->prev();
    }

    public function unshiftElement()
    {
        $this->getSplObject()->unshift(rand(1, 500));
    }

    public function pushElement()
    {
        $this->getSplObject()->push(rand(1, 500));
    }

    public function getCurrentElement()
    {
        return $this->getSplObject()->current();
    }

    public function resetList()
    {
        $this->rewindList();
        $this->setCurrent($this->getCurrentElement());
    }

    public function rewindList()
    {
        return $this->getSplObject()->rewind();
    }
}