<?php

abstract class Document {

    const NUMERO = true;

    public $x;
    // Force Extending class to define this method
    abstract public function datePublication();

    // Common method
    public function commonMethod() {
        echo "Hello World \n";
    }

    // Cannot be extended
    final function definitive(){
        echo "cette méthode est définie au niveau de la classe mère";
    }

}

class Livre extends Document {

    public $auteur;
    public $titre;
    public $pages;
    public $editeur;
    public $traduction = [];
    public $datePublication;

    public function estTraduit($langue) {
        return in_array($langue, $traductions);
    }

    public function datePublication() {
        return $this->datePublication;
    }

}

class Revue extends Document {

    public $titre;
    public $numeros = [];

    public function datePublication() {
        // Il faudrait un test d'existence du numéro 0
        return $this->numeros[0]->datePublication;
    }

}

final class Numero {

    public $numero;
    public $datePublication;

    public function datePublication() {
        return $this->datePublication;
    }


}

$livre = new Livre;
$revue = new Revue;


var_dump($livre);
$livre->commonMethod();
$livre->definitive();
var_dump($revue);

?>