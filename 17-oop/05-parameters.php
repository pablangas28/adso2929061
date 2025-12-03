<?php
$title    = '05-Parameters';
$description = 'Values passed into a method to customize its operation.';

include_once 'template/header.php';
echo "<section>";

class country {
    public $name;

    public function __contruct($name){
        $this->name = $name;
    }

}
class FifaWorldCup {
    private $country;
    private $year;
    private $winner;

    #country and year are mandatory 
    #winner is optional
    public function __construct($country, $year, $winner= "Brazil"){
        $this->country = $country;
        $this->year = $year;
        $this->winner = $winner;
    }

    public function showEvent(){
        echo"<ul>
                <li>
                    <b>Country: </b>" . $this->country->name . "
                    <b>Year: </b>" . $this->year . "
                    <b>Winner: </b>" . $this->winner . "
                </li>
            </ul>";
    }

}

$country = new Country('Italy');
$worldcup = new FifaWorldCup($country, 1990, 'Germany');
$worldcup->showEvent();

$country = new Country('USA');
$worldcup = new FifaWorldCup($country, 1994);
$worldcup->showEvent();

$country = new Country('France');
$worldcup = new FifaWorldCup($country, 1998, 'France');
$worldcup->showEvent();

$country = new Country('Qtar');
$worldcup = new FifaWorldCup($country, 2022, 'Argentina');
$worldcup->showEvent();








include_once 'template/footer.php';
