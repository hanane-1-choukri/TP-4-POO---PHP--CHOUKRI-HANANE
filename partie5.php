<?php
class Utilisateur {
    public string $nom;
    public int $age;
    private string $motDePasse;
    public function __construct(string $nom, int $age, string $motDePasse) {
        $this->nom = $nom;
        $this->age = $age;
        $this->motDePasse = $motDePasse;
    }
    /*public function __serialize(): array {
        return [
            'nom' => $this->nom,
            'age' => $this->age,
            // $motDePasse est volontairement exclu pour des raisons de sécurité
        ];
    }*/
    public function __unserialize(array $data): void {
        $this->nom = $data['nom'];
        $this->age = $data['age'];
        $this->motDePasse = "";   // à réinitialiser
    }
}
$u = new Utilisateur("Alice", 25, "secret123");
$serialise = serialize($u);
echo "Sérialisé : $serialise" . PHP_EOL;
$restaure = unserialize($serialise);
var_dump($restaure);
//5.1 - Non, le mot de passe n'apparaît pas dans la chaîne sérialisée, car la fonction `__serialize()` ne renvoie que le nom et l'âge.
//5.2 - En l'absence de la méthode `__serialize()`, PHP sérialise automatiquement les propriétés de l'objet, y compris la propriété privée `$motDePasse`. Cela constitue un risque de sécurité, car le mot de passe pourrait être exposé au sein des données sérialisées.
//5.3 - La valeur de `$motDePasse` sera une chaîne de caractères vide `""`, car la fonction `__unserialize()` réinitialise le mot de passe. Dans des applications réelles, il est nécessaire de mettre en place un mécanisme d'authentification sécurisé, en veillant à ne jamais stocker le mot de passe en clair ; on utilise plutôt un hachage sécurisé via la fonction `password_hash()`.
//5.4 - Car les données peuvent être malveillantes et provoquer une attaque connue sous le nom d'« injection d'objets PHP » (PHP Object Injection). Cette attaque peut permettre à un attaquant de manipuler des objets et d'exécuter des actions dangereuses au sein de l'application.
?>