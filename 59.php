<?php

class Tag
{
    private $name;

    private $attrs;

    public function __construct($name,$attrs)
    {
        $this->name = $name;
        $this->attrs = $attrs;
    }

    public function open()
    {

        $name = $this->name;
        $attrsStr = $this->getAttrsStr($this->attrs);
        return "<$name$attrsStr>";
    }

    // Выводим закрывающую часть тега:
    public function close()
    {
        $name = $this->name;
        return "</$name>";
    }
    private function getAttrsStr(array $attrs)
    {
        if (!empty($attrs)) {
            $result = '';

            foreach ($attrs as $atr => $value) {
                $result .= " $atr=\"$value\"";
            }

            return $result;
        } else {
            return '';
        }
    }

}

//$tag = new Tag('div');
//echo $tag->open() . 'text' . $tag->close(); // выведет <div>text</div>

$img = new Tag('img',['src'=>'/kdmfkmfdks']);
echo $img->open(); // выведет <img src = "/path">

//$head = new Tag('header');
//echo $head->open() . 'header сайта' . $head->close();

