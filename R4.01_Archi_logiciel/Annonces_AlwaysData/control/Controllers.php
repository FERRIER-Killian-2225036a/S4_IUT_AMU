<?php
namespace control;
use data\DataAccess;
use service\StrengthChecking;

include_once 'service/AnnoncesChecking.php';
include_once 'data/DataAccess.php';
include_once 'service/StrengthChecking.php';
class Controllers
{
    public function annoncesAction($login, $password, $data, $annoncesCheck)
    {
        if ($annoncesCheck->authentificate($login,$password,$data)) {
            $annoncesCheck->getAllAnnonces($data);
        }
    }

    public function postAction($id, $data, $annoncesCheck)
    {
        $annoncesCheck->getPost($id,$data);
    }

    public function signUp($data, $login, $password, $prenom, $nom)
    {

        // Ajoute la date de création de l'utilisateur (par exemple, la date actuelle)
        $dateCreation = date("Y-m-d H:i:s");


        //TODO: vérif du bon format des données

        // Appelle la fonction addUser du modèle pour ajouter l'utilisateur
        if ($data->getUser($login, $password) == null && (new StrengthChecking())->passwordStrengthChecking($password)){
            $user = $data->addUser($login, $password, $prenom, $nom, $dateCreation);
            header("Location: /annonces/index.php");
            exit();
        } else {
            header( "refresh:5;url=/annonces/index.php" );
            echo "L'utilisateur existe déjà ou le mot de passe n'est pas assez fort (redirection automatique dans 5 sec.)";
            exit;
        }

    }
}