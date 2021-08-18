<?php

class Date
{

    private DateTime $date;

    public function __construct(string $date)
    {
        if ($date == null) {
            $this->date = new DateTime();
        } else {
            $this->date = DateTime::createFromFormat('Y-m-d', $date);
        }
    }

    public function getDay(): string
    {
        return $this->date->format('d');//string
    }

    public function getMonth(/*string $lang*/)
    {
        return $this->date->format(' m ');
//       if (!empty($lang === 'ru')) {
//            //TODO make mode rus layout
//           $date = DateTime::createFromFormat('Y-m-d', $this->date);
//           return $date->format('F');

//        /* } elseif (!empty($lang === 'en')) {*/
//        $date = DateTime::createFromFormat('Y-m-d', $this->date);
//        return $date->format(' m ');//string
//        // }

    }

    public function getYear(): string
    {
        return $this->date->format('Y');
    }

    /**
     * @param null $lang To be implemented
     * @return string
     */
    public function getWeekDay($lang = null): string
    {
        // возвращает день недели
 //       setlocale(LC_ALL, 'ru_RU', 'ru_RU.UTF-8', 'ru', 'russian');
//        if ($lang == 'ru') {
//            return strftime("%A", $this->date->getTimestamp());
//        } elseif ($lang == 'en') {
//            return $this->date->format('N');
//        } elseif (empty($lang)) {
            return $this->date->format('N');

        //}
    }

    function addDay(int $value): static
    {
        $this->date->add(new DateInterval("P{$value}D"));
        return $this;
    }

    public
    function subDay($value): static
    {
        $this->date->sub(new DateInterval("P{$value}D"));
        return $this;
    }

    public
    function addMonth($value): static
    {
        $this->date->add(new DateInterval("P{$value}M"));
        return $this;
    }

    public
    function subMonth($value): static
    {
        $this->date->sub(new DateInterval("P{$value}M"));
        return $this;
    }

    public
    function addYear($value): static
    {
        $this->date->add(new DateInterval("P{$value}Y"));
        return $this;
    }

    public
    function subYear($value): static
    {
        $this->date->sub(new DateInterval("P{$value}Y"));
        return $this;
    }

    public
    function format(string $format): string
    {
        // выведет дату в указанном формате
        // формат пусть будет такой же, как в функции date
        return $this->date->format($format);

    }

    public
    function __toString()
    {
        return $this->format('Y-m-d');
    }
}

//2025-12-31
// проверенно на нынешней дате
$date = new Date('2025-10-11');

// готовый блок
//echo $date->getYear();  // выведет '2025'
//echo $date->getMonth('ru'); // выведет '12'
//echo $date->getDay();   // выведет '31'
//echo $date->getWeekDay();     // выведет '3'

//echo $date->format('Y-m-d');
//echo $date->addDay(5);
//echo $date->getWeekDay('ru'); // выведет 'среда'
//echo $date->getWeekDay('en'); // выведет 'wednesday'
//
//echo (new Date('2025-12-31'))->addYear(1); // '2026-12-31'
//echo (new Date('2025-12-31'))->addDay(1);  // '2026-01-01'
//
echo (new Date('2025-12-31'))->subDay(3)->addYear(1); // '2026-12-28'
