<?php

namespace electric;

class Pokemon {
    private $name;
    private $color;

    public function __construct($n,$c)
    {
        $this->name = $n;
        $this->color = $c;
    }
    public function getInforPokemon() {
        return "<ul><li>" . $this->name . "|". $this->color . "</li></ul>";
}
}