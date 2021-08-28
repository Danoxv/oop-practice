<?php

require_once '59.php';
require_once '71.php';
require_once '75.php';

class Checkbox extends Tag
{
    public function __construct()
    {
        $this->setAttr('type', 'checkbox');
        $this->setAttr('value', '1');
        parent::__construct('input');
    }

    public function open()
    {
        $name = $this->getAttr('name');

        if ($name) {
            $hidden = (new Hidden)->setAttr('name', $name)->setAttr('value', '0');

            if (isset($_REQUEST[$name])) {
                $value = $_REQUEST[$name];

                if ($value == 1) {
                    $this->setAttr('checked');
                } else {
                    $this->removeAttr('checked');
                }
            }

            return $hidden->open() . parent::open();
        } else {
            return parent::open();
        }
    }

    public function __toString()
    {
        return $this->open();
    }
}

class Radio extends Checkbox
{
    public function __construct()
    {
        parent::__construct('checkbox');
    }

}

$form = (new Form)->setAttrs(['action' => '', 'method' => 'GET']);

echo $form->open();
echo (new Checkbox)->setAttr('name', 'checkbox');
echo (new Radio)->setAttr('name', 'checkbox');
echo (new Input)->setAttr('name', 'user');
echo new Submit;
echo $form->close();