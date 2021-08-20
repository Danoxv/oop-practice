<?php

class Tag
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function open()
    {

        $name = $this->name;
        if ($name == 'img'){
            return "<$name src = \"path\">";
        }
        return "<$name>";
    }

    // Выводим закрывающую часть тега:
    public function close()
    {
        $name = $this->name;
        return "</$name>";
    }
}

$tag = new Tag('div');
echo $tag->open() . 'text' . $tag->close(); // выведет <div>text</div>

$img = new Tag('img');
echo $img->open('img'); // выведет <img src = "path">

$head = new Tag('header');
echo $head->open().'header сайта'.$head->close();

