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
    public function __construct($name)
    {
        $this->name = $name;
        //$this->attrs = $attrs;
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
     * @param $atr
     * @param $value
     * @return $this
     */
    public function setAttr(string $atr,string|bool $value = true): static
    {
        $this->attrs[$atr] = $value;
        return $this;
    }

    /**
     * @param $attrs
     * @return $this
     */
    public function setAttrs(array $attrs): static
    {
        foreach ($attrs as $name => $value) {
            $this->setAttr($name, $value);
        }
        return $this;
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
                if ($value === true) {
                    $result .= " $atr"; // это атрибут без значения
                } else {
                    $result .= " $atr=\"$value\""; // это атрибут со значением
                }
            }

            return $result;
        } else {
            return '';
        }
    }

    /**
     * @return Tag
     * task 61
     * Реализуйте метод removeAttr, который будет удалять переданный параметром атрибут.
     * Сделайте так, чтобы этот метод также мог принимать участие в цепочке.
     *
     */
    public function removeAttr($val): static
    {
        foreach ($val as $key => $item) {
            unset($this->attrs[$key]);
        }
        return $this;
    }
}

//$tag = new Tag('div');
//echo $tag->open() . 'text' . $tag->close(); // выведет <div>text</div>

//$img = new Tag('img', ['src' => '/kdmfkmfdks']);
//echo $img->open(); // выведет <img src = "/path">

//$head = new Tag('header');
//echo $head->open() . 'header сайта' . $head->close();

//$tag = new Tag('img');
//echo $tag->setAttrs(['src ' => '/path', 'alt ' => 'альтернативный текст'])->open(); // откроем тег
