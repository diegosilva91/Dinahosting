<?php 
require_once(__ROOT__.'\dates_valid.php');
require_once(__ROOT__.'\date_calculator.php');
class DateProperties extends DateCalculator{
    use DatesValid;
    private $date;
    private $today;
    private $time_stamp_date;
    public function __construct($date_to_evaluate){
        $this->date= $date_to_evaluate;
        $this->today= date('Y-m-d H:i:s');
        parent::__construct($date_to_evaluate);
    }

    public function time_stamp_date_ini(){
        if(DatesValid::validate_date($this->date)){
            $this->time_stamp_date=$this->date_strtotime;
        }
        else{
            $this->read(
                $this->sendYear(),
                 $this->sendMonth(),
                 $this->sendDays()
            );
            $this->date=DatesValid::ReturnvalidateDate();
            $this->time_stamp_date=$this->date;
        }
        return $this->time_stamp_date;
    }
  
    public function time_stamp_date_today(){
        return strtotime($this->today);
    }
    public function time_stamp_days_end(){
        return  strtotime($this->sendYear()."/".
        $this->sendMonth()."/".$this->sendTotalDays()." 23:59:59");
    }
    
    public function time_stamp_year_end(){
        return  strtotime($this->sendYear()."/12/31 23:59:59");
    }
}