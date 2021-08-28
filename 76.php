<?php

require_once 'Input.php';
require_once '71.php';
require_once '73.php';

class Textarea extends Tag
{
    public function __construct()
    {
        parent::__construct('textarea');
    }

    public function show()
    {
        $nameattr = $this->getAttr('name');
        if ($nameattr) {
        if (isset($_REQUEST[$nameattr])) {
            $value = $_REQUEST[$nameattr];
            $this->setText($value);
        }
        return parent::show();
    }
    }

    public function __toString(): string
    {
        return $this->show();
    }
}
$form = (new Form)->setAttrs(['action' => '', 'method' => 'GET']);

echo $form->open();
//echo (new Input)->setAttr('name', 'user');
echo (new Textarea)->setAttr('name', 'message')->show();
echo new Submit;
echo $form->close();