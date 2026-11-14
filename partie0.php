<?php
class Voiture {
    public $marque;
    public $couleur;
    public function setMarque($m) {
        $this->marque = $m;      // $this = l'objet qui appelle la méthode
    }
    public function setCouleur($c) {
        $this->couleur = $c;      // $this = l'objet qui appelle la méthode
    }
    public function afficher() {
        echo "Marque : " . $this->marque . PHP_EOL;
        echo "Couleur : " . $this->couleur . PHP_EOL;
    }
}
$v2 = new Voiture();
$v2->setMarque("Renault");
$v2->setCouleur("noire");
$v2->afficher();
//Non, $v1 et $v2 ne partagent pas la même valeur pour $marque, car chaque objet possède ses propres attributs.
?>