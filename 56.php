<?php

class Date
{
    private $date;

    public function __construct($date)
    {
        // если дата не передана - пусть берется текущая
        if ($date == null) {
            $this->date = date("Ymd");
        }
        $this->date = $date;

    }

    public function getDay()
    {
        // возвращает день
        $date = DateTime::createFromFormat('Y-m-d', $this->date);
        $date->format('d');//string
    }

    public function getMonth(/*string $lang*/)
    {
        // возвращает месяц
        $date = DateTime::createFromFormat('Y-m-d', $this->date);
        return $date->format(' m ');
        // переменная $lang может принимать значение ru или en
        // если эта не пуста - пусть месяц будет словом на заданном языке

//       if (!empty($lang === 'ru')) {
//            //TODO make mode rus layout
//           $date = DateTime::createFromFormat('Y-m-d', $this->date);
//           return $date->format('F');

//        /* } elseif (!empty($lang === 'en')) {*/
//        $date = DateTime::createFromFormat('Y-m-d', $this->date);
//        return $date->format(' m ');//string
//        // }

    }

    public function getYear()
    {
        $date = DateTime::createFromFormat('Y-m-d', $this->date);
        return $date->format('Y');
    }

    public function getWeekDay(/*$lang = null*/)
    {
        // возвращает день недели
        $date = DateTime::createFromFormat('Y-m-d', $this->date);
        return $date->format(' W ');
        // переменная $lang может принимать значение ru или en
        // если эта не пуста - пусть месяц будет словом на заданном языке
    }

    function addDay(int $value)
    {
        // $interval = new DateInterval("P$valueD");
        $date = DateTime::createFromFormat('Y-m-d', $this->date);
        $date->add(new DateInterval("P{$value}D"));
         $this->date = $date->format('Y-m-d');
        return $this;
    } 

    public function subDay($value)
    {
        // отнимает значение $value от дня
    }

    public function addMonth($value)
    {
        // добавляет значение $value к месяцу
    }

    public function subMonth($value)
    {
        // отнимает значение $value от месяца
    }

    public function addYear($value)
    {
        // добавляет значение $value к году
    }

    public function subYear($value)
    {
        // отнимает значение $value от года
    }

    public function format($format)
    {
        // выведет дату в указанном формате
        // формат пусть будет такой же, как в функции date
    }

//    public function __toString()
//    {
//        // выведет дату в формате 'год-месяц-день'
//    }
}

//2025-12-31
// проверенно на нынешней дате
$date = new Date('2025-12-21');

//echo $date->getYear();  // выведет '2025'
//echo $date->getMonth('ru'); // выведет '12'
//echo $date->getDay();   // выведет '31'
////
//echo $date->getWeekDay();     // выведет '3'

echo $date->addDay(5);
//echo $date->getWeekDay('ru'); // выведет 'среда'
//echo $date->getWeekDay('en'); // выведет 'wednesday'
//
//echo (new Date('2025-12-31'))->addYear(1); // '2026-12-31'
//echo (new Date('2025-12-31'))->addDay(1);  // '2026-01-01'
//
//echo (new Date('2025-12-31'))->subDay(3)->addYear(1); // '2026-12-28'
