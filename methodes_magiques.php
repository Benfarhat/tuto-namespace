<?php

/*
Les méthodes magiques sont des fonctions préfixées par "__" et qui sont exécutées automatiquement lorsqu'un évènement se produit.

__construct(), __destruct(), __call(), __callStatic(), __get(), __set(), 
__isset(), __unset(), __sleep(), __wakeup(), __toString(), __invoke(), 
__set_state() __clone() et __debugInfo()

*/

namespace Tutoriel\PHP;

class Livre {

    public $titre;
    public $auteur;
    public $pages;
    public $editeur;
    public $traductions = [];
    public $data = [];

    public function __construct() {
        $this->auteur = new \StdClass();
        $this->titre = "A la recherche du temps perdu";
    }

    public function __set($name, $value) {
        echo "Définition de '$name' à la valeur '$value'\n";
        $this->data[$name] = $value;
    }

    public function __get($name)  {
        echo "Récupération de '$name'\n";
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }
        $trace = debug_backtrace();
        trigger_error(
            'Propriété non-définie via __get(): ' . $name . ' dans ' . $trace[0]['file'] .
            ' à la ligne ' . $trace[0]['line'],
            E_USER_NOTICE
        );
        return null;
    }

    /* Depuis PHP 5.1.0 */
    public function __isset($name) {
        echo "Est-ce que '$name' est défini?\n";
        echo isset($this->data[$name]) ? 'Oui' : 'Non';
    }

    public function __unset($name) {
        echo "Effacement de '$name'\n";
       unset($this->data[$name]);
    }

    public function __call($name, $arguments) {
        // Note: la valeur de $name est sensible à la casse.
        return "Appel de la méthode '$name'\n"
       . implode (', ', $arguments) . '\n';
    }
    
    // Depuis PHP 5.3.0
    static function  __callStatic($name, $arguments) {
        // Note: la valeur de $name est sensible à la casse.
        return "Appel de la méthode '$name'\n"
       . implode (', ', $arguments) . '\n';
    }

    public function __sleep() {
        echo "\tserialisation.\n";
       return ['titre', 'traductions'];
    }

    public function __wakeup() {
        echo "\tDéserialisation.\n";
        return "Objet délinéarisé !";
    }

    public function __toString() {
        return get_class($this) . " : " . $this->titre;
    }

    public function __invoke($x) {
        return "invocation avec la valeur : $x";
    }

    public function __clone() {
        // Force la copie de $this->object, sinon
        // il pointe vers le même objet.
        // La fonction clone ne reproduit que les scalaire
        // or auteur est un objet que l'on doit également cloner à part.
        $this->auteur = clone $this->auteur;
    }
}

// Change in the header the default charset to UTF8
header('Content-type: text/plain; charset=utf-8');

$livre = new Livre;
$livre->type = "portfolio"; // appel __set
echo "\n\n";
echo $livre->type; // appel __get
echo "\n\n";
isset($livre->type); // appel __isset
echo "\n\n";
unset($livre->type); // appel __unset
echo "\n\n";
isset($livre->type); // appel __isset
echo "\n\n";
var_dump(serialize($livre)); // appel __sleep
echo "\n\n";
var_dump(unserialize(serialize($livre))); // appel __wakeup (après appel interne de __sleep)
echo "\n\n";
echo $livre; // appel __toString
echo "\n\n";
echo $livre->fonctionPubliqueInexistante('salut'); // appel __call
echo "\n\n";
echo Livre::fonctionStaticInexistante('salut'); // appel __callStatic
echo "\n\n";
echo $livre('paramètres'); // appel __invoke (l'objet est callable)
echo "\n\n";
$clone = clone($livre); // appel __clone
echo "\n\n";
var_dump($clone);
echo "\n\n";

/* Ici pas de clonage mais un alias */
$autre_livre = $livre;
echo "\n\n";
$livre->titre = "Nouveau titre"; // appel __set
echo "\n\n";
echo $autre_livre->titre; // appel __get sur l'alias
echo "\n\n";
echo $clone->titre; // appel __get sur le clone
echo "\n\n";




?>