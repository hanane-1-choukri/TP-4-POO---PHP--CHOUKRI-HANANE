<?php
class Personne {
    private string $nom = "";
    private string $prenom = "";
    private string $dateNaissance = "";
    public function __set(string $name, mixed $value): void {
        if (property_exists($this, $name)){
            if ($name === "nom" && (trim($value) === "" || strlen(trim($value)) < 2)) {
                throw new InvalidArgumentException("Nom invalide");
            }
            $this->$name = $value;
        } else {
            echo "propriété $name inexistante" . PHP_EOL;
        }
        // Indice : property_exists($this, $name)
        // Sinon : afficher un message "Propriété $name inexistante"
    }
    public function __get(string $name): mixed {
        if (property_exists($this, $name)){
            return $this->$name;
        }
        return null;
    }
    public function __isset(string $name): bool {
        return property_exists($this, $name) && isset($this->$name);
    }
    public function __unset(string $name): void {
        if (property_exists($this, $name)) {
            $this->$name = "";
        }
    }
}
$p = new Personne();
$p->nom = "Hachimi";             // → __set
echo $p->nom . PHP_EOL;         // → __get
var_dump(isset($p->nom));       // → __isset
unset($p->nom);                 // → __unset
var_dump(isset($p->nom));
$p->telephone = "0600000000";   // propriété inexistante : que se passe-t-il ?
//Si tu testes, tu verras que `__set()` permet de détecter une propriété inexistante et de la rejeter.
//Cela signifie qu'elle ne sera pas ajoutée à notre objet.
//3.2 - Une erreur surviendra, car l'attribut « nom » est défini comme « private »  ; par conséquent, il ne peut pas être modifié directement depuis l'extérieur de la classe.avec __set:PHP appelle automatiquement la méthode __set(), qui permet de modifier l'attribut privé depuis l'extérieur, tout en contrôlant la valeur avant de l'affecter.
//3.3 - Oui, __set peut casser l'encapsulation si on autorise la modification de tous les attributs sans contrôle
?>
