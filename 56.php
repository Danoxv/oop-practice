<?php

class Date
{
    public function __construct($date = null)
    {
        // если дата не передана - пусть берется текущая
    }

    public function getDay()
    {
        // возвращает день
    }

    public function getMonth($lang = null)
    {
        // возвращает месяц

        // переменная $lang может принимать значение ru или en
        // если эта не пуста - пусть месяц будет словом на заданном языке
    }

    public function getYear()
    {
        // возвращает год
    }

    public function getWeekDay($lang = null)
    {
        // возвращает день недели

        // переменная $lang может принимать значение ru или en
        // если эта не пуста - пусть месяц будет словом на заданном языке
    }

    public function addDay($value)
    {
        // добавляет значение $value к дню
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

    public function __toString()
    {
        // выведет дату в формате 'год-месяц-день'
    }
}


$date = new Date('2025-12-31');

echo $date->getYear();  // выведет '2025'
echo $date->getMonth(); // выведет '12'
echo $date->getDay();   // выведет '31'

echo $date->getWeekDay();     // выведет '3'
echo $date->getWeekDay('ru'); // выведет 'среда'
echo $date->getWeekDay('en'); // выведет 'wednesday'

echo (new Date('2025-12-31'))->addYear(1); // '2026-12-31'
echo (new Date('2025-12-31'))->addDay(1);  // '2026-01-01'

echo (new Date('2025-12-31'))->subDay(3)->addYear(1); // '2026-12-28'
