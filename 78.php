<?php

require_once '59.php';

class Select extends Tag
{
    public $options = [];

    public function __construct()
    {
        parent::__construct('select');
    }

    public function add($op)
    {
        $this->options[] = $op;
        return $this;
    }

    public function show()
    {
        $result = $this->open(); // открывающий тег

        foreach ($this->options as $option) {
            $result .= $option->show();
        }
            $result .= $this->close(); // закрывающий тег
            return $result;
    }
}

class Option extends Tag
{
    public function __construct()
    {
        parent::__construct('option');
    }
}

echo (new Select)
    ->add((new Option())->setText('item1'))
    ->add((new Option())->setText('item2'))
    ->add((new Option())->setText('item3'))
    ->show();