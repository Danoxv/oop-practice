<?php
require_once '59.php';
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

class Link extends Tag
{
    public function __construct()
    {
        parent::__construct('a');
        $this->setAttr('href', '');
    }

    public function open()
    {
        $this->activateSelf(); // вызываем активацию
        return parent::open(); // вызываем метод родителя
    }

    private function activateSelf()
    {
        if ($this->getAttr('href') == $_SERVER['REQUEST_URI']) {
            $this->addClass('active');
        }
    }

//    public function __toString(): string
//    {
//        return parent::show();
//    }
}

