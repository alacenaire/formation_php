<?php

interface JSONable
{
	public function toJSON();
}

class Personne
{
	public function disBonjour()
	{
		return "Bonjour !";
	}
}

class User extends Personne implements JSONable
{
	private $id;
	private $nom;

	private static $nbInstance = 0;

	const HOMME = 1;
	const FEMME = 2;

    public static function recupNbInstance()
    {
    	return self::$nbInstance;
    }

    public function __construct(int $id = 0, string $nom = "")
    {
    	$this->id = $id;
    	$this->nom = $nom;
    	self::$nbInstance++;
    }

    public function __destruct()
    {
    	echo "destructeur appelé\n";
    	self::$nbInstance--;
    }

    /**
     * @return mixed
     */
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return self
     */
    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNom() : string
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     *
     * @return self
     */
    public function setNom(string $nom)
    {
        $this->nom = $nom;

        return $this;
    }

    //Magic Method PHP : appelée automatiquement en fonction du contexte d'utilisation d'une instance d'objet
    //Appelée automatiquement quand instance de l'objet considérée comme une string (par exemple dans un echo)
    //sans cette méthode __toString, $user = new User(); echo $user échoue, avec ça appelle __toString
    public function __toString() : string
    {
    	return "id = $this->id - nom : $this->nom";
    }

    public function toString() : string
    {
    	return $this->__toString();
    }

    public function toJSON() : string
    {
    	$str = " { \"id\" : \"".$this->id."\", \"nom\" : \"".$this->nom."\"}";
    	return $str;
    }

	public function bonjour() : string
	{
	    return parent::disBonjour();
	}

	public function longueMethode()
	{
		sleep(5);
	}

	public function calculeTemps()
	{
		$dateDebut = new DateTime();
		$debut = $dateDebut->getTimestamp();
		sleep(2);
		$dateFin = new DateTime();
		$fin = $dateFin->getTimestamp();
		$duree = $dateFin - $dateDebut;

		return $duree;
	}
}

$user = new User();
$user->setId(1);
$user->setNom("lacenaire");
echo "nom : ".$user->getNom()."\n";
echo "id : ".$user->getId()."\n";
echo "\$user : ".$user."\n";
echo "\$user->toString() : ".$user->toString()."\n";
echo "\$user->disBonjour() : ".$user->disBonjour()."\n";
echo "\$user->bonjour() : ".$user->bonjour()."\n";
echo "User::recupNbInstance() : ".User::recupNbInstance()."\n";
$user2 = new User(2, "provot");
echo "nom : ".$user2->getNom()."\n";
echo "id : ".$user2->getId()."\n";
//appel de constante dans la classe
echo $user2::HOMME."\n";
echo $user2::FEMME."\n";
echo "User::recupNbInstance() : ".User::recupNbInstance()."\n";
echo "\$user2->toJSON : ".$user2->toJSON()."\n";
echo "\$user2->calculeTemps : ".$user2->calculeTemps()."\n";

/*
nom : lacenaire
id : 1
$user : id = 1 - nom : lacenaire
$user->toString() : id = 1 - nom : lacenaire
$user->disBonjour() : Bonjour !
$user->bonjour() : Bonjour !
User::recupNbInstance() : 1
nom : provot
id : 2
1
2
User::recupNbInstance() : 2
$user2->toJSON :  { "id" : "2", "nom" : "provot"}
destructeur appelé
destructeur appelé
*/