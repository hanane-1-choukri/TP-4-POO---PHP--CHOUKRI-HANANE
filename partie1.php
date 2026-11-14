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
    public function getName(): string {
        return $this->prenom . " " . $this->nom;
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
echo $p->getName() . PHP_EOL;   // à vous de prédire le résultat
echo $p->nom . PHP_EOL;
echo $p->cin . PHP_EOL;
//cin est privé, il n'est pas accessible de l'extérieur.
echo $p->dateNaissance . PHP_EOL;
//dateNaissance est même privée, même problème.
echo $p->getAge();
//La méthode getAge() est privée, elle ne peut pas être appelée de l’extérieur.
//1.2 - N'importe quel code situé en dehors de la classe peut facilement lire ou modifier cette information, et le code cin est immuable.
//1.3 - Non ! Tu peux l'utiliser à l'intérieur d'une autre méthode de la même classe.
//1.4 -
?>
