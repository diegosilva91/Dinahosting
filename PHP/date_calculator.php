<?php 
class DateCalculator{
    private $date;
    public $total_days;
    public $date_strtotime;
    public $days;
    public $month;
    public $years;
    public function __construct($date_to_evaluate){
        $this->date=$date_to_evaluate;
        $this->strtotime();
    }
    private function strtotime(){
        $this->date_strtotime=strtotime($this->date);
    }
    public function sendTotalDays(){
        $this->total_days=cal_days_in_month(CAL_GREGORIAN, (int)$this->sendDays(), (int)$this->sendYear());
        return $this->total_days;
    }
    public function sendDays(){
        $this->days=date("d",$this->date_strtotime);
        return $this->days;
    }
    public function sendMonth(){
        $this->month=date("m",$this->date_strtotime);
        return $this->month;
    }
    public function sendYear(){
        $this->years=date("Y",$this->date_strtotime);
        return $this->years;
    }
}
