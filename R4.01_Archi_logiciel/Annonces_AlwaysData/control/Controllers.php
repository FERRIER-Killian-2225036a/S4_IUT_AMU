<?php
namespace control;
use data\DataAccess;

include_once 'service/AnnoncesChecking.php';
include_once 'data/DataAccess.php';
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
        $user = $data->addUser($login, $password, $prenom, $nom, $dateCreation);

        // Vérifie si l'ajout de l'utilisateur a réussi
        if ($user !== null) {
            // Redirige l'utilisateur vers une page de confirmation ou une autre page appropriée
            header("Location: /annonces/index.php");
            exit();
        } else {
            // Affiche un message d'erreur ou gère l'erreur d'ajout de l'utilisateur
            echo "Erreur lors de l'inscription.";
        }

    }
}


/*
    protected $data = null;

    public function __construct($data)
    {
        $this->data = $data;
    }
 */