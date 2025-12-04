<?php 
$title       = '13- Clone Object';
$description = "Creating a new object as a copy of an existing one.";

include_once 'template/header.php';

echo "<section>";

class Dragon {
    private $name;
    private $weight;

    public function __construct($name, $weight) {
        $this->name   = $name;
        $this->weight = $weight;
    }

    public function getInfoDragon() {
        return "<li><ul> Dragon Name: {$this->name} <br>
                     Weight: {$this->weight} kg </li></ul>";
    }
}

$dragon  = new Dragon("Spyro", 3000);
$cloneDragon = clone($dragon); // Clone
echo $cloneDragon->getInfoDragon();

$dragonGOT  = new Dragon("Viserion", 6000);
$cloneDragonGOT = clone($dragon); // Clone
echo $cloneDragon->getInfoDragon();

include_once 'template/footer.php';