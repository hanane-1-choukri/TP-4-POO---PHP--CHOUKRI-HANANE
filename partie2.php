<?php
class Personne {
    public string $nom;
    public string $prenom;
    
    public function __construct($nom, $prenom){
        $this->nom = $nom;
        $this->prenom = $prenom;
    }
}
class Voiture {
    public string $couleur;
    public int $vitesse;

    public function __construct(string $couleur = "Blanche", int $vitesse = 0) {
        $this->couleur = $couleur;
        $this->vitesse = $vitesse;
        echo "Voiture {$this->couleur} créée." . PHP_EOL;
    }
    
    public function __destruct() {
        echo "Voiture {$this->couleur} détruite." . PHP_EOL;
    }
    /*public function __construct(
        public string $couleur = "Blanche",
        public int $vitesse = 0
    ) {}*/
    public function afficher(): void {
        echo "Couleur : {$this->couleur} | Vitesse : {$this->vitesse} km/h" . PHP_EOL;
    }
    public static function creerPersonne($nom, $prenom) {
        return new Personne($nom, $prenom);
    }
}
$p = Voiture::creerPersonne("Sara", "Hachimi");
echo $p->nom . " " . $p->prenom . PHP_EOL;
unset($p);
$v1 = new Voiture();               // valeurs par défaut
$v2 = new Voiture("Noire", 120);    // valeurs personnalisées
$v1->afficher();
$v2->afficher();
$maVoiture = new Voiture("Blanche");
unset($maVoiture);          // appelle __destruct()
echo "Fin du script." . PHP_EOL;
//2.1.a - constructeur Il accepte différents types de paramètres, il affiche les deux "Couleur : Blanche | Vitesse : 0 km/h et Couleur : Noire | Vitesse : 120 km/h".
//2.1.b - Une méthode concise pour définir des attributs au sein du constructeur.
//2.2.a - Non,PHP n'autorise pas plusieurs méthodes "__construct()" dans une même classe.
?>

