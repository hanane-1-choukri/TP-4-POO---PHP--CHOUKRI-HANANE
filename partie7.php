<?php
class Compte {
    private $montant;
    private $interet;   // en pourcentage
    public function __construct(float $interet, float $montantInitial) {
        $this->montant = $montantInitial;
        $this->interet = $interet;
    }
    public function un_an() {
        $this->montant = $this->montant * (1 + $this->interet / 100);
    }
    public function get_montant() {
        return $this->montant;
    }
}
$c1 = new Compte(10, 400);
$c2 = new Compte(5, 2500);
for ($i = 1; $i <= 10; $i++) {
    $c1->un_an();
    $c2->un_an();
}
/*echo '<p> Valeur du compte = ' . $c1->get_montant() . ' dirhams </p>';
echo '<p> Valeur du compte = ' . $c2->get_montant() . ' dirhams </p>';*/
// Affichage des résultats
echo '<p>Valeur du compte = ' .
    number_format($c1->get_montant(), 2, ',', ' ') .
    ' dirhams</p>';

echo '<p>Valeur du compte = ' .
    number_format($c2->get_montant(), 2, ',', ' ') .
    ' dirhams</p>';
//7.1 - L'opérateur + est manquant après le chiffre 1 ; par ailleurs, la formule contient une utilisation incorrecte de $this->montant.
//7.2 - M nouveau = M ancien * (1+t/100)
//7.3 - Non, l'ordre des éléments ne correspond pas à l'énoncé du problème. La consigne demande d'indiquer d'abord le montant initial, puis les intérêts.
//7.4 - 


?>