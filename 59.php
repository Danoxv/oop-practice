<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

// урок 65
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
    public function setAttr(string $atr, string|bool $value = true): static
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
    public function removeAttr(string $val): static
    {
        unset($this->attrs[$val]);
        return $this;
    }

    public function removeAttrs(array $array): static
    {
        foreach ($array as $item) { // $array  key 0 1 value ['class', 'disabled']
            unset($this->attrs[$item]);
        }
        return $this;
    }

    /**
     * @param $className
     * @return $this
     */
    public function addClass($className): static
    {
        if (isset($this->attrs['class'])) {
            $classNames = explode(" ", $this->attrs['class']);

            if (!in_array($className, $classNames)) {
                $classNames[] = $className;
                $this->attrs['class'] = implode(' ', $classNames);
            }
        } else {
            $this->attrs['class'] = $className;
        }
        return $this;
    }

    /**
     * @param string $elem
     * @param array $arr
     * @return array
     */
    private function removeElem(string $elem, array $arr): array
    {
        $key = array_search($elem, $arr); // находим ключ элемента по его тек

        array_splice($arr, $key, 1); // удаляем элемент

        return $arr; // возвращаем измененный массив
    }

    /**
     * @param string $className
     * @return $this
     */
    public function removeClass(string $className): static
    {
        if (isset($this->attrs['class'])) {
            $classNames = explode(' ', $this->attrs['class']);
            if (in_array($className, $classNames)) {

                $classNames = $this->removeElem($className, $classNames);
                $this->attrs['class'] = implode(' ', $classNames);
            }
        }
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->attrs['text'];
    }

    /**
     * @param string|null $value
     * @return mixed|string
     */
    public function getAttr(string $value = null)
    {
        if (isset($this->attrs[$value])) {
            return $this->attrs[$value];
        } else {
            return 'введите корректный вариант';
        }
    }

    /**
     * @return array
     */
    public function getAttrs(): array
    {
        return array_keys($this->attrs);
    }

}

//$tag = new Tag('input');
//echo $tag->open() . 'text' . $tag->close(); // выведет <div>text</div>

//$img = new Tag('img', ['src' => '/kdmfkmfdks']);
//echo $img->open(); // выведет <img src = "/path">

//$head = new Tag('header');
//echo $head->open() . 'header сайта' . $head->close();

//$tag = new Tag('img');
//echo $tag->setAttrs(['src ' => '/path', 'alt ' => 'альтернативный текст'])->open(); // откроем тег

//echo (new Tag('input'))->setAttr('name', 'name1')->open();
//echo (new Tag('input'))->setAttr('name', 'name2')->open();

//echo $tag->setAttrs(['id' => 'idываыва', 'name' => 'nameываыва', 'class' => 'classываыва', 'disabled' => 'disabledывавы'])->removeAttrs(['disabled'])->open();

//echo (new Tag('input'))->setAttr('id', 'test')->setAttr('class', 'eee bbb')->open();

// Выведет <input class="eee bbb">
// Выведет <input class="eee bbb kkk">:
//echo (new Tag('input'))
//    ->setAttr('class', 'eee bbb')
//    ->addClass('kkk')->open();

//echo (new Tag('input'))
//    ->setAttr('class', 'eee zzz kkk') // добавим 3 класса
//    ->setAttr('text', 'eee1111111') // добавим 3 класса
//    ->removeClass('eee') // удалим класс 'zzz'
//    ->open(); // выведет <input class="eee kkk">
echo (new Tag('input'))->setAttr('class', 'eee zzz kkk')->setAttr('text', 'eee1111111')->getAttr('tett');