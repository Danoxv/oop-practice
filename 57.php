<?php
require_once '56.php';

class Interval
{
    protected $arr = [];
    private $interval;

    public function __construct(Date $date1, Date $date2)
    {
        $this->interval = date_diff($date1->getDateTime(), $date2->getDateTime());
    }

    public function toDays(): string
    {

        return $this->interval->format('%a');
    }

    public function toMonths()
    {
        return $this->interval->format('%m');
    }

    public function toYears(): string
    {
        return $this->interval->format('%y');
    }

    public function __toString()
    {
        return serialize(['years' => $this->toYears(), 'months' => $this->toMonths(), 'days' => $this->toDays()]);
    }

}

$date1 = new Date('2025-12-31');
$date2 = new Date('2026-11-28');

$interval = new Interval($date1, $date2);
echo $interval->toDays();   // выведет разницу в днях
echo $interval->toMonths(); // выведет разницу в месяцах
echo $interval->toYears();  // выведет разницу в годах

echo $interval; // массив вида ['years' => '', 'months' => '', 'days' => '']
?>