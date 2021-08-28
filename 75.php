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
