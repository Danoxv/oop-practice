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
        return "<$name>";
    }

    // Выводим закрывающую часть тега:
    public function close()
    {
        $name = $this->name;
        return "</$name>";
    }
}

class Img
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function open($path)
    {
        $name = $this->name;
        return "<$name src = \"$path\">";
    }

}

class Header
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function open()
    {
        $name = $this->name;
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

$img = new Img('img');
echo $img->open('ghdfd'); // выведет <div>text</div>

$head = new Header('header');
echo $head->open().$head->close();

