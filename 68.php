<?php
require_once '59.php';

class Image extends Tag
{
    public function __construct()
    {
        $this->setAttr('src', '')->setAttr('alt', '');
        parent::__construct('img');
    }

    public function __toString(): string
    {
       return parent::open();
    }

}

//echo (new Image())->setAttr('src', '427cc350eb2d790bc70b40422bcb3989.jpg')->setAttr('width ', '300')->setAttr('height ', '200');