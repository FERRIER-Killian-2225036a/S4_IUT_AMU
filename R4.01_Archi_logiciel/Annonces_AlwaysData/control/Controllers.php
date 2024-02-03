<?php
namespace control;
use data\DataAccess;
use service\UserEnterChecking;

include_once 'service/AnnoncesChecking.php';
include_once 'data/DataAccess.php';
include_once 'service/UserEnterChecking.php';
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

    public function addPost($data, $title, $body)
    {
        if (preg_match('/^[a-zA-Z\s?!.\']+$/u', $title) && preg_match('/^[a-zA-Z\s?!.\']+$/u', $body)){ // Si les chaînes sont valides, ajoute la date de création de l'utilisateur (par exemple, la date actuelle)
            $dateCreation = date("Y-m-d H:i:s");

            $data->addPost($title, $body, $dateCreation);

            echo 'Le post a bien été ajouté (redirection automatique dans 5 sec.)';
            header( "refresh:5;url=/annonces/index.php");
            exit();
        } else {
            echo 'Le titre et le contenu doivent contenir uniquement du texte (redirection automatique dans 5 sec.)';
            header( "refresh:5;url=/annonces/index.php/addPost");
            exit();
        }
    }

    public function signUp($data, $login, $password, $prenom, $nom)
    {

        // Ajoute la date de création de l'utilisateur (par exemple, la date actuelle)
        $dateCreation = date("Y-m-d H:i:s");

        // Appelle la fonction addUser du modèle pour ajouter l'utilisateur
        if ($data->getUser($login, $password) == null && (new UserEnterChecking())->passwordStrengthChecking($password)){
            $data->addUser($login, $password, $prenom, $nom, $dateCreation);
            header("Location: /annonces/index.php");
            exit();
        } else {
            header( "refresh:5;url=/annonces/index.php" );
            echo "L'utilisateur existe déjà ou le mot de passe n'est pas assez fort (redirection automatique dans 5 sec.)";
            exit;
        }

    }
}