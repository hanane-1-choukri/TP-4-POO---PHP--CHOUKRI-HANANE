<?php
class Personne {
    // ----- Attributs publics -----
    public string $nom;
    public string $prenom;
    // ----- Attributs privés -----
    private string $dateNaissance;   // format "AAAA-MM-JJ"
    private string $villeNaissance;
    protected string $cin;
    // ----- Constructeur -----
    public function __construct(
        string $nom,
        string $prenom,
        string $dateNaissance,
        string $villeNaissance,
        string $cin
    ) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->dateNaissance = $dateNaissance;
        $this->villeNaissance = $villeNaissance;
        $this->cin = $cin;
    }
    // ----- Méthode publique -----
    public function __toString(): string {
        return $this->prenom . " " . $this->nom . " (" . $this->getAge() . " ans)";
    }

    // ----- Méthode privée -----
    private function getAge(): int {
        $naissance = new Datetime($this->dateNaissance);
        $aujourdhui = new Datetime();
        return $naissance->diff($aujourdhui)->y;
        // Indice : $naissance = new DateTime($this->dateNaissance);
        //          $aujourdhui = new DateTime();
        //          $naissance->diff($aujourdhui)->y
    }
}
$p = new Personne("Hachimi", "Sara", "2000-05-14", "Marrakech", "EE123456");
echo $p . PHP_EOL;   // à vous de prédire le résultat
echo $p->nom . PHP_EOL;
echo $p->prenom . PHP_EOL;
/*echo $p->cin . PHP_EOL;
echo $p->dateNaissance . PHP_EOL;
echo $p->getAge();*/
?>

