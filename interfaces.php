<?php

class User implements UserInterface {

    public $id;
    public $password;

    public function login($id, $password) {

    }

}

interface UserInterface {

    const APP_USER = true;

    public function login($id, $password);

}

class Emprunt {

    public $nombreEmpruntes;
    public $dateEmprunt;

}

interface EmpruntInterface {

    public function aEmprunte($id);

}

interface EmpruntVideoInterface extends EmpruntInterface{

}

class Personne implements UserInterface, EmpruntInterface {

    public $nom;
    public $prenom;

    public $id;
    public $password;

    public $nombreEmpruntes;
    public $dateEmprunt;

    public function hello() {

        return "Hello " . $this->prenom;

    }

    // Méthodes à implémenter provenant des interfaces

    public function login($id, $password) {}

    public function aEmprunte($id) {}

}

$p = new Personne();
var_dump($p);

?>