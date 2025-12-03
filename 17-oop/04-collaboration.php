<?php
$title    = '04-Collaboration';
$description = 'Objects working together by calling each others methods.';

include_once 'template/header.php';
echo "<section>";

class Evolve {
    public function evolvePokemon($origin, $evolution){
        echo "<li>$origin ➡️ $evolution</li>";
    }
}

class Pokemon {
    private $origin;
    private $evolution;
    private $colaboration;

    public function __construct($origin, $evolution){
        $this->origin  = $origin;
        $this->evolution = $evolution;
        // collaboration
        $this->colaboration = new Evolve;
    }
    public function nextLevel(){
        $this->colaboration->evolvePokemon($this->origin, $this->evolution);
    }
}

$pokemon1 = new pokemon('Pichu', 'Pikachu');
$pokemon1->nextLevel();
$pokemon1 = new pokemon('Picachu', 'Raichu');
$pokemon1->nextLevel();

$pk2 = new pokemon('squirtle', 'Wartortle');
$pk2->nextLevel();
$pk2 = new pokemon('Wartortle', 'Blastoide');
$pk2->nextLevel();

$pk2 = new pokemon('Bulbasur', 'Ivysaur');
$pk2->nextLevel();
$pk2 = new pokemon('Ivysaur', 'Venusahur');
$pk2->nextLevel();

include_once 'template/footer.php';
