<?php

require_once '69.php';
//echo (new Link())->setAttr('href','http://code.mu/ru/php/book/oop/class/Link/')->setText('index1');
//echo (new Link())->setAttr('href','http://code.mu/ru/php/book/oop/class/Link/')->setText('index2');
//echo (new Link())->setAttr('href','http://code.mu/ru/php/book/oop/class/Link/')->setText('index3');
//echo (new Link())->setAttr('href','http://code.mu/ru/php/book/oop/class/Link/')->setText('index4');
//echo (new Link())->setAttr('href','http://code.mu/ru/php/book/oop/class/Link/')->setText('index5');

echo (new Link)->setAttr('href', 'http://code.mu/ru/php/book/oop/class/Link')->setText('index')->show();
