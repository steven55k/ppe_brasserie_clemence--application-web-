<?php
class mouvement{

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

    public function ajouterMouvement($date, $nouveauNom, $contenance, $nbBouteilles, $stockMois, $stockRea, $sortieVendues, $sortieDeg, $sortieFinM, $volSortie, $coutD){
        $sql = "INSERT INTO mouvement(`date`, `nomBrassin`, `contenance`, `nbBouteilles`, `stockMois`, `stockRealise`, `sortieVendues`, `sortieDeg`, `sortieFinMois`, `volSorties`, `coutDouane`) VALUES (:d, :nom, :cont, :nbBout, :stockM, :stockR, :sortieVendues, :sortieDeg, :sortieFinM, :volS, :coutD)";

        $req = $this->pdo->prepare($sql);
        $req->bindParam(":d", $date, PDO::PARAM_STR);
        $req->bindParam(":nom", $nouveauNom, PDO::PARAM_STR);
        $req->bindParam(":cont", $contenance, PDO::PARAM_STR);
        $req->bindParam(":nbBout", $nbBouteilles, PDO::PARAM_STR);
        $req->bindParam(":stockM", $stockMois, PDO::PARAM_STR).
        $req->bindParam(":stockR", $stockRea, PDO::PARAM_STR);
        $req->bindParam(":sortieVendues", $sortieVendues, PDO::PARAM_STR);
        $req->bindParam(":sortieDeg", $sortieDeg, PDO::PARAM_STR);
        $req->bindParam(":sortieFinM", $sortieFinM, PDO::PARAM_STR);
        $req->bindParam(":volS", $volSortie, PDO::PARAM_STR);
        $req->bindParam(":coutD", $coutD, PDO::PARAM_STR);
        $req->execute();
    }

    public function afficherMouvement(){
        $sql = "";

        $req = $this->pdo->prepare($sql);
        $req->execute();

        return $req->fetchAll();
    }

    public function supprimerMouvement($nom){
        $sql = "DELETE FROM mouvement WHERE nomBrassin = :n";

        $req = $this->pdo->prepare($sql);
        $req->bindParam(":n", $nom, PDO::PARAM_STR);
        $req->execute();
    }

    public function modifierMouvement($nom, $date, $newNom, $contenance, $nbBouteilles, $stockMois, $stockRea, $sortieVendues, $sortieDeg, $sortieFinM, $volSorties, $coutDouane){
        $sql = "UPDATE mouvement SET dateMouv = :d, nomBrassin = :newNom, contenance = :c, nbBouteilles = :nbB, stockMois = :stockM, stockRealise = :stockR, sortieVendues = :sortieV, sortieDeg = :sortieD, sortieFinMois = :sortieFM, volSorties = :volS, coutDouane = :coutD WHERE nomBrassin = :n";
        
        $req = $this->pdo->prepare($sql);
        $req->bindParam(":n", $nom, PDO::PARAM_STR);
        $req->bindParam(":d", $date, PDO::PARAM_STR);
        $req->bindParam(":newNom", $newNom, PDO::PARAM_STR);
        $req->bindParam(":c", $contenance, PDO::PARAM_STR);
        $req->bindParam(":nbB", $nbBouteilles, PDO::PARAM_STR);
        $req->bindParam(":stockM", $stockMois, PDO::PARAM_STR);
        $req->bindParam(":stockR", $stockRea, PDO::PARAM_STR);
        $req->bindParam(":sortieV", $sortieVendues, PDO::PARAM_STR);
        $req->bindParam(":sortieD", $sortieDeg, PDO::PARAM_STR);
        $req->bindParam(":sortieFM", $sortieFinM, PDO::PARAM_STR);
        $req->bindParam(":volS", $volSorties, PDO::PARAM_STR);
        $req->bindParam(":coutD", $coutDouane, PDO::PARAM_STR);
        $req->execute();
    }

    public function modifierNomMouvement($nom, $newNom){
        $sql = "UPDATE mouvement SET nomBrassin = :newNom WHERE nomBrassin = :n";

        $req = $this->pdo->prepare($sql);
        $req->bindParam(":n", $nom, PDO::PARAM_STR);
        $req->bindParam(":newNom", $newNom, PDO::PARAM_STR);
        $req->execute();
    }

    public function modifierDateMouvement($nom, $date){
        $sql = "UPDATE mouvement SET dateMouv = :d WHERE nomBrassin = :n";

        $req = $this->pdo->prepare($sql);
        $req->bindParam(":n", $nom, PDO::PARAM_STR);
        $req->bindParam(":d", $date, PDO::PARAM_STR);
        $req->execute();
    }

    public function modifierContenanceMouvement($nom, $contenance){
        $sql = "UPDATE mouvement SET contenance = :c WHERE nomBrassin = :n";

        $req = $this->pdo->prepare($sql);
        $req->bindParam(":n", $nom, PDO::PARAM_STR);
        $req->bindParam(":c", $contenance, PDO::PARAM_STR);
        $req->execute();
    }

    public function modifierNbBouteillesMouvement($nom, $nbBouteilles){
        $sql = "UPDATE mouvement SET nbBouteilles = :nbB WHERE nomBrassin = :n";

        $req = $this->pdo->prepare($sql);
        $req->bindParam(":n", $nom, PDO::PARAM_STR);
        $req->bindParam(":nbB", $nbBouteilles, PDO::PARAM_STR);
        $req->execute();
    }

    public function modifierStockMoisMouvement($nom, $stockMois){
        $sql = "UPDATE mouvement SET stockMois = :stockM WHERE nomBrassin = :n";

        $req = $this->pdo->prepare($sql);
        $req->bindParam(":n", $nom, PDO::PARAM_STR);
        $req->bindParam(":stockM", $stockMois, PDO::PARAM_STR);
        $req->execute();
    }

    public function modifierStockReaMouvement($nom, $stockRea){
        $sql = "UPDATE mouvement SET stockRealise = :stockR WHERE nomBrassin = :n";

        $req = $this->pdo->prepare($sql);
        $req->bindParam(":n", $nom, PDO::PARAM_STR);
        $req->bindParam(":stockR", $stockRea, PDO::PARAM_STR);       
        $req->execute();
    }

    public function modifierSortieVenduesMouvement($nom, $sortieVendues){
        $sql = "UPDATE mouvement SET sortieVendues = :sortieV WHERE nomBrassin = :n";

        $req = $this->pdo->prepare($sql);
        $req->bindParam(":n", $nom, PDO::PARAM_STR);
        $req->bindParam(":sortieV", $sortieVendues, PDO::PARAM_STR);
        $req->execute();
    }

    public function modifierSortieDegMouvement($nom, $sortieDeg){
        $sql = "UPDATE mouvement SET sortieDeg = :sortieD WHERE nomBrassin = :n";

        $req = $this->pdo->prepare($sql);
        $req->bindParam(":n", $nom, PDO::PARAM_STR);
        $req->bindParam(":sortieD", $sortieDeg, PDO::PARAM_STR);
        $req->execute();
    }

    public function modifierSortieFinMoisMouvement($nom, $sortieFinM){
        $sql = "UPDATE mouvement SET sortieFinMois = :sortieFM WHERE nomBrassin = :n";

        $req = $this->pdo->prepare($sql);
        $req->bindParam(":n", $nom, PDO::PARAM_STR);
        $req->bindParam(":sortieFM", $sortieFinM, PDO::PARAM_STR);
        $req->execute();
    }

    public function modifierVolumeSortieMouvement($nom, $volSorties){
        $sql = "UPDATE mouvement SET volSorties = :volS WHERE nomBrassin = :n";

        $req = $this->pdo->prepare($sql);
        $req->bindParam(":n", $nom, PDO::PARAM_STR);
        $req->bindParam(":volS", $volSorties, PDO::PARAM_STR);
        $req->execute();
    }


    public function modifierCoutDouaneMouvement($nom, $coutDouane){
        $sql = "UPDATE mouvement SET coutDouane = :coutD WHERE nomBrassin = :n";

        $req = $this->pdo->prepare($sql);
        $req->bindParam(":n", $nom, PDO::PARAM_STR);
        $req->bindParam(":coutD", $coutDouane, PDO::PARAM_STR);
        $req->execute();
    }
}