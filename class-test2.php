<?php
//class-test2.php
$people[] = new Person('Neak','Rattana',1000000);
$people[] = new Person('Neak','Panhapech',5000000);
$people[] = new Person('Neak','Sothearen',1000000);
setlocale(LC_MONETARY, 'en_US');
/*
echo '<pre>';
var_dump($people);
echo '</pre>';
*/

$PaySum = 0;
$NumberPeople = 0;
$AveragePay = 0;


foreach($people as $person){
    //echo $person->FirstName;
    echo "<p>This person is named {$person->FirstName} {$person->LastName} and their pay is {$person->Pay}</p>";
    
    $PaySum += $person->Pay;
    
    
}
$NumberPeople = count($people);
$AveragePay = $PaySum / $NumberPeople;
//%n is the local formating and %i is internal.
$PaySum = money_format('%i', $PaySum);
$AveragePay = money_format('%i',$AveragePay);
echo "<p>The total pay is $PaySum.</p>
<p> The number of people is $NumberPeople</p>";
echo "<p>The average pay is $AveragePay</p>";

class Person{
    
    public $LastName = '';
    public $FirstName = '';
    public $Pay = 0;
    
    public function __construct($LastName,$FirstName,$Pay)
    {
        $this->LastName = $LastName;
        $this->FirstName = $FirstName;
        $this->Pay = $Pay;
        
        
    }//end Person constructor()
        
}//end Person class