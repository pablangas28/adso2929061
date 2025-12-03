<?php
$title    = '08-overwrite-constuct';
$description = 'Redefining the constructor method in a child class.';

include_once 'template/header.php';
echo "<section>";

class VideoGame {
    protected $name;
    protected $platform;
    protected $year;


    public function __construct($name, $platform){
        $this->name = $name;
        $this->platform = $platform;
    }
}
class game extends VideoGame {
    public function __construct($name, $platform, $year){
        parent:: __construct($name, $platform);
        $this->year = $year;
    }
    public function showVideoGme(){
        echo "<ul><li> Name: {$this->name} <br>
                       Platform: {$this->platform} <br>
                       Year: {$this->year}</li></ul>";
    }
}

$g = new game('Hollow knigt: Slik Song', 'Ninetndo Switch', 2025);
$g->showVideoGme();

$g = new game('Call of duty: 7', 'PlayStation5', 2025);
$g->showVideoGme();

$g = new game('Halo: infinty', 'Xbox Tseries', 2025);
$g->showVideoGme();

$g = new game('Super Mario: Wonder', 'Nintendo Switch', 2023);
$g->showVideoGme();

include_once 'template/footer.php';
