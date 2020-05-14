<?php
require_once(__ROOT__.'\dates_properties.php');
require_once(__ROOT__.'\fibonaci_calculator.php');
interface Now
{
    public function diff_time_stamp();    
    public function diff_time_stamp_month();    
    public function diff_time_stamp_days();
}
class CalculatorDiffTimeStamp extends DateProperties implements Now{
    use FibonaciCalculator;
    public function __construct($date_to_evaluate){
        parent::__construct($date_to_evaluate);
    }
    
    public function diff_time_stamp(){        
        echo "Serie Fibonacci entre timestamp del inicio y fin entre dos fechas:[";
        $this->print_fib($this->time_stamp_date_ini(),$this->time_stamp_date_today());
    }
    public function diff_time_stamp_month(){
        echo "Serie Fibonacci entre timestamp del inicio y fin del año actual:[";
        $this->print_fib($this->time_stamp_date_ini(),$this->time_stamp_year_end());
    }
    public function diff_time_stamp_days(){
        echo "Serie Fibonacci entre timestamp del inicio y fin del mes actual:[";
        $this->print_fib($this->time_stamp_date_ini(),$this->time_stamp_days_end());
    }
}
