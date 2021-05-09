<?php
class personne{

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

    public function testerConnexion($name){
        $sql = "SELECT * FROM user WHERE logi = :n";

        $req = $this->pdo->prepare($sql);
        $req->bindParam(":n", $name, PDO::PARAM_STR);
        $req->execute();

        return $req->fetch();
    }

    //ajouter un user avec le mot de passe en haché dans la base de données
    public function inscrire($login, $mdp){
        $nom ="Oster";
        $prenom = "Steven";

        $sql = "INSERT INTO user (`logi`, `mdp`, `nom`, `prenom`) VALUES (:l, :m, :n, :p)";

        $req = $this->pdo->prepare($sql);
        $req->bindParam(":l", $login, PDO::PARAM_STR);
        $req->bindParam(":m", $mdp, PDO::PARAM_STR);
        $req->bindParam(":n", $nom, PDO::PARAM_STR);
        $req->bindParam(":p", $prenom, PDO::PARAM_STR);
        $req->execute();
    }
    
}