<?php

class Tag
{
    /**
     * @var string
     */
    private string $name;
    /**
     * @var array
     */
    private array $attrs;

    /**
     * Tag constructor.
     * @param $name
     * @param $attrs
     */
    public function __construct($name, $attrs)
    {
        $this->name = $name;
        $this->attrs = $attrs;
    }

    /**
     * @return string
     */
    public function open(): string
    {
        $name = $this->name;
        $attrsStr = $this->getAttrsStr($this->attrs);
        return "<$name$attrsStr>";
    }

    /**
     * @return string
     */
    public function close(): string
    {
        $name = $this->name;
        return "</$name>";
    }

    /**
     * @param array $attrs
     * @return string
     */
    private function getAttrsStr(array $attrs): string
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

$img = new Tag('img', ['src' => '/kdmfkmfdks']);
echo $img->open(); // выведет <img src = "/path">

//$head = new Tag('header');
//echo $head->open() . 'header сайта' . $head->close();

