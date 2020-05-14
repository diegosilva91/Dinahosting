<?php 
Trait FibonaciCalculator
{
    private function isPerfectSquare($x) 
    { 
        $s = (int)(sqrt($x)); 
        return ($s * $s === $x); 
    } 
      
    
    private function isFibonacci($n) 
    { 
        return $this->isPerfectSquare(5 * $n * $n + 4) ||  
               $this->isPerfectSquare(5 * $n * $n - 4); 
    } 

    private function fib($ini,$n) {
        if($ini==0){
            $fib_array = [0, 1];
            $k=2;
        }
        else{
            $k=0;
            $fib_array=[];
        }
        for ($i = $ini; $i < $n; $i++) {
            if($this->isFibonacci($i)){
                $fib_array[$k] = $i;
                $k++;
            }
            
        }
        return $fib_array;
    }

    function print_fib($ini,$n){
        $fib_array=$this->fib($ini,$n);
        for ($i = 0; $i < count($fib_array); $i++) {
            echo $fib_array[$i].",";
        }
        echo "]\n";

    }

    
}