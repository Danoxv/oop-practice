<?php
require_once '59.php';

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

class ListItem extends Tag
{
    public function __construct()
    {
        // Вызываем конструктор родителя, передав в качестви имени 'li':
        parent::__construct('li');
    }
}

class HtmlList extends Tag
{
    protected  array $items = [];

    public function addItem(ListItem $li): static
    {
        $this->items[] = $li;
        return $this;
    }

    /**
     * @return string
     */
    public function show(): string
    {
        $result = $this->open() . ' 
        ';

        foreach ($this->items as $item) {
            $result .= $item->show() . ' 
        ';
        }

        $result .= $this->close() . ' 
        ';

        return $result;
    }

    public function __toString(): string
    {
        return $this->show();
    }
}

class Ul extends HtmlList
{
    public function __construct()
    {
        parent::__construct('ul');
    }

}

class Ol extends HtmlList
{
    public function __construct()
    {
        parent::__construct('ol');
    }

}

//$list = new HtmlList('ol');
//echo $list->addItem((new ListItem())->setText('item1'))->addItem((new ListItem())->setText('item2'))->addItem((new ListItem())->setText('item3'));$list = new HtmlList('ol');

$list1 = new Ul();
echo $list1->addItem((new ListItem())->setText('item1'))->addItem((new ListItem())->setText('item2'))->addItem((new ListItem())->setText('item3'));

