const dateControl = document.querySelector('input[type="datetime-local"]');
const Respones=document.getElementById('Response');
const dateToday=new Date();
dateToday.setMinutes(dateToday.getMinutes() - dateToday.getTimezoneOffset());
const today=dateToday.toISOString().slice(0,16);
dateControl.value = today;
dateControl.max=today;
var Submit=document.getElementById('Submit');
Submit.addEventListener('click', function(e) {
    e.preventDefault();
    ShowFibonacci(dateControl);
});


function ShowFibonacci(dateIni){
    // console.log(dateIni.value);
    let a=new CalculatorTimeStamp(dateIni.value);
    a.diff_time_stamp();
    a.diff_time_stamp_month();
    a.diff_time_stamp_days();
}

class DateCalculator{
    constructor(date_to_evaluate){
        this.dates=date_to_evaluate;
        this.strtotime();
    }
    strtotime(date_to_convert){
        this.date_strtotime= new Date(date_to_convert);
        return Math.floor(this.date_strtotime.getTime()/1000);
    }
    sendTotalDays(){
        this.total_days=new Date(this.years, this.month, 0).getDate() ;
        return this.total_days;
    }
    sendDays(){
        this.days=this.date_strtotime.getDay();
        return this.days;
    }
    sendMonth(){
        this.month=this.date_strtotime.getMonth();
        return this.month;
    }
    sendYear(){
        this.years=this.date_strtotime.getFullYear();
        return this.years;
    }
}

class DateProperties extends DateCalculator{
    constructor(date_to_evaluate){
        super(date_to_evaluate);

        this.date= date_to_evaluate;
    }
    time_stamp_date_ini(){
        let time_stamp_date=super.strtotime(this.date);
        return time_stamp_date;
    }
  
    time_stamp_date_today(){
        return super.strtotime(today);
    }
    time_stamp_days_end(){
        return  super.strtotime(this.sendYear()+"/"+
        this.sendMonth()+"/"+this.sendTotalDays()+" 23:59:59");
    }
    
    time_stamp_year_end(){
        return  super.strtotime(this.sendYear()+"/12/31 23:59:59");
    }
}

class CalculatorTimeStamp extends DateProperties{
    constructor(date_to_evaluate){
        super(date_to_evaluate);
       
    }
    isPerfectSquare(x) 
    {
        let s = Math.sqrt(x); 
        return (s * s == x); 
    } 
      
    
    isFibonacci(n) 
    { 
        return this.isPerfectSquare(5 * n * n + 4) ||  
               this.isPerfectSquare(5 * n * n - 4); 
    } 
    fibonacci(ini,end) {
        let result = [0, 1];
        let n=0;
        let i=0;
        ini< 3 ? i=2:i = ini;
        ini< 3 ? i=2:result = [];
        for (i; i <= end; i++) {
            if(this.isFibonacci(i)){
                const a = (i - 1);
                const b = (i - 2);
                n++;
                result.push(a + b);
            }
        }
        return result;
    }
    print_fib(ini,end){
        let result=this.fibonacci(ini,end);
        let numbers_fibonacci="[";
        for(let i=0;i<result.length;i++){
            numbers_fibonacci+=", "+result[i];
        }
        numbers_fibonacci+="]";
        console.log(numbers_fibonacci);
        return numbers_fibonacci;
    }
    
    diff_time_stamp(){        
        let message="Serie Fibonacci entre timestamp del inicio y fin entre dos fechas:";
        Respones.innerHTML=`<p>${message}</p><p>${this.print_fib(this.time_stamp_date_ini(),this.time_stamp_date_today())}</p>`;
    }
    diff_time_stamp_month(){
        let message="Serie Fibonacci entre timestamp del inicio y fin del año actual:";
        Respones.innerHTML+=`<p>${message}</p><p>${this.print_fib(this.time_stamp_date_ini(),this.time_stamp_year_end())}</p>`;
    }
    diff_time_stamp_days(){
        let message= "Serie Fibonacci entre timestamp del inicio y fin del mes actual:";
        Respones.innerHTML+=`<p>${message}</p><p>${this.print_fib(this.time_stamp_year_ini(),this.time_stamp_days_end())}</p>`;
    }

}