<?php
class vue{

    //connexion à la base 
    public function __construct(){
        $config = parse_ini_file("config.ini");
            
            try {
                $this->pdo = new \PDO("mysql:host=".$config["host"].";dbname=".$config["database"].";charset=utf8", $config["user"], $config["password"]);
            } catch(Exception $e) {
                echo $e->getMessage();
            }
    }


    //titre et liens css
    public function base(){
        echo"
            <!DOCTYPE html>
            <html>
                <head>
                    <meta charset= 'UTF-8'>

                    <link rel=\"stylesheet\" href=\"css/bootstrap.min.css\">
                    <link rel=\"stylesheet\" href=\"css/stylePage.css\">
                    <title>Brasserie Clemence</title>
                </head>
                <body>
        ";
    }

    //connexion
    public function connexion(){
        echo"
            <div class=\"container\">
            <div class=\"row\">
                <div class=\"col align-self-center\">
                    <center>
                        <br/><h2> Connexion :</h2><br/>
                        <p>(login: administrateur pwd: 0550002D) </p></br>
                        <form name=\"form1\" action='index.php?action=connexion' method=\"POST\">
                            <div class=\"input-group mb-3\">
                                <div class=\"input-group-prepend\">
                                    <span class=\"input-group-text\" id=\"inputGroup-sizing-default\">Identifiant</span>
                                </div>
                                <input type=\"text\" name=\"id\" class=\"form-control\" aria-label=\"Sizing example input\" aria-describedby=\"inputGroup-sizing-default\">
                            </div>
                            <div class=\"input-group mb-3\">
                                <div class=\"input-group-prepend\">
                                    <span class=\"input-group-text\" id=\"inputGroup-sizing-default\">Mot de passe</span>
                                </div>
                                <input type=\"password\" name=\"mdp\" class=\"form-control\" aria-label=\"Sizing example input\" aria-describedby=\"inputGroup-sizing-default\">
                            </div>
                            <input type=\"submit\" name=\"ok\" class=\"btn btn-primary b\"/>
                        </form>
                    </center>
                </div>
            </div>
            </div>
      ";
    }

    public function connexionError(){
        echo"
            <div class=\"container\">
            <div class=\"row\">
                <div class=\"col align-self-center\">
                    <center>
                        <br/><h2> Connexion :</h2><br/>
                        <p>(login: administrateur pwd: 0550002D) </p></br>
                        <form name=\"form1\" action='index.php?action=connexion' method=\"POST\">
                            <div class=\"input-group mb-3\">
                                <div class=\"input-group-prepend\">
                                    <span class=\"input-group-text\" id=\"inputGroup-sizing-default\">Identifiant</span>
                                </div>
                                <input type=\"text\" name=\"id\" class=\"form-control\" aria-label=\"Sizing example input\" aria-describedby=\"inputGroup-sizing-default\">
                            </div>
                            <div class=\"input-group mb-3\">
                                <div class=\"input-group-prepend\">
                                    <span class=\"input-group-text\" id=\"inputGroup-sizing-default\">Mot de passe</span>
                                </div>
                                <input type=\"password\" name=\"mdp\" class=\"form-control\" aria-label=\"Sizing example input\" aria-describedby=\"inputGroup-sizing-default\">
                            </div>
                            <input type=\"submit\" name=\"ok\" class=\"btn btn-primary b\"/>
                        </form>
                        <p style=\"color: red\">Login ou mot de passe incorrect.. Veuillez réessayer</p>
                    </center>
                </div>
            </div>
            </div>
      ";
    }

    //acceuil
    public function acceuil(){
        echo"
            <nav class=\"navbar navbar-expand-lg navbar navbar-dark\" style=\"background-color: #0764D5;\">
            <img src=\"img/logo.png\" height=\"60\" width=\"60\">
            <a class=\"navbar-brand\" href=\"#\">Menu général</a>
            <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarNavDropdown\" aria-controls=\"navbarNavDropdown\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
                <span class=\"navbar-toggler-icon\"></span>
            </button>
        </nav>
        <div class=\"container-xl\" style=\"background-color: white;\">

         <br/>
    <div class=\"row\">
    <div class=\"col-4\"><h1>Brasserie Clémence</h1></div>
        <div class=\"col-2\"><p class=\"text-muted\">Paiement des droits</p> </div>
        <div class=\"col-4\"><h4 class=\"text-right\"> Choisir une date : </h4></div>
        <div class=\"col-2\"><a href=\"#\" class=\"btn btn-outline-secondary\" role=\"button\" aria-disabled=\"true\">Autre période</a></div>
    </div>
    <br />
    <div class=\"row\">
        <div class=\"col-8\"><h3>Liste des brassins</h3></div>
        
        <form method='POST' action='index.php?action=afficherAjouterBrassin'>
            <input type=\"submit\" name=\"ok\" value=\"Nouveau Brassin\" class=\"btn btn-primary b\"/>
        </form> &nbsp

        <form method='POST' action='index.php?action=afficherModifierBrassin'>
            <input type=\"submit\" name=\"ok\" value=\"Modifer\" class=\"btn btn-primary b\"/>
        </form> &nbsp

        <form method='POST' action='index.php?action=afficherSupprimerBrassin'>
            <input type=\"submit\" name=\"ok\" value=\"Supprimer\" class=\"btn btn-primary b\"/>
        </form>
        
    
    </div>
    <br/>
    <table class=\"table table-striped\">
        <thead>
            <tr>
            <th scope=\"col\">Brassin</th>
            <th scope=\"col\">Date brassage</th>
            <th scope=\"col\">Nom commercial</th>
            <th scope=\"col\">% alcool</th>
            <th scope=\"col\">Volume</th>
            <th scope=\"col\">Date de mise en bouteille</th>
            </tr>
        </thead>
        <tbody>
        "; 

        // récupération de la liste des brassins
        $pdoStat = $this->pdo->prepare('SELECT * FROM brassin');
        $pdoStat->execute();
        $brassins = $pdoStat->fetchAll();

        foreach($brassins as $brassin){
            echo"
                <tr> 
                    <td>".$brassin['code']."</td>
                    <td>".$brassin['dateBrass']."</td>
                    <td>".$brassin['nomBiere']."</td>
                    <td>".$brassin['pourAlcool']."</td>
                    <td>".$brassin['volume']."</td>
                    <td>".$brassin['dateMiseBout']."</td>
                </tr>
            ";
        }
        
           
       echo" </tbody>
        </table>
        <br />
        <div class=\"row\">
            <div class=\"col-8\"><h3>Liste des Mouvements</h3></div>

            <form method='POST' action='index.php?action=afficherAjouterMouvement'>
                <input type=\"submit\" name=\"ok\" value=\"Nouveau Mouvement\" class=\"btn btn-primary b\"/>
            </form> &nbsp

            <form method='POST' action='index.php?action=afficherModifierMouvement'>
                <input type=\"submit\" name=\"ok\" value=\"Modifier\" class=\"btn btn-primary b\"/>
            </form> &nbsp

            <form method='POST' action='index.php?action=afficherSupprimerMouvement'>
                <input type=\"submit\" name=\"ok\" value=\"Supprimer\" class=\"btn btn-primary b\"/>
            </form>

        <br />
        <table class=\"table table-striped\">
            <thead>
                <tr>
                <th scope=\"col\">Date</th>
                <th scope=\"col\">Nom</th>
                <th scope=\"col\">Contenance</th>
                <th scope=\"col\">Stock début mois</th>
                <th scope=\"col\">Stock réalisé</th>
                <th scope=\"col\">Sorties vendues</th>
                <th scope=\"col\">Stock fin de mois</th>
                <th scope=\"col\">Volume des sorties</th>
                <th scope=\"col\">Coût douanes</th>
                </tr>
            </thead>
            <tbody>";

        // récupération de la liste des mouvements
        $pdoStat = $this->pdo->prepare('SELECT * FROM mouvement');
        $pdoStat->execute();
        $mouvements = $pdoStat->fetchAll();

        foreach($mouvements as $mouvement){
            echo"
                <tr> 
                    <td>".$mouvement['dateMouv']."</td>
                    <td>".$mouvement['nomBrassin']."</td>
                    <td>".$mouvement['contenance']."</td>
                    <td>".$mouvement['stockMois']."</td>
                    <td>".$mouvement['stockRealise']."</td>
                    <td>".$mouvement['sortieVendues']."</td>
                    <td>".$mouvement['sortieFinMois']."</td>
                    <td>".$mouvement['volSorties']."</td>
                    <td>".$mouvement['coutDouane']."</td>
                </tr>
            ";
        }
                
            echo "</tbody>
        </table>
        <br/>
        </div>
        ";
    }


    //brassins
    public function ajouterBrassin(){
        echo"
            <section class=\"container-fluid\">
                <div class=\"titre\"><img src=\"img/logo.png\" height=\"60\" width=\"60\"></div>
                <div class=\"titre\"><h2>Nouveau brassin</h2></div>       
                <div class=\"titre\"><img src=\"img/logo.png\" height=\"60\" width=\"60\"></div>     
            </section>

            <div class=\"container col-4\">            
            <form name=\"nvBrassin\" method=\"POST\" action='index.php?action=ajouterBrassin'>
                <div class=\"form-group\">
                    <label for=\"dateBrassage\">Date de Brassage : </label>
                    <input type=\"date\" class=\"form-control\" min=\"2020-01-01\" name=\"dateBrassage\" />
                </div>
                <div class=\"form-group\">
                    <label for=\"nomCommercial\"> Nom commercial : </label>
                    <input type=\"text\" class=\"form-control\" name=\"nomCommercial\" />
                       
                </div>
                <div class=\"form-group\">
                    <label for=\"prcAlcool\">Pourcentage d'alcool : </label>
                    <input type=\"text\" placeholder=\"00.00\" class=\"form-control\" name=\"prcAlcool\" />
                </div>
                <div class=\"form-group\">
                    <label for=\"volumeAlcool\">Volume : </label>
                    <input type=\"text\" placeholder=\"00.00\" class=\"form-control\" name=\"volumeAlcool\" />
                </div>
                <div class=\"form-group\">
                    <label for=\"dateMiseBouteille\">Date de mise en bouteille :  </label>
                    <input type=\"date\" class=\"form-control\"min=\"2020-01-01\" name=\"dateMiseBouteille\" />
                </div>
                <input type=\"submit\" class=\"btn btn-primary b\" name=\"OKBrass\" value=\"Confirmer\"/>
            </form>
            </div>
            
        ";
    }

    public function modifierBrassin(){
        echo"
            <section class=\"container-fluid\">
                <div class=\"titre\"><img src=\"img/logo.png\" height=\"60\" width=\"60\"></div>
                <div class=\"titre\"><h2>Modifier brassin</h2></div>       
                <div class=\"titre\"><img src=\"img/logo.png\" height=\"60\" width=\"60\"></div>     
            </section>

            <div class=\"container quoiModif\">
                <h1 class=\"titre\">Que voulez-vous modifier ?</h1>

                <form method='POST' action='index.php?action=afficherToutElements'>
                    <button type=\"submit\" id=\"b1\" name=\"voirProduit\">Tout les éléments</button>
                </form>

                <form method='POST' action='index.php?action=afficherModifNomBrassin'>
                    <button type=\"submit\" id=\"b1\" name=\"ajouterProduit\">Le nom</button>
                </form>

                <form method='POST' action='index.php?action=afficherModifDateBrassage'>
                    <button type=\"submit\" id=\"b1\" name=\"\">La date de brassage</button>
                </form>

                <form method='POST' action='index.php?action=afficherModifMiseBouteille'>
                    <button type=\"submit\" id=\"b1\" name=\"suprimer\">La date de mise en bouteille</button>
                </form>

                <form method='POST' action='index.php?action=afficherModifierVolume'>
                    <button type=\"submit\" id=\"b1\" name=\"suprimer\">Le volume</button>
                </form>

                <form method='POST' action='index.php?action=afficherModifierPourAlcool'>
                    <button type=\"submit\" id=\"b1\" name=\"suprimer\">Pour alcool</button>
                </form>
            </div>
        ";
    }

    public function supprimerBrassin(){
        echo"
            <section class=\"container-fluid\">
                <div class=\"titre\"><img src=\"img/logo.png\" height=\"60\" width=\"60\"></div>
                <div class=\"titre\"><h2>Supprimer brassin</h2></div>       
                <div class=\"titre\"><img src=\"img/logo.png\" height=\"60\" width=\"60\"></div>     
            </section>

            <div class=\"container col-4\">
            <form method='POST' action='index.php?action=supprimerBrassin' name='nvNom'> &nbsp
                <div class=\"form-group\">
                    <label for=\"\">Nom Commercial : </label>
                    <input type='text' placeholder=\"Brassin à supprimer\" name='nom' /> 
                </div>
                <input type='submit' class=\"btn btn-primary b\" name='OKNom' value='Confirmer' />
            </form>
            </div>
        ";
    }

    //modifier brassin
    public function ModifierToutBrassin(){
        echo"
            <section class=\"container-fluid\">
                <div class=\"titre\"><img src=\"img/logo.png\" height=\"60\" width=\"60\"></div>
                <div class=\"titre\"><h2>Modifer brassin</h2></div>       
                <div class=\"titre\"><img src=\"img/logo.png\" height=\"60\" width=\"60\"></div>     
            </section>

            <div class=\"container col-4\">
            <form method='POST' action='index.php?action=modifierBrassin' name='nvNom'> &nbsp
                <div class=\"form-group\">
                    <label for=\"\">Nom Commercial à Modifier : </label>
                    <input type='text' placeholder=\"Brassin à modifier\" name='nom'/>             
                </div>
                <div class=\"form-group\">
                    <label for=\"\">Date De Brassage : </label>
                    <input type=\"date\" class=\"form-control\" min=\"2020-01-01\" name=\"dateBrassage\" />
                </div>
                <div class=\"form-group\">
                    <label for=\"\">Date Mise En Bouteille : </label>
                    <input type=\"date\" class=\"form-control\" min=\"2020-01-01\" name=\"miseB\" />        
                </div>
                <div class=\"form-group\">
                    <label for=\"\">Volume : </label>
                    <input type='text' placeholder=\"00.00\" name='volume' />                 
                </div>
                <div class=\"form-group\">
                    <label for=\"\">Pour Alcool : </label>
                    <input type='text' placeholder=\"00.00\" name='pourAlcool' />
                </div>
                <div class=\"form-group\">
                    <label for=\"\">Nouveau Nom : </label>
                    <input type='text' name='newNom' /> 
                </div>

                <input type='submit' class=\"btn btn-primary b\" name='OKNom' value='Confirmer' />
            </form>
            </div>
        ";
    }

    public function modifierNomBrassin(){
        echo"
            <section class=\"container-fluid\">
                <div class=\"titre\"><img src=\"img/logo.png\" height=\"60\" width=\"60\"></div>
                <div class=\"titre\"><h2>Modifier brassin</h2></div>       
                <div class=\"titre\"><img src=\"img/logo.png\" height=\"60\" width=\"60\"></div>     
            </section>

            <div class=\"container col-4\">
                <form method=\"POST\" action='index.php?action=modifierNomBrassin'>
                    <div class=\"form-group\">
                        <label for=\"\">Nom Commercial à Modifier : </label>
                        <input type='text' placeholder=\"Brassin à modifier\" name='nom'/>             
                    </div>
                    <div class=\"form-group\">
                        <label for=\"\">Nouveau Nom : </label>
                        <input type='text' name='newNom' />
                    </div>

                    <input type='submit' class=\"btn btn-primary b\" name='OKNom' value='Confirmer' />
                </form>
            </div>
        ";
    }

    public function ModifierDateBrassage(){
        echo"
            <section class=\"container-fluid\">
                <div class=\"titre\"><img src=\"img/logo.png\" height=\"60\" width=\"60\"></div>
                <div class=\"titre\"><h2>Modifier brassin</h2></div>       
                <div class=\"titre\"><img src=\"img/logo.png\" height=\"60\" width=\"60\"></div>     
            </section>

            <div class=\"container col-4\">
                <form method=\"POST\" action='index.php?action=modifierDateBrassageBrassin'>
                    <div class=\"form-group\">
                        <label for=\"\">Nom Commercial à Modifier : </label>
                        <input type='text' placeholder=\"Brassin à modifier\" name='nom'/>             
                    </div>
                    <div class=\"form-group\">
                        <label for=\"\">Date De Brassage : </label>
                        <input type=\"date\" class=\"form-control\" min=\"2020-01-01\" name=\"dateBrassage\" />
                    </div>

                    <input type='submit' class=\"btn btn-primary b\" name='OKNom' value='Confirmer' />
                </form>
            </div>
        ";
    }

    public function modifierDateMiseBouteille(){
        echo"
            <section class=\"container-fluid\">
                <div class=\"titre\"><img src=\"img/logo.png\" height=\"60\" width=\"60\"></div>
                <div class=\"titre\"><h2>Modifier brassin</h2></div>       
                <div class=\"titre\"><img src=\"img/logo.png\" height=\"60\" width=\"60\"></div>     
            </section>

            <div class=\"container col-4\">
                <form method=\"POST\" action='index.php?action=modifierDateMiseBouteilleBrassin'>
                    <div class=\"form-group\">
                        <label for=\"\">Nom Commercial à Modifier : </label>
                        <input type='text' placeholder=\"Brassin à modifier\" name='nom'/>             
                    </div>
                    <div class=\"form-group\">
                        <label for=\"\">Date Mise En Bouteille : </label>
                        <input type=\"date\" class=\"form-control\" min=\"2020-01-01\" name=\"miseB\" />        
                    </div>

                    <input type='submit' class=\"btn btn-primary b\" name='OKNom' value='Confirmer' />
                </form>
            </div>

        ";
    }

    public function modifierVolume(){
        echo"
            <section class=\"container-fluid\">
                <div class=\"titre\"><img src=\"img/logo.png\" height=\"60\" width=\"60\"></div>
                <div class=\"titre\"><h2>Modifier brassin</h2></div>       
                <div class=\"titre\"><img src=\"img/logo.png\" height=\"60\" width=\"60\"></div>     
            </section>

            <div class=\"container col-4\">
                <form method=\"POST\" action='index.php?action=modifierVolumeBrassin'>
                    <div class=\"form-group\">
                        <label for=\"\">Nom Commercial à Modifier : </label>
                        <input type='text' placeholder=\"Brassin à modifier\" name='nom'/>             
                    </div>
                    <div class=\"form-group\">
                        <label for=\"\">Volume : </label>
                        <input type='text' placeholder=\"00.00\" name='volume' />                 
                    </div>

                    <input type='submit' class=\"btn btn-primary b\" name='OKNom' value='Confirmer' />
                </form>
            </div>
        ";
    }

    public function modifierPourAlcool(){
        echo"
            <section class=\"container-fluid\">
                <div class=\"titre\"><img src=\"img/logo.png\" height=\"60\" width=\"60\"></div>
                <div class=\"titre\"><h2>Modifier brassin</h2></div>       
                <div class=\"titre\"><img src=\"img/logo.png\" height=\"60\" width=\"60\"></div>     
            </section>

            <div class=\"container col-4\">
                <form method=\"POST\" action='index.php?action=modifierPourAlcoolBrassin'>
                    <div class=\"form-group\">
                        <label for=\"\">Nom Commercial à Modifier : </label>
                        <input type='text' placeholder=\"Brassin à modifier\" name='nom'/>             
                    </div>
                    <div class=\"form-group\">
                    <label for=\"\">Pour Alcool : </label>
                    <input type='text' placeholder=\"00.00\" name='pourAlcool' />
                </div>

                    <input type='submit' class=\"btn btn-primary b\" name='OKNom' value='Confirmer' />
                </form>
            </div>
        ";
    }

    //mouvements
    public function ajouterMouvement(){
        echo"
            <section class=\"container-fluid\">
                <div class=\"titre\"><img src=\"img/logo.png\" height=\"60\" width=\"60\"></div>
                <div class=\"titre\"><h2>Nouveau mouvement</h2></div>       
                <div class=\"titre\"><img src=\"img/logo.png\" height=\"60\" width=\"60\"></div>     
            </section>

            <div class=\"container col-4\">
            <form method='POST' action='index.php?action=ajouterMouvement' name='nvNom'>
                <div class=\"form-group\">
                    <label for=\"dateBrassage\">Date de Brassage : </label>
                    <input type=\"date\" class=\"form-control\" min=\"2020-01-01\" name='laDate' />
                </div>
                <div class=\"form-group\">
                    <label for=\"prcAlcool\">nom : </label>
                    <input type=\"text\" class=\"form-control\" name=\"nom\" />
                </div>
                <div class=\"form-group\">
                    <label for=\"prcAlcool\">contenance : </label>
                    <input type=\"text\" placeholder=\"00.00\" class=\"form-control\" name=\"contenance\" />
                </div>
                <div class=\"form-group\">
                    <label for=\"prcAlcool\">Nombres de bouteilles : </label>
                    <input type=\"text\" class=\"form-control\" name=\"nbBouteilles\" />
                </div>
                <div class=\"form-group\">
                    <label for=\"prcAlcool\">Nombre Du Stock Du Mois : </label>
                    <input type=\"text\" class=\"form-control\" name=\"nbStockM\" />
                </div>
                <div class=\"form-group\">
                    <label for=\"prcAlcool\">Nombre Du Stock Réalisé : </label>
                    <input type=\"text\" class=\"form-control\" name=\"stockRea\" />
                </div>
                <div class=\"form-group\">
                    <label for=\"prcAlcool\">Nombre De Bouteilles Vendues : </label>
                    <input type=\"text\" class=\"form-control\" name=\"nbVendues\" />
                </div>
                <div class=\"form-group\">
                    <label for=\"prcAlcool\">Nombre De Sorties Dégagées : </label>
                    <input type=\"text\" class=\"form-control\" name=\"sortieDeg\" />
                </div>
                <div class=\"form-group\">
                    <label for=\"prcAlcool\">Nombre De Sorties Fin Du Mois : </label>
                    <input type=\"text\" class=\"form-control\" name=\"finMois\" />
                </div>
                <div class=\"form-group\">
                    <label for=\"prcAlcool\">Volume Sortie : </label>
                    <input type=\"text\" placeholder=\"00.00\" class=\"form-control\" name=\"volumeS\" />
                </div>
                <div class=\"form-group\">
                    <label for=\"prcAlcool\">Cout Douanes : </label>
                    <input type=\"text\" placeholder=\"00.00\" class=\"form-control\" name=\"coutD\" />
                </div>
                <input type='submit' class=\"btn btn-primary b\" name='OKNom' value='Confirmer' />
            </form>
            </div>
        ";
    }

    public function modifierMouvement(){
        echo"
            <section class=\"container-fluid\">
                <div class=\"titre\"><img src=\"img/logo.png\" height=\"60\" width=\"60\"></div>
                <div class=\"titre\"><h2>Modifier brassin</h2></div>       
                <div class=\"titre\"><img src=\"img/logo.png\" height=\"60\" width=\"60\"></div>     
            </section>

            <div class=\"container quoiModif\">
                <h1 class=\"titre\">Que voulez-vous modifier ?</h1>

                <form method='POST' action='index.php?action=afficherModifToutElementsMouvement'>
                    <button type=\"submit\" id=\"b1\" name=\"voirProduit\">Tout les éléments</button>
                </form>

                <form method='POST' action='index.php?action=afficherModifNomMouvement'>
                    <button type=\"submit\" id=\"b1\" name=\"ajouterProduit\">Le nom</button>
                </form>

                <form method='POST' action='index.php?action=afficherModifDateMouvement'>
                    <button type=\"submit\" id=\"b1\" name=\"\">La date</button>
                </form>

                <form method='POST' action='index.php?action=afficherModifContenanceMouvement'>
                    <button type=\"submit\" id=\"b1\" name=\"suprimer\">La contenance</button>
                </form>

                <form method='POST' action='index.php?action=afficherModifierNbBouteilleMouvement'>
                    <button type=\"submit\" id=\"b1\" name=\"suprimer\">Le nombre de bouteilles</button>
                </form>

                <form method='POST' action='index.php?action=afficherModifierStockMoisMouvement'>
                    <button type=\"submit\" id=\"b1\" name=\"suprimer\">Le stock du mois</button>
                </form>

                <form method='POST' action='index.php?action=afficherModifierStockReaMouvement'>
                    <button type=\"submit\" id=\"b1\" name=\"suprimer\">Le stock réalisé</button>
                </form>

                <form method='POST' action='index.php?action=afficherModifierSortieVendues'>
                    <button type=\"submit\" id=\"b1\" name=\"suprimer\">Le nombre de sorties vendues</button>
                </form>

                <form method='POST' action='index.php?action=afficherModifierSortieDeg'>
                    <button type=\"submit\" id=\"b1\" name=\"suprimer\">Le nombre de sorties dégagés</button>
                </form>

                <form method='POST' action='index.php?action=afficherModifierSortieFinMois'>
                    <button type=\"submit\" id=\"b1\" name=\"suprimer\">Le nombre de sortie à la fin du mois</button>
                </form>

                <form method='POST' action='index.php?action=afficherModifierVolSorties'>
                    <button type=\"submit\" id=\"b1\" name=\"suprimer\">Le nombre de volumes sorties</button>
                </form>

                <form method='POST' action='index.php?action=afficherModifierCoutDouane'>
                    <button type=\"submit\" id=\"b1\" name=\"suprimer\">Le cout de la douane</button>
                </form>
            </div>

            ";
    }

    public function supprimerMouvement(){
        echo"
            <section class=\"container-fluid\">
                <div class=\"titre\"><img src=\"img/logo.png\" height=\"60\" width=\"60\"></div>
                <div class=\"titre\"><h2>Supprimer mouvement</h2></div>       
                <div class=\"titre\"><img src=\"img/logo.png\" height=\"60\" width=\"60\"></div>     
            </section>

            <div class=\"container col-4\">
            <form method='POST' action='index.php?action=supprimerMouvement' name='nvNom'> &nbsp
                <div class=\"form-group\">
                    <label for=\"\">Nom Mouvement: </label>
                    <input type='text' placeholder=\"Mouvement à supprimer\" name='nom' />
                </div>
                <input type='submit' class=\"btn btn-primary b\" name='OKNom' value='Confirmer' />
            </form>
            </div>
        ";
    }

    // modification sur mouvement
    public function modifierToutMouvement(){
        echo"
            <section class=\"container-fluid\">
                <div class=\"titre\"><img src=\"img/logo.png\" height=\"60\" width=\"60\"></div>
                <div class=\"titre\"><h2>Modifier mouvement</h2></div>       
                <div class=\"titre\"><img src=\"img/logo.png\" height=\"60\" width=\"60\"></div>     
            </section>

            <div class=\"container col-4\">
            <form method='POST' action='index.php?action=modifierMouvement' name='nvNom'> &nbsp
                <div class=\"form-group\">
                    <label for=\"\">Nom Commercial à Modifier : </label>
                    <input type='text' placeholder=\"Brassin à modifier\" name='nom'/>             
                </div>
                <div class=\"form-group\">
                    <label for=\"\">Date : </label>
                    <input type=\"date\" class=\"form-control\" min=\"2020-01-01\" name=\"date\" />
                </div>
                <div class=\"form-group\">
                    <label for=\"\">Nom du Mouvement : </label>
                    <input type='text' name='name' />        
                </div>
                <div class=\"form-group\">
                    <label for=\"\">Contenance : </label>
                    <input type='text' placeholder=\"00.00\" name='contenance' />                 
                </div>
                <div class=\"form-group\">
                    <label for=\"\">Nombre De Bouteilles : </label>
                    <input type='text' placeholder=\"0\" name='nbBouteilles' />
                </div>
                <div class=\"form-group\">
                    <label for=\"\">Stock Du Mois : </label>
                    <input type='text' placeholder=\"0\" name='stockMois' /> 
                </div>
                <div class=\"form-group\">
                    <label for=\"\">Stock Réalisé : </label>
                    <input type='text' placeholder=\"0\" name='stockRea' /> 
                </div>
                <div class=\"form-group\">
                    <label for=\"\">Sorties Vendues : </label>
                    <input type='text' placeholder=\"0\" name='sortieVendues' /> 
                </div>
                <div class=\"form-group\">
                    <label for=\"\">Sorties Degagées : </label>
                    <input type='text' placeholder=\"0\" name='sortiesDeg' /> 
                </div>
                <div class=\"form-group\">
                    <label for=\"\">Sorties Fin Du Mois : </label>
                    <input type='text' placeholder=\"0\" name='sortieFinMois' /> 
                </div>
                <div class=\"form-group\">
                    <label for=\"\">Volume Sorties : </label>
                    <input type='text' placeholder=\"0\" name='volSorties' /> 
                </div>
                <div class=\"form-group\">
                    <label for=\"\">Cout Douane : </label>
                    <input type='text' placeholder=\"00.00\" name='coutDouane' /> 
                </div>

                <input type='submit' class=\"btn btn-primary b\" name='OKNom' value='Confirmer' />
            </form>
            </div>

        ";
    }

    public function modifierNomMouvement(){
        echo"
            <section class=\"container-fluid\">
                <div class=\"titre\"><img src=\"img/logo.png\" height=\"60\" width=\"60\"></div>
                <div class=\"titre\"><h2>Modifier mouvement</h2></div>       
                <div class=\"titre\"><img src=\"img/logo.png\" height=\"60\" width=\"60\"></div>     
            </section>

            <div class=\"container col-4\">
            <form method='POST' action='index.php?action=modifierNomMouvement' name='nvNom'> &nbsp
                <div class=\"form-group\">
                    <label for=\"\">Nom Commercial à Modifier : </label>
                    <input type='text' placeholder=\"Brassin à modifier\" name='nom'/>             
                </div>
                <div class=\"form-group\">
                    <label for=\"\">Nom du Mouvement : </label>
                    <input type='text' name='name' />        
                </div>

                <input type='submit' class=\"btn btn-primary b\" name='OKNom' value='Confirmer' />
            </form>
            </div>
        ";
    }

    public function modifierDateMouvement(){
        echo"
            <section class=\"container-fluid\">
                <div class=\"titre\"><img src=\"img/logo.png\" height=\"60\" width=\"60\"></div>
                <div class=\"titre\"><h2>Modifier mouvement</h2></div>       
                <div class=\"titre\"><img src=\"img/logo.png\" height=\"60\" width=\"60\"></div>     
            </section>

            <div class=\"container col-4\">
            <form method='POST' action='index.php?action=modifierDateMouvement' name='nvNom'> &nbsp
                <div class=\"form-group\">
                    <label for=\"\">Nom Commercial à Modifier : </label>
                    <input type='text' placeholder=\"Brassin à modifier\" name='nom'/>             
                </div>
                <div class=\"form-group\">
                    <label for=\"\">Date : </label>
                    <input type=\"date\" class=\"form-control\" min=\"2020-01-01\" name=\"date\" />
                </div>

                <input type='submit' class=\"btn btn-primary b\" name='OKNom' value='Confirmer' />
            </form>
            </div>
        ";
    }

    public function modifierContenanceMouvement(){
        echo"
            <section class=\"container-fluid\">
                <div class=\"titre\"><img src=\"img/logo.png\" height=\"60\" width=\"60\"></div>
                <div class=\"titre\"><h2>Modifier mouvement</h2></div>       
                <div class=\"titre\"><img src=\"img/logo.png\" height=\"60\" width=\"60\"></div>     
            </section>

            <div class=\"container col-4\">
            <form method='POST' action='index.php?action=modifierContenanceMouvement' name='nvNom'> &nbsp
                <div class=\"form-group\">
                    <label for=\"\">Nom Commercial à Modifier : </label>
                    <input type='text' placeholder=\"Brassin à modifier\" name='nom'/>             
                </div>
                <div class=\"form-group\">
                    <label for=\"\">Contenance : </label>
                    <input type='text' placeholder=\"00.00\" name='contenance' />                 
                </div>

                <input type='submit' class=\"btn btn-primary b\" name='OKNom' value='Confirmer' />
            </form>
            </div>
        ";
    }

    public function modifierNbBouteillesMouvement(){

        echo"
            <section class=\"container-fluid\">
                <div class=\"titre\"><img src=\"img/logo.png\" height=\"60\" width=\"60\"></div>
                <div class=\"titre\"><h2>Modifier mouvement</h2></div>       
                <div class=\"titre\"><img src=\"img/logo.png\" height=\"60\" width=\"60\"></div>     
            </section>

            <div class=\"container col-4\">
            <form method='POST' action='index.php?action=modifierNbBouteillesMouvement' name='nvNom'> &nbsp
                <div class=\"form-group\">
                    <label for=\"\">Nom Commercial à Modifier : </label>
                    <input type='text' placeholder=\"Brassin à modifier\" name='nom'/>             
                </div>
                <div class=\"form-group\">
                    <label for=\"\">Nombre De Bouteilles : </label>
                    <input type='text' placeholder=\"0\" name='nbBouteilles' />
                </div>

                <input type='submit' class=\"btn btn-primary b\" name='OKNom' value='Confirmer' />
            </form>
            </div>
        ";
    }

    public function modifierStockMoisMouvement(){
        echo"
            <section class=\"container-fluid\">
                <div class=\"titre\"><img src=\"img/logo.png\" height=\"60\" width=\"60\"></div>
                <div class=\"titre\"><h2>Modifier mouvement</h2></div>       
                <div class=\"titre\"><img src=\"img/logo.png\" height=\"60\" width=\"60\"></div>     
            </section>

            <div class=\"container col-4\">
            <form method='POST' action='index.php?action=modifierStockMoisMouvement' name='nvNom'> &nbsp
                <div class=\"form-group\">
                    <label for=\"\">Nom Commercial à Modifier : </label>
                    <input type='text' placeholder=\"Brassin à modifier\" name='nom'/>             
                </div>
                <div class=\"form-group\">
                    <label for=\"\">Stock Du Mois : </label>
                    <input type='text' placeholder=\"0\" name='stockMois' /> 
                </div>

                <input type='submit' class=\"btn btn-primary b\" name='OKNom' value='Confirmer' />
            </form>
            </div>
        ";
    }

    public function modifierStockReaMouvement(){
        echo"
            <section class=\"container-fluid\">
                <div class=\"titre\"><img src=\"img/logo.png\" height=\"60\" width=\"60\"></div>
                <div class=\"titre\"><h2>Modifier mouvement</h2></div>       
                <div class=\"titre\"><img src=\"img/logo.png\" height=\"60\" width=\"60\"></div>     
            </section>

            <div class=\"container col-4\">
            <form method='POST' action='index.php?action=modifierStockReaMouvement' name='nvNom'> &nbsp
                <div class=\"form-group\">
                    <label for=\"\">Nom Commercial à Modifier : </label>
                    <input type='text' placeholder=\"Brassin à modifier\" name='nom'/>             
                </div>
                <div class=\"form-group\">
                    <label for=\"\">Stock Réalisé : </label>
                    <input type='text' placeholder=\"0\" name='stockRea' /> 
                </div>

                <input type='submit' class=\"btn btn-primary b\" name='OKNom' value='Confirmer' />
            </form>
            </div>
        ";
    }

    public function modifierSortieVenduesMouvement(){
        echo"
            <section class=\"container-fluid\">
                <div class=\"titre\"><img src=\"img/logo.png\" height=\"60\" width=\"60\"></div>
                <div class=\"titre\"><h2>Modifier mouvement</h2></div>       
                <div class=\"titre\"><img src=\"img/logo.png\" height=\"60\" width=\"60\"></div>     
            </section>

            <div class=\"container col-4\">
            <form method='POST' action='index.php?action=modifierSortieVenduesMouvement' name='nvNom'> &nbsp
                <div class=\"form-group\">
                    <label for=\"\">Nom Commercial à Modifier : </label>
                    <input type='text' placeholder=\"Brassin à modifier\" name='nom'/>             
                </div>
                <div class=\"form-group\">
                    <label for=\"\">Sorties Vendues : </label>
                    <input type='text' placeholder=\"0\" name='sortieVendues' /> 
                </div>

                <input type='submit' class=\"btn btn-primary b\" name='OKNom' value='Confirmer' />
            </form>
            </div>
        ";
    }

    public function modifierSortieDegMouvement(){
        echo"
            <section class=\"container-fluid\">
                <div class=\"titre\"><img src=\"img/logo.png\" height=\"60\" width=\"60\"></div>
                <div class=\"titre\"><h2>Modifier mouvement</h2></div>       
                <div class=\"titre\"><img src=\"img/logo.png\" height=\"60\" width=\"60\"></div>     
            </section>

            <div class=\"container col-4\">
            <form method='POST' action='index.php?action=modifierSortieDegMouvement' name='nvNom'> &nbsp
                <div class=\"form-group\">
                    <label for=\"\">Nom Commercial à Modifier : </label>
                    <input type='text' placeholder=\"Brassin à modifier\" name='nom'/>             
                </div>
                <div class=\"form-group\">
                    <label for=\"\">Sorties Degagées : </label>
                    <input type='text' placeholder=\"0\" name='sortiesDeg' /> 
                </div>

                <input type='submit' class=\"btn btn-primary b\" name='OKNom' value='Confirmer' />
            </form>
            </div>
        ";
    }

    public function modifierSortieFinMoisMouvement(){
        echo"
            <section class=\"container-fluid\">
                <div class=\"titre\"><img src=\"img/logo.png\" height=\"60\" width=\"60\"></div>
                <div class=\"titre\"><h2>Modifier mouvement</h2></div>       
                <div class=\"titre\"><img src=\"img/logo.png\" height=\"60\" width=\"60\"></div>     
            </section>

            <div class=\"container col-4\">
            <form method='POST' action='index.php?action=modifierSortieFinMoisMouvement' name='nvNom'> &nbsp
                <div class=\"form-group\">
                    <label for=\"\">Nom Commercial à Modifier : </label>
                    <input type='text' placeholder=\"Brassin à modifier\" name='nom'/>             
                </div>
                <div class=\"form-group\">
                    <label for=\"\">Sorties Fin Du Mois : </label>
                    <input type='text' placeholder=\"0\" name='sortieFinMois' /> 
                </div>
                

                <input type='submit' class=\"btn btn-primary b\" name='OKNom' value='Confirmer' />
            </form>
            </div>
        ";
    }

    public function modifierVolumeSortieMouvement(){
        echo"
            <section class=\"container-fluid\">
                <div class=\"titre\"><img src=\"img/logo.png\" height=\"60\" width=\"60\"></div>
                <div class=\"titre\"><h2>Modifier mouvement</h2></div>       
                <div class=\"titre\"><img src=\"img/logo.png\" height=\"60\" width=\"60\"></div>     
            </section>

            <div class=\"container col-4\">
            <form method='POST' action='index.php?action=modifierVolumeSortieMouvement' name='nvNom'> &nbsp
                <div class=\"form-group\">
                    <label for=\"\">Nom Commercial à Modifier : </label>
                    <input type='text' placeholder=\"Brassin à modifier\" name='nom'/>             
                </div>
                <div class=\"form-group\">
                    <label for=\"\">Volume Sorties : </label>
                    <input type='text' placeholder=\"0\" name='volSorties' /> 
                </div>
                

                <input type='submit' class=\"btn btn-primary b\" name='OKNom' value='Confirmer' />
            </form>
            </div>
        ";
    }

    public function modifierCoutDouaneMouvement(){
        echo"
            <section class=\"container-fluid\">
                <div class=\"titre\"><img src=\"img/logo.png\" height=\"60\" width=\"60\"></div>
                <div class=\"titre\"><h2>Modifier mouvement</h2></div>       
                <div class=\"titre\"><img src=\"img/logo.png\" height=\"60\" width=\"60\"></div>     
            </section>

            <div class=\"container col-4\">
            <form method='POST' action='index.php?action=modifierCoutDouaneMouvement' name='nvNom'> &nbsp
                <div class=\"form-group\">
                    <label for=\"\">Nom Commercial à Modifier : </label>
                    <input type='text' placeholder=\"Brassin à modifier\" name='nom'/>             
                </div>
                <div class=\"form-group\">
                    <label for=\"\">Cout Douane : </label>
                    <input type='text' placeholder=\"00.00\" name='coutDouane' /> 
                </div>
                

                <input type='submit' class=\"btn btn-primary b\" name='OKNom' value='Confirmer' />
            </form>
            </div>
        ";
    }
}