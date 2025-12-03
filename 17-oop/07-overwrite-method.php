<?php
$title    = '07-Overwrite-method';
$description = 'Redefining a parent classes method in the child class.';

include_once 'template/header.php';
echo "<section>";

class VideoGame {
    protected $name;
    protected $platform;

    public function __construct($name, $platform){
        $this->name = $name;
        $this->platform = $platform;
    }
    public function showVideoGme(){
        echo "<ul><li> Platform: {$this->platform} </li></ul>";
    }
}
class game extends VideoGame {
    public function showVideoGme(){
        echo "<ul><li> Name: {$this->name} </li></ul>";
        parent::showVideoGme();
    }
}

$g = new game('Hollow knigt: Slik Song', 'Ninetndo Switch');
$g->showVideoGme();

$g = new game('Call of duty: 7', 'PlayStation5');
$g->showVideoGme();



include_once 'template/footer.php';
