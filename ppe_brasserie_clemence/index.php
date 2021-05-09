<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//connexion à la base 
$config = parse_ini_file("config.ini");
try{
    $pdo = new \PDO("mysql:host=".$config["host"].";dbname=".$config["database"].";charset=utf8", $config["user"], $config["password"]);
} catch(Exeption $e){
    echo "<h1>Erreur de connexion à la base de données :</h1>";
    echo $e->getMessage();
    exit;
}

//chargement des fichiers mvc
require("control/controleur.php");
require("view/vue.php");
require("model/brassin.php");
require("model/mouvement.php");
require("model/personne.php");

(new controleur)-> base();

//routes
if(isset($_GET["action"])){
    switch($_GET["action"]){
        //connexion
        case "connexion":
            (new controleur)-> connexion();
            break;
        
        //brassins
        case "afficherAjouterBrassin":
            (new controleur)-> afficherAjoutBrassin();
            break;
        
        case "ajouterBrassin":
            (new controleur)-> ajouterBrassin();
            break;
        
        case "afficherModifierBrassin":
            (new controleur)-> afficherModifierBrassin();
            break;
    
        case "afficherSupprimerBrassin":
            (new controleur)-> afficherSupprimerBrassin();
            break;

        case "supprimerBrassin":
            (new controleur)-> supprimerBrassin();
            break;
        
        //modifier brassin
        case "afficherToutElements":
            (new controleur)-> afficherToutElements();
            break;

        case "modifierBrassin":
            (new controleur)-> modifierBrassin();
            break;
        
        case "afficherModifNomBrassin":
            (new controleur)-> afficherModifNomBrassin();
            break;

        case "modifierNomBrassin":
            (new controleur)-> modifierNomBrassin();
            break;

        case "afficherModifDateBrassage":
            (new controleur)-> afficherModifDateBrassage();
            break;

        case "modifierDateBrassageBrassin":
            (new controleur)-> modifierDateBrassage();
            break;

        case "afficherModifMiseBouteille":
            (new controleur)-> afficherModifMiseBouteille();
            break;

        case "modifierDateMiseBouteilleBrassin":
            (new controleur)-> modifierDateMiseBouteille();
            break;
            
        case "afficherModifierVolume":
            (new controleur)-> afficherModifierVolume();
            break;

        case "modifierVolumeBrassin":
            (new controleur)-> modifierVolume();
            break;  
            
        case "afficherModifierPourAlcool":
            (new controleur)-> afficherModifierPourAlcool();
            break;

        case "modifierPourAlcoolBrassin":
            (new controleur)-> modifierPourAlcool();
            break;
            
        //mouvements
        case "afficherAjouterMouvement":
            (new controleur)-> afficherAjoutMouvement();
            break;

        case "ajouterMouvement":
            (new controleur)-> ajouterMouvement();
            break;  

        case "afficherModifierMouvement":
            (new controleur)-> afficherModifierMouvement();
            break;

        case "afficherSupprimerMouvement":
            (new controleur)-> afficherSupprimerMouvement();
            break;

        case "supprimerMouvement":
            (new controleur)-> supprimerMouvement();
            break;

        //modifier mouvement
        case "afficherModifToutElementsMouvement":
            (new controleur)-> afficherModifToutElementsMouvement();
            break;

        case "modifierMouvement":
            (new controleur)-> modifierMouvement();
            break;

        case "afficherModifNomMouvement":
            (new controleur)-> afficherModifNomMouvement();
            break;
        
        case "modifierNomMouvement":
            (new controleur)-> modifierNomMouvement();
            break;

        case "afficherModifDateMouvement":
            (new controleur)-> afficherModifDateMouvement();
            break;

        case "modifierDateMouvement":
            (new controleur)-> modifierDateMouvement();
            break;

        case "afficherModifContenanceMouvement":
            (new controleur)-> afficherModifContenanceMouvement();
            break;

        case "modifierContenanceMouvement":
            (new controleur)-> modifierContenanceMouvement();
            break;

        case "afficherModifierNbBouteilleMouvement":
            (new controleur)-> afficherModifierNbBouteilleMouvement();
            break;

        case "modifierNbBouteillesMouvement":
            (new controleur)-> modifierNbBouteillesMouvement();
            break;

        case "afficherModifierStockMoisMouvement":
            (new controleur)-> afficherModifierStockMoisMouvement();
            break;

        case "modifierStockMoisMouvement":
            (new controleur)-> modifierStockMoisMouvement();
            break;

        case "afficherModifierStockReaMouvement":
            (new controleur)-> afficherModifierStockReaMouvement();
            break;

        case "modifierStockReaMouvement":
            (new controleur)-> modifierStockReaMouvement();
            break;

        case "afficherModifierSortieVendues":
            (new controleur)-> afficherModifierSortieVendues();
            break;

        case "modifierSortieVenduesMouvement":
            (new controleur)-> modifierSortieVenduesMouvement();
            break;

        case "afficherModifierSortieDeg":
            (new controleur)-> afficherModifierSortieDeg();
            break;

        case "modifierSortieDegMouvement":
            (new controleur)-> modifierSortieDegMouvement();
            break;

        case "afficherModifierSortieFinMois":
            (new controleur)-> afficherModifierSortieFinMois();
            break;

        case "modifierSortieFinMoisMouvement":
            (new controleur)-> modifierSortieFinMoisMouvement();
            break;

        case "afficherModifierVolSorties":
            (new controleur)-> afficherModifierVolSorties();
            break;

        case "modifierVolumeSortieMouvement":
            (new controleur)-> modifierVolumeSortieMouvement();
            break;

        case "afficherModifierCoutDouane":
            (new controleur)-> afficherModifierCoutDouane();
            break;

        case "modifierCoutDouaneMouvement":
            (new controleur)-> modifierCoutDouaneMouvement();
            break;
    }
}else{
    (new controleur)-> afficherConnexion();
}
