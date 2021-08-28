<?php
 require_once 'Input.php';
require_once '73.php';
class Hidden extends Input {
    public function __construct()
    {
        $this->setAttr('type', 'hidden');
        parent::__construct();
    }
}

$form = (new Form)->setAttrs(['action' => 'test.php', 'method' => 'GET']);

echo $form->open();
echo (new Hidden)->setAttr('name', 'id')->setAttr('value', '123');
echo (new Input)->setAttr('name', 'year');
echo new Submit;

echo $form->close();