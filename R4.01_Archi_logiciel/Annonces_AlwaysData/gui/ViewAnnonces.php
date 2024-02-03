<?php
namespace gui;
include_once "View.php";

class ViewAnnonces extends View
{
    public function __construct($layout, $login, $presenter)
    {
        parent::__construct($layout);

        if( $presenter->getAllAnnoncesHTML() == null ){
            header( "refresh:5;url=/annonces/index.php" );
            echo 'Erreur de login et/ou de mot de passe (redirection automatique dans 5 sec.)';
            exit;
        }

        $this->title= 'Exemple Annonces Basic PHP: Annonces';

        $this->content = "<p> Hello $login </p>";

        $this->content .= $presenter->getAllAnnoncesHTML();

        echo '<a href="/annonces/index.php">Retour a la page d\'accueil</a><br />';
        echo '<a href="/annonces/index.php/addPost">Ajout d\'un post</a>';
    }
}