<?php
namespace gui;
include_once "gui/View.php";

class ViewSignup extends View
{
    public function __construct($layout)
    {
        parent::__construct($layout);

        $this->title = 'Exemple Annonces Basic PHP: Connexion';

        $this->content = '
            <form method="post" action="/annonces/index.php/annonces">
            
            
                <label for="login"> Votre Prénom </label> :
                <input type="text" name="login" id="firstName" placeholder="prenom" maxlength="12" required />
                <br />
                <label for="login"> Votre Nom </label> :
                <input type="text" name="login" id="lastName" placeholder="nom" maxlength="12" required />
                <br />
                <label for="login"> Votre identifiant </label> :
                <input type="text" name="login" id="login" placeholder="identifiant" maxlength="12" required />
                <br />
                <label for="password"> Votre mot de passe </label> :
                <input type="password" name="password" id="password" maxlength="12" required />
                
                <br />
                <input type="submit" value="Envoyer">
            </form>';
    }
}