<?php
$title    = '06-Extends';
$description = 'Keyword for a class to inherit properties and methods from another.';

include_once 'template/header.php';
echo "<section>";

class Operation {
    protected $num1;
    protected $num2;

    public function __construct($num1, $num2){
        $this->num1 = $num1;
        $this->num2 = $num2;
    }
    
}

class Addition extends Operation{
    public function showResult(){
        $result = $this->num1 + $this->num2;
        return "<ul><li>Sum: {$this->num1} + {$this->num2} = {$result} </li></ul>";
    }
}
class Substract extends Operation{
    public function showResult(){
        $result = $this->num1 - $this->num2;
        return "<ul><li>Subs: {$this->num1} - {$this->num2} = {$result} </li></ul>";
    }
}
class Product extends Operation{
    public function showResult(){
        $result = $this->num1 * $this->num2;
        return "<ul><li>Product: {$this->num1} X {$this->num2} = {$result} </li></ul>";
    }
}

class Division extends Operation{
    public function showResult(){
        $result = $this->num1 / $this->num2;
        return "<ul><li>Product: {$this->num1} / {$this->num2} = {$result} </li></ul>";
    }
}

class Pow extends Operation{
    public function showResult(){
        $result = $this->num1 ** $this->num2;
        return "<ul><li>Product: {$this->num1} ** {$this->num2} = {$result} </li></ul>";
    }
}

$op1 = new Addition(16, 32);
echo $op1->showResult();
$op2 = new Substract(512, 266);
echo $op2->showResult();
$op3 = new Product(16, 8);
echo $op3->showResult();
$op4 = new Division(56, 8);
echo $op4->showResult();
$op5 = new Pow(8, 3);
echo $op5->showResult();


include_once 'template/footer.php';
