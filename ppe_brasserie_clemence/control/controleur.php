<?php
class controleur{

    //connexion à la base 
    public function __construct(){
        $config = parse_ini_file("config.ini");
            
            try {
                $this->pdo = new \PDO("mysql:host=".$config["host"].";dbname=".$config["database"].";charset=utf8", $config["user"], $config["password"]);
            } catch(Exception $e) {
                echo $e->getMessage();
            }
    }
    
    public function base(){
        (new vue)-> base();
    }

    //brassins
    public function afficherAjoutBrassin(){
        (new vue)-> ajouterBrassin();
    }

    public function ajouterBrassin(){
        (new brassin)-> ajouterBrassin($_POST["dateBrassage"], $_POST["nomCommercial"], $_POST["prcAlcool"], $_POST["volumeAlcool"], $_POST["dateMiseBouteille"]);
        (new vue)-> acceuil();
    }

    public function afficherModifierBrassin(){
        (new vue)-> modifierBrassin();
    }
    
    public function afficherSupprimerBrassin(){
        (new vue)-> supprimerBrassin();
    }

    public function supprimerBrassin(){
        (new brassin)-> supprimerBrassin($_POST["nom"]);
        (new vue)-> acceuil();

    }

    //modifier brassin
    public function afficherToutElements(){
        (new vue)-> ModifierToutBrassin();
    }

    public function modifierBrassin(){
        (new brassin)-> modifierBrassin($_POST["nom"], $_POST["dateBrassage"], $_POST["miseB"], $_POST["volume"], $_POST["pourAlcool"], $_POST["newNom"]);
        (new vue)-> acceuil();
    }

    public function afficherModifNomBrassin(){
        (new vue)-> modifierNomBrassin();
    }

    public function modifierNomBrassin(){
        (new brassin)-> modifierNomBrassin($_POST["nom"], $_POST["newNom"]);
        (new vue)-> acceuil();
    } 

    public function afficherModifDateBrassage(){
        (new vue)-> ModifierDateBrassage();
    }

    public function modifierDateBrassage(){
        (new brassin)-> modifierDateBrassage($_POST["nom"], $_POST["dateBrassage"]);
        (new vue)-> acceuil();
    }

    public function afficherModifMiseBouteille(){
        (new vue)-> modifierDateMiseBouteille();
    }

    public function modifierDateMiseBouteille(){
        (new brassin)-> modifierDateMiseBouteille($_POST["nom"], $_POST["miseB"]);
        (new vue)-> acceuil();
    }

    public function afficherModifierVolume(){
        (new vue)-> modifierVolume();
    }

    public function modifierVolume(){
        (new brassin)-> modifierVolume($_POST["nom"], $_POST["volume"]);
        (new vue)-> acceuil();
    }

    public function afficherModifierPourAlcool(){
        (new vue)-> modifierPourAlcool();
    }

    public function modifierPourAlcool(){
        (new brassin)-> modifierPourAlcool($_POST["nom"], $_POST["pourAlcool"]);
        (new vue)-> acceuil();
    }

    //mouvements
    public function afficherAjoutMouvement(){
        (new vue)-> ajouterMouvement();
    }

    public function ajouterMouvement(){
        (new mouvement)-> ajouterMouvement($_POST["laDate"], $_POST["nom"], $_POST["contenance"], $_POST["nbBouteilles"], $_POST["nbStockM"], $_POST["stockRea"], $_POST["nbVendues"], $_POST["sortieDeg"], $_POST["finMois"], $_POST["volumeS"], $_POST["coutD"]);
        (new vue)-> acceuil();
    }

    public function afficherModifierMouvement(){
        (new vue)-> modifierMouvement();
    }

    public function afficherSupprimerMouvement(){
        (new vue)-> supprimerMouvement();
    }

    public function supprimerMouvement(){
        (new mouvement)-> supprimerMouvement($_POST["nom"]);
        (new vue)-> acceuil();
    }

    //modifier mouvement
    public function afficherModifToutElementsMouvement(){
        (new vue)-> modifierToutMouvement();
    }

    public function modifierMouvement(){
        (new mouvement)-> modifierMouvement($_POST["nom"], $_POST["date"], $_POST["name"], $_POST["contenance"], $_POST["nbBouteilles"], $_POST["stockMois"], $_POST["stockRea"], $_POST["sortieVendues"], $_POST["sortiesDeg"], $_POST["sortieFinMois"], $_POST["volSorties"], $_POST["coutDouane"]);
        (new vue)-> acceuil();
    }

    public function afficherModifNomMouvement(){
        (new vue)-> modifierNomMouvement();
    }

    public function modifierNomMouvement(){
        (new mouvement)-> modifierNomMouvement($_POST["nom"], $_POST["name"]);
        (new vue)-> acceuil();
    }

    public function afficherModifDateMouvement(){
        (new vue)-> modifierDateMouvement();
    }

    public function modifierDateMouvement(){
        (new mouvement)-> modifierDateMouvement($_POST["nom"], $_POST["date"]);
        (new vue)-> acceuil();
    }

    public function afficherModifContenanceMouvement(){
        (new vue)-> modifierContenanceMouvement();
    }

    public function modifierContenanceMouvement(){
        (new mouvement)-> modifierContenanceMouvement($_POST["nom"], $_POST["contenance"]);
        (new vue)-> acceuil();
    }

    public function afficherModifierNbBouteilleMouvement(){
        (new vue)-> modifierNbBouteillesMouvement();
    }

    public function modifierNbBouteillesMouvement(){
        (new mouvement)-> modifierNbBouteillesMouvement($_POST["nom"], $_POST["nbBouteilles"]);
        (new vue)-> acceuil();
    }

    public function afficherModifierStockMoisMouvement(){
        (new vue)-> modifierStockMoisMouvement();
    }

    public function modifierStockMoisMouvement(){
        (new mouvement)-> modifierStockMoisMouvement($_POST["nom"], $_POST["stockMois"]);
        (new vue)-> acceuil();
    }

    public function afficherModifierStockReaMouvement(){
        (new vue)-> modifierStockReaMouvement();
    }

    public function modifierStockReaMouvement(){
        (new mouvement)-> modifierStockReaMouvement($_POST["nom"], $_POST["stockRea"]);
        (new vue)-> acceuil();
    }

    public function afficherModifierSortieVendues(){
        (new vue)-> modifierSortieVenduesMouvement();
    }

    public function modifierSortieVenduesMouvement(){
        (new mouvement)-> modifierSortieVenduesMouvement($_POST["nom"], $_POST["sortieVendues"]);
        (new vue)-> acceuil();
    }

    public function afficherModifierSortieDeg(){
        (new vue)-> modifierSortieDegMouvement();
    }

    public function modifierSortieDegMouvement(){
        (new mouvement)-> modifierSortieDegMouvement($_POST["nom"], $_POST["sortiesDeg"]);
        (new vue)-> acceuil();
    }

    public function afficherModifierSortieFinMois(){
        (new vue)-> modifierSortieFinMoisMouvement();
    }

    public function modifierSortieFinMoisMouvement(){
        (new mouvement)-> modifierSortieFinMoisMouvement($_POST["nom"], $_POST["sortieFinMois"]);
        (new vue)-> acceuil();
    }

    public function afficherModifierVolSorties(){
        (new vue)-> modifierVolumeSortieMouvement();
    }

    public function modifierVolumeSortieMouvement(){
        (new mouvement)-> modifierVolumeSortieMouvement($_POST["nom"], $_POST["volSorties"]);
        (new vue)-> acceuil();
    }

    public function afficherModifierCoutDouane(){
        (new vue)-> modifierCoutDouaneMouvement();
    }

    public function modifierCoutDouaneMouvement(){
        (new mouvement)-> modifierCoutDouaneMouvement($_POST["nom"], $_POST["coutDouane"]);
        (new vue)-> acceuil();
    }

    //connexions
    public function afficherConnexion(){
        (new vue)-> connexion();
    }

    public function connexion(){
        $pdoStat = $this->pdo->prepare('SELECT * FROM user');
        $pdoStat->execute();
        $users = $pdoStat->fetchAll();

        foreach($users as $user){
            if($user['logi'] == $_POST["id"] && $user['mdp'] == $_POST["mdp"]){
                (new vue)-> acceuil();
            }else{
                //echo"identifiant ou mot de passe incorrect.. <a href='index.php'> réessayer</a>";
                (new vue)-> connexionError();
            }
        }
    }
    
    /*
    public function connexion(){
        $login = $_POST["id"];
        $mdp = $_POST["mdp"];
        //$mdp = password_hash($_POST["mdp"], PASSWORD_DEFAULT);

        $resu = (new personne)-> testerConnexion($login);
 
        if($resu == true){
            if(password_verify($mdp, $resu["mdp"] == true)){
                (new vue)-> acceuil();
            }else{
                (new vue)-> connexionError();
            }
        }else{
            (new vue)-> connexionError();
        }
        
        //(new personne)-> inscrire($login, $mdp);


    }
    */
}