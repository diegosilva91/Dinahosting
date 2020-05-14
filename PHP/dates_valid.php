<?php 
Trait DatesValid{
    private $year_valid;
    private $month_valid;
    private $day_valid;
    public function read($year,$month,$day){
        $this->year_valid=$year;
        $this->month_valid=$month;
        $this->day_valid=$day;
        $this->valid();
    }
    private function valid(){
        if($this->year_valid < 0 || $this->year_valid>date("Y")){
            $valideYear=false;
        }
        else{
            $valideYear=true;
        }
        if($this->month_valid < 0 || $this->month_valid>date("m")){
            $valideMonth=false;
        }
        else{
            $valideMonth=true;
        }
        if($this->day_valid < 0 || $this->day_valid>date("d")){
            $valideDay=false;
        }
        else{
            $valideDay=true;
        }
        if (! $valideYear  ||  ! $valideMonth  ||  ! $valideDay )  {
            $this->year_valid =date("Y");
            $this->month_valid =date("m");
            $this->day_valid =date("d");
        }
    }
    static function ReturnvalidateDate(){
        return $this->year_valid.'/'.$this->month_valid.'/'.$this->day_valid;
    }
    static function validate_date($date, $format = 'Y-m-d H:i:s'){
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }

}