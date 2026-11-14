<?php
class Animal {
    public function manger(): void {
        echo "Je mange." . PHP_EOL;
    }
}
class Chat extends Animal {
    public function miauler(): void {
        echo "Miaou !" . PHP_EOL;
    }
}
class Chien extends Animal {
    public function aboyer(): void {
        echo "Wouf !" . PHP_EOL;
    }
}
class Personne {
    public function __construct(protected string $nom) {}
    public function presentation(): string {
        return "je suis ". $this->nom;
    }
}
class Etudiant extends Personne {
    private string $cne;
    public function __construct(
        string $nom,
        string $prenom,
        string $dateNaissance,
        string $villeNaissance,
        string $cin,
        string $cne) {
        parent::__construct($nom);
        $this->cne = $cne;
    }
    public function presentation(): string {
        return parent::presentation();
    }
    public function getCne(): string {
        return $this->cne;
    }
    public function  __toString(): string {
        return parent::presentation() . " | CNE : " . $this->cne;
    }
}
/*$etudiants = [];
$etudiants[] = new Etudiant("Hachimi", "Sara", "2000-05-14", "Marrakech", "EE123456", "CNE001");
$etudiants[] = new Etudiant("Ali", "Ahmed", "2002-03-10", "Rabat", "EE123457", "CNE002");
$etudiants[] = new Etudiant("Amrani", "Salma", "2001-06-20", "Casablanca", "EE123458", "CNE003");
$etudiants[] = new Etudiant("Karimi", "Youssef", "2003-01-15", "Fes", "EE123459", "CNE004");
$etudiants[] = new Etudiant("Bennani", "Imane", "2002-09-12", "Agadir", "EE123460", "CNE005");
foreach ($etudiants as $e) {
    echo $e . PHP_EOL;*/

class Base {
    final public function afficher(): void {
        echo "Méthode finale" . PHP_EOL;
    }
}
/*class Fille extends Base {
    final public function afficher(): void {
        echo "bonjour" . PHP_EOL;
    }
}//le premier erreur:Fatal error: Uncaught Error: Class "Base" not found in C:\Users\Microsoft\Git VSC\TP-4-POO---PHP--CHOUKRI-HANANE\partie6.php:31 Stack trace: #0 {main} thrown in C:\Users\Microsoft\Git VSC\TP-4-POO---PHP--CHOUKRI-HANANE\partie6.php on line 31.
final class Outil {
    public const VERSION = "1.0";
}*/
final class Outil {
    public const VERSION = "1.0";
}
/*class SousOutil extends Outil {
    public const VERSION = "1.0";
}//le 2 erreur:Fatal error: Uncaught Error: Class "Outil" not found in C:\Users\Microsoft\Git VSC\TP-4-POO---PHP--CHOUKRI-HANANE\partie6.php:36 Stack trace: #0 {main} thrown in C:\Users\Microsoft\Git VSC\TP-4-POO---PHP--CHOUKRI-HANANE\partie6.php on line 36.*/
class Produit {
    public function __construct(public readonly string $reference) {}
}
//$p->reference = "REF-002";// erreur 3:Fatal error: Uncaught Error: Attempt to assign property "reference" on null in C:\Users\Microsoft\Git VSC\TP-4-POO---PHP--CHOUKRI-HANANE\partie6.php:43 Stack trace: #0 {main} thrown in C:\Users\Microsoft\Git VSC\TP-4-POO---PHP--CHOUKRI-HANANE\partie6.php on line 43.
$p = new Produit("REF-001");
echo $p->reference . PHP_EOL;
$e = new Etudiant("Ahmed", "Ahmed", "2002-03-10", "Rabat", "EE123456", "CNE001");
echo $e->presentation() . PHP_EOL;
echo $e . PHP_EOL;
$c = new Chien();
$Chat = new chat();
$Chat->manger();
$Chat->miauler();
$c->manger();    // héritée d'Animal
$c->aboyer();    // propre à Chien
//6.1.b - Non, il n'est pas possible d'appeler $c->miauler() ; car $c est un objet de la classe Chien, alors que la fonction miauler() appartient exclusivement à la classe Chat.
//6.2.a - une erreur, car le constructeur de la classe parente a besoin de `$nom` pour être initialisé, or `Student` n'a pas fait appel à ce constructeur.
//6.2.b - Car `protected` permet d'accéder à l'attribut depuis la classe parente et ses classes dérivées, tandis que `private` n'en permet l'accès qu'à l'intérieur de la classe elle-même.
//6.3.b - Exemple de propriété « en lecture seule » (readonly) : L'identifiant de l'étudiant (CNE) est une propriété « en lecture seule » ; il ne doit en effet pas être modifié une fois créé.
//Exemple du mot-clé « final » : Une classe dédiée aux paiements peut être définie comme « final » afin d'empêcher l'héritage et d'éviter toute modification de son fonctionnement.
//6.4.a - Une erreur se produit, car la méthode privée (private method) n'est accessible qu'à l'intérieur de la classe dans laquelle elle a été définie (Personne).
//6.4.b - C'est impossible, car l'attribut `dateNaissance` est défini comme `private` (privé) au sein de la classe `Personne`.
//6.4.C - L'avantage réside dans l'évitement de la duplication de code, la réutilisation de la vue de la classe parente et la facilitation de la maintenance du logiciel.
?>



