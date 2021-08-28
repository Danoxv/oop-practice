<?php

require_once '59.php';
require_once '71.php';

class Input extends Tag
{
    public function __construct()
    {
        parent::__construct('input');
    }

    public function open()
    {
        $inputName = $this->getAttr('name');
        if ($inputName) {
            if (isset($_REQUEST[$inputName])) {
                $value = $_REQUEST[$inputName];
                $this->setAttr('value', $value);
            }
        }

        return parent::open();
    }

    public function __toString()
    {
        return parent::open();
    }
}

//$form = (new Form)->setAttrs(['action' => '', 'method' => 'GET']);
//
//$input = new Input();
//echo $form->open();
//
//echo (new Input)->setAttr('name', 'year')->setAttr('value', date('Y'));
//
//echo (new Input)->setAttr('name', 'year1')->setAttr('value', date('Y'));
//
//echo (new Input)->setAttr('name', 'year2')->setAttr('value', date('Y'));
//
//echo (new Input)->setAttr('name', 'year3')->setAttr('value', date('Y'));
//
//echo (new Input)->setAttr('name', 'year4')->setAttr('value', date('Y'));
//
//echo (new Input)->setAttr('type', 'submit');
//
//echo $form->close();

