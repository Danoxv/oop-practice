<?php

require_once '59.php';

class Select extends Tag
{
    public function __construct()
    {
        // $this->setAttr('name', 'list');
        parent::__construct('select');
    }

}

class Option extends Tag
{
    public function __construct()
    {
        parent::__construct('option');
    }

    public function addOpt($className)
    {
     return  ;
    }
}

echo (new Select)
//    ->add( (new Option())->setText('item1') )
//    ->add( (new Option())->setText('item2')->setSelected() )
//    ->add( (new Option())->setText('item3') )
    ->show();