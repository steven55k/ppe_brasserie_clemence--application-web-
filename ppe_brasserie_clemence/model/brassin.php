<?php
class brassin{

   private $pdo;

    //connexion à la base 
    public function __construct(){
        $config = parse_ini_file("config.ini");
            
            try {
                $this->pdo = new \PDO("mysql:host=".$config["host"].";dbname=".$config["database"].";charset=utf8", $config["user"], $config["password"]);
            } catch(Exception $e) {
                echo $e->getMessage();
            }
    }

    public function ajouterBrassin($dateBrassage, $nom, $prcAlcool, $volumeAlcool, $dateMiseBouteille){
        
        $sql = "INSERT INTO brassin (`dateBrass`, `dateMiseBout`, `volume`, `pourAlcool`, `nomBiere`) VALUES (:dBrassage, :miseB, :volume, :prc, :n)";
        
    
        $req = $this->pdo->prepare($sql);
        $req->bindParam(":dBrassage", $dateBrassage, PDO::PARAM_STR);
        $req->bindParam(":n", $nom, PDO::PARAM_STR);
        $req->bindParam(":prc", $prcAlcool, PDO::PARAM_STR);
        $req->bindParam(":volume", $volumeAlcool, PDO::PARAM_STR);
        $req->bindParam(":miseB", $dateMiseBouteille, PDO::PARAM_STR);
        $req->execute();
        
    }

    public function afficherBrassin(){
        $sql = "SELECT dateBrass, nomBiere, pourAlcool, volume, dateMiseBout FROM brassin";

        $req = $this->pdo->prepare($sql);
        $req->execute();

        return $req->fetchAll();
    }

    public function supprimerBrassin($nom){
        $sql = "DELETE FROM brassin WHERE nomBiere = :n";

        $req = $this->pdo->prepare($sql);
        $req->bindParam(":n", $nom, PDO::PARAM_STR);
        $req->execute();
    }

    //modifier brassin
    public function modifierBrassin($nom, $dateBrass, $dateMiseBouteille, $volume, $alcool, $nouveauNom){
        $sql = "UPDATE brassin SET dateBrass = :dB, dateMiseBout = :dMB, volume = :v, pourAlcool = :a, nomBiere = :n WHERE nomBiere = :nom";

        $req = $this->pdo->prepare($sql);
        $req->bindParam(":nom", $nom, PDO::PARAM_STR);
        $req->bindParam(":dB", $dateBrass, PDO::PARAM_STR);
        $req->bindParam(":dMB", $dateMiseBouteille, PDO::PARAM_STR);
        $req->bindParam(":v", $volume, PDO::PARAM_STR);
        $req->bindParam(":a", $alcool, PDO::PARAM_STR);
        $req->bindParam(":n", $nouveauNom, PDO::PARAM_STR);
        $req->execute();
    }

    public function modifierNomBrassin($nom, $nouveauNom){
        $sql = "UPDATE brassin SET nomBiere = :n WHERE nomBiere = :nom";

        $req = $this->pdo->prepare($sql);
        $req->bindParam(":nom", $nom, PDO::PARAM_STR);
        $req->bindParam(":n", $nouveauNom, PDO::PARAM_STR);
        $req->execute();
    }

    public function modifierDateBrassage($nom, $dateBrass){
        $sql = "UPDATE brassin SET dateBrass = :dB WHERE nomBiere = :nom";

        $req = $this->pdo->prepare($sql);
        $req->bindParam(":nom", $nom, PDO::PARAM_STR);
        $req->bindParam(":dB", $dateBrass, PDO::PARAM_STR);
        $req->execute();
    }

    // Ne fonctionne pas
    public function modifierDateMiseBouteille($nom, $dateMiseBouteille){
        $sql = "UPDATE brassin SET dateMiseBout = :dMb WHERE nomBiere = :nom";

        $req = $this->pdo->prepare($sql);
        $req->bindParam(":nom", $nom, PDO::PARAM_STR);
        $req->bindParam(":dMB", $dateMiseBouteille, PDO::PARAM_STR);
        $req->execute();
    }

    public function modifierVolume($nom, $volume){
        $sql = "UPDATE brassin SET volume = :v WHERE nomBiere = :nom";

        $req = $this->pdo->prepare($sql);
        $req->bindParam(":nom", $nom, PDO::PARAM_STR);
        $req->bindParam(":v", $volume, PDO::PARAM_STR);
        $req->execute();
    }

    public function modifierPourAlcool($nom, $pourAlcool){
        $sql = "UPDATE brassin SET pourAlcool = :a WHERE nomBiere = :nom";

        $req = $this->pdo->prepare($sql);
        $req->bindParam(":nom", $nom, PDO::PARAM_STR);
        $req->bindParam(":a", $pourAlcool, PDO::PARAM_STR);
        $req->execute();
    }

    
}