<?php
namespace Tutoriel\PHP;

class Livre {

    public $titre;
    public $auteur;

    public function __construct($titre, $auteur) {
        $this->titre = $titre;
        $this->auteur = $auteur;
    }
}

$l = new \Tutoriel\PHP\Livre('Mon titre', 'Mon auteur'); // Attention à na pas oublier le premier backslash

// Equivalent à : $l = new Livre('Mon titre', 'Mon auteur');
var_dump($l);

echo __NAMESPACE__.' > '.get_class($l)  ;

// ICI une erreur sera générée, Si on met le backslash alors on doit ajouter le namespace déclaré
$l = new \Livre('Mon titre', 'Mon auteur');

?>